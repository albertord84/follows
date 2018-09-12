<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace follows\cls{
    /**
     * Description of Tester
     *
     * @author jose
     */
    class Tester {

        public $test_user_id;

        public  function __construct($test_user_id = 1){
            $this->test_user_id = $test_user_id;
        }


        //put your code here
        public function Test_bot_login_withcookies()
        {}

        public function Test_bot_login_without()
        {}

        public  function Test_get_profile_followers()
        {
            $Robot = new \follows\cls\Robot(); 

            $Client = (new \follows\cls\Client())->get_client($this->test_user_id);
            $daily_work = new \stdClass();
            $daily_work->rp_type = 0;
            $daily_work->cookies = $Client->cookies; 
            $daily_work->to_follow = 5;
            $daily_work->insta_name = '';
            $daily_work->rp_type = 0;
            $daily_work->rp_insta_id = 2023444583;
            $daily_work->insta_follower_cursor = NULL;
            $Robot = new \follows\cls\Robot();
            $error = FALSE;
            $res = $Robot->get_profiles_to_follow($daily_work, $error, $page_info);
            $cnt = count($res);
            if($cnt < 5)
            {
                echo 'ERROR Testing get_profile_to_follow for RP type 0'; 
            }
            var_dump($res);

        }

        public function  Test_get_geo_followers()
        {

            $Robot = new \follows\cls\Robot(); 

            $Client = (new \follows\cls\Client())->get_client($this->test_user_id);
            $daily_work = new \stdClass();
            $daily_work->rp_type = 1;
            $daily_work->cookies = $Client->cookies; 
            $daily_work->to_follow = 5;
            $daily_work->insta_follower_cursor = NULL;
            $daily_work->insta_name = 'lovecats';
            $daily_work->rp_insta_id = 220021938;
            $Robot = new \follows\cls\Robot();
            $error = FALSE;
            $res = $Robot->get_profiles_to_follow($daily_work, $error, $page_info);
            $cnt = count($res);
            if($cnt < 5)
            {
                echo 'ERROR Testing get_profile_to_follow for RP type 1';
            }
            var_dump($res);
        }

        public function Test_get_hashtag_followers()
        {

            $Robot = new \follows\cls\Robot(); 

            $Client = (new \follows\cls\Client())->get_client($this->test_user_id);
            $daily_work = new \stdClass();
            $daily_work->rp_type = 2;
            $daily_work->cookies = $Client->cookies; 
            $daily_work->to_follow = 5;
            $daily_work->insta_follower_cursor = NULL;
            $daily_work->insta_name = 'lovecats';            
            $error = FALSE;
            $res = $Robot->get_profiles_to_follow($daily_work, $error, $page_info);
            $cnt = count($res);
            if($cnt < 5)
            {            
                echo 'ERROR Testing get_profile_to_follow for RP type 2'; 
            }
            var_dump($res);
        }


        public function Test_get_follows()
        {}

    }
}