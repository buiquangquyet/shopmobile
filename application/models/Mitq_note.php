<?php
class Mitq_note extends CI_Model{
    public function __construt(){
        parent:: __construct();
    }
    public function insertNote($_post){
        return $this->db->insert('itq_note',$_post);
    }
    public function countTitle($title){
        return $this->db->where(array('title'=>$title))->from('itq_note')->count_all_results();
    }
    public function countTitle_Search($search){
        return $this->db->from('itq_note')->like('title', $search)->count_all_results();
    }

    public function countTitle_NotSearch(){
        return $this->db->from('itq_note')->count_all_results();
    }
    public function listNote($start,$perpag,$field="id",$value="asc",$keyword=""){
        if(!empty($keyword)){
            return $this->db->select('itq_note.id,itq_note.title, itq_note.is_right, itq_note.is_banner, itq_note.order, itq_category.title AS category, itq_note.image, itq_note.new, itq_note.description, itq_note.publish, itq_note.view, itq_note.userid-creat, itq_note.creattime, itq_note.userid-update, itq_note.updatetime')->from('itq_note')->join('itq_category', 'itq_category.id = itq_note.category-id','left')->like('itq_note.title', $keyword)->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
        }else{
            return $this->db->select('itq_note.id,itq_note.title, itq_note.is_right, itq_note.is_banner, itq_note.order, itq_category.title AS category, itq_note.image, itq_note.new, itq_note.description, itq_note.publish, itq_note.view, itq_note.userid-creat, itq_note.creattime, itq_note.userid-update, itq_note.updatetime')->from('itq_note')->join('itq_category', 'itq_category.id = itq_note.category-id','left')->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
        }
    }
    public function getNoteById($id){
        return $this->db->select('id,title,alias,route,category-id,image,description,content,meta-title,meta-keywords,meta-description')->where(array('id'=>$id))->from('itq_note')->get()->row_array();
    }
    public function updateNote($id,$arrayData){
        return $this->db->where(array('id'=>$id))->update('itq_note',$arrayData);
    }
    public function updatestatus($id,$key,$status){
        return $this->db->where(array('id'=>$id))->update('itq_note',array($key=>$status));
    }

    public function updateorderNote($id,$value){
        return $this->db->where(array('id'=>$id))->update('itq_note',array('order'=>$value));
    }

    public function getImageById($id){
        $result = $this->db->select('image')->where(array('id'=>$id))->from('itq_note')->get()->row_array();
        if( isset($result['image'])  &&  count($result['image'])){
            return $result['image'];
        }else{
            return'';
        }
    }
    public function deleteNote($id){
        return $this->db->where(array('id'=>$id))->delete('itq_note');
    }

//    frontend

    public function list_Note($start=0,$perpag=20,$field="id",$value="asc"){
        return $this->db->select('id,title,description,image')->where('publish','1')->from('itq_note')->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
    }
    public function get_Banner(){
        return $this->db->select('id, image,title')->where('itq_note.is_banner','1')->from('itq_note')->get()->result_array();
    }
    public function get_content_left($id){
        return $this->db->select('image,title,id')->where('is_right','1')->where('publish',1)->where('category-id',$id)->from('itq_note')->limit(5)->order_by("order", "asc")->get()->result_array();
    }
    public function list_note_bycategoryid($categoryid,$start=0,$perpag=20,$field="order",$value="asc"){
        return $this->db->select('id,title,description,image')->where('publish','1')->where('category-id',$categoryid)->from('itq_note')->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
    }
    public function getseobyid($id,$tag){
        return $this->db->select($tag)->where(array('id'=>$id))->from('itq_note')->get()->row_array();
    }
    public function get_category_by_id($id){
        return $this->db->select('category-id')->where(array('id'=>$id,))->from('itq_note')->get()->row_array();
    }
    public function getNotetById($id){
        return $this->db->select('id,title,category-id,description,content,userid-creat,image')->where(array('id'=>$id,'publish'=>1))->from('itq_note')->get()->row_array();
    }
    public function check_note_by_id($id){
        return $this->db->where(array('id'=>$id))->from('itq_note')->count_all_results();
    }
    public function get_product_like_title($keyword){
        return $this->db->select('id,title,image,description')->where('publish',1)->from('itq_product')->like('title', $keyword)->get()->result_array();
    }
}


