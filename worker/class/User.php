<?php

namespace dumbu\cls {
    require_once 'user_role.php';
    require_once 'user_status.php';

    /**
     * class User
     * 
     */
    class User{
        /** Aggregations: */
        /** Compositions: */
        /*         * * Attributes: ** */

        /**
         * Variable defined as setter and getter reference example,
         * study carefully:
         * If function with same variable name is defined, the magic getter 
         * and setter will called without (resp. with) the $value param, 
         * so it function can determine if should do a get or o set..
         * 
         * @access public
         */
        public $id;       
        public function id($value = NULL) {
            if (isset($value)) {
                $this->id = $value;
            }
            else {
                return $this->id;
            }
        }

        /**
         * 
         * @access public
         */
        public $name;

        /**
         * 
         * @access public
         */
        public $login;

        /**
         * 
         * @access public
         */
        public $pass;

        /**
         * 
         * @access public
         */
        public $email;

        /**
         * 
         * @access public
         */
        public $telf;

        /**
         * 
         * @access public
         */
        public $role_id;

        /**
         * 
         * @access public
         */
        public $status_id;

        /**
         * 
         * @access public
         */
        public $languaje;

        /**
         * 
         */
        function __construct() {
            //$this->load->model('User_model');
        }

        /**
         * 
         *
         * @return unsigned short
         * @access public
         */
        public function do_login($user_name,$user_pass) 
         { 
            echo $user_name;
         }

// end of member function do_login

        /**
         * 
         *
         * @return bool
         * @access public
         */
        public function update_user() {
            
        }

// end of member function update_user

        /**
         * 
         *
         * @param serial user_id 

         * @return User
         * @access public
         */
        public function load_user($user_id = 0) {
            
        }

// end of member function load_user

        /**
         * 
         *
         * @return bool
         * @access public
         */
        public function disable_account() {
            
        }

// end of member function disable_account
//        
//        function __set($name, $value) {
//            if (method_exists($this, $name)) {
//                $this->$name($value);
//            } else {
//                // Getter/Setter not defined so set as property of object
//                $this->$name = $value;
//            }
//        }
//
//        function __get($name) {
//            if (method_exists($this, $name)) {
//                return $this->$name();
//            } elseif (property_exists($this, $name)) {
//                // Getter/Setter not defined so return property if it exists
//                return $this->$name;
//            }
//            return null;
//        }

 // end of generic setter an getter definition
        
    }

    // end of User
}
?>
