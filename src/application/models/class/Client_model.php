<?php

//require_once 'Reference_profile[].php';

//namespace dumbu\cls {
    require_once 'User_model.php';
    //require_once '.php';

    /**
     * class Client
     * 
     */
    class Client_model extends User_model {
        /** Aggregations: */
        /** Compositions: */
        /** Attributes: */

        /**
         * 
         * @access protected
         */
        protected $credit_card_number;

        /**
         * 
         * @access protected
         */
        protected $credit_card_status_id;

        /**
         * 
         * @access protected
         */
        protected $credit_card_cvc;

        /**
         * 
         * @access protected
         */
        protected $credit_card_name;

        /**
         * 
         * @access protected
         */
        protected $pay_day;

        /**
         * 
         * @access protected
         */
        protected $insta_id;

        /**
         * 
         * @access protected
         */
        protected $insta_followers_ini;

        /**
         * 
         * @access protected
         */
        protected $insta_following;

        /**
         * 
         * @access protected
         */
        protected $reference_profiles;

        /**
         * 
         */
        function __construct() {
            parent::__construct();            
        }

        /**
         * 
         *
         * @return bool
         * @access public
         */
        
                     
        public function insert_client($datas,$data_insta){
            //insert respectivity datas in the user table
            $data_user['name']=$data_insta->full_name;              //desde instagram
            $data_user['email']=$datas['client_email'];             //desde el formulario de logueo
            $data_user['login']=$datas['client_login'];             //desde el formulario de logueo
            $data_user['pass']=$datas['client_pass'];               //desde el formulario de logueo
            $data_user['role_id']=$datas['role_id'];                //desde el controlador
            $data_user['status_id']=$datas['status_id'];            //desde el controlador            
            $data_user['init_date']= time();
            $this->db->insert('users',$data_user);
            $id_user_table=$this->db->insert_id();
           
            //insert respectivity datas in the client table
            $data_client['purchase_counter']=$datas['purchase_counter'];                //desde insersion anterior
            $data_client['user_id']=$id_user_table;                                     //desde insersion anterior
            $data_client['insta_id']=$data_insta->pk;                                   //desde instagram
            $data_client['insta_followers_ini']=$data_insta->follower_count;            //desde instagram
            $data_client['insta_following']=$data_insta->following;                     //desde instagram
            $data_client['HTTP_SERVER_VARS']=$datas['HTTP_SERVER_VARS'];                //desde instagram navegador y servidor
            $data_client['utm_source']=$datas['utm_source'];                            //desde instagram navegador y servidor
            $this->db->insert('clients',$data_client);
            return $id_user_table;
        }    
        
        public function insert_ticket_bank_generated($ticket_datas){
            $this->db->insert('ticket_bank',$ticket_datas);
            return $id_user_table;
        }
        
        public function get_unpayed_tickets($user_id, $elapsed_time){
            $this->db->select('*');
            $this->db->from('ticket_bank'); 
            $this->db->where('ticket_bank.client_id', $user_id);            
            $this->db->where('ticket_bank.payed_date IS NOT NULL', NULL, FALSE);           
            $this->db->where('ticket_bank.generated_date <', $elapsed_time);    
            return $this->db->get()->result_array();
        }

        public function get_my_recent_followed_by_dumbu($client_id, $page_number=null){
            $limit=100; //limit by page
            if($page_number)
                $start=$page_number*$quantity_by_page+1;
            $this->db->select('*');
            $this->db->from('followed'); 
            $this->db->where('followed.client_id', $client_id);            
            $this->db->order_by('id', 'asc');
            if($page_number)
                $this->db->limit($limit, $start);            
            $followed_profiles = $this->db->get()->result_array();
            
            return $followed_profiles;
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
                                PRIMARY KEY (`id`, `reference_id`),
                                INDEX `fk__1_idx` (`reference_id` ASC),
                                CONSTRAINT `fk__$client_id`
                                  FOREIGN KEY (`reference_id`)
                                  REFERENCES `dumbudb`.`reference_profile` (`id`)
                                  ON DELETE NO ACTION
                                  ON UPDATE NO ACTION);";
                $result =  $this->db->query($sql);
                return $result;     
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            } 
       }

        public function insert_client_in_strict_instagram_login($datas,$data_insta){
            //insert respectivity datas in the user table
            $data_user['name']=$data_insta['insta_name'];           //desde instagram
            $data_user['login']=$datas['client_login'];             //desde el formulario de logueo
            $data_user['pass']=$datas['client_pass'];               //desde el formulario de logueo
            $data_user['role_id']=$datas['role_id'];                //desde el controlador
            $data_user['status_id']=$datas['status_id'];            //desde el controlador            
            $this->db->insert('users',$data_user);
            $id_user_table=$this->db->insert_id();
            
            //insert respectivity datas in the client table
            $data_client['user_id']=$id_user_table;                                     //desde insersion anterior
            $data_client['insta_id']=$data_insta['insta_id'];                           //desde instagram
            $data_client['insta_followers_ini']=$data_insta['insta_followers_ini'];     //desde instagram
            $data_client['insta_following']=$data_insta['insta_following'];             //desde instagram
            $this->db->insert('clients',$data_client);
            
            return $id_user_table;
        }        

        public function delete_work_of_profile($reference_id){
            $this->db->where('reference_id', $reference_id);
            $this->db->delete('daily_work'); 
        }
        
        public function get_all_planes(){
            $this->db->select('*');
            $this->db->from('plane');
            $this->db->where('id >=','2');
            return $this->db->get()->result_array();
        }
        
        public function get_client_by_access_token($access_token){
            try {    
                $this->db->select('*');
                $this->db->from('clients'); 
                $this->db->join('users', 'users.id = clients.user_id');
                $this->db->where('clients.ticket_access_token', $access_token);
                return $this->db->get()->result_array();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
         
        
        public function get_pay_values($id_value){
            $this->db->select('*');
            $this->db->from('plane');
            $this->db->where('id',$id_value);
            return $this->db->get()->row_array();
        }
        
        public function get_normal_pay_value($id_value){
            $this->db->select('normal_val');
            $this->db->from('plane');
            $this->db->where('id',$id_value);
            return $this->db->get()->row_array()['normal_val'];
        }
        
        public function get_actual_pay_value($user_id){
            $this->db->select('actual_payment_value');
            $this->db->from('clients');
            $this->db->where('user_id',$user_id);
            $resp=$this->db->get()->row_array()['actual_payment_value'];
            if($resp!='' && $resp!=null)
                return $resp;
            else 
                return false;
        }
        
        public function get_promotional_pay_value($id_value){
            $this->db->select('initial_val');
            $this->db->from('plane');
            $this->db->where('id',$id_value);
            return $this->db->get()->row_array()['initial_val'];
        }

        public function update_client($id,$datas){
            try {
                $this->db->where('user_id',$id);
                $result = $this->db->update('clients',$datas);
                return $result;
            } catch (Exception $exc) {                
                echo $exc->getTraceAsString();
                return false;
            }
        }

        public function decrement_purchase_retry($id,$datas){
            try {
                $this->db->where('user_id',$id);
                $this->db->update('clients',$datas);
                return true;
            } catch (Exception $exc) {                
                echo $exc->getTraceAsString();
                return false;
            }
        }
                
        public function insert_initial_instagram_datas($id,$datas){
            try {
                $this->db->where('client_id',$id);
                $this->db->update('daily_report',$datas);
                return true;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
                return false;
            }
        }
        
        public function sign_up($client_login,$client_pass,$status_id) {
            try {
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('login', $client_login);
                $this->db->where('pass', $user_pass);
                $user_data = $this->db->get()->row_array();
                $user_data['status_id']=$status_id;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }        
        
        public function get_client_by_ds_user_id($insta_id) {
            try {    
                $this->db->select('*');
                $this->db->from('clients');        
                $this->db->where('insta_id', $insta_id);
                return $this->db->get()->result_array();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function get_client_by_id($user_id) {
            try {    
                $this->db->select('*');
                $this->db->from('clients');        
                $this->db->where('user_id', $user_id);
                $result=$this->db->get()->result_array();
                return $result;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function get_all_data_of_client($user_id) {
            try {    
                $this->db->select('*');
                $this->db->from('clients'); 
                $this->db->join('users', 'users.id = clients.user_id');
                $this->db->where('users.id', $user_id);
                return $this->db->get()->result_array();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        
        public function get_all_clients_by_status_id($status_id) {
        $this->db->select('*');        
        $this->db->from('clients');
        $this->db->join('users', 'users.id = clients.user_id');   
        if($status_id!=20){
            $this->db->where('status_id', $status_id);
            echo 'Retentando los de estatus 2';
        }
        else{
            $this->db->where('status_id', 4);
            $this->db->where('observation', 'Cancelado automaticamente por mais de 10 retentativas de pagamento sem sucessso');
            $cc_names = array("VISA", "MASTERCARD",
                            "JUNIOR SUMA",
                            "JUNIOR LIMA",
                            "JUNIOR SANTOS",
                            "JUNIOR S SILVA",
                            "LUCAS BORSATTO22",
                            "LUCAS BORSATTO",
                            "GABRIEL CASTELLI",
                            "ANA SURIA",
                            "HENDRYO SOUZA",
                            "JOAO ANAKIM",
                            "JUNIOR FRANCO",
                            "FENANDO SOUZA",
                            "CARLOS SANTOS",
                            "DANIEL SOUZA",
                            "SKYLE JUNIOR",
                            "EDEDMUEDEDMUNDOEDEDMUEDEDMUNDO",
                            "EDEMUNDO LOPPES",
                            "JUNIOR KARLOS",
                            "ZULMIRA FERNANDES",
                            "JUNIOR FREITAS");
            $cc_numbers = array("5178057308185854",
                                "5178057258138580",
                                "4500040041538532",
                                "4984537159084527");
            $this->db->where_not_in('credit_card_name', $cc_names);
            $this->db->where_not_in('credit_card_number', $cc_numbers);
            echo 'Retentando los de estatus 20';
        }
        $this->db->where('order_key is NOT NULL', NULL, FALSE);
        $this->db->order_by("user_id","asc");
        $a = $this->db->get()->result_array();
        return $a;
    }
        
        
        
        public function get_plane($plane_id) {
            try {    
                $this->db->select('*');
                $this->db->from('plane');
                $this->db->where('id', $plane_id);
                return $this->db->get()->result_array();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function insert_insta_profile($clien_id, $profile, $insta_id_profile, $profile_type=NULL){       
            try {
                $data['client_id']=$clien_id;        
                $data['insta_name']=$profile;
                $data['insta_id']=$insta_id_profile;
                $data['deleted']=false;
                if($profile_type){
                    $data['type']=$profile_type;
                }
                $this->db->insert('reference_profile',$data);
                return $this->db->insert_id();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
                return 0;
            }
        }
        
        public function insert_profile_in_daily_work($reference_id, $insta_datas, $N, $active_profiles, $DIALY_REQUESTS_BY_CLIENT){
            $total_to_follow=0; 
            if($N==0)
                $total_to_follow=$DIALY_REQUESTS_BY_CLIENT;
            else {
                for($i=0;$i<$N;$i++){
                    $work=$this->get_daily_work_to_profile($active_profiles[$i]['id']);
                    if(count($work)){
                        $total_to_follow=$total_to_follow+$work[0]['to_follow'];
                    }
                }
            }
           
            $cnt_to_follow=floor($total_to_follow/($N+1));
            try {
                $this->db->insert('daily_work',array(
                    'reference_id'=>$reference_id,
                    'to_follow'=>$cnt_to_follow,
                    'to_unfollow'=>$cnt_to_follow,
                    'cookies'=>  json_encode($insta_datas)
                ));
                for($i=0;$i<$N;$i++){
                    $flag=1;
                    if(!$this->upadate_profile_in_daily_work($active_profiles[$i]['id'],array('to_follow'=>$cnt_to_follow)))
                       $flag=0;
                }
                return TRUE;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
                return 0;
            }
        }
        
        public function upadate_profile_in_daily_work($id,$datas){
            try {                
                $this->db->where('reference_id',$id);
                $this->db->update('daily_work',$datas);
                return true;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function get_daily_work_to_profile($id_profile){
             try {    
                $this->db->select('*');
                $this->db->from('daily_work'); 
                $this->db->where('reference_id', $id_profile);
                return $this->db->get()->result_array();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function get_client_active_profiles($user_id){
            try {    
                $this->db->select('*');
                $this->db->from('reference_profile');
                $this->db->where('client_id', $user_id);
                $this->db->where('deleted', '0');
                return $this->db->get()->result_array();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function get_client_canceled_profiles($user_id){
            try {    
                $this->db->select('*');
                $this->db->from('reference_profile');
                $this->db->where('client_id', $user_id);
                $this->db->where('deleted', '1');
                return $this->db->get()->result_array();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function activate_profile($client_id,$profile){
            try {        
                $this->db->select('*');
                $this->db->from('reference_profile');        
                $this->db->where('client_id', $client_id);
                $this->db->where('insta_name', $profile);
                $datas=$this->db->get()->row_array();
                $datas['deleted']=false;
                return $this->db->update('reference_profile', $datas, array('client_id' => $client_id, 'insta_name' => $profile));
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function execute_sql_query($query){
            return $this->db->query($query)->result_array();
        }
        public function execute_sql_query_to_update($query){
            return $this->db->query($query);
        }
        
        public function desactive_profiles($clien_id, $profile, $id_profile=NULL){
            //deleting daily work of this profile add balancing the work of the rest
            $active_profiles=$this->get_client_active_profiles($clien_id);
            $N=count($active_profiles);
            $index=0;
            if($N>1){
                if(!$id_profile){
                    for($i=0;$i<$N;$i++){
                        if($active_profiles[$i]['insta_name']===$profile){
                            $index=$i;
                            break;
                        }
                    }
                }
                
                if(!$id_profile)
                    $query='SELECT * FROM daily_work WHERE reference_id="'.$active_profiles[$index]['id'].'"';
                else
                    $query='SELECT * FROM daily_work WHERE reference_id="'.$id_profile.'"';                
                $profile_work= $this->execute_sql_query($query);
                
                if(count($profile_work)){
                    $cnt_follow_of_profile=$profile_work[0]['to_follow'];
                    $cnt_to_add=floor($cnt_follow_of_profile/($N-1));
                    for($i=0;$i<$N;$i++){
                        if($i!=$index){
                            $query='SELECT * FROM daily_work WHERE reference_id="'.$active_profiles[$i]['id'].'"';
                            $other_profile_work=$this->execute_sql_query($query);
                            $other_cnt_follow_of_profile=$profile_work[0]['to_follow'];
                            $cnt=$cnt_to_add+$other_cnt_follow_of_profile;
                            $this->upadate_profile_in_daily_work($active_profiles[$i]['id'],array('to_follow'=>$cnt));
                        }
                    }
                }
            }
            $this->db->where('reference_id', $active_profiles[$index]['id']);
            $this->db->delete('daily_work'); 
            
            //desactivating reference profile
            try {
                $this->db->where(array('client_id'=>$clien_id, 'insta_name'=>$profile, 'deleted'=>'0'));
                $this->db->update('reference_profile',array('deleted'=>'1'));
                return true;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function load_bank_datas_user($user_id){            
            try {
                $this->db->select('credit_card_number,credit_card_cvc,credit_card_name');
                $this->db->from('clients');        
                $this->db->where('user_id', $user_id);
                return $this->db->get()->row_array();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }   
        
        public function update_cupom_peixe_urbano_status($datas){            
            try {                
                $this->db->where('user_id',$datas['user_id']);
                $this->db->update('clients',$datas);
                return true;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
                return false;
            }
        }
        
         public function beginners_with_purchase_counter_less_value($value){
            try {
                $this->db->select('*');
                $this->db->from('clients');
                $this->db->join('users', 'users.id = clients.user_id');
                $this->db->where('init_date >', '1505196600');
                $this->db->where('purchase_counter <=', $value);
                $this->db->where('purchase_counter <>', -100);
                $this->db->where('status_id', 8);
                return $this->db->get()->result_array();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function get_client_black_or_white_list_by_id($id,$type){
            $this->db->select('profile');
            $this->db->from('black_and_white_list');
            $this->db->where('client_id',$id);
            $this->db->where('deleted','0');
            $this->db->where('black_or_white',$type);
            $result=$this->db->get()->result_array();
            return $result;
        }
        
        public function insert_in_black_or_white_list_model($id,$ds_user_id,$profile,$type){
            $this->db->select('*');
            $this->db->from('black_and_white_list');
            $this->db->where('client_id',$id);
            $this->db->where('profile',$profile);
            $this->db->where('deleted','0');
            $a=$this->db->get()->result_array();
            
            if(count($a)==0){ //si no esta activo en la base de datos
                $data_user=array(
                    'client_id'=>$id,
                    'insta_id'=>$ds_user_id,
                    'profile'=>$profile,
                    'init_date'=>time(),
                    'black_or_white'=>$type
                );
                $this->db->insert('black_and_white_list',$data_user);
                $result['message']='O perfil '.$profile.'foi inserifo';
                $result['success']=true;
            } else{
                if($a[0]['black_or_white']==='0'){
                    $result['message']='está na lista negra';
                    $result['success']=false;
                } else{
                    $result['message']='está na lista branca';
                    $result['success']=false;
                }
            }
            return $result;
        }
        
        public function select_white_list_model(){
            $this->db->select('*');
            $this->db->from('black_and_white_list');
            $this->db->order_by('id', 'asc');
            return $this->db->get()->result_array();            
        }
        
        public function update_ds_user_id_white_list_model($id,$ds_user_id){
            $this->db->where('id',$id);                    
            $this->db->update('black_and_white_list',array('insta_id'=>$ds_user_id));
        }
        
        public function delete_in_black_or_white_list_model($id,$profile,$type){
            try {
                $this->db->where('client_id',$id);
                $this->db->where('profile',$profile);
                $this->db->where('black_or_white',$type);
                $this->db->update('black_and_white_list',array('end_date'=>time(),'deleted'=>'1'));
                return true;
            } catch (Exception $exc) {                
                echo $exc->getTraceAsString();
                return false;
            }
        }
        
        public function geting_FAQ($result){
            try {
                
                if ($result['language'] === EN){
                        $Pergunta= Pregunta_EN;
                        $Resposta= Respuesta_EN;
                        
                }                        
                elseif ($result['language'] == ES){
                        $Pergunta= Pregunta_ES;
                        $Resposta= Respuesta_ES;
                }
                else {   $Pergunta= Pregunta_PT;
                         $Resposta= Respuesta_PT;
                }
                
                $sql=$this->db->select([$Pergunta,$Resposta])->from('faq')->where( $Pergunta.' IS NOT NULL');
               
                //$this->db->where('id'<'10');
                $resulta= $this->db->get()->result_array($sql);
                //var_dump($resulta) ; 
                return $resulta;
                
            } catch (Exception $exc) {                
                echo $exc->getTraceAsString();
                return false;
            }
        }
        
        public function get_client_workable_profiles($user_id){
            try {    
                $this->db->select('*');
                $this->db->from('reference_profile');
                $this->db->where('client_id', $user_id);
                $this->db->where('deleted', '0');
                $where = "(end_date IS NULL OR end_date = '')"; // adicionado por Ruslan
                $this->db->where($where); // adicionado por Ruslan
                return $this->db->get()->result_array();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }      
}
?>
