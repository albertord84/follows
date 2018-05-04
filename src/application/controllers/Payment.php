<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function mundi_notif_post() {
        // Write the contents back to the file
        $path = __dir__ . '/../../logs/';
        $file = $path . "mundi_notif_post-" . date("d-m-Y") . ".log";
        //$result = file_put_contents($file, "Albert Test... I trust God!\n", FILE_APPEND);
        $post = file_get_contents('php://input');
        $result = file_put_contents($file, serialize($post) . "\n\n", FILE_APPEND);
//        $result = file_put_contents($file, serialize($_POST['OrderStatus']), FILE_APPEND);
        if ($result === FALSE) {
            var_dump($file);
        }
        //var_dump($file);
        print 'OK';
    }
    
    public function mundi_notif_post_boleto() {
        // Write the contents back to the file
        $path = __dir__ . '/../../logs/';
        $file = $path . "mundi_notif_post-" . date("d-m-Y") . ".log";
        //$result = file_put_contents($file, "Albert Test... I trust God!\n", FILE_APPEND);
        $post = file_get_contents('php://input');
        $result = file_put_contents($file, serialize($post) . "\n\n", FILE_APPEND);
//        $result = file_put_contents($file, serialize($_POST['OrderStatus']), FILE_APPEND);
        if ($result === FALSE) {
            var_dump($file);
        }
        //var_dump($file);
        print 'OK';
    }
    
    public function do_payment($payment_data) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/Payment.php';
        // Check client payment in mundipagg
        $Payment = new \dumbu\cls\Payment();
        $response = $Payment->create_recurrency_payment($payment_data);
        // Save Order Key
        var_dump($response->Data->OrderResult->OrderKey);
    }
    
    public function do_bilhete_payment($payment_data) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/Payment.php';
        // Check client payment in mundipagg
        //$Payment = new \dumbu\cls\Payment();
        $response = $Payment->create_boleto_payment($payment_data);
        // Save Order Key
        var_dump($response->Data->OrderResult->OrderKey);
    }
    
    
    
    public function do_daily_payment() {
//        require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/system_config.php';
//        $GLOBALS['sistem_config'] = new dumbu\cls\system_config();
//        echo "Check Payment Inited...!<br>\n";
//        echo date("Y-m-d h:i:sa");
//        $this->load->model('class/user_model');
//        $this->load->model('class/client_model');
//        $this->load->model('class/user_role');
//        $this->load->model('class/user_status');
//        
//        $now = time();
//        $d_today = date("j", $now);
//        $m_today = date("n", $now);
//        $y_today = date("Y", $now);
//        $limit_inf = strtotime($m_today.'/'.$d_today.'/'.$y_today.' 00:00:01');
//        $limit_sup = strtotime($m_today.'/'.$d_today.'/'.$y_today.' 23:59:59');
//        
//        // Get all users
//        $this->db->select('*');
//        $this->db->from('clients');
//        $this->db->join('users', 'clients.user_id = users.id');
//        $this->db->where('role_id', user_role::CLIENT);
//        $this->db->where('status_id <>', user_status::DELETED);
//        $this->db->where('status_id <>', user_status::BEGINNER);
//        $this->db->where('status_id <>', user_status::DONT_DISTURB);
//        $this->db->where('pay_day >', $limit_inf);
//        $this->db->where('pay_day <', $limit_sup);
//        $clients = $this->db->get()->result_array();
//        
//        // Check payment for each user
//        foreach ($clients as $client) {
//            
//            if($client['credit_card_number'] != NULL) {
//                print "\n<br>Client in day: $clientname (id: $clientid)<br>\n";
//                
//                if($client['credit_card_number'] == 'PAYMENT_BY_TICKET_BANK'){
//                    
//                } else{
//                    
//                }
//            } else if ($now > $payday && $client['status_id'] != user_status::BLOCKED_BY_PAYMENT) { // wheter not have order key
//                print "\n<br>Client without ORDER KEY and pay data data expired!!!: $clientname (id: $clientid)<br>\n";
//                $this->send_payment_email($client, $GLOBALS['sistem_config']->DAYS_TO_BLOCK_CLIENT - $diff_days);
//                $this->load->model('class/user_status');
//                $this->user_model->update_user($client['user_id'], array('status_id' => user_status::BLOCKED_BY_PAYMENT, 'status_date' => time()));
//            } else {
//                print "\n<br>Client without ORDER KEY!!!: $clientname (id: $clientid)<br>\n";
//            }            
//        }
//        try{
//            $Gmail = new dumbu\cls\Gmail();
//            $Gmail->send_mail("josergm86@gmail.com", "Jose Ramon ",'DUMBU payment checked!!! ','DUMBU payment checked!!! ');
//            $Gmail->send_mail("jangel.riveaux@gmail.com", "Jose Angel Riveaux ",'DUMBU payment checked!!! ','DUMBU payment checked!!! ');
//        } catch (Exception $ex){ 
//            echo 'Emails was not send';    
//        }
//        echo "\n\n<br>Job Done!" . date("Y-m-d h:i:sa") . "\n\n";
    }
    
    

    public function check_payment() {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/system_config.php';
        $GLOBALS['sistem_config'] = new dumbu\cls\system_config();
        echo "Check Payment Inited...!<br>\n";
        echo date("Y-m-d h:i:sa");

        $this->load->model('class/user_model');
        $this->load->model('class/client_model');
        $this->load->model('class/user_role');
        $this->load->model('class/user_status');
        // Get all users
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('users', 'clients.user_id = users.id');
        // TODO: COMENT
//        $this->db->where('id', "1");
        $this->db->where('role_id', user_role::CLIENT);
        $this->db->where('status_id <>', user_status::DELETED);
        $this->db->where('status_id <>', user_status::BEGINNER);
        $this->db->where('status_id <>', user_status::DONT_DISTURB);
//        $this->db->where('status_id <>', user_status::BLOCKED_BY_PAYMENT);
        // TODO: COMMENT MAYBE
//        $this->db->or_where('status_id', user_status::BLOCKED_BY_PAYMENT);  // This status change when the client update his pay data
//        $this->db->or_where('status_id', user_status::ACTIVE);
//        $this->db->or_where('status_id', user_status::BLOCKED_BY_INSTA);
//        $this->db->or_where('status_id', user_status::VERIFY_ACCOUNT);
//        $this->db->or_where('status_id', user_status::UNFOLLOW);
//        $this->db->or_where('status_id', user_status::BLOCKED_BY_TIME);
//        $this->db->or_where('status_id', user_status::INACTIVE);
//        $this->db->or_where('status_id', user_status::PENDING);
        $clients = $this->db->get()->result_array();
        // Check payment for each user
        foreach ($clients as $client) {
            $clientname = $client['name'];
            $clientid = $client['user_id'];
            $now = new DateTime("now");
            $payday = strtotime($client['pay_day']);
            $payday = new DateTime();
            $payday->setTimestamp($client['pay_day']);
            $today = strtotime("today");
//            var_dump($payday);
            if(new DateTime("now") > $payday)
            {
                $promotional_days = $GLOBALS['sistem_config']->PROMOTION_N_FREE_DAYS;
                $init_date_2d = new DateTime();
                $init_date_2d = $init_date_2d->setTimestamp(strtotime("+$promotional_days days", $client['init_date']));
                $testing = new DateTime("now") < $init_date_2d;
                if ($client['order_key'] != NULL) { // wheter have oreder key
                    if (!$testing) { // Not in promotial days
                        try {
    //                        var_dump($client);
                            $checked = $this->check_client_payment($client);
                        } catch (Exception $ex) {
                            $checked = FALSE;
    //                        var_dump($ex);
                        }
                        if ($checked) {
                            //var_dump($client);
                            print "\n<br>Client in day: $clientname (id: $clientid)<br>\n";
                        } else {
                            print "\n<br>----Client with payment issue: $clientname (id: $clientid)<br>\n<br>\n<br>\n";
                        }
                    }
                } else if($today <= $payday && $payday <= strtotime("+1 day", $today)){
                    try{
                        $checked = $this->check_initial_payment($client);
                    } catch (Exception $ex)
                    {
                        $checked = FALSE;
                    }
                    if ($checked) {
                            //var_dump($client);
                        print "\n<br>Client in day: $clientname (id: $clientid)<br>\n";
                    } else {
                        print "\n<br>----Client with payment issue: $clientname (id: $clientid)<br>\n<br>\n<br>\n";
                    }
                }
                else if ($now > $payday && $client['status_id'] != user_status::BLOCKED_BY_PAYMENT) { // wheter not have order key
                    print "\n<br>Client without ORDER KEY and pay data data expired!!!: $clientname (id: $clientid)<br>\n";
                    $this->send_payment_email($client, $GLOBALS['sistem_config']->DAYS_TO_BLOCK_CLIENT - $diff_days);
                    $this->load->model('class/user_status');
                    $this->user_model->update_user($client['user_id'], array('status_id' => user_status::BLOCKED_BY_PAYMENT, 'status_date' => time()));
                } else {
                    print "\n<br>Client without ORDER KEY!!!: $clientname (id: $clientid)<br>\n";
                }
            }
        }
    try{
        $Gmail = new dumbu\cls\Gmail();
        $Gmail->send_mail("josergm86@gmail.com", "Jose Ramon ",'DUMBU payment checked!!! ','DUMBU payment checked!!! ');
        $Gmail->send_mail("jangel.riveaux@gmail.com", "Jose Angel Riveaux ",'DUMBU payment checked!!! ','DUMBU payment checked!!! ');
    } catch (Exception $ex){  echo 'Emails was not send';}
        echo "\n\n<br>Job Done!" . date("Y-m-d h:i:sa") . "\n\n";
    }
    
    public function test_check_payment() {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/system_config.php';
        $GLOBALS['sistem_config'] = new dumbu\cls\system_config();
        echo "Check Payment Inited...!<br>\n";
        echo date("Y-m-d h:i:sa");

        $this->load->model('class/user_model');
        $this->load->model('class/client_model');
        $this->load->model('class/user_role');
        $this->load->model('class/user_status');
        // Get all users
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('users', 'clients.user_id = users.id');
        // TODO: COMENT
//        $this->db->where('id', "1");
        $this->db->where('clients.user_id =','19546');
//        $this->db->where('status_id <>', user_status::BLOCKED_BY_PAYMENT);
        // TODO: COMMENT MAYBE
//        $this->db->or_where('status_id', user_status::BLOCKED_BY_PAYMENT);  // This status change when the client update his pay data
//        $this->db->or_where('status_id', user_status::ACTIVE);
//        $this->db->or_where('status_id', user_status::BLOCKED_BY_INSTA);
//        $this->db->or_where('status_id', user_status::VERIFY_ACCOUNT);
//        $this->db->or_where('status_id', user_status::UNFOLLOW);
//        $this->db->or_where('status_id', user_status::BLOCKED_BY_TIME);
//        $this->db->or_where('status_id', user_status::INACTIVE);
//        $this->db->or_where('status_id', user_status::PENDING);
        $clients = $this->db->get()->result_array();
        // Check payment for each user
        foreach ($clients as $client) {
            $clientname = $client['name'];
            $clientid = $client['user_id'];
            $now = new DateTime("now");
            $payday = strtotime($client['pay_day']);
            $payday = new DateTime();
            $payday->setTimestamp($client['pay_day']);
            $today = strtotime("today");
//            var_dump($payday);
            if(new DateTime("now") > $payday)
            {
                $promotional_days = $GLOBALS['sistem_config']->PROMOTION_N_FREE_DAYS;
                $init_date_2d = new DateTime();
                $init_date_2d = $init_date_2d->setTimestamp(strtotime("+$promotional_days days", $client['init_date']));
                $testing = new DateTime("now") < $init_date_2d;
                if ($client['order_key'] != NULL) { // wheter have oreder key
                    if (!$testing) { // Not in promotial days
                        try {
    //                        var_dump($client);
                            $checked = $this->check_client_payment($client);
                        } catch (Exception $ex) {
                            $checked = FALSE;
    //                        var_dump($ex);
                        }
                        if ($checked) {
                            //var_dump($client);
                            print "\n<br>Client in day: $clientname (id: $clientid)<br>\n";
                        } else {
                            print "\n<br>----Client with payment issue: $clientname (id: $clientid)<br>\n<br>\n<br>\n";
                        }
                    }
                } else if($today <= $client['pay_day'] && $client['pay_day'] < strtotime("+1 day", $today) /*&& $client['init_day'] */){
                    try{
                        $checked = $this->check_initial_payment($client);
                    } catch (Exception $ex)
                    {
                        $checked = FALSE;
                    }
                    if ($checked) {
                            //var_dump($client);
                        print "\n<br>Client in day: $clientname (id: $clientid)<br>\n";
                    } else {
                        print "\n<br>----Client with payment issue: $clientname (id: $clientid)<br>\n<br>\n<br>\n";
                    }
                }
                else if ($now > $payday && $client['status_id'] != user_status::BLOCKED_BY_PAYMENT) { // wheter not have order key
                    print "\n<br>Client without ORDER KEY and pay data data expired!!!: $clientname (id: $clientid)<br>\n";
                    $this->send_payment_email($client, $GLOBALS['sistem_config']->DAYS_TO_BLOCK_CLIENT - $diff_days);
                    $this->load->model('class/user_status');
                    $this->user_model->update_user($client['user_id'], array('status_id' => user_status::BLOCKED_BY_PAYMENT, 'status_date' => time()));
                } else {
                    print "\n<br>Client without ORDER KEY!!!: $clientname (id: $clientid)<br>\n";
                }
            }
        }
         try{
            $Gmail = new dumbu\cls\Gmail();
            $Gmail->send_mail("josergm86@gmail.com", "Jose Ramon ",'DUMBU payment checked!!! ','DUMBU payment checked!!! ');
            $Gmail->send_mail("jangel.riveaux@gmail.com", "Jose Angel Riveaux ",'DUMBU payment checked!!! ','DUMBU payment checked!!! ');
        } catch (Exception $ex){  echo 'Emails was not send';}
        echo "\n\n<br>Job Done!" . date("Y-m-d h:i:sa") . "\n\n";
    }

    public function check_client_payment($client) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/Payment.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/system_config.php';
        
        $this->load->model('class/dumbu_system_config');
        $GLOBALS['sistem_config'] = new dumbu\cls\system_config();
        // Check client payment in mundipagg
        $Payment = new \dumbu\cls\Payment();
        $DB = new \dumbu\cls\DB();
        // Check outhers payments
        $IOK_ok = $client['initial_order_key'] ? $Payment->check_client_order_paied($client['initial_order_key']) : TRUE; // Deixar para um mes de graça
        $POK_ok = $client['pending_order_key'] ? $Payment->check_client_order_paied($client['pending_order_key']) : FALSE;
        $IOK_ok = $IOK_ok || $POK_ok; // Whichever is paid
        // Check normal recurrency payment
        $result = $Payment->check_payment($client['order_key']);
        if (isset($result) && is_object($result) && $result->isSuccess()) {
            $data = $result->getData();
            //var_dump($data);
            $SaleDataCollection = $data->SaleDataCollection[0];
            $LastSaledData = NULL;
            // Get last client payment
            foreach ($SaleDataCollection->CreditCardTransactionDataCollection as $SaleData) {
                $SaleDataDate = new DateTime($SaleData->DueDate);
//                $LastSaleDataDate = new DateTime($LastSaledData->DueDate);
                //$last_payed_date = DateTime($LastSaledData->DueDate);
                if ($SaleData->CapturedAmountInCents != NULL && ($LastSaledData == NULL || $SaleDataDate > new DateTime($LastSaledData->DueDate))) {
                    $LastSaledData = $SaleData;
                }
                //var_dump($SaleData);
            }
            $now = DateTime::createFromFormat('U', time());
            $this->load->model('class/user_status');
            $this->load->model('class/user_model');
            if ($LastSaledData != NULL) { // if have payment
                // Check difference between last payment and now
                $last_saled_date = new DateTime($LastSaledData->DueDate);
                $diff_info = $last_saled_date->diff($now);
                //var_dump($diff_info);
                // Diff in days
                $diff_days = $diff_info->days;
//                $diff_days = ($diff_info->m * 30) + $diff_info->days;
                print "\n<br> Diff days: $diff_days";
                // TODO: Put 34 in system_config
//                $diff_days = 35;
//                $client['email'] = 'albertord84@gmail.com';
                if ($diff_days > 34) { // Limit to bolck
                    //Block client by paiment
                    if ($client['status_id'] != user_status::BLOCKED_BY_PAYMENT) {
                        $this->user_model->update_user($client['user_id'], array('status_id' => user_status::BLOCKED_BY_PAYMENT, 'status_date' => time()));
                        $this->send_payment_email($client, 0);
                        print "This client was blocked by payment just now: " . $client['user_id'];
                        // TODO: Put 31 in system_config    
                    }
                } elseif ($diff_days > 31) { // Limit to advice
                    // Send email to Client
                    // TODO: Think about send email
                    print "Diff in days bigger tham 31 days: $diff_days ";
                    $this->load->model('class/dumbu_system_config');
                    $this->send_payment_email($client, 34 - $diff_days + 1);
                    $this->user_model->update_user($client['user_id'], array('status_id' => user_status::PENDING, 'status_date' => time()));
                } else {
//                    print_r($client);
                    if ($client['status_id'] == user_status::PENDING || $client['status_id'] == user_status::BLOCKED_BY_PAYMENT) {
                        $this->user_model->update_user($client['user_id'], array('status_id' => user_status::ACTIVE, 'status_date' => time()));
                        $DB->InsertEventToWashdog($client['user_id'], 'SET TO ATIVE', 0);
               
                    }
                    return TRUE;
                }
            } else if ($client['status_id'] != user_status::BLOCKED_BY_PAYMENT) { // if have not payment jet
                print "\n<br> LastSaledData = NULL";
                $pay_day = new DateTime();
                $pay_day->setTimestamp($client['pay_day']);
                $diff_info = $pay_day->diff($now);
                $diff_days = $diff_info->days;
//                $diff_days = ($diff_info->m * 30) + $diff_info->days;
                // TODO: check whend not pay and block user
                if ($now > $pay_day) {
                    print "\n<br>This client has not payment since '$diff_days' days (PROMOTIONAL?): " . $client['name'] . "<br>\n";
                    print "\n<br>Set to PENDING<br>\n";
                    $this->user_model->update_user($client['user_id'], array('status_id' => user_status::PENDING, 'status_date' => time()));
                   $DB->InsertEventToWashdog($client['user_id'], 'SET TO PENDING',0);
               
                    // TODO: limit email by days diff
                    //$diff_days = 6;
                    if ($diff_days >= 0) {
//                        print "\n<br>Email sent to " . $client['email'] . "<br>\n";
                        $this->send_payment_email($client, dumbu_system_config::DAYS_TO_BLOCK_CLIENT - $diff_days);
                        // TODO: limit email by days diff
                        if ($diff_days >= dumbu_system_config::DAYS_TO_BLOCK_CLIENT) {
                            //Block client by paiment
                            $this->user_model->update_user($client['user_id'], array('status_id' => user_status::BLOCKED_BY_PAYMENT, 'status_date' => time()));
                            $DB->InsertEventToWashdog($client['user_id'], 'BLOQUED BY PAYMENT', 0);
 
                            ///////////////////////////////////////$this->send_payment_email($client);
                            print "This client was blocked by payment just now: " . $client['user_id'];
                            // TODO: Put 31 in system_config    
                        }
                    }
                } else if ($IOK_ok === FALSE && $diff_days >= dumbu_system_config::PROMOTION_N_FREE_DAYS) { // Si está en fecha de promocion del mes pero no pagó initial order key
                    //Block client by paiment
                    $this->user_model->update_user($client['user_id'], array('status_id' => user_status::BLOCKED_BY_PAYMENT, 'status_date' => time()));
                    $this->send_payment_email($client, 0);
                    $DB->InsertEventToWashdog($client['user_id'], 'BLOQUED BY PAYMENT', 0);
               
                    ///////////////////////////////////////$this->send_payment_email($client);
                    print "This client was blocked by payment just now: " . $client['user_id'];
                }
            }
            // Caso especial para activar bloqueados injustamente
            $pay_day = new DateTime();
            $pay_day->setTimestamp($client['init_date']);
            $diff_info = $pay_day->diff($now);
            $diff_days = $diff_info->days;
            if ($client['status_id'] == user_status::BLOCKED_BY_PAYMENT && ($IOK_ok === TRUE && $client['initial_order_key']) && $diff_days < 33) { // Si está en fecha de promocion del mes y initial order key
                print "\n<br> LastSaledData = NULL";
                $this->user_model->update_user($client['user_id'], array('status_id' => user_status::ACTIVE, 'status_date' => time()));
                $DB->InsertEventToWashdog($client['user_id'], 'UNBLOQUED BY PAYMENT', 0);
               
                print "\n<br>This client UNBLOQUED by payment just now: " . $client['user_id'];
            }
        } else {
            $bool = is_object($result);
            $str = isset($result) && is_object($result) && is_callable($result->getData()) ? json_encode($result->getData()) : "NULL";
//            throw new Exception("Payment error: " . $str);
            print ("\n<br>Payment error: " . $str . " \nClient name: " . $client['name'] . "<br>\n");
        }
        return FALSE;
//        print "<pre>";
//        print json_encode($result->getData(), JSON_PRETTY_PRINT);
//        print "</pre>";
    }

    public function send_payment_email($client, $diff_days = 0) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/Gmail.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/system_config.php';
        $GLOBALS['sistem_config'] = new \dumbu\cls\system_config();
        $this->Gmail = new \dumbu\cls\Gmail();
        //$datas = $this->input->post();
        $result = $this->Gmail->send_client_payment_error($client['email'], $client['name'], $client['login'], $client['pass'], $diff_days);
        if ($result['success']) {
            $clientname = $client['name'];
            print "<br>Email send to client: $clientname<br>";
        } else {
            print "<br>Email NOT sent to: " . json_encode($client, JSON_PRETTY_PRINT);
//            throw new Exception("Email not sent to: " . json_encode($client));
        }
    }

    function retry_payment($order_key) {
        $result = $this->check_payment($order_key);
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
            $result = $this->retry_payment_recurrency($order_key, $RetrySaleData->TransactionKey);
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

    //JOSE RAMON developing
    public function process_notification($notification) {
        //$notification
        $this->load->model('class/user_model');
        $this->load->model('class/client_model');
    }
    
    public function check_initial_payment($client)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/DB.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/dumbu/worker/class/Payment.php';
        
        $today = strtotime("today");
        $payment_data['credit_card_number'] = $client['credit_card_number'];
        $payment_data['credit_card_name'] = $client['credit_card_name'];
        $payment_data['credit_card_exp_month'] = $client['credit_card_exp_month'];
        $payment_data['credit_card_exp_year'] = $client['credit_card_exp_year'];
        $payment_data['credit_card_cvc'] = $client['credit_card_cvc'];
        $payment_data['amount_in_cents'] = $client['actual_payment_value'];
        $payment_data['pay_day'] = $client['pay_day'];
        
        //Verificar que tenha asignado 24 horas antes
        $payment = new \dumbu\cls\Payment();
        $res_pay_now = $payment->create_payment($payment_data); 
        
        if (is_object($resp_pay_now) && $resp_pay_now->isSuccess() && $resp_pay_now->getData()->CreditCardTransactionResultCollection[0]->CapturedAmountInCents>0) {                             
            //Tentar crear a recurrencia
            $payment_data['pay_day'] = strtotime("+1 month", $client->pay_day);
            $response = $payment->check_recurrency_mundipagg_credit_card($payment_data,0);
            $order_key = $resp->getData()->OrderResult->OrderKey;
            $DB->SetClientOrderKey($client['user_id'],$order_key, $payment_data['pay_day']);
        }     
        //Fallo en crear a arecurrencia -> notificar ao cliente e bloquear por pagamento
        else
        {
            $this->user_model->update_user($client['user_id'], array('status_id' => user_status::BLOCKED_BY_PAYMENT, 'status_date' => time()));
            $this->send_payment_email($client, 0);
            $DB->InsertEventToWashdog($client['user_id'], 'BLOQUED BY PAYMENT', 0);
               
        }
       //Creo a recurren ia -> continua ativo
        //if(!isset($client->))
        
    }

    
}
