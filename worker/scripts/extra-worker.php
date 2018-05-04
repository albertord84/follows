<?PHP

require_once '../class/Worker.php';
require_once '../class/system_config.php';
require_once '../class/Gmail.php';
require_once '../class/Payment.php';
require_once '../class/Client.php';
require_once '../class/Reference_profile.php';

//echo "Worker Inited...!<br>\n";
echo date("Y-m-d h:i:sa") . "<br>\n";


$GLOBALS['sistem_config'] = new dumbu\cls\system_config();
$DB = new \dumbu\cls\DB("/../../../config-pro.ini");

// WORKER
$Worker = new dumbu\cls\Worker($DB,0);

$Worker->do_work();





/*

try {
    $has_work = TRUE;
    while ($has_work) {
        //$DB = new \dumbu\cls\DB('');
        $daily_work = $DB->get_follow_work();
        if ($daily_work) {
            $daily_work->login_data = json_decode($daily_work->cookies);
            if ($daily_work->login_data != NULL) {
                // Calculate time to sleep    
                $elapsed_time = time() - intval($daily_work->last_access); // sec
                if ($elapsed_time < $GLOBALS['sistem_config']->MIN_NEXT_ATTEND_TIME * 60) {
                    $now = \DateTime::createFromFormat('U', time());
                    $last_access = \DateTime::createFromFormat('U', $daily_work->last_access);
                    print "<br>_________ELAPSE TIME ($elapsed_time): ";
                    sleep($GLOBALS['sistem_config']->MIN_NEXT_ATTEND_TIME * 60 - $elapsed_time); // secounds
                }
                $Worker->do_follow_unfollow_work($daily_work);
            } else {
                print "<br> Login data NULL!!!!!!!!!!!! <br>";
            }
        } else {
            $has_work = FALSE;
        }
    }
    echo "<br>\n<br>\nCongratulations!!! Job done...!<br>\n";
} catch (\Exception $exc) {
    echo $exc->getTraceAsString();
}






//$result = $DB->is_profile_followed(1, '858888048');
//var_dump($result);
//$DB->delete_daily_work_client(13);
$daily_work = $DB->get_follow_work();
$daily_work->login_data = json_decode($daily_work->cookies);
//var_dump($daily_work);
$Worker->do_follow_unfollow_work($daily_work);
//$Ref_profile_follows = $Robot->do_follow_unfollow_work(NULL, $daily_work);
//var_dump($Ref_profile_follows);


*/

echo "\n<br>" . date("Y-m-d h:i:sa") . "\n\n";
