<?php

require_once '../class/Client.php';
require_once '../class/system_config.php';
require_once '../class/Payment.php';

echo "RETRY PAYMENT Inited...!<br>\n";
echo date("Y-m-d h:i:sa") . "<br>\n";

$GLOBALS['sistem_config'] = new dumbu\cls\system_config();
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

$Client = new dumbu\cls\Client();


$DB = new \dumbu\cls\DB();
$clients_data = $DB->get_clients_by_status(2, 0);
//
//var_dump($clients_data->num_rows);
while ($client_data = $clients_data->fetch_object()) {
    var_dump($client_data->login);
    $now = DateTime::createFromFormat('U', time());
    $pay_day = new DateTime();
    $pay_day->setTimestamp($client_data->init_date);
    $diff_info = $pay_day->diff($now);
    $diff_days = $diff_info->days;
    $initial_order_key = isset($client_data->initial_order_key) ? $client_data->initial_order_key : NULL;
    $Payment = new dumbu\cls\Payment();
    $order_key = isset($client_data->order_key) ? $client_data->order_key : NULL;
    // Check whether it have any payment done
    $OK_paied = $Payment->check_client_order_paied($order_key);
    //
    if ($order_key && retry_payment($order_key)) {
        print "\nClient $client_data->login($client_data->user_id): NORMAL OrderKey CAPTURED!!!\n";
    } else if (!$OK_paied && $initial_order_key && $diff_days < 33 && retry_payment($initial_order_key)) {
        print "\nClient $client_data->login($client_data->user_id): INITIAL OrderKey CAPTURED!!!\n";
    }
    
//    die("Test");
}

function retry_payment($order_key) {
// MUNDIPAGG
    $Payment = new dumbu\cls\Payment();
    $result = $Payment->check_payment($order_key);
    $now = DateTime::createFromFormat('U', time());
    if (is_object($result) && $result->isSuccess()) {
        $data = $result->getData();
        //var_dump($data);
        $SaleDataCollection = $data->SaleDataCollection[0];
        $RetrySaleData = NULL;
        // Get last client payment
        foreach ($SaleDataCollection->CreditCardTransactionDataCollection as $SaleData) {
            $SaleDataDate = new DateTime($SaleData->DueDate);
            if (($RetrySaleData == NULL || $SaleDataDate > new DateTime($RetrySaleData->DueDate)) && $SaleDataDate < $now) {
                $RetrySaleData = $SaleData;
            }
        }
    }

    if ($RetrySaleData && $RetrySaleData->CapturedAmountInCents == NULL) {
        //var_dump($RetrySaleData->TransactionKey);
        $result = $Payment->retry_payment_recurrency($order_key, $RetrySaleData->TransactionKey);
        if (is_object($result) && $result->isSuccess()) {
            $result = $result->getData();
            $RetriedSaleData = $result->CreditCardTransactionResultCollection[0];
            if ($RetriedSaleData->CapturedAmountInCents > 100) {
                return TRUE;
            }
        }
//        print "<pre>";
//        print json_encode($result, JSON_PRETTY_PRINT);
//        print "</pre>";
    }
    return FALSE;
}

function PaiedTrasRef($TransactionIdentifier, $SaleDataCollection) {
    foreach ($SaleDataCollection->CreditCardTransactionDataCollection as $SaleData) {
        if ($SaleData->TransactionIdentifier == $TransactionIdentifier && $SaleData->CapturedAmountInCents > 100) {
            return TRUE;
        }
    }
    return FALSE;
}

print '\n<br>JOB DONE!!!<br>\n';
echo date("Y-m-d h:i:sa");
