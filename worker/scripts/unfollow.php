<?php
require_once '../class/DB.php';
require_once '../class/Worker.php';
require_once '../class/Robot.php';
require_once '../class/system_config.php';
require_once '../class/user_role.php';
require_once '../class/user_status.php';
require_once '../class/Gmail.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/libraries/utils.php';
echo "UNFOLLOW Inited...!<br>\n";
echo date("Y-m-d h:i:sa") . "<br>\n";
$GLOBALS['sistem_config'] = new dumbu\cls\system_config();
$Robot = new \dumbu\cls\Robot();
$Robot->id = -2;
$DB = new \dumbu\cls\DB();
$Gmail = new \dumbu\cls\Gmail();
$Client = new dumbu\cls\Client();
$clients_data_db = $DB->get_unfollow_clients_data();
//$clients_data_db = $Client->get_client(1);
//
print '<br>\nBEFORE:<br>\n';
$CN = 0;
if(isset($clients_data_db))
{
    while($clients_data[$CN] =  $clients_data_db->fetch_object()){
    //    $clients_data[$CN] = $clients_data_db;
        //= $obj->fetch_object();
        $clients_data[$CN]->unfollows = 0;
        print "" . $clients_data[$CN]->login . '  |   ' . $clients_data[$CN]->id . '  |   ' . $clients_data[$CN]->insta_following . "<br>\n";
        //get the white list
        $login = $Robot->bot_login($clients_data[$CN]->login, $clients_data[$CN]->pass);
        if (isset($login->json_response->authenticated) && $login->json_response->authenticated) {
    //        $login_data = json_encode($login);
            $login_data = $login;
            $clients_data[$CN]->cookies = $login_data;
            $json_response = $Robot->get_insta_follows(// Respect firsts X users
                   $login_data, $clients_data[$CN]->insta_id, 30
            );
        } else {
            $Gmail->send_client_login_error($clients_data[$CN]->email, $clients_data[$CN]->name, $clients_data[$CN]->login);
            print "NOT AUTENTICATED!!!";
            echo "<br>\n DELETED FROM UNFOLLOW: " . $clients_data[$CN]->login . " (" . $clients_data[$CN]->id . ") <br>\n";
            unset($clients_data[$CN]);
        }
        $CN++;
    }
    
    for ($i = 0; $i < 100 && $CN; $i++) {
    // Process all UNFOLLOW clients
        foreach ($clients_data as $ckey => $client_data) {
            if ($client_data && $client_data->cookies) {
                $login_data = $client_data->cookies;
                echo "<br>\nClient: $client_data->login ($client_data->id)   " . date("Y-m-d h:i:sa") . "<br>\n";
                // Verify Profile Following
                $json_response = $Robot->get_insta_follows(
                        $login_data, $client_data->insta_id, 15
                );
                if (isset($json_response->data->user->edge_follow) && isset($json_response->data->user->edge_follow->page_info)) {
                    if ($json_response->data->user->edge_follow->page_info->has_next_page == false) {
                        $cursor = $json_response->data->user->edge_follow->page_info->end_cursor;
                        $json_response = $Robot->get_insta_follows(
                                $login_data, $client_data->insta_id, 15, $cursor
                        );
                    }
                }
    //            var_dump($json_response);
                if (is_object($json_response) && $json_response->status == 'ok' && isset($json_response->data->user->edge_follow->edges)) { // if response is ok
                   // Get Users 
                    $white_list = $DB->get_white_list($client_data->id);
                    print '\n<br> Count: ' . count($json_response->data->user->edge_follow->edges) . '\n<br>';
                    $Profiles = $json_response->data->user->edge_follow->edges;
                    foreach ($Profiles as $rpkey => $Profile) {
                        
                        $Profile = $Profile->node;
                        // If profile is not in white list then do unfollow request
                        if(!(isset($white_list) && str_binary_search($Profile->id,$white_list)))
                        {   
                            echo "Profil name: $Profile->username<br>\n";
                            $json_response2 = $Robot->make_insta_friendships_command($login_data, $Profile->id, 'unfollow');
                            var_dump($json_response2);
                            echo "<br>\n";
                            if (is_object($json_response2) && $json_response2->status == 'ok') { // if response is ok
                                $clients_data[$ckey]->unfollows++;
                            } else { // Porcess error
                                $Profile = new \dumbu\cls\Profile();
                                $error = $Profile->parse_profile_follow_errors($json_response2); // TODO: Class for error messages
                                if ($error == 6) {// Just empty message:
                                    $error = FALSE;
                                } else if ($error == 7) { // To much request response string only
                                    $error = FALSE;
                                    break;
                                } else if ($error) {
                                    unset($clients_data[$ckey]);
                                    break;
                                }
                                break;
                            }                        
                        }
                    }
                } else {
                    unset($clients_data[$ckey]);
                    echo "<br>\n DELETED FROM UNFOLLOW!! NOT CLIENT DATA: $client_data->login ($client_data->id) <br>\n";
                }
            } 
        }
        // Wait 20 minutes
        sleep(20 * 60);
    }      
}
//var_dump($clients_data);
// AFTER
print 'AFTER:<br>\n';
print_r($clients_data);
//$clients_data = $DB->get_unfollow_clients_data();
//while ($client_data = $clients_data->fetch_object()) {
//    echo "<br>\nClient: $client_data->login ($client_data->id) <br>\n";
//    $client_data->insta_follows_cursor = NULL;
//    $error = FALSE;
//    $unfollows = 0;
//    while (!$error && $unfollows < 15) {
//        $login_data = json_decode($client_data->cookies);
//        $json_response = $Robot->get_insta_follows(
//                $login_data, $client_data->insta_id, 10, $client_data->insta_follows_cursor
//        );
//        if (is_object($json_response) && $json_response->status == 'ok' && isset($json_response->follows->nodes)) { // if response is ok
//            // Get Users 
//            $Profiles = $json_response->follows->nodes;
//            foreach ($Profiles as $Profile) {
//                // Do unfollow request
//                echo "Profil name: $Profile->username<br>\n";
//                $json_response = $Robot->make_insta_friendships_command($login_data, $Profile->id, 'unfollow');
//                var_dump($json_response);
//                if (is_object($json_response) && $json_response->status == 'ok') { // if response is ok
//                    $unfollows++;
//                } else {
//                    $error = TRUE;
//                    break;
//                }
//            }
//        } else {
//            $error = TRUE;
//        }
//    }
//}
print '\n<br>JOB DONE!!!<br>\n';
echo date("Y-m-d h:i:sa");
