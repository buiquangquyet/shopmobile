<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends MY_Controller
{
    private $auth;
    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if($this->auth == null){$this->my_string->php_redirect('backend/auth/login');}
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->my_auth->allow($this->auth,$url);

    }

    public function listContact(){
        $listContact= $this->Mitq_contact->getAllContact();
        $data['listContact'] = $listContact;
        $data['seo']['title']='Danh sách ý kiến đóng góp';
        $data['template']= 'backend/contact/listcontact';
        $this->load->view('backend/layout/home',$data);
    }

    public function deleteContact($id){
        if($id==null)$this->my_string->php_redirect('backend/contact/listcontact');
        $this->Mitq_contact->deletecontact($id);
        $this->my_string->php_redirect('backend/contact/listcontact');
    }
}