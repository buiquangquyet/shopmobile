<?php
class Mitq_type_category extends CI_Model{
    public function getAllType(){
        return $this->db->select('id,title')->from('itq_type_category')->get()->result_array() ;
    }
}