<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class my_auth{
    private $CI;

    public function __construct(){
        $this->CI =& get_instance();
    }

    public function check(){
        if(isset($_COOKIE[ITQ_PREFIX.'_user_logged']) && !empty($_COOKIE[ITQ_PREFIX.'_user_logged'])){
            $cookie = $_COOKIE[ITQ_PREFIX.'_user_logged'];
            $cookie = json_decode($this->CI->my_string->decode_cookie($cookie),true);
            $user = $this->CI->Mitq_user->getrowUser($cookie['username']);
            $groupid = $this->CI->Mitq_user->getGroupIdById($user['id']);
            $group = $this->CI->Mitq_group->getGroupById($groupid['groupid']);
            $group['group'] = explode('.',$group['group']);
            if(isset($user) && count($user)){
                if($cookie['username'] == $user['username'] && $cookie['password']== $user['password'] && $cookie['salt']== $user['salt']){
                    setcookie(ITQ_PREFIX.'_user_logged', $this->CI->my_string->encode_cookie(json_encode(array(
                        'username' => $user['username'],
                        'password' => $user['password'],
                        'salt' => $user['salt'],
                    ))), time()+7*24*3600, '/');
                    return array(
                        'id'=>$user['id'],
                        'username'=>$user['username'],
                        'email'=>$user['email'],
                        'fullname'=>$user['fullname'],
                        'groupid'=>$group['id'],
                        'groupAllow'=>$group['group'],
                        'allow'=>$group['allow'],
                    );
                }
            }
        }
        return null;
    }
    public function allow($auth, $url){
        // Cho phép
        if($auth['allow'] == 1){
            if(!isset($auth['groupAllow']) && count($auth['groupAllow']) == 0){
                $this->CI->my_string->js_redirect('Không đủ quyền truy cập!', ITQ_BASE_URL.'backend/home/index');
            }
            if(in_array($url, $auth['groupAllow']) == FALSE){
                $this->CI->my_string->js_redirect('Không đủ quyền truy cập!', ITQ_BASE_URL.'backend/home/index');
            }
        }
        // Không cho phép
        else if($auth['allow'] == 0){
            if(isset($auth['groupAllow']) && count($auth['groupAllow']) && in_array($url, $auth['groupAllow']) == TRUE){
                $this->CI->my_string->js_redirect('Không đủ quyền truy cập!', ITQ_BASE_URL.'backend/home/index');
            }
        }
    }

//    public function check(){
//        if(isset($_COOKIE[ITQ_PREFIX.'_user_logged']) && !empty($_COOKIE[ITQ_PREFIX.'_user_logged'])){
//            $cookie = $_COOKIE[ITQ_PREFIX.'_user_logged'];
//            $_cookie = $cookie;
//            $cookie = json_decode($this->CI->my_string->decode_cookie($cookie), TRUE);
//            $user = $this->CI->db->select('id, username, password, salt, email, fullname, groupid')->where(array('username' => $cookie['username']))->from('user')->get()->row_array();
//            if(isset($user) && count($user)){
//                $group = $this->CI->db->select('title, allow, group')->where(array('id' => $user['groupid']))->from('user_group')->get()->row_array();
//                if($cookie['username'] == $user['username'] && $cookie['password'] == $user['password'] && $cookie['salt'] == $user['salt']){
//                    setcookie(ITQ_PREFIX.'_user_logged', $_cookie, time()+7*24*3600, '/');
//                    setcookie(ITQ_PREFIX.'_folder', $this->CI->my_string->encode_folder($user['username']), time()+7*24*3600, '/');
//                    return array(
//                        'id' => $user['id'],
//                        'username' => $user['username'],
//                        'email' => $user['email'],
//                        'fullname' => $user['fullname'],
//                        'group_allow' => $group['allow'],
//                        'group_title' => $group['title'],
//                        'group_content' => $this->CI->my_string->trim_array(explode("\n", $group['group'])),
//                    );
//                }
//            }
//        }
//        return NULL;
//    }




}