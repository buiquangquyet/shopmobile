<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account extends MY_Controller
{
    private $auth;
    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if($this->auth == null){$this->my_string->php_redirect('backend/auth/login');}
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->my_auth->allow($this->auth,$url);

    }
    public function index(){

    }
    public function changeInfoUser(){
        $data['seo']['description']='Đổi thông tin tài khoản';
        $data['seo']['keyword']='Đổi thông tin tài khoản';
        $data['seo']['title']='Đổi thông tin tài khoản';
        $data['template'] = 'backend/account/changeinfouser';

        $data['data']= $this->auth;

        if($this->input->post('editinfo')){

            $user = $this->input->post();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_Emailexit');
            if($this->form_validation->run() == true){
                if($this->Mitq_user->updateInfoUser($this->auth['username'],$user['email'],$user['fullname'])==false){
                    $this->my_string->js_redirect('thay đổi thành công',ITQ_BASE_URL.'backend/home/index');
                }else{
                    $this->my_string->js_redirect('Rất tiếc không cập nhật đc',ITQ_BASE_URL.'backend/home/index');
                }

            }
        }
        $this->load->view('backend/layout/home',isset($data)?$data:null);
    }


    public function changePassUser(){
        $data['seo']['description']='Đổi password tài khoản';
        $data['seo']['keyword']='Đổi mật khẩu tài khoản';
        $data['seo']['title']='Đổi mật khẩu tài khoản';
        $data['template'] = 'backend/account/changepassuser';

        $data['data']= $this->auth;

        if($this->input->post('editpass')){
            $salt = $this->Mitq_user->getSaltByUsername($this->auth['username'])['salt'];
            $this->form_validation->set_rules('oldpass', 'Mật khẩu hiện tại', "required|min_length[6]|callback_checkPasswordByUser[$salt]");
            $this->form_validation->set_rules('newpass', 'Mật khẩu mới', 'required|min_length[6]|');
            $this->form_validation->set_rules('passauth', 'Mật khẩu xác thực', 'required|min_length[6]|callback_checkPassNewAsPassAuth['.$this->input->post('newpass').']');
            if($this->form_validation->run() == true){
                $enpassnew= $this->my_string->encode_password($this->auth['username'],$this->input->post('newpass'),$salt);
                $time = gmdate('Y-m-d H:i:s', time());
                if($this->Mitq_user->updatepassword($this->auth['username'],$enpassnew,$time)==false){
                    $this->my_string->js_redirect('thay đổi mật khẩu thành công',ITQ_BASE_URL.'backend/home/index');
                }else{
                    $this->my_string->js_redirect('Rất tiếc không cập nhật đc mật khẩu mới',ITQ_BASE_URL.'backend/home/index');
                }
            }
        }
        $this->load->view('backend/layout/home',isset($data)?$data:null);
    }

    public function checkPasswordByUser($password,$salt){
        if($this->Mitq_user->checkUserPasswordExit($this->auth['username'],$password,$salt)== true){
            return true;
        }else{
            $this->form_validation->set_message('checkPasswordByUser',"%s không đúng");//
            return false;
        }
    }
    public function checkPassNewAsPassAuth($newpass,$passauth){
        if($newpass===$passauth){
            return true;
        }else{
            $this->form_validation->set_message('checkPassNewAsPassAuth',"%s không đúng");//
            return false;
        }

    }
    public function Emailexit($email){
        if($email == $this->auth['email']){
            return true;
        }else{
            if($this->Mitq_user->checkEmail($email)>=1){
                return false;
                $this->form_validation->set_message('Emailexit',"%s Email đã được sử dụng");//
            }else{
                return true;
            }
        }
    }
}