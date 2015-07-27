<?php
class Mitq_group extends CI_Model{
    public function __construt(){
        parent:: __construct();
    }

    public function getAllGroup(){
        return $this->db->select('id,title')->from('itq_group')->get()->result_array() ;
    }
    public function checkTitleExit($title){
       return  $this->db->where(array('title'=>$title))->from('itq_group')->count_all_results();
    }
    public function addGroup($_post){
        $this->db->insert('itq_group',$_post);
    }
    public function listGroup($start,$perpag){
         return $this->db->query("SELECT itq_group.id, itq_group.title, itq_group.usercreate, itq_group.created, itq_group.userupdate, itq_group.update, COUNT(itq_user.id) AS total FROM itq_group LEFT JOIN itq_user ON itq_group.id=itq_user.groupid GROUP BY itq_group.id limit $start,$perpag")->result_array();
    }
    public function getGroupById($id){
        return $this->db->select('id,title,allow,group')->where(array('id'=>$id))->from('itq_group')->get()->row_array();
    }
    public function EditGroupById($id,$arrayData){
        return $this->db->where(array('id'=>$id))->update('itq_group',$arrayData);
    }
    public function deleteGroupByID($id=null){
        return $this->db->where(array('id'=>$id))->delete('itq_group');
    }
    public function countAll(){
        return  $this->db->from('itq_group')->count_all_results();
    }
    public function list_group($start,$perpag,$field="id",$value="asc",$keyword=""){
        if(!empty($keyword)){
            return $this->db->select('itq_group.id, itq_group.title, itq_group.usercreate, itq_group.created, itq_group.userupdate, itq_group.update, COUNT(itq_user.id) AS total')->from('itq_group')->join('itq_user', 'itq_group.id = itq_user.groupid','left')->group_by("itq_group.id")->like('title', $keyword)->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
        }else{
            return $this->db->select('itq_group.id, itq_group.title, itq_group.usercreate, itq_group.created, itq_group.userupdate, itq_group.update, COUNT(itq_user.id) AS total')->from('itq_group')->join('itq_user', 'itq_group.id = itq_user.groupid','left')->group_by("itq_group.id")->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
        }

    }
}