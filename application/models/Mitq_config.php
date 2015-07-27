<?php
class Mitq_config extends CI_Model{
    public function getstatusbykeywords($keywords,$val){
        return $this->db->select('value')->where(array($keywords=>$val))->from('itq_config')->get()->row_array();
    }
}