<?php
class model_frontend extends CI_Model{
    public function getMenu(){
        return $this->db->select('id,title,alias,order,publish,is-menu,type_category')->from('itq_category')->where(array('is-menu'=>1,'publish'=>1))->order_by("order", "asc")->get()->result_array();
    }
    public function getProduct($key,$value,$limit=3){
        return $this->db->select('id,title,alias,image,order,publish,buy-best')->from('itq_product')->where(array($key=>$value,'publish'=>1))->order_by("order", "asc")->limit($limit, 0)->get()->result_array();
    }
    public function getCategory($key,$value){
        return $this->db->select('*')->from('itq_category')->where(array($key=>$value,'publish'=>1))->order_by("order", "asc")->get()->result_array();
    }
    public function getProductByCatIDShowHome($catId,$perpag=4,$start=0){
        return $this->db->select('itq_product.id, itq_product.title, itq_product.alias, itq_product.price, itq_product.priceold, itq_product.order, itq_product.image, itq_product.publish')->from('itq_product_category')->join('itq_product','itq_product_category.product_id = itq_product.id')->where(array('itq_product_category.category_id'=>$catId))->limit($perpag, $start)->order_by("order", "asc")->get()->result_array();
    }
    public function getCategoryRight(){
        $mock =  $this->db->select('id,title,lft,rgt')->where(array('id'=>10))->from('itq_category')->get()->row_array();
        $leftMock = $mock['lft'];
        $rightMock = $mock['rgt'];
        $menu =  $this->db->select('id,title,lft,rgt,alias,parentid,type_category,publish')->where(array('lft > '=>$leftMock,'rgt < '=>$rightMock,'publish'=>1))->from('itq_category')->get()->result_array();
        $menu = $this->my_string->CreateLinkCat($menu);
        return $menu;
    }
    public function getListProductByCatID($catId,$perpag=10,$start=0){
        return $this->db->select('itq_product.id,itq_product.description, itq_product.title, itq_product.alias, itq_product.price, itq_product.priceold, itq_product.order, itq_product.image, itq_product.publish')->from('itq_product_category')->join('itq_product','itq_product_category.product_id = itq_product.id')->where(array('itq_product_category.category_id'=>$catId,'itq_product.publish'=>1))->limit($perpag,$start)->order_by("order", "asc")->get()->result_array();
    }
    public function getCategoryByID($id){
        return $this->db->select('id,title,parentid,type_category,alias,order,meta-title,meta-keywords,meta-description')->where(array('publish'=>1,'id'=>$id))->from('itq_category')->order_by('order asc')->get()->row_array();
    }
    public function getListNoteByCatID($catId,$perpag=10,$start=0){
        return $this->db->select('*')->from('itq_note_category')->join('itq_note','itq_note_category.note_id = itq_note.id')->where(array('itq_note_category.category_id'=>$catId,'itq_note.publish'=>1))->limit($perpag, $start)->order_by("order", "asc")->get()->result_array();
    }
    public function getListNote($id){
        $listNote =  $this->db->select('id,title,alias,publish,category-id')->from('itq_note')->where(array('category-id'=>$id,'publish'=>1))->limit(20, 0)->order_by("order", "asc")->get()->result_array();
        foreach($listNote as $key=>$value){
            $listNote[$key]['link'] = 'tin-tuc/'.$value['alias'].'/'.$value['id'].'.html';
        }
        return $listNote;
    }
    public function list_category($type){
        return $this->db->select('id,title,alias,order,publish,is-right,type_category,parentid')->from('itq_category')->where(array('publish'=>1,'type_category'=>$type))->order_by("order", "asc")->limit(20, 0)->get()->result_array();
    }
    public function getTitleCate($id){
        $result = $this->db->select('title')->from('itq_category')->where(array('publish'=>1,'id'=>$id))->get()->row_array();
        return$result['title'];
    }
    public function getMainMenu(){
        $result = $this->db->select("*")->from('itq_category')->where(array('publish'=>1))->get()->result_array();
        foreach($result as $key=>$value){
            $result[$key]['url']=$value['alias'].'-'.$value['type_category'].'-'.$value['id'].'.html';
        }
        return $result;
    }
    public function getBannerbyid($id){
        return $this->db->from('itq_banner')->where(array('division'=>$id))->get()->result_array();
    }

    //



    public function getProductShowHome($perpag=4,$start=0){
        return $this->db->select('itq_product.id, itq_product.title,itq_product.description, itq_product.alias, itq_product.price, itq_product.order, itq_product.image, itq_product.publish')->from('itq_product')->where(array('publish'=>1))->limit($perpag, $start)->order_by("order", "asc")->get()->result_array();
    }
    public function getCategoryPublic(){
        return $this->db->select('id,title,alias,order,publish,is-home,type_category')->from('itq_category')->where(array('is-home'=>1,'publish'=>1))->order_by("order", "asc")->get()->result_array();
    }
    public function getNoteByCatIDShowHome($catId,$perpag=8,$start=0){
        return $this->db->select('itq_note.id, itq_note.alias, itq_note.title, itq_note.description, itq_note.`order`,itq_note.creattime,itq_note.image')->from('itq_note_category')->join('itq_note','itq_note_category.note_id = itq_note.id')->where(array('itq_note_category.category_id'=>$catId))->limit($perpag, $start)->order_by("order", "asc")->get()->result_array();
    }
    public function getCategoryMenu(){
        return $this->db->select('id,title,alias,order,publish,is-right,type_category')->from('itq_category')->where(array('is-right'=>1,'publish'=>1,'type_category'=>11))->order_by("order", "asc")->limit(10, 0)->get()->result_array();
    }
    public function getValueConfig($keyword,$value){
        $info =  $this->db->select('value')->from('itq_config')->where(array($keyword=>$value))->get()->row_array();
        return $info['value'];
    }


    public function OnegetListProductByCatId($catId,$perpag=4,$start=0){
        return $this->db->select('itq_product.id,itq_product.description, itq_product.title, itq_product.alias, itq_product.price, itq_product.priceold, itq_product.order, itq_product.image, itq_product.publish,creattime')->from('itq_product')->where(array('itq_product.categoryid'=>$catId,'itq_product.publish'=>1))->limit($perpag, $start)->order_by("order", "asc")->get()->result_array();
    }

    public function getSeoProductId($table,$id,$fiel,$value){
        $info =  $this->db->select($value)->from($table)->where(array('id'=>$id))->get()->row_array();
        return $info[$fiel];
    }

    public function get_product_like_title($keyword,$priceMin,$priceMax,$start,$perpag){
        return $this->db->select('id,title,alias,image,price,publish')->where(array('publish'=>1,'price >= '=>$priceMin,'price <= '=>$priceMax))->from('itq_product')->like('itq_product.title', $keyword)->limit($perpag, $start)->get()->result_array();
    }
    public function count_product_like_title($keyword,$priceMin,$priceMax){
        return $this->db->select('id,title,image,price,publish')->where(array('publish'=>1,'price >= '=>$priceMin,'price <= '=>$priceMax))->from('itq_product')->like('itq_product.title', $keyword)->count_all_results();
    }
    public function findTitle($id){
        $info =  $this->db->select('title')->from('itq_product')->where(array('id'=>$id))->get()->row_array();
        return $info['title'];
    }
    public function countViewProduct($id){
        $result = $this->db->where(array('id'=>$id))->from('itq_product')->get()->row_array();
        return $result['view'];
    }

    public function listCustom(){
        return $this->db->from('itq_customs')->where(array())->get()->result_array();
    }
    public function detail_note($id){
        return $this->db->from('itq_note')->where(array('publish'=>1,'category-id'=>$id))->get()->row_array();
    }
    public function findTypeCats($id){
        $result = $this->db->from('itq_category')->where(array('publish'=>1,'id'=>$id))->get()->row_array();
        return $result['type_category'];
    }
    public function getlinkicon($key,$value){
        $result = $this->db->from('itq_config')->where(array($key=>$value))->get()->row_array();
        return $result['value'];
    }
}