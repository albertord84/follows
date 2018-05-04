<?php

namespace dumbu\cls {
    require_once 'DB.php';
    require_once 'Day_client_work.php';
    require_once 'Reference_profile.php';
    require_once 'Client.php';
    require_once 'Robot.php';
    require_once 'Gmail.php';    
    require_once 'washdog_type.php';

    
    class Worker {
        
        public $id;
        public $IP;
        public $robots;
        public $config;
        public $work_queue = array();
        public $dir;
        public $Robot;
        public $Gmail;

        public function __construct($DB = NULL, $id = -1) {
            $this->Robot = new Robot($DB);
            $this->Robot->config = $GLOBALS['sistem_config'];
            $this->Robot->id = $id;
            $this->id = $id;
            $this->Gmail = new Gmail();
            $this->DB = $DB? $DB : new \dumbu\cls\DB();
        }
        
        public function get_worker_config() {
            
        }

        function prepare_daily_work() {
            // Get Users Info
            $Clients = (new Client())->get_clients();
            //$DB = new DB();
            $Client = new Client();
            foreach ($Clients as $Client) { // for each CLient
                if (!$Client->cookies) {
                    // Log user with curl in istagram to get needed session data
                    $login_data = $Client->sign_in($Client);
                    if ($login_data !== NULL) {
                        $Client->cookies = json_encode($login_data);
                    }
                }
                if ($Client->cookies && !$Client->paused) {
                    //var_dump($Client->login);
                    $cookies = json_decode($Client->cookies);
                     if(isset($cookies->csrftoken) && $cookies->csrftoken !=  NULL && $cookies->csrftoken != "" &&
                        isset($cookies->ds_user_id) && $cookies->ds_user_id != NULL && $cookies->ds_user_id != "" &&
                        isset($cookies->sessionid) && $cookies->sessionid != NULL && $cookies->sessionid != "" &&
                        isset($cookies->mid) &&  $cookies->mid != NULL && $cookies->mid != "")
                    {
                        
                        //Jose R: si tiene los 4 parametros de las cookies, devemos intentar hacer una operacion (coger 10 seguidores de qq RP)
                        //para chekear que esas cookies estan correctas, si no, bloquear por ssenha errada  status_id=3
                         
                        $this->DB->Create_Followed($Client->id);
                        print("<br>\nAutenticated Client: $Client->login <br>\n<br>\n");
                        $Client->set_client_status($Client->id, user_status::ACTIVE);
                        // Distribute work between clients
                        $RPWC = $Client->rp_workable_count();
                        if(strtotime("today") - $Client->init_day < 40*24*60*60 )
                        {
                            $DIALY_REQUESTS_BY_CLIENT = 480;
                        }
                        else {
                             $DIALY_REQUESTS_BY_CLIENT = $Client->to_follow;
                        }
                        if ($RPWC > 0) {
                            $to_follow_unfollow = $DIALY_REQUESTS_BY_CLIENT / $RPWC;
                            //$to_follow_unfollow = $GLOBALS['sistem_config']->DIALY_REQUESTS_BY_CLIENT / $RPWC;
                            // If User status = UNFOLLOW he do 0 follows
                            $to_follow = $Client->status_id != user_status::DUMBU_UNFOLLOW ? $to_follow_unfollow : 0;
                            $to_unfollow = $to_follow_unfollow;
                            foreach ($Client->reference_profiles as $Ref_Prof) { // For each reference profile
                                //$Ref_prof_data = $this->Robot->get_insta_ref_prof_data($Ref_Prof->insta_name);
                                if (!$Ref_Prof->deleted && $Ref_Prof->end_date == NULL) {
                                    $valid_geo = ($Ref_Prof->type == 1 && ($Client->plane_id == 1 || $Client->plane_id > 3));
                                    if ($Ref_Prof->type == 0 || $valid_geo) {
                                        $this->DB->insert_daily_work($Ref_Prof->id, $to_follow, $to_unfollow, $Client->cookies);
                                    }
                                }
                            }
                        } else {
                            echo "Not reference profiles: $Client->login <br>\n<br>\n";
                            if (count($Client->reference_profiles)) { // To keep unfollow
                                $this->DB->insert_daily_work($Client->reference_profiles[0]->id, 0, $DIALY_REQUESTS_BY_CLIENT, $Client->cookies);
                            }
                            $this->Gmail->send_client_not_rps($Client->email, $Client->name, $Client->login, $Client->pass);
                        }
                    }
                    else if($Client->status_id === user_status::ACTIVE)
                    {
                        $this->DB->set_client_cookies($Client->id);
                        $this->DB->set_client_status($Client->id, user_status::VERIFY_ACCOUNT);                    
                        $this->DB->InsertEventToWashdog($Client->client_id, washdog_type::ROBOT_VERIFY_ACCOUNT, 1, 0, "Cookies incompletas when prepare_daily_work");
                                    
                    }
                } elseif(!$Client->paused){
                    // TODO: do something in Client autentication error
                    // Send email to client
                    $now = new \DateTime("now");
                    $status_date = new \DateTime();
                    $status_date->setTimestamp($Client->status_date ? $Client->status_date : 0);
                    $diff_info = $status_date->diff($now);
                    var_dump($diff_info->days);
                    //if ($diff_info->days <= 3) {
                        // TODO, UNCOMMENT
                        $this->Gmail->send_client_login_error($Client->email, $Client->name, $Client->login, $Client->pass);
                    //}Jose 
                }
                //die("Alberto");
            }
            //die("Loged all Clients");
            //
            //$this->DB->reset_preference_profile_cursors();
        }

        public function request_follow_unfollow_work() {
            
        }

        public function do_follow_unfollow_work($daily_work) {
            if ($daily_work) {
                //Get new follows
                $unfollow_work = NULL;
                $Followeds_to_unfollow = array();
                if ($daily_work->to_unfollow > 0) {
                    $unfollow_work = $this->DB->get_unfollow_work($daily_work->client_id);
 
                    while ($Followed = $unfollow_work->fetch_object()) {
                        $To_Unfollow = new \dumbu\cls\Followed();// Update Ref Prof Data
                        $To_Unfollow->id = $Followed->id;
                        $To_Unfollow->followed_id = $Followed->followed_id;
                        array_push($Followeds_to_unfollow, $To_Unfollow);
                    }
                }
                //Reuest for the black list in the data base
                $daily_work->black_list = $this->DB->get_black_list($daily_work->client_id);
                $errors = false;
                $Ref_profile_follows = $this->Robot->do_follow_unfollow_work($Followeds_to_unfollow, $daily_work, $errors);
                $this->save_follow_unfollow_work($Followeds_to_unfollow, $Ref_profile_follows, $daily_work);
                //Count unfollows
                $unfollows = 0;
                foreach ($Followeds_to_unfollow as $unfollowed) {
                    if ($unfollowed->unfollowed)
                    {    $unfollows++; }
                }
                // TODO: foults
                $this->DB->update_daily_work($daily_work->reference_id, count($Ref_profile_follows), $unfollows, 0, $errors);
                return TRUE;
            }
            return FALSE;
        }

        /*               
        public function get_candidate_to_follow($daily_work)
        {
            $robot = new Robot();            
            $black_list = $DB->get_black_list($daily_work->client_id); 
            $page_info = NULL;
            $error = FALSE;
            $profiles = $robot->get_profiles_to_follow($daily_work, $error, $page_info);
            //procurar os perfiles ue coinsiden para eliminarlos de profiles
        }
        */        
        
        public function get_candidate_to_unfollow($daily_work){
            
        }

        public function save_follow_unfollow_work($Followeds_to_unfollow, $Ref_profile_follows, $daily_work) {
            try {
                //$DB = new \dumbu\cls\DB();
                //$this->DB->save_unfollow_work($Followeds_to_unfollow);
                $this->DB->save_unfollow_work_db2($Followeds_to_unfollow, $daily_work->client_id);
                $this->DB->save_follow_work($Ref_profile_follows, $daily_work);
                return TRUE;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
                return FALSE;
            }
        }

        public function send_check_insta_user_work($Client) {
            
        }

        public function have_work() {
            //return count($this->work_queue);
        }

        function get_work() {
            //$DB = new \dumbu\cls\DB();
            $daily_work = $this->DB->get_follow_work();
            $daily_work->login_data = json_decode($daily_work->cookies);
            $Followeds_to_unfollow = array();
            if ($daily_work->to_unfollow > 0) {
                $unfollow_work = $this->DB->get_unfollow_work($daily_work->client_id);
                while ($Followed = $unfollow_work->fetch_object()) { //
                    $To_Unfollow = new \dumbu\cls\Followed();
                    // Update Ref Prof Data
                    $To_Unfollow->id = $Followed->id;
                    $To_Unfollow->followed_id = $Followed->followed_id;
                    array_push($Followeds_to_unfollow, $To_Unfollow);
                }
            }
            $daily_work->to_unfollow = $Followeds_to_unfollow;
            return $daily_work;
        }

        function get_work_by_id($reference_id) {
            //$DB = new \dumbu\cls\DB();
            $daily_work = $this->DB->get_follow_work_by_id($reference_id);
            $daily_work->login_data = json_decode($daily_work->cookies);
            $Followeds_to_unfollow = array();
            if ($daily_work->to_unfollow > 0) {
                $unfollow_work = $this->DB->get_unfollow_work($daily_work->client_id);
                while ($Followed = $unfollow_work->fetch_object()) { //
                    $To_Unfollow = new \dumbu\cls\Followed();
                    // Update Ref Prof Data
                    $To_Unfollow->id = $Followed->id;
                    $To_Unfollow->followed_id = $Followed->followed_id;
                    array_push($Followeds_to_unfollow, $To_Unfollow);
                }
            }
            $daily_work->to_unfollow = $Followeds_to_unfollow;
            return $daily_work;
        }
        
        public function do_work() {
            try {
                $has_work = TRUE;
                while ($has_work) {
                    //$DB = new \dumbu\cls\DB();
                    //daily work: cookies reference_id to_follow last_access id insta_name insta_id client_id 	insta_follower_cursor 	user_id 	credit_card_number 	credit_card_status_id 	credit_card_cvc 	credit_card_name 	pay_day 	insta_id 	insta_followers_ini 	insta_following id name	login pass email telf role_id status_id	languaje 
                    $daily_work = $this->DB->get_follow_work();
                    if ($daily_work) {                       
                        $daily_work->login_data = json_decode($daily_work->cookies);
                        if ($daily_work->login_data != NULL) {
                            //Calculate time to sleep    
                            //$last_access = DateTime::createFromFormat('U', $daily_work->last_access);
                            //$now = DateTime::createFromFormat('U', time());
                            //$diff_info = $last_access->diff($now);
                            //$elapsed_time = $diff_info->i; // In minutes
                            //$elapsed_time = (time() - intval($daily_work->last_access)) / 60.0 % 60.0; // minutes
                            $now = time();
                            $lst_acess = intval($daily_work->last_access);
                            $elapsed_time = $now - $lst_acess; // sec
                            if($now > $lst_acess)
                            {                                
                                if ($elapsed_time < $GLOBALS['sistem_config']->MIN_NEXT_ATTEND_TIME * 60) {
                                    $now = \DateTime::createFromFormat('U', time());
                                    $last_access = \DateTime::createFromFormat('U', $daily_work->last_access);
                                    print "<br>_________ELAPSED TIME ($elapsed_time): ";
                                    //print "<br>Last Access: " . $last_access->format('Y-m-d H:i:s') . "<br>";
                                    //print "\$last_access = " . $daily_work->last_access . "<br>";
                                    //print "\$elapsed_time = " . $elapsed_time . " min (" . intval(time() - intval($daily_work->last_access)) . " tics) <br>";
                                    //print "\$To_Wait = " . intval($GLOBALS['sistem_config']->MIN_NEXT_ATTEND_TIME * 60 - $elapsed_time) . " secs <br>";
                                    sleep($GLOBALS['sistem_config']->MIN_NEXT_ATTEND_TIME * 60 - $elapsed_time); // secounds
                                    //$now = \DateTime::createFromFormat('U', time());
                                    //print "_________ELAPSE TIME: " . $now->format('Y-m-d H:i:s') . "<br>";
                                }
                                $this->do_follow_unfollow_work($daily_work);
                            }
                            else{
                                sleep($lst_acess - $now);
                            }
                            //die("Test End!!");
                        } else {
                            print "<br> Login data NULL!!!!!!!!!!!! <br>";
                        }
                    } else {
                        $has_work = FALSE;
                    }
                    //die("Test Ended!");
                }
                echo "<br>\n<br>\nCongratulations!!! Job done...!<br>\n";
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        function insert_daily_work($Ref_Prof, $to_follow, $to_unfollow, $login_data) {
            //$DB = new \dumbu\cls\DB();
            $this->DB->insert_daily_work($Ref_Prof->id, $to_follow, $to_unfollow, json_encode($login_data));
        }

        function delete_daily_work($ref_prof_id) {
            //$DB = new \dumbu\cls\DB();
            $this->DB->truncate_daily_work($ref_prof_id);
        }

        function truncate_daily_work() {
            //$DB = new \dumbu\cls\DB();
            $this->DB->truncate_daily_work();
        }

    }

}