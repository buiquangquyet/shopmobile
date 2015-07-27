<?php
class Mitq_product_category extends CI_Model{
    public function insertProductCategory($id,$value){
        $data =array('product_id'=>$id,'category_id'=>$value);
        return $this->db->insert('itq_product_category',$data);
    }
    public function getProCatByid($product_id){
        return $this->db->where('product_id',$product_id)->from('itq_product_category')->get()->result_array();
    }
    public function delProductCategory($product_id){
        return $this->db->where(array('product_id'=>$product_id))->delete('itq_product_category');
    }

}