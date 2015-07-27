<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('common_helper');
        $this->auth = $this->my_auth->check();

    }

    public function login(){
        if($this->auth != null){$this->my_string->php_redirect('backend');}
        $data['template']='backend/auth/login';
        $data['seo']['description']='Đăng Nhập Hệ Thống';
        $data['seo']['title']='Login';
        $data['seo']['keyword']='Đăng Nhập Hệ Thống';
        if( $this->input->post('login')){
            $_post = $this->input->post();
            $data['data']['_post']=$_post;
            $this->form_validation->set_rules('username', 'Tên đăng nhập', 'required|callback_username');
            $this->form_validation->set_rules('password', 'Mật Khẩu', 'required|callback_password['.$_post['username'].']');
            if ($this->form_validation->run() == FALSE){
                $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
            }else{
                //$user = $this->db->select('username,password,salt')->where(array('username'=>$_post['username']))->from('itq_user')->get()->row_array();
                $user = $this->Mitq_user->getrowUser($_post['username']);
                setcookie(ITQ_PREFIX.'_user_logged', $this->my_string->encode_cookie(json_encode($user)), time()+7*24*3600,'/');
                $this->Mitq_user->updateTimeLogin($_post['username']);
                $this->my_string->js_redirect('đăng nhập thành công',ITQ_BASE_URL.'backend/auth/login');
            }
        }
        $this->load->view('backend/layout/login',isset($data)?$data:null);
    }

    public function username($username){
        $count = $this->Mitq_user->countUser($username);
        if($count == 0 ){
            $this ->form_validation->set_message('username', '%s không tồn tại');
            return false;
        }else{
            return true;
        }
    }
    public function password($password,$username){
        if($this->username($username) == true){
            $user = $this->Mitq_user->getrowUser($username);
//            echo '<pre>';
//            print_r($user);
//            echo '</pre>';
//            echo $this->my_string->encode_password($password,$user['salt']);
            if($user['password']== $this->my_string->encode_password($username,$password,$user['salt'])){
                return true;
            }else{
                $this ->form_validation->set_message('password', '%s không hợp lê!');
                return false;
            }
        }
    }


    public function creat_manager(){
        $count = $this->db->from('itq_user')->count_all_results();
        if($count>=1){
            $this->my_string->php_redirect('backend/auth/login');
        }
        $data['template']='backend/auth/creat_manager';
        $data['seo']['description']='Tạo Tài Khoản Quản Trị';
        $data['seo']['title']='Tạo Tài Khoản Quản Trị';
        $data['seo']['keyword']='Tạo Tài Khoản Quản Trị';
        if( $this->input->post('register')){
            $_post = $this->input->post();
            $data['data']['_post']=$_post;

            $this->form_validation->set_rules('username', 'Tên đăng nhập', 'required');
            $this->form_validation->set_rules('password', 'Mật Khẩu', 'required');
            $this->form_validation->set_rules('email', 'Thư điện tử', 'required|valid_email');
            if ($this->form_validation->run() == true){
                $inputpost = $_post;
                $_post = $this->my_string->allow_post($inputpost,array('username','password','email'));

                $salt = $_post['salt']= $this->my_string->random(69,true);
                $password = $_post['pass']= $this->my_string->encode_password($_post['username'],$_post['password'],$salt);
                $_post['created'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
                echo '<pre>';
                print_r($_post);
                echo '</pre>';
                $this->Mitq_user->InsertUser($_post);
                $this->my_string->js_redirect('khởi tạo thành công',ITQ_BASE_URL.'backend/auth/login');
            }else{
                $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
            }
        }
        $this->load->view('backend/layout/login',isset($data)?$data:null);
    }


    public function logout(){
        if($this->auth == NULL) $this->my_string->php_redirect(ITQ_BASE_URL.'backend/home/index');
        setcookie(ITQ_PREFIX.'_user_logged', NULL, time()-3600, '/');
        setcookie(ITQ_PREFIX.'_folder', NULL, time()-3600, '/');
        $this->my_string->php_redirect('backend/home/index');
    }



    public function forgot(){
        //nếu như đã xác thực thì tự động login
        if($this->auth != NULL) $this->my_string->php_redirect('backend/home/index');
        //thực hiện
        $data['template']='backend/auth/forgot';
        $data['seo']['description']='Quên Mật Khẩu';
        $data['seo']['title']='Forgot';
        $data['seo']['keyword']='Lấy Lại Thông Tin Đăng Nhập Hệ Thống';
        $_post = $this->input->post();

        $data['data']['_post']=$_post;
        $this->form_validation->set_rules('email', 'Thư điện tử', 'required|valid_email|callback__email');
        $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
        if($this->form_validation->run() == TRUE){
            $_code = $this->my_string->random(69, TRUE);
            $_post = $this->my_string->allow_post($_post, array('email'));
            $_post['forgot_code']= $this->my_string->random(20,true);
            $_post['forgot_time']= time()+3600;
            $this->my_common->sentmail(array(
                'name' => 'ITQ CMS',
                'from' => 'kun.manage@gmail.com',
                'password' => 'ospwfsalemyyzppx',
                'to' => $_post['email'],
                'subject' => 'Mã xác nhận cho Email '.$_post['email'],
                'message' => 'Click vào link dưới để nhận lại mật khẩu mới: '.ITQ_BASE_URL.'backend/auth/reset/?email='.urlencode($_post['email']).'&code='.urlencode($_post['forgot_code']),
            ));
            $this->Mitq_user->updateInfoForgot($_post['email'],$_post['forgot_code'],$_post['forgot_time']);
        }

        $this->load->view('backend/layout/login',isset($data)?$data:null);
    }

    public function reset(){
        $data['seo']['description']='Quên Mật Khẩu';
        $data['seo']['title']='reset';
        $data['seo']['keyword']='Lấy Lại Thông Tin Đăng Nhập Hệ Thống';
        $data['template']='backend/auth/reset';
        $this->load->view('backend/layout/login',$data);
        $email_forgot = $this->input->get('email');
        $code_forgot = $this->input->get('code');
        $user = $this->Mitq_user->getInfoByEmailCode($email_forgot,$code_forgot);
        if($user['forgot_time']>time()){
            echo $passnew = $this->my_string->random(6,TRUE);
            echo '<pre>';
            print_r($user);
            echo '</pre>';
            echo $_post['password'] = $this->my_string->encode_password($user['username'], $passnew, $user['salt']);

            $time = gmdate('Y-m-d H:i:s', time());
            $this->Mitq_user->updatepassword($user['username'],$_post['password'],$time);
        }else{
            $this->my_string->js_redirect('quá thời gian',ITQ_BASE_URL.'backend/auth/login');
        }
    }








//-----------------validation-------------------
    public function _email($email){
        $count = $this->Mitq_user->checkEmail($email);
        if($count == 0){
            $this->form_validation->set_message('_email', '%s không tồn tại');
            return FALSE;
        }
        return TRUE;
    }

}