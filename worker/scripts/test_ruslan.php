<?PHP

require_once '../class/Worker.php';
require_once '../class/system_config.php';
require_once '../class/Gmail.php';
require_once '../class/Payment.php';
require_once '../class/Client.php';
require_once '../class/Reference_profile.php';
require_once '../class/PaymentCielo3.0.php';
require_once '../class/Robot.php';

//echo "Worker Inited...!<br>\n";
echo date("Y-m-d h:i:sa") . "<br>\n";

ini_set('xdebug.var_display_max_depth', 7);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

$GLOBALS['sistem_config'] = new dumbu\cls\system_config();

/*$Robot = new \dumbu\cls\Robot();
$login = "ruslan.guerra88";
$pass = "*R5sl@n#";
$checkpoint_data = $Robot->checkpoint_requested($login, $pass);
var_dump($checkpoint_data);*/

//
// MUNDIPAGG
$Payment = new \dumbu\cls\Payment();

$pay_day = strtotime('04/19/2018 05:00:00');
//$pay_day = strtotime("+30 days", $pay_day);

//$pay_day = time();
//$strdate = date("d-m-Y", $pay_day);
//$pay_day = strtotime("+30 days", time());

$payment_data['credit_card_number'] = '5155901510176234';
$payment_data['credit_card_name'] = 'VINICIUS F FLORA';
$payment_data['credit_card_exp_month'] = '06';
$payment_data['credit_card_exp_year'] = '2024';
$payment_data['credit_card_cvc'] = '685';
$payment_data['amount_in_cents'] = 28990;
$payment_data['pay_day'] = $pay_day;
//$resul = $Payment->create_payment($payment_data);
//var_dump($resul);
//$resul = $Payment->create_recurrency_payment($payment_data, 0, 20);
//var_dump($resul);
$resul = $Payment->create_recurrency_payment($payment_data, 0, 42);
var_dump($resul);

var_dump($pay_day);

// GMAIL
//$Gmail = new \dumbu\cls\Gmail();
//$useremail, $username, $instaname, $instapass
//$result = $Gmail->send_client_payment_error("jangel.riveaux@gmail.comm", "marcelomarins.art", "marcelomarins.art", "");
//var_dump($result);
//$result = $Gmail->send_client_payment_success("albertord84@gmail.com", "albertotest", "albertotest", "albertotest");
//var_dump($result);
//$Gmail->send_client_payment_error("albertord84@gmail.com", "Alberto R", "albertord84", "albertord");
//var_dump($result)
//$result = $Gmail->send_client_not_rps("albertord84@gmail.com", "Alberto R", Raphael PH & Pedrinho Lima"albertord84", "albertord");
//print_r($result);
//        ("Alberto Reyes", "albertord84@gmail.com", "Test contact formm msg NEW2!", "DUMBU", "555-777-777");
//$Gmail = new dumbu\cls\Gmail();
//$result = $Gmail->send_client_contact_form("Alberto Reyes", "albertord84@gmail.com", "Test contact formm msg NEW2!", "DUMBU", "555-777-777");
//$result = $Gmail->send_client_login_error("albertord85@gmail.com", "albertord", "alberto", "Alberto Reyes");
//$Gmail->send_new_client_payment_done("Alberto Reyes", "albertord84@gmail.com", 4);
//var_dump($result);

//$Client = new \dumbu\cls\Client();
//$client = $Client->get_client(1);
//$login_data = json_decode($client->cookies);
//var_dump($login_data);

//$DB = new \dumbu\cls\DB();

//$Robot = new \dumbu\cls\Robot();
//$ref_prof = "libertad";
//$result = $Robot->get_insta_data_from_client($ref_prof, $login_data);
//$result = $DB->is_profile_followed(1, '858888048');
//var_dump($result);
//$DB->delete_daily_work_client(13);
//$reference_id = "29307";
//$daily_work = $DB->get_follow_work_by_id($reference_id);
//$daily_work->login_data = json_decode($daily_work->cookies);
//var_dump($daily_work);
//$Worker->do_follow_unfollow_work($daily_work);
//$Ref_profile_follows = $Robot->do_follow_unfollow_work(NULL, $daily_work);
//var_dump($Ref_profile_follows);




echo "\n<br>" . date("Y-m-d h:i:sa") . "\n\n";
