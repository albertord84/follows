<?PHP

require_once '../class/Worker.php';
require_once '../class/system_config.php';
require_once '../class/Gmail.php';
require_once '../class/Payment.php';
require_once '../class/Client.php';
require_once '../class/Reference_profile.php';
require_once '../class/PaymentCielo3.0.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/follows/worker/externals/utils.php';

$GLOBALS['sistem_config'] = new follows\cls\system_config();
//print('Hola Mundo');
/* $Robot = new \follows\cls\Robot();
  $Client = (new \follows\cls\Client())->get_client(27345);
  $cursor = NULL;
  var_dump($Robot->get_insta_geomedia(json_decode($Client->cookies), '213163910', 10, $cursor));
 */
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
  } */

$Robot = new \follows\cls\Robot();
$res = $Robot->checkpoint_requested('riveauxmerino','Notredame88');
//$Robot->make_checkpoint('riveauxmerino', 872305);
//$res = $Robot->bot_login('guarapuvu', 'guarapuvu123');
//$result = $Robot->bot_login('casazunzun', 'angelpadron1991');
//var_dump($res);

/*
  $Robot = new \follows\cls\Robot();
  $result = $Robot->bot_login('drrbendoraytes', 'rb280875');
  var_dump($result); */
/*
  $payment = new \Payment();
  $client = new \stdClass();
  $client->credit_card_number = "5293888988785452";
  $client->credit_card_name = "JOSE ANGEL R MERINO";
  $client->credit_card_exp_month = "11";
  $client->credit_card_exp_year = "23";
  $client->credit_card_cvc = "564";
  $client->pay_day = strostamp('today');
  $payment->check_initial_payment($client); */
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
  var_dump($res); */

//$json_response->message = "unauthorized";
//$json_response->status = 'fail';
//$Robot->daily_work = $daily_work;
//$Robot->id = 1;
//$Robot->process_follow_error($json_response);
/*
  $Client = (new \follows\cls\Client())->get_client(19546);
  $daily_work = new \stdClass();
  $daily_work->rp_type = 1;
  $daily_work->cookies = $Client->cookies;
  $daily_work->to_follow = 10;
  $daily_work->insta_follower_cursor = NULL;
  $daily_work->insta_name = 'cuba';
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
$Worker = new follows\cls\Worker();
$Reference_id = 45728;  // PR, Geo o Hashtag
$daily_work = $Worker->get_work_by_id($Reference_id);
//$Worker->do_follow_unfollow_work($daily_work);
//$error = NULL; $page_info = NULL;
//var_dump($daily_work->rp_insta_id);
$profiles = $Robot->get_profiles_to_follow($daily_work, $error, $page_info);
$Robot->do_follow_unfollow_work($Followeds_to_unfollow, $daily_work);
var_dump($profiles);

//$Worker->check_daily_work();
//$Worker->truncate_daily_work();
//$Worker->prepare_daily_work();
//$Worker->do_work();


echo "\n<br>" . date("Y-m-d h:i:sa") . "\n\n";

//-H 'Origin: https://www.instagram.com'
//-H 'content-type: application/x-www-form-urlencoded'
//
//
//
//curl 'https://www.instagram.com/graphql/query/?query_hash=ded47faa9a1aaded10161a2ff32abb6b&variables=%7B%22tag_name%22%3A%22plazashoppingniteroi%22%2C%22first%22%3A3%2C%22after%22%3A%22AQAthgIO0HmU_zj-_Pt2CvaFQEa1GOi0Ej00Gxp6l_HLl9ydVl5JsSICRTXA4GuuqtvVFe39YS6QWnkMa3B9kwUWJ0cwJ10leUIrT5wakNyrmg%22%7D'
//-H 'Accept-Encoding: gzip, deflate, br'
//-H 'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.6,en;q=0.4'
//-H 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36'
//-H 'Accept: */*'
//-H 'X-Requested-with: XMLHttpRequest'
//-H 'Authority: www.instagram.com'
//-H 'Referer: https://www.instagram.com/explore/tags/plazashoppingniteroi/'
//-H 'x-instagram-gis: 0c8348d67d9a89c22baa342bad9f0467'
//--compressed
//
