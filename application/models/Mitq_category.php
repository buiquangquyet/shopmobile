<?php
class Mitq_category extends CI_Model{
    public function __construt(){
        parent:: __construct();
    }
    public function getAllCategory(){
        return $this->db->select('id,title')->from('itq_category')->get()->result_array() ;
    }
    public function getAllCategoryProduct(){
        return $this->db->select('id,title,lft,level,type_category')->where(array('type_category'=>11))->from('itq_category')->order_by("lft asc")->get()->result_array() ;
    }
    public function getAllCategoryNote(){
        return $this->db->select('id,title,lft,level,type_category,alias,parentid')->where(array('type_category'=>22))->from('itq_category')->order_by("lft asc")->get()->result_array() ;
    }
    public  function getParentidById($id){
        return $this->db->select('parentid')->where(array('id'=>$id))->from('itq_category')->get()->row_array();
    }
    public function addCategoryLast($_post){
        $infoParent = $this->getCategoryById($_post['parentid']);
        $rgtParent = $infoParent['rgt'];
        $levelParent = $infoParent['level'];
        //update tree
        $sql = 'UPDATE itq_category SET rgt = rgt + 2 WHERE rgt >= '.$rgtParent;
        $this->db->query($sql);
        $this->db->query('UPDATE itq_category SET lft = lft + 2 WHERE lft > '. $rgtParent );
        $_post['lft']=$infoParent['rgt'];
        $_post['rgt']=$infoParent['rgt']+1;
        $_post['level']=$levelParent+1;
        return $this->db->insert('itq_category',$_post);
    }
    public function addCategoryFirst($_post){
        $infoParent = $this->getCategoryById($_post['parentid']);
        $lftParent = $infoParent['lft'];
        $levelParent = $infoParent['level'];

        //update tree
        $sql = 'UPDATE itq_category SET rgt = rgt + 2 WHERE lft >= '.$lftParent.' or lft = 0';
        $this->db->query($sql);
        $this->db->query('UPDATE itq_category SET lft = lft + 2 WHERE lft > '. $lftParent);

        $_post['lft']=$infoParent['lft']+1;
        $_post['rgt']=$infoParent['lft']+2;
        $_post['level']=$levelParent+1;
        return $this->db->insert('itq_category',$_post);
    }
    public function updateCategoryLast($id,$_post){
        $infoNodeMove = $this->getCategoryById($id);
        $leftMoveNode = $infoNodeMove['lft'];
        $rightMoveNode = $infoNodeMove['rgt'];
        $widthNode = $this->widthNode($id);

        $infoNodeParent = $this->getCategoryById($_post['parentid']);
        $leftNodeParent = $infoNodeParent['lft'];
        $rightNodeParent = $infoNodeParent['rgt'];

        if( $leftMoveNode < $leftNodeParent && $leftNodeParent < $rightMoveNode){
            echo 'error';
        }else{
            //update Node moved
            $sqlnodemove = "UPDATE itq_category SET lft = lft - $leftMoveNode, rgt = rgt - $rightMoveNode WHERE lft between $leftMoveNode and $rightMoveNode";
            $this->db->query($sqlnodemove);
            //reset tree
            //--reset tree left
            $sqlTreeleft = "UPDATE itq_category SET lft = lft - $widthNode WHERE lft > $rightMoveNode";
            $this->db->query($sqlTreeleft);
            //--reset tree right
            $sqlTreeright = "UPDATE itq_category SET rgt = rgt - $widthNode WHERE rgt > $rightMoveNode";
            $this->db->query($sqlTreeright);


            $infoNodeParent = $this->getCategoryById($_post['parentid']);
            $leftNodeParent = $infoNodeParent['lft'];
            $rightNodeParent = $infoNodeParent['rgt'];
            //reset tree
            $sqlTreeleft = "UPDATE itq_category SET lft=lft + $widthNode WHERE lft > $rightNodeParent and rgt > $rightNodeParent";
            $this->db->query($sqlTreeleft);
            $sqlTreeright = "UPDATE itq_category SET rgt=rgt + $widthNode WHERE rgt >= $rightNodeParent";
            $this->db->query($sqlTreeright);

            // update level for moveNode
            $levelMoveNode = $infoNodeMove['level'];
            $levelNodeParent = $infoNodeParent['level'];
            $newLevelMoveNode = $levelNodeParent +1;
            $slqUpdateLevel = 'UPDATE itq_category SET level = (level  -  ' . $levelMoveNode . ' + ' . $newLevelMoveNode . ') WHERE rgt <= 0';
            $this->db->query($slqUpdateLevel);

            //update move Node
            $slqUpdateNode = "UPDATE itq_category SET lft = $rightNodeParent, rgt = $rightNodeParent + $widthNode -1 WHERE id = $id";
            $this->db->query($slqUpdateNode);
            //update move node childrent
            $slqUpdateChildrent      = "UPDATE itq_category SET lft= lft + $rightNodeParent, rgt = rgt +$rightNodeParent + $widthNode -1 WHERE rgt < 0";
            $this->db->query($slqUpdateChildrent);
            return $this->db->where(array('id'=>$id))->update('itq_category',$_post);
        }
    }
    public function deleteCategory($id){
        $infoNodeParent = $this->getCategoryById($id);
        $widthNode = $this->widthNode($id);
        $leftRemove = $infoNodeParent['lft'];
        $rightRemove = $infoNodeParent['rgt'];
        $sqldel = "DELETE FROM itq_category WHERE lft>=$leftRemove and rgt <=$rightRemove";
        $this->db->query($sqldel);
        $sql = "UPDATE itq_category SET lft = lft - $widthNode WHERE lft > $rightRemove";
        $this->db->query($sql);
        $sql = "UPDATE itq_category SET rgt = rgt - $widthNode WHERE rgt > $rightRemove";
        return $this->db->query($sql);
    }

    public function widthNode($id){
        $infoNodeMove = $this->getCategoryById($id);
        $leftMoveNode = $infoNodeMove['lft'];
        $rightMoveNode = $infoNodeMove['rgt'];
        return $rightMoveNode - $leftMoveNode +1;
    }
    public function counTitle($title){
        return $this->db->where(array('title'=>$title))->from('itq_category')->count_all_results();
    }
    public function listCategory3(){
        return $this->db->from('itq_category')->order_by("lft", "asc")->get()->result_array();
    }
    public function listCategory2($perpag,$start){
        return $this->db->select('itq_category.id,itq_category.type_category,title,parentid,itq_user.fullname as usercreat, created,userid-updated,updated,is-home,is-right,is-grid,order,publish')->from('itq_category')->join('itq_user','itq_user.id = itq_category.userid-created','left')->limit($perpag, $start)->get()->result_array();
    }
    public function getIdbyParentID($parentid){
        return $this->db->select('title')->where(array('id'=>$parentid))->from('itq_category')->get()->row_array();
    }
    public function countAllCategory(){
        return $this->db->from('itq_category')->count_all_results();   
    }
    public function getCategoryById($id){
        return $this->db->where(array('id'=>$id))->from('itq_category')->get()->row_array() ;
    }
    public function updateCategoryByid($id,$arrayData){
        return $this->db->where(array('id'=>$id))->update('itq_category',$arrayData);
    }
    public function deleteCategoryByID($id=null){
        if($id !== null){
            return $this->db->where(array('id'=>$id))->delete('itq_category');
        }
    }
    public function updateIsHomeByid($id,$ishome){
        return $this->db->where(array('id'=>$id))->update('itq_category',array('is-home'=>$ishome));
    }
    public function updateIsGridByid($id,$status){
        return $this->db->where(array('id'=>$id))->update('itq_category',array('is-grid'=>$status));
    }
    public function updateIsRightByid($id,$status){
        return $this->db->where(array('id'=>$id))->update('itq_category',array('is-right'=>$status));
    }
    public function updatePublishByid($id,$status){
        return $this->db->where(array('id'=>$id))->update('itq_category',array('publish'=>$status));
    }
    public function updateMenuByid($id,$status){
        return $this->db->where(array('id'=>$id))->update('itq_category',array('is-menu'=>$status));
    }
    public function getUserUpdateById($userid_updated){
        return $this->db->select('itq_user.fullname')->where(array('id'=>$userid_updated))->from('itq_user')->get()->row_array();
    }
    public function updateOrder($id,$value){
        return $this->db->where(array('id'=>$id))->update('itq_category',array('order'=>$value));
    }
//frontend
    public function list_category(){
        return $this->db->select('id,title,parentid,type_category,alias,order')->where(array('publish'=>1))->from('itq_category')->order_by('order asc')->get()->result_array();
    }

    public function list_is_right(){
        return $this->db->select('id,title,type_category')->where(array('is-right'=>1))->from('itq_category')->get()->result_array();
    }
    public function get_Footer(){
        return $this->db->select('id,title')->where('id <',5)->where('id >',1)->from('itq_category')->get()->result_array();
    }
    public function getTitlebyid($id){
        return $this->db->select('title,route,id,type_category')->where(array('id'=>$id))->from('itq_category')->get()->row_array();
    }
    public function getseobyid($id,$val){
        return $this->db->select($val)->where(array('id'=>$id))->from('itq_category')->get()->row_array();
    }
    public function check_note_by_id($id){
        return $this->db->where(array('id'=>$id))->from('itq_category')->count_all_results();
    }




}