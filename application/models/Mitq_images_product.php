<?php
class Mitq_images_product extends CI_Model{
    public function __construt(){
        parent:: __construct();
    }
    public function addImages($productid,$url){
        $data = array('product-id' => $productid,'url' => $url);
        $this->db->insert('itq_images_product', $data);
    }
    public function getImagesById($productid){
       return $this->db->select('*')->where(array('product-id'=>$productid))->from('itq_images_product')->get()->result_array();
    }
    public function getImgae($id){
        return $this->db->select('*')->where(array('id'=>$id))->from('itq_images_product')->get()->row_array();
    }
    public function deleteImage($id){
        return $this->db->where(array('id'=>$id))->delete('itq_images_product');
    }
    public function deleteImagebyProductid($productid){
        return $this->db->where(array('product-id'=>$productid))->delete('itq_images_product');
    }


    public function Get_All_Images_Of_Product($id){
        return $this->db->select('url')->where('product-id',$id)->from('itq_images_product')->get()->result_array();
    }
}