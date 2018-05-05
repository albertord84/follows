<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class External_services{
    
    
    function __construct(){
      
    }
   
    function bot_login($client_login, $client_pass,$force_login){ 
        $database_config = parse_ini_file(dirname(__FILE__) . "/../../../../CONFIG.INI", true);
        $url = $database_config['server']['worker_server_name'];
        
        $ch = curl_init("http://'$url'/follows/worker/class/Robot/bot_login_prev");

        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_exec($ch);
        curl_close($ch);
        
        return 123;
    }
}

?> 