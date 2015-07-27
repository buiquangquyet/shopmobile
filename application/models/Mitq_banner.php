<?php
class Mitq_banner extends CI_Model{
    public function __construt(){
        parent:: __construct();
    }
    public function insertBanner($_post){
        return $this->db->insert('itq_banner',$_post);
    }
    public function countTitle($title){
        return $this->db->where(array('title'=>$title))->from('itq_banner')->count_all_results();
    }
    public function getAllBanner(){
        return $this->db->from('itq_banner')->get()->result_array();
    }
    public function updateCustom($id,$arrayData){
        return $this->db->where(array('id'=>$id))->update('itq_banner',$arrayData);
    }
    public function getBannerByID($id){
        return $this->db->where(array('id'=>$id))->from('itq_banner')->get()->row_array();
    }
    public function deleteBanner($id){
        return $this->db->where(array('id'=>$id))->delete('itq_banner');
    }


}