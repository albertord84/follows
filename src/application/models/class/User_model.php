<?php

/**
 * class User
 * 
 */
class User_model extends CI_Model {
    /** Aggregations: */
    /** Compositions: */
    /*     * * Attributes: ** */

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
        } else {
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
    public $language;

    /**
     * 
     */
    function __construct() {
        
    }

    /**
     * 
     *
     * @return unsigned short
     * @access public
     */
    public function set_sesion($id, $session, $datas = NULL) {
        try {
            $this->load->model('class/user_role');
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where(array('id' => "$id"));
            $user_data = $this->db->get()->row_array();

            if (count($user_data)) {
                if($user_data['role_id'] == user_role::CLIENT) {
                    $this->db->select('*');
                    $this->db->from('clients');
                    $this->db->join('plane', 'plane.id = clients.plane_id');
                    $this->db->where(array('user_id' => "$id"));
                    $client_data = $this->db->get()->row_array();
                    if($client_data['plane_id']==1)
                        $session->set_userdata('plane_id', 4);
                    else
                        $session->set_userdata('plane_id', $client_data['plane_id']);
                    $session->set_userdata('to_follow', (int) $client_data['to_follow']);
                    $session->set_userdata('normal_val', (int) $client_data['normal_val']);
                    $session->set_userdata('cookies', $client_data['cookies']);
                    $session->set_userdata('unfollow_total', (int) $client_data['unfollow_total']);
                    $session->set_userdata('autolike', (int) $client_data['like_first']);
                    $session->set_userdata('play_pause', (int) $client_data['paused']);
                }
                $session->set_userdata('id', $user_data['id']);
                $session->set_userdata('name', $user_data['name']);
                $session->set_userdata('login', $user_data['login']);
                $session->set_userdata('pass', $user_data['pass']);
                $session->set_userdata('email', $user_data['email']);
                $session->set_userdata('role_id', $user_data['role_id']);
                $session->set_userdata('status_id', $user_data['status_id']);
                $session->set_userdata('init_date', $user_data['init_date']);
                $session->set_userdata('language', $user_data['language']);
                $session->set_userdata('insta_datas', $datas);
                return true;
            } else {
                return false;
            }
        } catch (Exception $exception) {
            echo 'Error accediendo a la base de datos durante el login';
        }
    }
    
    public function get_user_match_from_login_password($datas){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('login',$datas['login']);
        $this->db->where('pass',$datas['pass']);
        $this->db->where('status_id <', 11);
        $this->db->where('status_id <>', 8);
        $this->db->where('status_id <>', 4);
        return $this->db->get()->row_array();
    }
    
    public function get_language_of_client($user_id){
        $this->db->select('language');
        $this->db->from('users');
        $this->db->where('id',$user_id);
        $xxx=$this->db->get()->row_array();
        return $xxx;
    }
    
    public function set_language_of_client($user_id,$language){        
        $this->db->where('id', $user_id);
        $this->db->update('users', $language);
    }
        
    public function get_all_users() {
        $this->db->select('id,status_id,plane_id');
        $this->db->from('users');
        $this->db->join('clients', 'clients.user_id = users.id');
        $this->db->where('status_id <', 11);
        $this->db->where('status_id <>', 8);
        $this->db->order_by("plane_id","asc");        
        $this->db->order_by("user_id","asc");        
        $a = $this->db->get()->result_array();
        return $a;
    }
    
    public function get_daily_report($user_id) {
        $this->db->select('followers,date');
        $this->db->from('daily_report');
        $this->db->where('client_id', $user_id);
        $this->db->order_by("date","asc");
        $a = $this->db->get()->result_array();
        return $a;
    }
    
    public function time_of_live_model($status_id=NULL) {
        $this->db->select('id,init_date,end_date,plane_id');        
        $this->db->from('clients');
        $this->db->join('users', 'users.id = clients.user_id');        
        $this->db->where('status_id', $status_id);
        $this->db->where('init_date is NOT NULL', NULL, FALSE);
        if($status_id=='4')
            $this->db->where('end_date is NOT NULL', NULL, FALSE);
        $this->db->order_by("plane_id","asc");
        $this->db->order_by("init_date","asc");
        $a = $this->db->get()->result_array();
        return $a;
    }
    public function get_user_role($user_login, $user_pass) {
        $this->db->select('role_id');
        $this->db->from('users');
        $this->db->where('login', $user_login);
        $this->db->where('pass', $user_pass);
        $a = $this->db->get()->row_array();
        return $a;
    }
    
    public function get_signin_date($id) {
        $this->db->select('init_date');
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get()->row_array()['init_date'];        
    }

    public function get_user_by_id($user_id) {
        try {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('id', $user_id);
            return $this->db->get()->result_array();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
   
    public function update_user($id, $datas) {
        try {
            $this->db->where('id', $id);
            $this->db->update('users', $datas);
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        }
    }
    
    public function get_all_dummbu_clients() {
        try {
            $this->db->select('*');
            $this->db->from('users');
            return $this->db->get()->result_array();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    

    /**
     * 
     *
     * @param serial user_id 

     * @return User
     * @access public
     */
    public function load_user($user_login, $user_pass) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('login' => $user_login, 'pass' => $user_pass));
        return $this->db->get()->row_array();
    }

    /* public function load_all_user($condition) {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where($condition);
      return $this->db->get()->result_array();
      } */

    public function execute_sql_query($query) {
        return $this->db->query($query)->result_array();
    }

    /**
     * 
     *
     * @return bool
     * @access public
     */
    public function insert_washdog($user_id, $cad) {
        $this->db->select('id');
        $this->db->from('washdog_type');
        $this->db->where('action',$cad);
        $a = $this->db->get()->row_array()['id'];
        
        if ($a > 0)
            $this->db->insert('washdog1',array('user_id'=>$user_id,'type'=>$a,'date'=>time()));
        else {
            $this->db->insert('washdog_type',array('action'=>$cad,'source'=>0));
            // código adicionado por Ruslan:
            $this->db->select('id');
            $this->db->from('washdog_type');
            $this->db->where('action',$cad);
            $a = $this->db->get()->row_array()['id'];
            if ($a > 0)
                $this->db->insert('washdog1',array('user_id'=>$user_id,'type'=>$a,'date'=>time()));
        }
    }
    
   
    
    public function get_status_by_id($status_id){
       $this->db->select('name');
       $this->db->from('user_status');
       $this->db->where('id',$status_id);
       return $this->db->get()->row_array();
    }
     
     
    public function get_ranking(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('clients', 'users.id = clients.user_id');
        $this->db->join('plane', 'plane.id = clients.plane_id');
        $this->db->where(array('users.status_id' => 1));
        $client_data = $this->db->get()->result_array();
        return $client_data;
    }
    
    public function get_last_daily_report($client_id){
        $this->db->select('*');
        $this->db->from('daily_report');
        $this->db->where('client_id' , $client_id);
        $this->db->order_by("date","desc");
        $client_data = $this->db->get()->row_array();
        if(count($client_data))
            return $client_data;
        else 
            return null;
    } 
    
    public function client_prevalence() {
        $prevalence=array('in'=>array(),'out'=>array());
        $this->db->select('*');
        $this->db->from('users');
        $all_users=$this->db->get()->result_array();
        $N=count($all_users);
        for($i=0;$i<$N;$i++){
            $user=$all_users[$i];            
            if($user['status_id']!=='8'){
                $init_day=$user['init_date'];
                if($init_day!=='NULL'){
                    $d_init_day= date("j", $init_day);
                    $m_init_day= date("n", $init_day);
                    $y_init_day= date("Y", $init_day);
                    $str_init_day=sprintf('%s/%s/%s',$y_init_day,$m_init_day,$d_init_day);
                    if(!isset($prevalence['in'][$str_init_day])){
                        $prevalence['in'][$str_init_day]=1;
                        if(!isset($prevalence['out'][$str_init_day]))
                            $prevalence['out'][$str_init_day]=0;
                    }
                    else
                        $prevalence['in'][$str_init_day]=$prevalence['in'][$str_init_day]+1;
                }
                $end_day=$user['end_date'];
                if($end_day!=='NULL'){
                    $d_end_day= date("j", $end_day);
                    $m_end_day= date("n", $end_day);
                    $y_end_day= date("Y", $end_day);
                    $str_end_day=sprintf('%s/%s/%s',$y_end_day,$m_end_day,$d_end_day);            
                    if(!isset($prevalence['out'][$str_end_day])){
                        $prevalence['out'][$str_end_day]=1;
                        if(!isset($prevalence['in'][$str_end_day]))
                            $prevalence['in'][$str_end_day]=0;
                    }
                    else
                        $prevalence['out'][$str_end_day]=$prevalence['out'][$str_end_day]+1;
                }
            }
        }        
        foreach($prevalence['in'] as $key =>$value){  
            echo sprintf('%s;%d<br>', $key, $prevalence['in'][$key]);
        }
        echo '<br><br><br><br><br>';
        
        foreach($prevalence['out'] as $key =>$value){  
            echo sprintf('%s;%d<br>', $key, $prevalence['out'][$key]);
        }
    }

}

?>