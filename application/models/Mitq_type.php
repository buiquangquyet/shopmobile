<?php
class Mitq_type extends CI_Model{
    public function __construt(){
        parent:: __construct();
    }
	public function getAllType(){
		return $this->db->select('id,title')->from('itq_type')->get()->result_array() ;
	}
    public function getTypeByID($id=null){
        $result =   $this->db->select('title')->where(array('id'=>$id))->from('itq_type')->get()->row_array();
        //return $result['title'];
        if(isset($result['title'])&& count($result['title'])){
            return $result['title'];
        }else{
            return '';
        }
    }
    public function addType($title){
        return $this->db->insert('itq_type',array('title'=>$title));
    }
    public function countType($type){
        return $this->db->where(array('title'=>$type))->from('itq_type')->count_all_results();
    }
    public function updateType($id,$arrayData){
        return $this->db->where(array('id'=>$id))->update('itq_type',$arrayData);
    }
    public function deletetype($id){
        return $this->db->where(array('id'=>$id))->delete('itq_type');
    }
}