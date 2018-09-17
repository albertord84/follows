<?PHP

require_once '../class/Worker.php';
require_once '../class/ProxyManager.php';
require_once '../class/system_config.php';
require_once '../class/Gmail.php';
require_once '../class/Payment.php';
require_once '../class/Client.php';
require_once '../class/Reference_profile.php';
require_once '../class/PaymentCielo3.0.php';
require_once '../class/Tester.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/follows/worker/externals/utils.php';

$GLOBALS['sistem_config'] = new follows\cls\system_config();
/*
$tester = new follows\cls\Tester(29037);
$tester->Test_get_profile_followers();
$tester->Test_get_geo_followers();
$tester->Test_get_hashtag_followers();
//print('Hola Mundo');
//var_dump($DB->get_follow_work());*/


/*
 * curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYPORT, $proxyPort);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
 */

$DB = new follows\cls\DB();
$Robot = new \follows\cls\Robot();
$Client = (new \follows\cls\Client())->get_client(20565);
//$res = $Robot->get_insta_follows(json_decode($Client->cookies),$Client->insta_id,15);
  /*$daily_work.cookies as cookies, "
                        . "   users.id as users_id, "
                        . "   clients.cookies as client_cookies, "
                        . "   reference_profile.insta_id as rp_insta_id, "
                        . "   reference_profile.type as rp_type, "
                        . "   reference_profile.id as rp_id */
$daily_work = new \stdClass();
$daily_work->cookies = $Client->cookies;
$daily_work->login_data = json_decode($Client->cookies);
$daily_work->users_id = $Client->id;
$daily_work->rp_insta_id = '2023444583';
//$daily_work->rp_insta_name = 'lovecats';
$daily_work->insta_name = 'daylipadron';
$daily_work->rp_type = 0;
$daily_work->rp_id = 49843; 
$daily_work->client_id = $Client->id;
$daily_work->like_first = true;
$daily_work->to_follow = 5;
$Followeds_to_unfollow = array();
$unfollow_work = $DB->get_unfollow_work(20565);/*
while ($Followed = $unfollow_work->fetch_object()) { //
                    $To_Unfollow = new \follows\cls\Followed();
                    // Update Ref Prof Data
                    $To_Unfollow->id = $Followed->id;
                    $To_Unfollow->followed_id = $Followed->followed_id;
                    array_push($Followeds_to_unfollow, $To_Unfollow);
                }*/
$daily_work->black_list = $DB->get_black_list($daily_work->client_id);
 $errors = false;
 $Ref_profile_follows = $Robot->do_follow_unfollow_work($Followeds_to_unfollow, $daily_work, $errors);
 (new \follows\cls\Worker())->save_follow_unfollow_work($Followeds_to_unfollow, $Ref_profile_follows, $daily_work);

var_dump($res);
//$cursor = NULL;
//var_dump($Robot->get_insta_geomedia(json_decode($Client->cookies), '213163910', 10, $cursor));

/*
$result = new \stdClass();
 try                 $result = $Robot->make_login("ky2oficial", "alejandropacho32");
                $result->json_response = new \stdClass();
                $result->json_response->status = 'ok';
                $result->json_response->authenticated = TRUE;
                //$myDB->set_client_cookies($Client->id, json_encode($result));
                
                var_dump($result);
            } catch (\Exception $e) {
                // did by Jose R (si el cliente pone mal la senha por motivo X, el login va a dar una excepcion, y no le devemos cambiar las cookies, imagina que fue uno que e copio el curl a mano)
                //$myDB->set_cookies_to_null($Client->id);
            }*/
//$manager = new \follows\cls\ProxyManager();
//$manager->UpdateUserProxy();

//$Robot = new \follows\cls\Robot();
//$res = $Robot->checkpoint_requested('riveauxmerino','Notredame');
//$Robot->make_checkpoint('riveauxmerino', '096731');
///$res = $Robot->bot_login('riveauxmerino', 'Notredame');


//$result = $Robot->bot_login('casazunzun', 'angelpadron1991');
//var_dump($res);

//$res = $Robot->bot_login('alberto_dreyes', 'albertord9');
//var_dump($res);

/*
$Robot = new \follows\cls\Robot();
$result = $Robot->bot_login('drrbendoraytes', 'rb280875');
var_dump($result);*/
/*
$payment = new \Payment();
$client = new \stdClass();
$client->credit_card_number = "5293888988785452";
$client->credit_card_name = "JOSE ANGEL R MERINO";
$client->credit_card_exp_month = "11";
$client->credit_card_exp_year = "23";
$client->credit_card_cvc = "564";
$client->pay_day = strostamp('today');
$payment->check_initial_payment($client);*/
/*  

$Client = (new \follows\cls\Client())->get_client(65045);

$DB = new \follows\cls\DB();
//var_dump($Client);
$json_response2 = $Robot->get_insta_geolocalization_data('havana-cuba');
var_dump($json_response2);
$json_response2 = $Robot->get_insta_geolocalization_data('cutrasddaa');
var_dump($json_response2);
$json_response2 = $Robot->get_insta_tag_data('cuba');
var_dump($json_response2);
$json_response2 = $Robot->get_insta_geolocalization_data_from_client($Client->cookies, 'havana-cuba');
var_dump($json_response2);
$json_response2 = $Robot->get_insta_geolocalization_data_from_client($Client->cookies, 'cuba');
var_dump($json_response2);
$json_response2 = $Robot->get_insta_tag_data_from_client($Client->cookies, 'cuba');
var_dump($json_response2);
*/
/*
$json_response = new \stdClass();
$Client = (new \follows\cls\Client())->get_client(81875);
$daily_work = new \stdClass();
$daily_work->rp_type = 1;
$daily_work->cookies = $Client->cookies; 
$daily_work->to_follow = 10;
$daily_work->insta_follower_cursor = NULL;
$daily_work->insta_name = 'cuba';
$daily_work->rp_insta_id = 220021938;
$daily_work->client_id = 81875;

$res = $Robot->get_insta_ref_prof_data('daylipadron');
var_dump($res);*/

//$json_response->message = "unauthorized";
//$json_response->status = 'fail';
//$Robot->daily_work = $daily_work;
//$Robot->id = 1;
//$Robot->process_follow_error($json_response);

/*
$Client = (new \follows\cls\Client())->get_client(20565);
$daily_work = new \stdClass();
$daily_work->rp_type = 1;
$daily_work->cookies = $Client->cookies; 
$daily_work->to_follow = 10;
$daily_work->insta_follower_cursor = NULL;
$daily_work->insta_name = 'lovecats';
$daily_work->rp_insta_id = 220021938;

$query_hash_tag = 'ded47faa9a1aaded10161a2ff32abb6b';
$query_hash_loc = '951c979213d7e7a1cf1d73e2f661cbd1';
$query_hash_people = '37479f2b8209594dde7facb0d904896a';

$variables_loc = '{"id":"220021938","first":5,"after":"1742734290348619057"}';
$variables_tag = '{"tag_name":"casa","first":2,"after":"AQDtqk6w08rRUwIh171RaVDS0IPYVbYaQ2T0QDmgUcp42VjDyumZ2a3kLSzgwiDqmvLhv5VJXX0xXr1lwmf2f4EMj1znzGKFHxH_U0gqrpEdmw"}';
$variables_people = '{"id":"2023444583","first":5}';

$Robot = new \follows\cls\Robot();
    $error = FALSE;
$res = $Robot->get_profiles_to_follow($daily_work, $error, $page_info);
echo json_encode($res);
$cnt = count($res);
echo "<br></br><br>Peoples: $cnt</br><br></br>";

$daily_work->rp_type = 0;
$daily_work->rp_insta_id = 2023444583;
$daily_work->insta_follower_cursor = NULL;
$res = $Robot->get_profiles_to_follow($daily_work, $error, $page_info);
var_dump($res);
echo json_encode($res);
$cnt = count($res);
echo "<br></br><br>Peoples: $cnt</br><br></br>";

$daily_work->rp_type = 2;
$daily_work->insta_follower_cursor = NULL;
$res = $Robot->get_profiles_to_follow($daily_work, $error, $page_info);
echo json_encode($res);
var_dump($res);
echo "<br></br><br>Peoples: $cnt</br><br></br>";
*/
/*
$result_people =  $Robot->make_curl_followers_query($query_hash_people, $variables_people, json_decode($daily_work->cookies));
$json_response = json_decode(exec($result_people));
$cnt = count($json_response->data->user->edge_followed_by->edges);
echo "<br></br><br>Follows: $cnt </br><br></br>";
echo json_encode($json_response);

$result_loc =  $Robot->make_curl_followers_query($query_hash_loc, $variables_loc);
$json_response = json_decode(exec($result_loc));
$cnt = count($json_response->data->location->edge_location_to_media->edges);
echo "<br></br><br>Peoples: $cnt</br><br></br>";
echo json_encode($json_response);

$result_tag =  $Robot->make_curl_followers_query($query_hash_tag, $variables_tag);
$json_response = json_decode(exec($result_tag));
$cnt = count($json_response->data->hashtag->edge_hashtag_to_media->edges);
echo "<br></br><br>Peoples: $cnt</br><br></br>";
echo json_encode($json_response);
*/


//----------------------------------------------------------------
//
// WORKER
//$Worker = new follows\cls\Worker();
//$Worker->prepare_daily_work();
//$user_id = 19546;
//$Reference_id = 44881;  // PR, Geo o Hashtag
//$daily_work = $Worker->get_work_by_id($Reference_id);
//$Worker->do_follow_unfollow_work($daily_work);
//$error = NULL; $page_info = NULL;
//var_dump($daily_work->rp_insta_id);
//$profiles = $Robot->get_profiles_to_follow($daily_work, $error, $page_info);
//var_dump($profiles);
//
////$Worker->check_daily_work();
//$Worker->truncate_daily_work();
//$Worker->prepare_daily_work();
//$Worker->do_work();


echo "\n<br>" . date("Y-m-d h:i:sa") . "\n\n";
