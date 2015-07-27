<?php
class Mitq_note_category extends CI_Model{
    public function insertNoteCategory($note_id,$value){
        $data =array('note_id'=>$note_id,'category_id'=>$value);
        return $this->db->insert('itq_note_category',$data);
    }
    public function getNotCatByid($note_id){
        return $this->db->where('note_id',$note_id)->from('itq_note_category')->get()->result_array();
    }
    public function delNoteCategory($note_id){
        return $this->db->where(array('note_id'=>$note_id))->delete('itq_note_category');
    }

}