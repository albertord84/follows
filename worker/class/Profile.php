<?php

namespace dumbu\cls {

    /**
     * class Profile
     * 
     */
    class Profile {
        /** Aggregations: */
        /** Compositions: */
        /*         * * Attributes: ** */

        /**
         * 
         * @access public
         */
        public $id;

        /**
         * 
         * @access public
         */
        public $insta_id;

        /**
         * 
         * @access public
         */
        public $insta_name;

        /**
         * 
         * @access public
         */
        public $unfollowed;

        public function get_insta_ref_prof_data($ref_prof, $ref_prof_id = NULL) {
            $Robot = new Robot();
            return $Robot->get_insta_ref_prof_data($ref_prof, $ref_prof_id);
        }

        public function get_insta_ref_prof_data_from_client($cookies, $ref_prof) {
            $Robot = new Robot();
            return $Robot->get_insta_ref_prof_data_from_client($cookies, $ref_prof);
        }

        public function is_private($ref_prof) {
            $ref_prof_data = $this->get_insta_ref_prof_data($ref_prof);
            return $ref_prof_data ? $ref_prof_data->is_private : NULL;
        }

        /**
         * Code or FALSE if error occur
         * @param type $response
         * @return boolean
         */
        public function parse_profile_follow_errors($response) {
            $error = FALSE;
            // If object
//            var_dump($response->message);
            if (is_object($response) && isset($response->message)) {
                if ((strpos($response->message, 'Com base no uso anterior deste recurso') !== FALSE)
                    || (strpos($response->message, 'Parece que você estava usando este recurso de forma indevida avançando muito rapidamente') !== FALSE)) {
                    $error = 1;
                } else if ((strpos($response->message, 'Você atingiu o limite máximo de contas para seguir.') !== FALSE) 
                       ||  (strpos($response->message, "Sorry, you're following the max limit of accounts.") !== FALSE)) {
                    $error = 2;
                } else if (strpos($response->message, 'unauthorized') !== FALSE) {
                    $error = 3;                         
                } else if (strpos($response->message, 'Parece que você estava usando esse recurso indevidamente de forma muito') !== FALSE) {
                    $error = 4;
                } else if (strpos($response->message, 'checkpoint_required') !== FALSE) {
                    $error = 5;
                } else if ((strpos($response->message, 'Tente novamente mais tarde') !== FALSE) 
                       ||  (strpos($response->message, 'Aguarde alguns minutos antes de tentar novamente') !== FALSE)
                        || (strpos($response->message, 'orbidden') !== FALSE)) {
                    $error = 7;
                } else if (strpos($response->message, 'Esta mensagem contém conteúdo que foi bloqueado pelos nossos sistemas de segurança.') !== FALSE) {
                    $error = 8;
                } else if (strpos($response->message, 'Ocorreu um erro ao processar essa solicita') !== FALSE) {
                    $error = 9;
                } else if (strpos($response->message, 'se ha bloqueado. Vuelve a intentarlo') !== FALSE) {
                    $error = 11;
                } else if ($response->message === '') {
                    $error = 6; // Empty message
                }
                else{
                    $error = -1;
                    var_dump($response);
                    print 'Not message found!';
                }
            } // If array
            else if (is_array($response) && count($response) >= 1 && is_string($response[0]) && 
                    ((strpos($response[0], 'Tente novamente mais tarde') !== FALSE) || strpos($response[0], 'Aguarde alguns minutos antes de tentar novamente') !== FALSE)) {
                $error = 7; // Tente novamente mais tarde
            }
            else if (is_array($response) && count($response) == 0) {
                $error = 10; // Tente novamente mais tarde
            }
            else {
                $error = -1;
                var_dump($response);
                print 'Not error code found!';
            }
            return $error;
        }

//
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

    // end of Profile
}

?>
