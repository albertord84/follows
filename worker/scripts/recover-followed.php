<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../class/DB.php';
require_once '../class/Worker.php';
require_once '../class/Robot.php';
require_once '../class/system_config.php';
require_once '../class/user_role.php';
require_once '../class/user_status.php';
require_once '../class/Gmail.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/libraries/utils.php';

echo "RECOVERING Inited...!<br>\n";
echo date("Y-m-d h:i:sa") . "<br>\n";

$GLOBALS['sistem_config'] = new dumbu\cls\system_config();

$Robot = new \dumbu\cls\Robot();

$DB = new \dumbu\cls\DB();

$Gmail = new \dumbu\cls\Gmail();

$Client = new dumbu\cls\Client();

$clients_data_db = $DB->get_client_with_white_list();

if(isset($clients_data_db))
{
   $count= 0;
   foreach($clients_data_db as $client_id)
   {
       $current_client = $DB->get_client_login_data($client_id);
       
       try{
           $login = $Robot->bot_login($current_client->login, $current_client->pass);          
           if (isset($login->json_response->authenticated) && $login->json_response->authenticated) {
                $Clients_cookies[$client_id] = $login; 
                $count = $count+1;
        } else {
            $Gmail->send_client_login_error($clients_data[$CN]->email, $clients_data[$CN]->name, $clients_data[$CN]->login);
            print "NOT AUTENTICATED!!!";
            echo "<br>\n Can not recover users for: " . $clients_data[$CN]->login . " (" . $clients_data[$CN]->id . ") <br>\n";
        }
       }
        catch (\Exception $exc){ echo $exc->getTraceAsString(); }
   }
    $page = 0;
    while(count($Clients_cookies) > 0)
    {
        foreach ($Clients_cookies as $client_id => $cookies)
        {
            $white_list = $DB->get_white_list_paged($client_id, $page);
            
            echo "<br>CLIENT id: $client_id   page $page <\br>\n";
            echo "<br>";
            
            $page = $page + 1;
            if(!isset($white_list))
            {
                unset($Clients_cookies[$client_id]);
            }
            else
            {
                foreach ($white_list as $followed)
                {
                    echo "<br>Profil id: $followed<\br>\n";
                    echo "<br>";
                    var_dump($login);
                    echo "<\br>\n";
                    $json_response = $Robot->make_insta_friendships_command($cookies, $followed, 'follow');
                    var_dump($json_response);
                    echo "<br>\n";
                    if (!is_object($json_response) || $json_response->status != 'ok') { 
                             $error = $Robot->process_follow_error($json_response);
                             var_dump($json_response);
                             $error = TRUE;                          
                    }                  
                    
                }
                
                    sleep(20);
            }
            
        }
    }
}
//$clients_data_db = $Client->get_client(1);
//

