<?php

class Ranking_model extends CI_Model {
   
    public function insert_into_ranking($datas){
        try {
            $this->db->insert('ranking', $datas);
            //var_dump($datas);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }       
    }
    
}