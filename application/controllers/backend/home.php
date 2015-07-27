<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends MY_Controller{
    private $auth;
    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if($user = $this->auth == null){$this->my_string->php_redirect('backend/auth/login');}
        $data['data']['fullname']=($this->auth['fullname']!=null)?$this->auth['fullname']:$this->auth['username'];
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
//        $this->my_auth->allow($this->auth,$url);
    }

    public function index(){
//        print_r($this->auth);
        $data['seo']['description']='Đăng Nhập Hệ Thống';
        $data['seo']['keyword']='Đăng Nhập Hệ Thống';
        $data['seo']['title']='Quản Trị Nội Dung Website';

        $data['template'] = 'backend/home/index';


        $this->load->view('backend/layout/home',isset($data)?$data:null);
    }


}