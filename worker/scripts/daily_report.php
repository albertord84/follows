<?php

require_once '../class/Client.php';
require_once '../class/system_config.php';

echo "DAILY REPORT Inited...!<br>\n";
echo date("Y-m-d h:i:sa") . "<br>\n";

$GLOBALS['sistem_config'] = new follows\cls\system_config();

$Client = new follows\cls\Client();

$result = $Client->insert_clients_daily_report();

print '\n<br>JOB DONE!!!<br>\n';
echo date("Y-m-d h:i:sa");
