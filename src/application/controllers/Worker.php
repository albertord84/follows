<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Worker extends CI_Controller {

    public function insert_external_work() {
        
    }

    public function do_work_by_reference_id() {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/follows/worker/class/system_config.php';
        $GLOBALS['sistem_config'] = new follows\cls\system_config();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/follows/worker/class/Worker.php';
        $Worker = new \follows\cls\Worker();
//        $daily_work = $Worker->get_work();
        $reference_id = $_GET['reference_id'];
        if ($reference_id) {
            $daily_work = $Worker->get_work_by_id($reference_id);
            $Worker->do_follow_unfollow_work($daily_work);
        }
        else {
            print "Missing Refence Id...!!!";
        }
//        var_dump($daily_work);
    }

}
