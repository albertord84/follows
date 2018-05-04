<?php

namespace dumbu\cls {
    include_once 'DB.php';

    class system_config {
//        CONST LANGUAGE = 'PT';
//        CONST DIALY_REQUESTS_BY_CLIENT = 480; // Change to 480 in production mode
//        CONST REQUESTS_AT_SAME_TIME = 10;     // Reference Profile Followers amoun by request. Change to 10  in production mode   
//        CONST DELAY_BETWEEN_REQUESTS = 0;
//        CONST INSTA_MAX_FOLLOWING = 7500;
//        CONST MIN_NEXT_ATTEND_TIME = 10; //1000 * 60; //5 * 1000 * 60; // 5 min
//        CONST REFERENCE_PROFILE_AMOUNT = 6; // By Client
//        CONST UNFOLLOW_ELAPSED_TIME_LIMIT = 48; // 48; // In hours
//        CONST MAX_GET_FOLLOWERS_REQUESTS = 7; // Max of get followers request to complete REQUESTS_AT_SAME_TIME for a client work
//        CONST MAX_CLIENT_FAUTL_TRIES = 1; // Quantity max of failures with this client
//        CONST MIN_MARGIN_TO_INIT = 1000;  //margen inicial requerido para trabajar con un cliente        
////         EMAIL gmail to login
//        CONST SYSTEM_EMAIL = 'dumbu.system@gmail.com';
//        CONST SYSTEM_USER_LOGIN = 'dumbu.system';
//        CONST SYSTEM_USER_PASS = 'sorvete69@';
////        EMAIL to contact client
//        CONST SYSTEM_EMAIL2 = 'atendimento@dumbu.pro';
//        CONST SYSTEM_USER_LOGIN2 = 'atendimento@dumbu.pro';
//        CONST SYSTEM_USER_PASS2 = 'Sorvete69@';
////        EMAIL to admin client
//        CONST SYSTEM_EMAIL3 = 'admin@dumbu.pro';
//        CONST SYSTEM_USER_LOGIN3 = 'admin@dumbu.pro';
//        CONST SYSTEM_USER_PASS3 = 'sorvete69@';
//        // New email 
////        CONST SYSTEM_EMAIL = 'atendimento@dumbu.pro';
////        CONST SYSTEM_USER_LOGIN = 'atendimento@dumbu.pro';
////        CONST SYSTEM_USER_PASS = 'Sorvete69@';
//
//        CONST PROMOTION_N_FREE_DAYS = 2;    // N days free promotion
//        CONST DAYS_TO_BLOCK_CLIENT = 4;    // Days to wait before block client
////        CONST PROMOTION_N_FREE_DAYS= 30;    // N days BLACK FRIDAY
//        CONST PAYMENT_VALUE = 9990; //quantity to payment in cents
//        CONST MUNDIPAGG_BASE_URL = 'https://transactionv2.mundipaggone.com';  // PRODUCTION
//        CONST SYSTEM_MERCHANT_KEY = 'BCB45AC4-7EDB-49DF-98D1-69FD37F4E1D6';   // DUMBU Producition

//        CONST MUNDIPAGG_BASE_URL = 'https://sandbox.mundipaggone.com';        // Sandbox
//        CONST SYSTEM_MERCHANT_KEY = 'b3ef5018-6653-4ce0-b515-51ac26ccdcb1';   // DUMBU sandbox
//        CONST SYSTEM_MERCHANT_KEY = 'bcb45ac4-7edb-49df-98d1-69fd37f4e1d6';  // API Example

        public function __construct() {
            $DB = new DB();
            $result = $DB->get_system_config_vars();
            if ($result) {
                while ($var_info = $result->fetch_array()) {
                    $this->{$var_info["name"]} = $var_info["value"];
                }
            } else {
                die("Can't load system config vars...!!");
            };
        }

        static public function Defines($const) {
            $cls = new ReflectionClass(__CLASS__);
            foreach ($cls->getConstants() as $key => $value) {
                if ($value == $const) {
                    return true;
                }
            }
            return false;
        }

    }

}
