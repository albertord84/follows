<?php
    
    class Crypt extends CI_Model {
            
        public  function __construct() {
            parent::__construct();            
        }
        
        public  function codify_level1($str){
            $str = $this->cs1($str);
            $str = $this->cs2($str);
            $str = $this->cs3($str);
            //$str = $this->cs4($str);
            $str = $this->cs5($str);
            return base64_encode($str);
        }

        public  function decodify_level1($str){
            $str = base64_decode($str);
            $str = $this->anti_cs5($str);
            //$str = $this->anti_cs4($str);
            $str = $this->anti_cs3($str);
            $str = $this->anti_cs2($str);
            $str = $this->anti_cs1($str);
            return  $str;
        }

        public  function cs1($str){
            $k=0;
            $new_str = Array();
            for($i=0;$i<strlen($str);$i++){
                if($i%2===0){
                    $new_str[$k]=  $this->getRandomArbitrary(0,9);                
                    $k++;
                    $new_str[$k]=$str[$i];
                }
                else
                    $new_str[$k]=$str[$i];
                $k++;
            }
            return implode('', $new_str);           
        }

        public  function anti_cs1($str){
            $k=0;
             $new_str=Array();
            for($i=0;$i<strlen($str);$i++){
                if($i%3===0){  
                }
                else
                    $new_str[$k]=$str[$i];
                $k++;
            }
            return implode('', $new_str);
        }

        public  function cs2($str){        
             $new_str=Array();
            for($i=0;$i<strlen($str);$i++){ 
                $tmp=ord($str[$i])+13;                      
                $new_str[$i]= chr($tmp);
            }
            return implode('', $new_str);
        }

        public  function anti_cs2($str){        
             $new_str=Array();
            for($i=0;$i<strlen($str);$i++){ 
                $tmp=ord($str[$i])-13;                    
                $new_str[$i]= chr($tmp);
            }
            return implode('', $new_str);
        }

        public  function cs3($str){
            $k=0;
             $new_str=Array();
            for($i=0;$i<strlen($str);$i++){
                if($i%5===0){
                    $new_str[$k]=  $this->getRandomArbitrary(0,9);                
                    $k++;
                    $new_str[$k]=$str[$i];
                }
                else
                    $new_str[$k]=$str[$i];
                $k++;
            }        
            return implode('', $new_str);
        }

        public  function anti_cs3($str){
            $k=0;
             $new_str=Array();
            for($i=0;$i<strlen($str);$i++){
                if($i%6===0){  
                }
                else
                    $new_str[$k]=$str[$i];
                $k++;
            }        
            return implode('', $new_str);
        }

        public  function cs4($str){
            $new_str=Array();
            for($i=0;$i<strlen($str);$i++){ 
                $tmp=ord($str[$i])*2;                        
                $new_str[$i]= chr($tmp);
            }
            return implode('', $new_str);
        }

        public  function anti_cs4($str){
            $new_str=Array();
            for($i=0;$i<strlen($str);$i++){
                $tmp=ord($str[$i])/2;                        
                $new_str[$i]= chr($tmp);
            }
            return implode('', $new_str);
        }

        public  function cs5($str){
             $new_str=Array();
            $k=0;
            for($i=strlen($str)-1;$i>=0;$i--){                       
                $new_str[$k]=$str[$i];
                $k++;
            }
            return implode('', $new_str);
        }

        public  function anti_cs5($str){
             $new_str=Array();
            $k=0;
            for($i=strlen($str)-1;$i>=0;$i--){                       
                $new_str[$k]=$str[$i];
                $k++;
            }
            return implode('', $new_str);
        }

        public  function getRandomArbitrary($min, $max) {
            return rand($min, $max);
        }

        
        
        public  function  codify_level2($data){
            $config = parse_ini_file(dirname(__FILE__) . "/../../../../CONFIG_CREDITSOCIETY.INI", true); 
            $key = $config['key']['key'];
            
            //MCRYPT_BLOWFISH
            $algorithm = MCRYPT_BLOWFISH;
            $mode = MCRYPT_MODE_CBC;
            $iv = mcrypt_create_iv(mcrypt_get_iv_size($algorithm, $mode),MCRYPT_DEV_URANDOM);
            
            $encrypted_data = mcrypt_encrypt($algorithm, $key, $data, $mode, $iv);
            $plain_text = base64_encode($encrypted_data);
            return Array($plain_text,$iv);
        }
        
        
        public  function  decodify_level2($datas){
            $config = parse_ini_file(dirname(__FILE__) . "/../../../../CONFIG_CREDITSOCIETY.INI", true); 
            $key = $config['key']['key'];
            
            //MCRYPT_BLOWFISH
            $algorithm = MCRYPT_BLOWFISH;
            $mode = MCRYPT_MODE_CBC;
            $iv = $datas[1];
            
            $encrypted_data = base64_decode($datas[0]);
            
            $decoded = mcrypt_decrypt($algorithm, $key, $encrypted_data, $mode, $iv);
            return $decoded;
        }
        
        public  function  codify($str){
            $str=$this->codify_level1($str);
            return $this->codify_level2($str);
        }
        
        public  function  decodify($str){
            $str=$this->decodify_level2($str);
            return $this->decodify_level1($str);
        }
        
        
        /*
        0 => string 'cast-128' (length=8)
        1 => string 'gost' (length=4)
        2 => string 'rijndael-128' (length=12)
        3 => string 'twofish' (length=7)
        4 => string 'arcfour' (length=7)
        5 => string 'cast-256' (length=8)
        6 => string 'loki97' (length=6)
        7 => string 'rijndael-192' (length=12)
        8 => string 'saferplus' (length=9)
        9 => string 'wake' (length=4)
        10 => string 'blowfish-compat' (length=15)
        11 => string 'des' (length=3)
        12 => string 'rijndael-256' (length=12)
        13 => string 'serpent' (length=7)
        14 => string 'xtea' (length=4)
        15 => string 'blowfish' (length=8)
        16 => string 'enigma' (length=6)
        17 => string 'rc2' (length=3)
        18 => string 'tripledes' (length=9)
        */          
    }
?>
