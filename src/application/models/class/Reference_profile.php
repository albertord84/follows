<?php

namespace dumbu\cls {
    require_once 'Profile.php';
    
    /**
     * class Reference_profile
     * 
     */
    class Reference_profile {
        /** Aggregations: */
        /** Compositions: */
        /*         * * Attributes: ** */

        /**
         * 
         * @access protected
         */
        protected $insta_follower_cursor;

        /**
         * 
         *
         * @return Reference_profile
         * @access public
         */
        public function update_reference_profile() {
            
        }

// end of member function update_reference_profile

        /**
         * 
         *
         * @return bool
         * @access public
         */
        public function remove_reference_profile() {
            
        }

// end of member function remove_reference_profile

        /**
         * 
         *
         * @return Reference_profile
         * @access public
         */
        public function add_reference_profile() {
            
        }

// end of member function add_reference_profile
        
        function __set($name, $value) {
            if (method_exists($this, $name)) {
                $this->$name($value);
            } else {
                // Getter/Setter not defined so set as property of object
                $this->$name = $value;
            }
        }

        function __get($name) {
            if (method_exists($this, $name)) {
                return $this->$name();
            } elseif (property_exists($this, $name)) {
                // Getter/Setter not defined so return property if it exists
                return $this->$name;
            }
            return null;
        }

 // end of generic setter an getter definition
        
    }

    // end of Reference_profile
}

?>
