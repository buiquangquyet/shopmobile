<?php
class Mitq_contact extends CI_Model{
    public function insertContact($_post){
        return $this->db->insert('itq_contact',$_post);
    }
    public function getAllContact(){
        return $this->db->from('itq_contact')->get()->result_array() ;
    }
    public function deletecontact($id){
        return $this->db->where(array('id'=>$id))->delete('itq_contact');
    }
}