<?php

    require_once 'User_model.php';
    class Admin_model extends User_model {
        
        public function add_admin() {            
        }

        public function delete_admin() {            
        }
        
        public function update_admin() {            
        }
        
        public function view_clients_or_get_emails_by_filter($form_filter) {
            if ($form_filter['query'] === '1') {
                $this->db->select('*');
                $this->db->from('clients');
                $this->db->join('users', 'clients.user_id = users.id');
                $this->db->join('plane', 'clients.plane_id = plane.id');
            }
            else {
                $this->db->distinct();
                $this->db->select('email');
                $this->db->from('users');
                $this->db->join('clients', 'clients.user_id = users.id');
                $this->db->join('plane', 'clients.plane_id = plane.id');
            }
             
            if($form_filter['cod_promocional']!='--SELECT--'){
                if($form_filter['cod_promocional']==='PEIXE URBANO'){
                    $this->db->where('ticket_peixe_urbano !=', 'BACKTODUMBU');
                    $this->db->where('ticket_peixe_urbano !=', 'AMIGOSDOPEDRO');
                    $this->db->where('ticket_peixe_urbano !=', 'FITNESS');
                    $this->db->where('ticket_peixe_urbano !=', 'SHENIA');
                    $this->db->where('ticket_peixe_urbano !=', 'VANESSA');
                    $this->db->where('ticket_peixe_urbano !=', 'NINA');
                    $this->db->where('ticket_peixe_urbano !=', 'CAROL');
                    $this->db->where('ticket_peixe_urbano !=', 'NICOLE');
                    $this->db->where('ticket_peixe_urbano !=', 'OLX');
                    $this->db->where('ticket_peixe_urbano !=', 'INSTA50P');
                    $this->db->where('ticket_peixe_urbano !=', 'AGENCIALUUK');
                    $this->db->where('ticket_peixe_urbano !=', 'INSTA-DIRECT');
                    $this->db->where('ticket_peixe_urbano !=', 'MALADIRETA');
                    $this->db->where('ticket_peixe_urbano !=', 'INSTA15D');
                    $this->db->where('ticket_peixe_urbano !=', 'DUMBUDF20');
                    $this->db->where('ticket_peixe_urbano !=', 'INSTA50P');
                    $this->db->where('ticket_peixe_urbano !=', 'BACKTODUMBU-DNLO');
                    $this->db->where('ticket_peixe_urbano !=', 'BACKTODUMBU-EGBTO');
                    $this->db->where('ticket_peixe_urbano IS NOT NULL');
                    $this->db->where('ticket_peixe_urbano !=', '');
                    $this->db->where('LENGTH(ticket_peixe_urbano) >', 10, FALSE);
                } else{
                    $this->db->where('ticket_peixe_urbano', $form_filter['cod_promocional']);
                }
            }        
            
            if($form_filter['profile_client']!='')
                $this->db->where('login', $form_filter['profile_client']);
            
            if($form_filter['signin_initial_date']!='' && $form_filter['signin_initial_date2']!=''){
                $this->db->where('init_date >=',strtotime($form_filter['signin_initial_date'].' 00:00:00'));
                $this->db->where('init_date <=',strtotime($form_filter['signin_initial_date2'].' 23:59:59'));
            }
            
            if($form_filter['status_date']!='' && $form_filter['status_date2']!=''){
                $this->db->where('status_date >=',strtotime($form_filter['status_date'].' 00:00:00'));
                $this->db->where('status_date <=',strtotime($form_filter['status_date2'].' 23:59:59'));
            }
            
            if($form_filter['observations']==='NAO') {
                $this->db->where('(observation IS NULL OR observation = "")', NULL, FALSE);
            }
            else if($form_filter['observations']==='SIM') {
                $this->db->where('observation IS NOT NULL');
                $this->db->where('observation !=', '');
            }
            
            if($form_filter['email_client']!='')
                $this->db->where('email', $form_filter['email_client']);
            
            if($form_filter['order_key_client']!='')
                $this->db->where('order_key', $form_filter['order_key_client']);
            
            if($form_filter['client_id']!='')
                $this->db->where('user_id', $form_filter['client_id']);
            
            if($form_filter['ds_user_id']!='')
                $this->db->where('insta_id', $form_filter['ds_user_id']);
            
            if($form_filter['credit_card_name']!='')
                $this->db->where('credit_card_name', $form_filter['credit_card_name']);
            
            if($form_filter['client_status']>-1)
                $this->db->where('status_id', $form_filter['client_status']);
            
            if ($form_filter['plane'] > 0)
                $this->db->where('plane_id', $form_filter['plane']);
            
            if ($form_filter['tentativas'] > 0)
                $this->db->where('purchase_counter <', (10 - $form_filter['tentativas']));
            
            if($form_filter['days_no_work']!='') {
                $this->db->where('(last_access < '.(time() - ($form_filter['days_no_work'] * 24 * 60 * 60)).' OR last_access IS NULL)', NULL, FALSE);
                $this->db->where('role_id', 2); // CLIENT
                $this->db->where('status_id !=', 2); // BLOCKED_BY_PAYMENT
                $this->db->where('status_id !=', 4); // DELETED
                $this->db->where('status_id !=', 8); // BEGINNER
                $this->db->where('status_id !=', 11); // DONT_DISTURB
                $this->db->where('order_key !=', '');
                $this->db->order_by("last_access", "desc");
            }
            
            if ($form_filter['paused'] >= 0)
                $this->db->where('paused', $form_filter['paused']);
            
            if ($form_filter['total_unfollow'] >= 0)
                $this->db->where('unfollow_total', $form_filter['total_unfollow']);
            
            if ($form_filter['autolike'] >= 0)
                $this->db->where('like_first', $form_filter['autolike']);
            
            if ($form_filter['utm_source'] != '--SELECT--') {
                if ($form_filter['utm_source'] == '---')
                    $this->db->where('utm_source IS NULL');
                else
                    $this->db->where('utm_source', $form_filter['utm_source']);
            }

            if($form_filter['idioma'] != '--SELECT--') {
                $this->db->where('language', $form_filter['idioma']);
            }
            
            if($form_filter['pr_ativos']==='NAO') {
                $this->db->where('user_id NOT IN (SELECT DISTINCT client_id FROM dumbudb.reference_profile WHERE deleted = 0)', NULL, FALSE);
            }
            else if($form_filter['pr_ativos']==='SIM') {
                $this->db->where('user_id IN (SELECT DISTINCT client_id FROM dumbudb.reference_profile WHERE deleted = 0)', NULL, FALSE);
            }
            
            return $this->db->get()->result_array();        
        }
           
        public function view_pendences_by_filter($form_filter) {
            $this->db->select('*');
            $this->db->from('pendences');            
          
            if ($form_filter['pendences_date'] == 'all') { // all pendences
                ;
            }
            else if ($form_filter['pendences_date'] == 'before') { // all pendences before today
                $this->db->where('event_date <= ', time());
            }
            else if ($form_filter['pendences_date'] == 'after') { // all pendences after today
                $this->db->where('event_date >= ', time());
            }
            else if ($form_filter['pendences_date'] == 0) { // today
                $this->db->where('event_date >= ', mktime(0, 0, 0, date("m"), date("d"),   date("Y")));
                $this->db->where('event_date <= ', mktime(23, 59, 59, date("m"), date("d"),   date("Y")));
            }
            else {
                if ($form_filter['pendences_date'] < 0) { // -30, -7 o -1 days
                    $this->db->where('event_date >= ', mktime(0, 0, 0, date("m"), date("d") + $form_filter['pendences_date'],   date("Y")));
                    $this->db->where('event_date <= ', time());
                }
                else { // 1, 7 o 30 days
                    $this->db->where('event_date <= ', mktime(23, 59, 59, date("m"), date("d") + $form_filter['pendences_date'],   date("Y")));
                    $this->db->where('event_date >= ', time());
                }
            }
            
            if ($form_filter['client_id_listar'] != '') {
                $this->db->where('client_id', $form_filter['client_id_listar']);
            }
            
            if($form_filter['creation_date']!='' && $form_filter['creation_date2']!=''){
                $this->db->where('init_date >=', strtotime($form_filter['creation_date'].' 00:00:00'));
                $this->db->where('init_date <=', strtotime($form_filter['creation_date2'].' 23:59:59'));
            }
            
            if ($form_filter['type_option1'] == 'true') { // pendencias abertas
                $where = "resolved_date IS NULL";
                $this->db->where($where);
            }
            else if ($form_filter['type_option2'] == 'true') { // pendencias fechadas
                $where = "resolved_date IS NOT NULL";
                $this->db->where($where);
            }
            else { // pendencias abertas ou resolvidas
                ;
            }
                       
            return $this->db->get()->result_array();
        }
        
        public function create_pendence_by_form($form_filter) {
            $now = time();
            if ($form_filter['frequency_option1'] == 'true') { // frecuencia única
                $this->db->set('client_id', $form_filter['client_id']);
                $this->db->set('text', $form_filter['pendence_text']);
                $this->db->set('init_date', $now);
                $this->db->set('event_date', strtotime($form_filter['event_date'].' 00:00:01'));
                $this->db->set('number', 1);
                $this->db->set('frequency', 1);
                $this->db->insert('pendences');
            }
            else if ($form_filter['frequency_option2'] == 'true') { // frecuencia de X veces
                $event_date = strtotime($form_filter['event_date'].' 00:00:01');
                
                for ($i = 0; $i < $form_filter['number_times']; $i++) {
                    $this->db->set('client_id', $form_filter['client_id']);
                    $this->db->set('text', $form_filter['pendence_text']);
                    $this->db->set('init_date', $now);
                    $this->db->set('event_date', strtotime("+".$i." month", $event_date));
                    $this->db->set('number', $i + 1);
                    $this->db->set('frequency', $form_filter['number_times']);
                    $this->db->insert('pendences');
                }
            }
            else { // frecuencia infinita
                $event_date = strtotime($form_filter['event_date'].' 00:00:01');
                
                for ($i = 0; $i < 12; $i++) {
                    $this->db->set('client_id', $form_filter['client_id']);
                    $this->db->set('text', $form_filter['pendence_text']);
                    $this->db->set('init_date', $now);
                    $this->db->set('event_date', strtotime("+".$i." month", $event_date));
                    $this->db->set('number', $i + 1);
                    $this->db->set('frequency', 0);
                    $this->db->insert('pendences');
                }
            }
        }
        
        public function update_pendence($form_filter) {
            $this->db->set('client_id', $form_filter['client_id']);
            $this->db->set('text', $form_filter['pendence_text']);
            $this->db->set('event_date', strtotime($form_filter['event_date'].' 00:00:01'));
            $this->db->set('closed_message', $form_filter['pendence_closed_message']);
            $this->db->where('id', $form_filter['id']);
            $this->db->update('pendences');
        }
        
        public function resolve_pendence($form_filter) {
            $this->db->set('resolved_date', time());
            $this->db->where('id', $form_filter['id']);
            $this->db->update('pendences');
        }
        
        public function view_watchdog_by_filter($form_filter) {
            $this->db->select('date');
            $this->db->from('washdog1');
            $this->db->where('user_id', $form_filter['user_id']);
            
            $this->db->select('action');
            $this->db->from('washdog_type');
            $this->db->where('washdog_type.id= washdog1.type');
            
            if($form_filter['date_from']!='' && $form_filter['date_to']!=''){
                $this->db->where('date >=',strtotime($form_filter['date_from'].' 00:00:00'));
                $this->db->where('date <=',strtotime($form_filter['date_to'].' 23:59:59'));
            }
            
            return $this->db->get()->result_array();
        }
        
        public function change_pay_day($client_id, $pay_day){
            $this->db->set('pay_day', $pay_day);
            $this->db->where('user_id', $client_id);
            $resp = $this->db->update('clients');
            return $resp;
        }
    }
?>
