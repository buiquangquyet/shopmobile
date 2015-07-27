<?php
class Mitq_user extends CI_Model{
    public function __construt(){
        parent:: __construct();
    }
    public function InsertUser($myArr){
        $data = array(
            'username'=>$myArr['username'],
            'password'=>$myArr['pass'],
            'email'=>$myArr['email'],
            'salt'=>$myArr['salt'],
        );
        $this->db->insert('itq_user',$data);
    }
    Public function insertUserData($myArr){
        $data = array(
            'username'=>$myArr['username'],
            'password'=>$myArr['password'],
            'email'=>$myArr['email'],
            'salt'=>$myArr['salt'],
            'fullname'=>$myArr['fullname'],
            'groupid'=>$myArr['group'],
            'usercreat'=>$myArr['usercreat'],
        );
        $this->db->insert('itq_user',$data);
    }

    public function updateUserByid($id,$arrayData){
        $this->db->where(array('id'=>$id))->update('itq_user',$arrayData);
    }
    public function countUser($username){
        return $this->db->where(array('username'=>$username))->from('itq_user')->count_all_results();
    }
    public function countUsers(){
        return $this->db->count_all('itq_user');
    }

    public function getSaltByUsername($username){
        return $this->db->select('salt')->where(array('username' => $username))->from('itq_user')->get()->row_array();
    }
    public function getInfoById($id){
        return $this->db->select('id,username, email, fullname,groupid')->where(array('id' => $id))->from('itq_user')->get()->row_array();
    }

    public function checkUserPasswordExit($username,$password,$salt){
        $encodepass = $this->my_string->encode_password($username,$password,$salt);
        if( $this->db->where(array('username'=>$username,'password'=>$encodepass))->from('itq_user')->count_all_results()>=1){
            return true;
        }else{
            return false;
        }
    }
    public function deleteUserById($id){
        $this->db->where(array('id'=>$id))->delete('itq_user');
    }

    public function getrowUser($username){
        return $this->db->select('id, username, password, salt, email, fullname, groupid')->where(array('username' => $username))->from('itq_user')->get()->row_array();
    }
    public function updateTimeLogin($username){
        $this->db->where(array('username'=>$username))->update('itq_user',array('logintime' => gmdate('Y-m-d H:i:s', time() + 7*3600), 'iploggin' => $_SERVER['SERVER_ADDR']));
    }

    public function checkEmail($email){
        return $this->db->from('itq_user')->where(array('email' => $email))->count_all_results();
    }

    public function updateInfoForgot($email,$forgot_code,$forgot_time){
        $this->db->where(array('email'=>$email))->update('itq_user',array('forgot_code' => $forgot_code, 'forgot_time' => $forgot_time));
    }
    public function updateInfoUser($username,$email,$fullname){
        $this->db->where(array('username'=>$username))->update('itq_user',array('email' => $email, 'fullname' => $fullname));
    }
    public function getInfoByEmailCode($email_forgot,$code_forgot){
        return $this->db->select('*')->where(array('email' => $email_forgot,'forgot_code'=>$code_forgot))->from('itq_user')->get()->row_array();
    }
    public function updatepassword($username,$password,$time){
        $this->db->where(array('username'=>$username))->update('itq_user',array('password' => $password,'updatetime'=>$time,'forgot_code'=>"", 'forgot_time'=>''));
    }
    public function listUser($start=0,$total=10,$like=null){
        return $this->db->query("SELECT itq_user.id, itq_user.creattime, itq_user.updatetime,itq_user.fullname, itq_user.email, itq_user.usercreat, itq_user.username, itq_group.title FROM itq_user LEFT JOIN itq_group ON itq_user.groupid=itq_group.id WHERE itq_user.fullname LIKE '%".$like."%' LIMIT $start,$total ;")->result_array();
    }
    public function getGroupIdById($id){
        return $this->db->select('groupid')->where(array('id'=>$id))->from('itq_user')->get()->row_array();
    }
    public function deleteUsersByGroupID($id=null){
        $this->db->where(array('groupid'=>$id))->delete('itq_user');
    }

    public function getUserById($id){
        $result = $this->db->select('itq_user.fullname')->where(array('id'=>$id))->from('itq_user')->get()->row_array();
        if( isset($result['fullname'])  &&  count($result['fullname'])){
            return $result['fullname'];
        }else{
            return'';
        }
    }
//    frontend
    public function get_FullName_By_Id($id){
        return  $this->db->select('fullname')->where(array('id'=>$id))->from('itq_user')->get()->row_array();
    }

}