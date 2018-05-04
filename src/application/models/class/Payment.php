<?php

namespace dumbu\cls {
    
    /**
     * class Payment
     * 
     */
    class Payment {
        /** Aggregations: */
        /** Compositions: */
        /*         * * Attributes: ** */

        /**
         * 
         * @access protected
         */
        protected $id;

        /**
         * 
         * @access protected
         */
        protected $value;

        /**
         * 
         * @access protected
         */
        protected $date;

        /**
         * 
         *
         * @return Payment
         * @access public
         */
        public function add_payment() {
            
        }

// end of member function add_payment

        /**
         * 
         *
         * @return bool
         * @access public
         */
        public function delete_payment() {
            
        }

// end of member function delete_payment

        /**
         * 
         *
         * @return Payment
         * @access public
         */
        public function update_payment() {
            
        }

// end of member function update_payment
        
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

    // end of Payment
}

?>
