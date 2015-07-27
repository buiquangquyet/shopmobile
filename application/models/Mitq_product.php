<?php
class Mitq_product extends CI_Model{
    public function __construt(){
        parent:: __construct();
    }
    public function countTitle($title){
    	return $this->db->where(array('title'=>$title))->from('itq_product')->count_all_results();
    }
    public function addProduct($_post){
        return $this->db->insert('itq_product',$_post);
    }
    public function getAllProduct(){
        return $this->db->select('*')->from('itq_product')->get()->result_array() ;
    }
    public function listProduct($start,$perpag,$field="id",$value="asc",$keyword=""){
        if(!empty($keyword)){
            return $this->db->select('itq_product.id,itq_product.title, itq_product.order, itq_category.title AS category, itq_product.type-id, itq_product.is_banner, itq_product.is_right ,itq_product.color, itq_product.price, itq_product.priceold, itq_product.image, itq_product.buy-best, itq_product.new, itq_product.description, itq_product.publish, itq_product.view, itq_product.userid-created, itq_product.creattime, itq_product.userid-update, itq_product.updatetime')->from('itq_product')->join('itq_category', 'itq_category.id = itq_product.categoryid','left')->like('itq_product.title', $keyword)->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
        }else{
            return $this->db->select('itq_product.id,itq_product.title, itq_product.order ,itq_category.title AS category, itq_product.type-id, itq_product.is_banner, itq_product.is_right, itq_product.color, itq_product.price, itq_product.priceold, itq_product.image, itq_product.buy-best, itq_product.new, itq_product.description, itq_product.publish, itq_product.view, itq_product.userid-created, itq_product.creattime, itq_product.userid-update, itq_product.updatetime')->from('itq_product')->join('itq_category', 'itq_category.id = itq_product.categoryid','left')->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
        }
    }
    public function updatestatus($id,$key,$status){
        $this->db->where(array('id'=>$id))->update('itq_product',array($key=>$status));
    }
    public function getProductById($id){
       return $this->db->select('id,title,categoryid,alias,route,categoryid,price,priceold,type-id,color,image,description,content,meta-title,meta-keywords,meta-description')->where(array('id'=>$id))->from('itq_product')->get()->row_array();
    }

    public function updateProduct($id,$arrayData){
        return $this->db->where(array('id'=>$id))->update('itq_product',$arrayData);
    }
    public function counTitle($title){
        return $this->db->where(array('title'=>$title))->from('itq_product')->count_all_results();
    }
    public function deleteproduct($id){
        return $this->db->where(array('id'=>$id))->delete('itq_product');
    }
    public function updateorderProduct($id,$value){
        return $this->db->where(array('id'=>$id))->update('itq_product',array('order'=>$value));
    }
    public function getImageById($id){
        $result = $this->db->select('image')->where(array('id'=>$id))->from('itq_product')->get()->row_array();
        if( isset($result['image'])  &&  count($result['image'])){
            return $result['image'];
        }else{
            return'';
        }
    }
    public function getValueById($key,$id){
        $result = $this->db->select($key)->where(array('id' => $id ))->from('itq_product')->get()->row_array();
        return $result['publish'];
    }

//    frontend
    public function list_product($start=0,$perpag=20,$field="id",$value="asc"){
        return $this->db->select('itq_product.id,itq_product.title, itq_product.type-id, itq_product.order, itq_product.color, itq_product.price, itq_product.priceold, itq_product.image, itq_product.buy-best, itq_product.new, itq_product.description, itq_product.publish, itq_product.view')->where('publish','1')->from('itq_product')->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
    }
    public function get_Banner(){
        return $this->db->select('id, image,title')->where('itq_product.is_banner','1')->from('itq_product')->get()->result_array();
    }
    public function get_content_left($id){
        return $this->db->select('image,title,id')->where('is_right','1')->where('publish',1)->where('categoryid',$id)->from('itq_product')->limit(5)->order_by("order", "asc")->get()->result_array();
    }
    public function getseobyid($id,$tag){
        return $this->db->select($tag)->where(array('id'=>$id))->from('itq_product')->get()->row_array();
    }
    public function getProductByParentid($id){
        return $this->db->select('id,title,categoryid,price,priceold,image,buy-best,new')->where(array('categoryid'=>$id,'publish'=>1))->from('itq_product')->get()->result_array();
    }
    public function list_product_bycategoryid($categoryid,$start=0,$perpag=20,$field="id",$value="asc"){
        return $this->db->select('itq_product.id,itq_product.title, itq_product.type-id, itq_product.order, itq_product.color, itq_product.price, itq_product.priceold, itq_product.image, itq_product.buy-best, itq_product.new, itq_product.description, itq_product.publish, itq_product.view')->where('publish','1')->where('categoryid',$categoryid)->from('itq_product')->limit($perpag, $start)->order_by($field.' '.$value)->get()->result_array();
    }
    public function get_category_by_id($id){
        return $this->db->select('categoryid')->where(array('id'=>$id,))->from('itq_product')->get()->row_array();
    }
    public function count_id($id){
        return $this->db->where(array('id'=>$id))->from('itq_product')->count_all_results();
    }
    public function check_note_by_id($id){
        return $this->db->where(array('id'=>$id))->from('itq_product')->count_all_results();
    }
    public function get_Title_Byid($id){
        return $this->db->select('title')->where(array('id'=>$id,'publish'=>1))->from('itq_product')->get()->row_array();
    }
    public function get_product_by_id($id){
        $result = $this->db->where(array('id'=>$id))->from('itq_product')->get()->row_array();
        if(isset($result)  &&  count($result)){
            return $result;
        }else{
            return '';
        }
    }

}