<?php
class Mitq_cart extends CI_Model{
    public function insertCart($arrdata){
        return $this->db->insert('itq_cart',$arrdata);
    }

    public function listCart($start,$perpag,$field="id",$value="asc",$keyword=""){
        if(!empty($keyword)){
            return $this->db->select('*')->from('itq_note')->join('itq_category', 'itq_category.id = itq_note.category-id','left')->like('itq_note.title', $keyword)->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
        }else{
            return $this->db->select('*')->from('itq_note')->join('itq_category', 'itq_category.id = itq_note.category-id','left')->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
        }
    }
    public function countTitle_NotSearch(){
        return $this->db->from('itq_cart')->count_all_results();
    }
    public function countTitle_Search($search){
        return $this->db->from('itq_cart')->like('email', $search)->count_all_results();
    }
    public function listCate($start,$perpag,$field="id",$value="asc",$keyword=""){
        if(!empty($keyword)){
            return $this->db->select('*')->from('itq_cart')->like('email', $keyword)->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
        }else{
            return $this->db->select('*')->from('itq_cart')->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
        }
    }
    public function getCartById($id){
        return $this->db->where('id',$id)->from('itq_cart')->get()->row_array();
    }
    public function updatestatus($id,$key,$status){
        return $this->db->where(array('id'=>$id))->update('itq_cart',array($key=>$status));
    }
    public function del($id){
        return $this->db->where(array('id'=>$id))->delete('itq_cart');
    }
}