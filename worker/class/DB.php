<?php

namespace dumbu\cls {

    class DB {

        protected $host = 'localhost';
        protected $db = 'dumbudb';
        protected $db_followed = 'dumbudb_followed';
        //protected $port = '3128';
        protected $user = 'root';
        protected $pass = '';
        private $connection = NULL;
        private $fConnection = NULL;
        
        
        public function __construct($conf_file = "/../../../CONFIG.INI") {
            $this->connect($conf_file);
        }

        public function connect($conf_file = NULL) {
            if (!$this->connection) {
                // Connect to DB
                //echo dirname(__FILE__) . "/../../../CONFIG.INI";
                //$config = parse_ini_file(dirname(__FILE__) . "/../../../CONFIG.INI", true);

                $config = parse_ini_file(dirname(__FILE__) . $conf_file, true);

                $this->host = $config["database"]["host"];
                $this->db = $config["database"]["db"];
                //$this->port = $GLOBALS['sistem_config']->DB_PORT;
                $this->user = $config["database"]["user"];
                $this->pass = $config["database"]["pass"];
                $this->connection = mysqli_connect($this->host, $this->user, $this->pass, $this->db) or die("Cannot connect to database.");
            }
            if(!$this->fConnection)
            {
                $this->db_followed = $config["database"]["follow"];
                $this->fConnection = mysqli_connect($this->host, $this->user, $this->pass, $this->db_followed) or die("Cannot connect to database.");
            }
        }

        public function get_clients_by_status($user_status, $uid = 0) {
            try {
                $this->connect();
                $sql = ""
                        . "SELECT * FROM users "
                        . "     INNER JOIN clients ON clients.user_id = users.id "
                        . "     INNER JOIN plane ON plane.id = clients.plane_id "
                        . "WHERE users.status_id = $user_status AND user_id > $uid; ";

                $result = mysqli_query($this->connection, $sql);
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function get_clients_data() {
            try {
                $this->connect();
                $CLIENT = user_role::CLIENT;
                $ACTIVE = user_status::ACTIVE;
                $PENDING = user_status::PENDING;
                $VERIFY_ACCOUNT = user_status::VERIFY_ACCOUNT;
                $BLOCKED_BY_INSTA = user_status::BLOCKED_BY_INSTA;
                $BLOCKED_BY_TIME = user_status::BLOCKED_BY_TIME;                
                $BEGINNER = user_status::BEGINNER;
                //$UNFOLLOW = user_status::UNFOLLOW;
                $sql = ""
                        . "SELECT * FROM users "
                        . "     INNER JOIN clients ON clients.user_id = users.id "
                        . "     INNER JOIN plane ON plane.id = clients.plane_id "
                        . "WHERE users.role_id = $CLIENT "
                        . "     AND (clients.unfollow_total IS NULL OR clients.unfollow_total <> 1) "
                        . "     AND (users.status_id = $ACTIVE OR "
                        . "          users.status_id = $PENDING OR "
                        . "          users.status_id = $VERIFY_ACCOUNT OR "
                        . "          users.status_id = $BLOCKED_BY_INSTA OR "
                        . "          users.status_id = $BLOCKED_BY_TIME) "
                        . "ORDER BY users.id; ";
                $result = mysqli_query($this->connection, $sql);
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function get_biginner_data() {
            try {
                $this->connect();
                $BEGINNER = user_status::BEGINNER;
                //$UNFOLLOW = user_status::UNFOLLOW;
                $sql = ""
                        . "SELECT * FROM users "
                        . "     INNER JOIN clients ON clients.user_id = users.id "
                        . "     INNER JOIN plane ON plane.id = clients.plane_id "
                        . "WHERE users.role_id = $CLIENT "
                        . "     AND (clients.unfollow_total IS NULL OR clients.unfollow_total <> 1) "
                        . "     AND  users.status_id = $BEGINNER "
                        . "ORDER BY users.id; ";
                $result = mysqli_query($this->connection, $sql);
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function get_clients_data_for_report() {
            try {
                $this->connect();
                $CLIENT = user_role::CLIENT;
                $DELETED = user_status::DELETED;
                $BEGINNER = user_status::BEGINNER;
                $DONT_DISTURB = user_status::DONT_DISTURB;

                //$UNFOLLOW = user_status::UNFOLLOW;
                $sql = ""
                        . "SELECT users.id, users.login FROM users "
                        . "     INNER JOIN clients ON clients.user_id = users.id "
                        . "     INNER JOIN plane ON plane.id = clients.plane_id "
                        . "WHERE users.role_id = $CLIENT "
                        . "     AND (users.status_id NOT IN ($DELETED, $BEGINNER, $DONT_DISTURB)) "
                        . "ORDER BY users.id; ";
                $result = mysqli_query($this->connection, $sql);
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function get_unfollow_clients_data() {
            try {
                $this->connect();
                $CLIENT = user_role::CLIENT;
                $ACTIVE = user_status::ACTIVE;
                $PENDING = user_status::PENDING;
                //$UNFOLLOW = user_status::UNFOLLOW;
                $sql = ""
                        . "SELECT * FROM users "
                        . "     INNER JOIN clients ON clients.user_id = users.id "
                        . "     INNER JOIN plane ON plane.id = clients.plane_id "
                        . "WHERE users.role_id = $CLIENT "
                        . "     AND clients.unfollow_total = 1 "
                        . "     AND (users.status_id = $ACTIVE OR "
                        . "          users.status_id = $PENDING "
                        . "          );";
                $result = mysqli_query($this->connection, $sql);
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function get_client_data($client_id) {
            try {
                $this->connect();
                $result = mysqli_query($this->connection, ""
                        . "SELECT * FROM users "
                        . "     INNER JOIN clients ON clients.user_id = users.id "
                        . "     INNER JOIN plane ON plane.id = clients.plane_id "
                        . "WHERE users.id = $client_id; "
                );
                return $result ? $result->fetch_object() : NULL;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function get_client_login_data($client_id)
        {
            try {
                    $this->connect();
                    $result = mysqli_query($this->connection, ""
                            . "SELECT id, login, pass, insta_id FROM users "
                            . "     INNER JOIN clients ON clients.user_id = users.id "
                            . "WHERE users.id = $client_id; "
                    );
                    return $result ? $result->fetch_object() : NULL;
                } catch (\Exception $exc) {
                    echo $exc->getTraceAsString();
                }            
        }
        
        public function get_client_instaid_data($client_id)
        {
            try {
                    $this->connect();
                    $result = mysqli_query($this->connection, ""
                            . "SELECT insta_id FROM clients "
                            . "WHERE user_id = $client_id; "
                    );
                    return $result ? $result->fetch_object() : NULL;
                } catch (\Exception $exc) {
                    echo $exc->getTraceAsString();
                }            
        }

        public function get_client_data_bylogin($login) {
            try {
                $this->connect();
                $sql = ""
                . "SELECT * FROM users "
                . "     INNER JOIN clients ON clients.user_id = users.id "
                . "WHERE users.login LIKE '$login' "
                . "ORDER BY user_id DESC "
                . "LIMIT 1; ";
                $result = mysqli_query($this->connection, $sql);
                return $result ? $result->fetch_object() : NULL;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function set_client_status($client_id, $status_id) {
            try {
                $this->connect();
                $status_date = time();
                $sql = "UPDATE users "
                        . "SET "
                        . "      users.status_id   = $status_id, "
                        . "      users.status_date = '$status_date' "
                        . "WHERE users.id = $client_id; ";

                $result = mysqli_query($this->connection, $sql);
//                if ($result)
//                    print "<br>Update client_status! status_date: $status_date <br>";
//                else
//                    print "<br>NOT UPDATED client_status!!!<br> $sql <br>";
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function set_client_status_by_login($login, $status_id) {
            try {
                $this->connect();
                $status_date = time();
                $sql = "UPDATE users "
                        . "SET "
                        . "      users.status_id   = $status_id, "
                        . "      users.status_date = '$status_date' "
                        . "WHERE users.login = '$login' "
                        . "ORDER BY id DESC "
                        . "LIMIT 1; ";

                $result = mysqli_query($this->connection, $sql);
//                if ($result)
//                    print "<br>Update client_status! status_date: $status_date <br>";
//                else
//                    print "<br>NOT UPDATED client_status!!!<br> $sql <br>";
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        /**
         * 
         * @param type $client_id
         * @param type $profile_data Data from this client as profile
         * @return type
         */
        public function insert_client_daily_report($client_id, $profile_data) {
            try {
                $this->connect();
                $date = time();
                $sql = "INSERT INTO daily_report "
                        . "(client_id, followings, followers, date) "
                        . "VALUES "
                        . "($client_id, '$profile_data->following', '$profile_data->follower_count', '$date');";

                $result = mysqli_query($this->connection, $sql);
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }        
        
        
        public function save_curl($client_id, $curl, $robot_id=NULL)
        {
            $this->InsertEventToWashdog($client_id, "CURL_ERROR", 1, $robot_id, $curl);
        }

        public function set_client_cookies($client_id, $cookies = NULL) {
            try {
                $this->connect();
                $sql = "UPDATE clients "
                        . "SET ";
                    $sql .= $cookies ? " clients.cookies   = '$cookies' " : " clients.cookies   = NULL ";
                $sql .= "WHERE clients.user_id = '$client_id'; ";

                $result = mysqli_query($this->connection, $sql);
                //if ($result)
                   // print "<br>Update client_cookies! <br>";
                //else
                   // print "<br>NOT UPDATED client_cookies!!!<br> $sql <br>";
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function get_reference_profiles_data($client_id) {
            try {
                $this->connect();
                $result = mysqli_query($this->connection, ""
                        . "SELECT * FROM reference_profile "
                        . "WHERE "
                        . "  (reference_profile.client_id = $client_id) "
//                        . "  AND (reference_profile.deleted <> TRUE)"               
//                        . "  (reference_profile.client_id = $client_id) AND "
                );
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function get_client_id_from_reference_profile_id($ref_prof_id) {
            try {
                $this->connect();
                $query="SELECT client_id FROM dumbudb.reference_profile WHERE  id =".$ref_prof_id.";";
                $result = mysqli_query($this->connection, $query);
                $data = $result->fetch_object();
                if(isset($data->client_id))
                    return $data->client_id;
                else 
                    return 0;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function get_reference_profiles_follows($ref_prof_id) {
            try {
                $this->connect();
                $client_id = $_SESSION['id'];
                //$client_id = $this->get_client_id_from_reference_profile_id($ref_prof_id);
                //echo '<br>---->>>Perfil id = '.$ref_prof_id.' Client id = '.$client_id.'<br>';
                
                if($client_id!='0' && $client_id!=0 && $ref_prof_id){
                    $result = mysqli_query($this->fConnection, ""
                            . "SELECT COUNT(*) FROM `dumbudb.followed`.`$client_id` "
                            . "WHERE  reference_id = $ref_prof_id; "
                    );
                    $data = $result->fetch_row();
                    return $data[0];
                } else 
                    return 0;
                
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }


        public function get_follow_work() {
            //$Elapsed_time_limit = $GLOBALS['sistem_config']->MIN_NEXT_ATTEND_TIME;
            try {
                // Get daily work
                $sql = ""
                        . "SELECT *, "
                        . "   daily_work.cookies as cookies, "
                        . "   users.id as users_id, "
                        . "   clients.cookies as client_cookies, "
                        . "   reference_profile.insta_id as rp_insta_id, "
                        . "   reference_profile.type as rp_type, "
                        . "   reference_profile.id as rp_id "
                        . "FROM daily_work "
                        . "INNER JOIN reference_profile ON reference_profile.id = daily_work.reference_id "
                        . "INNER JOIN clients ON clients.user_id = reference_profile.client_id "
                        . "INNER JOIN users ON users.id = clients.user_id "
                        . "WHERE ((daily_work.to_follow  > 0) "
                        . "   OR  (daily_work.to_unfollow  > 0)) "
                        . "   AND (reference_profile.deleted <> TRUE || daily_work.to_unfollow  > 0) "
                        //. "WHERE (now - daily_work.last_access) >= $Elapsed_time_limit "
                        . "ORDER BY clients.last_access ASC, "
                        . "         daily_work.to_follow DESC "
                        . "LIMIT 1;";

                $result = mysqli_query($this->connection, $sql);
                $object = $result->fetch_object();

                // Update daily work time
                if ($object && (!isset($object->last_access) || intval($object->last_access) < time())) {
                    //$ref_prof_id = $object->rp_insta_id;
                    $time = time();
                    $sql2 = ""
                            . "UPDATE clients "
                            . "SET clients.last_access = '$time' "
                            . "WHERE clients.user_id = $object->users_id; ";
                    $result2 = mysqli_query($this->connection, $sql2);
                    if (!$result2) {
                        var_dump($sql2);
                    }
                }
                return $object;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function get_follow_work_by_id($reference_id) {
            //$Elapsed_time_limit = $GLOBALS['sistem_config']->MIN_NEXT_ATTEND_TIME;
            try {
                // Get daily work
                $sql = ""
                        . "SELECT *, "
                        . "   daily_work.cookies as cookies, "
                        . "   users.id as users_id, "
                        . "   clients.cookies as client_cookies, "
                        . "   reference_profile.insta_id as rp_insta_id, "
                        . "   reference_profile.type as rp_type, "
                        . "   reference_profile.id as rp_id "
                        . "FROM daily_work "
                        . "INNER JOIN reference_profile ON reference_profile.id = daily_work.reference_id "
                        . "INNER JOIN clients ON clients.user_id = reference_profile.client_id "
                        . "INNER JOIN users ON users.id = clients.user_id "
                        . "WHERE daily_work.reference_id = $reference_id "
                        . "LIMIT 1;";

                $result = mysqli_query($this->connection, $sql);
                $object = $result->fetch_object();

                // Update daily work time
                if ($object && (!isset($object->last_access) || intval($object->last_access) < time())) {
                    //$ref_prof_id = $object->rp_insta_id;
                    $time = time();
                    $sql2 = ""
                            . "UPDATE clients "
                            . "SET clients.last_access = '$time' "
                            . "WHERE clients.user_id = $object->users_id; ";
                    $result2 = mysqli_query($this->connection, $sql2);
                    if (!$result2) {
                        var_dump($sql2);
                    }
                }
                return $object;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function get_unfollow_work($client_id) {
            try {
                // Get profiles to unfollow today for this Client... 
                // (i.e the last followed)
                $Limit = $GLOBALS['sistem_config']->REQUESTS_AT_SAME_TIME;
                $Elapsed_time_limit = $GLOBALS['sistem_config']->UNFOLLOW_ELAPSED_TIME_LIMIT;
                $this->connect();
                $result = mysqli_query($this->fConnection, ""
                        . "SELECT * FROM `dumbudb.followed`.`$client_id` "
                        . "WHERE unfollowed = false "
                        . "     AND ((UNIX_TIMESTAMP(NOW()) - CAST(date AS INTEGER)) DIV 60 DIV 60) > $Elapsed_time_limit "
                        . "ORDER BY date ASC "
                        . "LIMIT $Limit;"
                );
                //print "\nClient: $client_id " . mysqli_num_rows($result) . "  ";
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        /**
         * True is it was followed by this client
         * @param type $client_id
         * @param type $followed_id
         * @return type
         */
        public function is_profile_followed($client_id, $followed_id) {
            try {
                $result = mysqli_query($this->connection, ""
                        . "SELECT * FROM followed "
                        . "WHERE followed.client_id   = $client_id "
                        . "  AND followed.followed_id = $followed_id; "
                );
                //print "\nClient: $followed_id " . mysqli_num_rows($result) . "  ";
                return mysqli_num_rows($result);
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        /**
         * True is it was followed by this client
         * @param type $client_id
         * @param type $followed_id
         * @return type
         */
        public function is_profile_followed_db2($client_id, $followed_id) {
            try {
                $result = mysqli_query($this->fConnection, ""
                        . "SELECT id FROM `dumbudb.followed`.`$client_id` "
                        . "WHERE `$client_id`.followed_id = $followed_id; "
                );
                //print "\nClient: $followed_id " . mysqli_num_rows($result) . "  ";
                return mysqli_num_rows($result);
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function save_unfollow_work($Followeds_to_unfollow) {
            try {
                foreach ($Followeds_to_unfollow as $unfollowed) {
                    if ($unfollowed->unfollowed) {
                        $this->connect();
                        $result = mysqli_query($this->connection, ""
                                . "UPDATE followed "
                                . "SET followed.unfollowed = TRUE "
                                . "WHERE followed.id = $unfollowed->id; "
                        );
                    }
                }

                // TODO: UNCOMMENT
//                $sql = ""
//                        . "DELETE FROM followed "
//                        . "WHERE id = $unfollowed->id; ";
//                $result = mysqli_query($this->connection, $sql);

                return TRUE;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function save_unfollow_work_db2($Followeds_to_unfollow, $client_id) {
            try {
                foreach ($Followeds_to_unfollow as $unfollowed) {
                    if ($unfollowed->unfollowed) {
                        $this->connect();
                        $result = mysqli_query($this->fConnection, ""
                                . "UPDATE `dumbudb.followed`.`$client_id` "
                                . "SET unfollowed = TRUE "
                                . "WHERE followed_id = $unfollowed->followed_id; "
                        );
                    }
                }

                // TODO: UNCOMMENT
//                $sql = ""
//                        . "DELETE FROM followed "
//                        . "WHERE id = $unfollowed->id; ";
//                $result = mysqli_query($this->connection, $sql);

                return TRUE;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function save_follow_work($Ref_profile_follows, $daily_work) {
            try {
                //daily work: reference_id 	to_follow 	last_access 	id 	insta_name 	insta_id 	client_id 	insta_follower_cursor 	user_id 	credit_card_number 	credit_card_status_id 	credit_card_cvc 	credit_card_name 	pay_day 	insta_id 	insta_followers_ini 	insta_following 	id 	name 	login 	pass 	email 	telf 	role_id 	status_id 	languaje 
                foreach ($Ref_profile_follows as $follow) {
                    $this->connect();
                    $time = time();
                    $requested = ($follow->requested_by_viewer == 'requested') ? 'TRUE' : 'FALSE';
                    /*$sql = ""
                            . "INSERT INTO followed "
                            . "(followed_id, client_id, reference_id, requested, date, unfollowed) "
                            . "VALUES "
                            . "($follow->id, $daily_work->client_id, $daily_work->reference_id, $requested, $time, FALSE);";*/

                    $sql2 = ""
                            . "INSERT INTO `dumbudb.followed`.`$daily_work->client_id`"
                            . "(followed_id, reference_id, date, unfollowed, followed_login) "
                            . "VALUES "
                            . "($follow->id, $daily_work->reference_id, $time, FALSE, '$follow->username');";
                    //$result = mysqli_query($this->connection, $sql);
                    $result2 =  mysqli_query($this->fConnection, $sql2);
                }

                $f_count = count($Ref_profile_follows);
                $sql = ""
                        . "UPDATE reference_profile "
                        . "	SET reference_profile.follows = reference_profile.follows + $f_count "
                        . "WHERE reference_profile.id = $daily_work->reference_id; ";
                $result = mysqli_query($this->connection, $sql);

                return TRUE;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function insert_daily_work($ref_prof_id, $to_follow, $to_unfollow, $login_data) {
            try {
                $sql = ""
                        . "INSERT INTO daily_work "
                        . "(reference_id, to_follow, to_unfollow, cookies) "
                        . "VALUES "
                        . "($ref_prof_id, $to_follow, $to_unfollow, '$login_data');";

                $result = mysqli_query($this->connection, $sql);

                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function delete_daily_work($ref_prof_id) {
            try {
                $sql = ""
                        . "DELETE FROM daily_work "
                        . "WHERE reference_id = $ref_prof_id; ";
                $result = mysqli_query($this->connection, $sql);

                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function delete_daily_work_client($client_id) {
            try {
                $sql = ""
                        . "DELETE FROM daily_work WHERE daily_work.reference_id IN "
                        . "(SELECT reference_profile.id "
                        . "FROM reference_profile "
                        . "INNER JOIN clients ON clients.user_id = reference_profile.client_id "
                        . "WHERE clients.user_id = $client_id); ";
                $result = mysqli_query($this->connection, $sql);

                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function update_daily_work($ref_prof_id, $follows, $unfollows, $faults = 0, $error = FALSE) {
            try {
//                if ($follows == 0)
//                    $follows = 1; // To priorize others RP in the next time... avoiding select this RP ever...
                $sql = ""
                        . "UPDATE daily_work "
                        . "SET daily_work.to_follow   = (daily_work.to_follow   - $follows), "
                        . "    daily_work.to_unfollow = (daily_work.to_unfollow - $unfollows) "
                        . "WHERE daily_work.reference_id = $ref_prof_id; ";

                $result = mysqli_query($this->connection, $sql);
                // Record Client last access and foults
                if(!$error)
                {
                    $time = time();                    
                }
                else
                {
                    $hours = $GLOBALS['sistem_config']->INCREASE_CLIENT_LAST_ACCESS;
                    $time = strtotime("+$hours hours", time());
                }
                $sql = ""
                        . "UPDATE clients "
                        . "INNER JOIN reference_profile ON clients.user_id = reference_profile.client_id "
                        . "SET clients.last_access = '$time', "
                        . "    clients.foults = clients.foults + $faults "
                        . "WHERE reference_profile.id = $ref_prof_id; ";
                $result = mysqli_query($this->connection, $sql);
                //$affected = mysqli_num_rows($result);
                if ($result)
                    print "<br>Update daily_work! follows: $follows | unfollows: $unfollows <br>";
                else
                    print "<br>NOT UPDATED daily_work!!!<br> $sql <br>";
                return TRUE;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function truncate_daily_work() {
            try {
                $sql = "TRUNCATE daily_work;";

                $result = mysqli_query($this->connection, $sql);

                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function reset_preference_profile_cursors() {
            try {
                $sql = ""
                        . "UPDATE reference_profile "
                        . "SET reference_profile.insta_follower_cursor = null;  ";
                $result = mysqli_query($this->connection, $sql);

                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function update_reference_cursor($reference_id, $end_cursor) {
            $date = ($end_cursor == '' || $end_cursor == NULL) ? time() : NULL;
            try {
                $sql = ""
                        . "UPDATE reference_profile "
                        . "SET "
                        . "     reference_profile.insta_follower_cursor = '$end_cursor', "
                        . "     reference_profile.end_date = '$date' "
                        . "WHERE reference_profile.id = $reference_id; ";

                $result = mysqli_query($this->connection, $sql);

//                if ($result)
//                    print "<br>Updated reference_cursor! reference_id: $reference_id <br>";
//                else
//                    print "<br>NOT UPDATED reference_cursor!!!<br> $sql <br>";

                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function get_system_config_vars() {
            try {
                $this->connect();
                $sql = "SELECT * FROM dumbu_system_config;";
                $result = mysqli_query($this->connection, $sql);
//                return $result ? $result->fetch_object() : NULL;
                return $result ? $result : NULL;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        /* get the white list for the user with id = $id_user as an array
         */

        public function get_white_list($id_user) {
            try {
                $sql = ""
                        . "SELECT insta_id "
                        . "FROM black_and_white_list "
                        . "WHERE black_and_white_list.client_id = $id_user AND black_and_white_list.black_or_white = 1 AND black_and_white_list.deleted = 0 "
                        . "ORDER BY black_and_white_list.insta_id;";
                $result = mysqli_query($this->connection, $sql);
                $new_array = NULL;
                while ($obj = $result->fetch_object()) {
                    $new_array[] = $obj->insta_id; // Inside while loop
                }
                return $new_array;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        /*get the white list for the user with id = $id_user as an array
         */
        public function  get_white_list_paged($id_user, $index)
        {
            try {
                $sql = ""
                        . "SELECT insta_id "
                        . "FROM black_and_white_list "
                        . "WHERE black_and_white_list.client_id = $id_user AND black_and_white_list.black_or_white = 1 AND black_and_white_list.deleted = 0 "
                        . "LIMIT $index, 10;";
                $result = mysqli_query($this->connection, $sql);
                $new_array = NULL;
                while( $obj= $result->fetch_object()){
                    $new_array[] = $obj->insta_id; // Inside while loop
                }
                return $new_array;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        /*get the black list for the user with id = $id_user as an array
         */
        public function get_black_list($id_user) {
            try {
                $sql = ""
                        . "SELECT insta_id "
                        . "FROM black_and_white_list "
                        . "WHERE black_and_white_list.client_id = $id_user AND black_and_white_list.black_or_white = 0 AND black_and_white_list.deleted = 0 "
                        . "ORDER BY black_and_white_list.insta_id;";
                $result = mysqli_query($this->connection, $sql);
                $new_array = NULL;
                while ($obj = $result->fetch_object()) {
                    $new_array[] = $obj->insta_id; // Inside while loop
                }
                return $new_array;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function get_client_with_white_list()
        {
            try {
                $sql = "SELECT DISTINCT client_id FROM dumbudb.black_and_white_list WHERE  black_or_white = 1;" ;
                $result = mysqli_query($this->connection, $sql);
                $new_array = NULL;
                while( $obj= $result->fetch_object()){
                    $new_array[] = $obj->client_id; // Inside while loop
                }
                return $new_array;
            }
            catch(Exception $exc)
            {
                echo $exc->getTraceAsString();
            }
        }
        
        public function InsertEventToWashdog($user_id, $action, $source = 0, $robot_id = NULL, $metadata = NULL)
        {
            try {
                //mysqli_real_escape_string($escapestr)
                $action = mysqli_real_escape_string($this->connection,$action);
                 $sql = "SELECT * FROM dumbudb.washdog_type WHERE action = '$action' AND source = '$source';";
                 $time = time();
                 $result = mysqli_query($this->connection, $sql);
                 if($result->num_rows == 0)
                 {
                     $sql = "INSERT INTO dumbudb.washdog_type (action, source) VALUE ('$action', '$source');";
                     $result =  mysqli_query($this->connection, $sql);
                     //var_dump($result);
                     $sql = "SELECT * FROM dumbudb.washdog_type WHERE action = '$action' AND source = '$source';";
                     $time = time();
                     $result = mysqli_query($this->connection, $sql);
                 }
                 
                  $obj = $result->fetch_object();
                  if(isset($robot_id) == true)
                  { $sql = "INSERT INTO dumbudb.washdog1 (user_id, type, date, robot, metadata) VALUE ('$user_id','$obj->id', '$time', $robot_id, '$metadata');";}
                  else {$sql = "INSERT INTO dumbudb.washdog1 (user_id, type, date, robot, metatdata) VALUE ('$user_id','$obj->id', '$time', NULL, '$metadata');"; }            
                  $result =  mysqli_query($this->connection, $sql);
                  return $result;
                 
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
              
        }
        
        public function get_client_with_orderkey($orderkey)
        {

            try {
                $sql = "SELECT * FROM  clients " 
                        ."WHERE  clients.order_key = '$orderkey';";
                $result =  mysqli_query($this->connection, $sql);
            return $result;     
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
       public function set_cookies_to_null($client_id)
       {
           try {
                $sql = "UPDATE dumbudb.clients SET cookies=NULL WHERE user_id=$client_id";
                $result =  mysqli_query($this->connection, $sql);
            return $result;     
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
           
       }
       
       public function Add_Observation($client_id, $observation)
       {
            try {
                $observation = mysqli_real_escape_string($this->connection,$observation);
                $sql = "UPDATE dumbudb.clients SET observation='$observation' WHERE user_id=$client_id";
                $result =  mysqli_query($this->connection, $sql);
            return $result;     
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }           
       }
       
       public function SetPasword($client_id, $password)
       {
            try {
                $sql = "UPDATE dumbudb.users SET pass='$password' WHERE id=$client_id";
                $result =  mysqli_query($this->connection, $sql);
            return $result;     
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }           
       }
       
       public function Create_Followed($client_id)
       {
          try {
                $sql = "CREATE TABLE IF NOT EXISTS `dumbudb.followed`.`$client_id` (
                                `id` INT NOT NULL AUTO_INCREMENT,
                                `followed_id` VARCHAR(20) NULL,
                                `reference_id` INT(1) NOT NULL,
                                `date` VARCHAR(20) NULL,
                                `unfollowed` TINYINT(1) NULL,
                                `followed_login` VARCHAR(100) NULL DEFAULT NULL,
                                PRIMARY KEY (`id`, `reference_ingd`),
                                INDEX `fk__1_idx` (`reference_id` ASC),
                                CONSTRAINT `fk__$client_id`
                                  FOREIGN KEY (`reference_id`)
                                  REFERENCES `dumbudb`.`reference_profile` (`id`)
                                  ON DELETE NO ACTION
                                  ON UPDATE NO ACTION);";
                $result =  mysqli_query($this->fConnection, $sql);
                return $result;     
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            } 
       }
       
       public function SaveHttpServerVars($client_id, $HTTP_SERVER_VARS)               
       {
           try {
                $sql = "UPDATE dumbudb.clients SET HTTP_SERVER_VARS='$HTTP_SERVER_VARS' WHERE user_id=$client_id";
                $result =  mysqli_query($this->connection, $sql);
            return $result;     
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }  
       }
       
       /**
        * Increase_Client_Last_Access
        * @param type $client_id
        * @param type $hours to add to client
        */
       public function Increase_Client_Last_Access($client_id, $hours = 2) {
            try {
                $timestamp = strtotime("+$hours hours", time());
                $sql = "UPDATE dumbudb.clients SET last_access='$timestamp' WHERE user_id=$client_id";
                $result =  mysqli_query($this->connection, $sql);
                return $result;     
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }           
        }
        
        public function get_number_followed_today($client_id) {
            try {
                $this->connect();

                if ($client_id != '0' && $client_id != 0) {
                    $limit = strtotime('today 02:00:00');
                    
                    if (time() > strtotime('today') && time() < strtotime('today 03:00:00'))
                        $limit = strtotime('yesterday 02:00:00');
                    
                    $result = mysqli_query($this->fConnection, ""
                            . "SELECT COUNT(*) FROM `dumbudb.followed`.`$client_id` "
                            . "WHERE unfollowed = 0 AND date > ".$limit.";"
                    );
                    
                    if ($result) {
                        $data = $result->fetch_row();
                        return $data[0];
                    } else {
                        return "???";
                    }
                } else 
                    return 0;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function get_reference_profiles_with_problem($client_id) {
            try {
                $this->connect();
                $result = mysqli_query($this->connection, ""
                        . "SELECT * FROM reference_profile "
                        . "WHERE "
                        . "  (reference_profile.client_id = $client_id) "
                        . "  AND (reference_profile.deleted <> TRUE)"               
                        . "  AND end_date IS NOT NULL AND end_date <> '';"
                );
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function reset_referecne_prof($reference_id) {
            try {
                $this->connect();
                $result = mysqli_query($this->connection, "UPDATE `dumbudb`.`reference_profile` "
                        . "SET `insta_follower_cursor`=NULL, `end_date`=NULL "
                        . "WHERE `id`=$referece_id;");                
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function SetClientOrderKey($client_id, $order_key, $pay_day)
        {
            try{
                $str = "UPDATE `dumbudb`.`clients` SET `pay_day`='$pay_day', `order_key`='$order_key' WHERE `user_id`=$client_id;";
                $result = mysqli_query($this->connection,$str);
                return $result;
            } catch (\Exception $exc) {
                echo $exc->getTraceAsString();
            }
            
        }
    }

}
