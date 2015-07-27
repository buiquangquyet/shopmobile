<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class banner extends MY_Controller
{
    private $auth;
    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if($this->auth == null){$this->my_string->php_redirect('backend/auth/login');}
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->my_auth->allow($this->auth,$url);
    }

    public function addbanner(){
        if($this->input->post('submit')) {
            $this->form_validation->set_rules('title','Tiêu đề Banner - slide ','required|callback_checkTitlExit');
            if($this->form_validation->run() == true){
                $data_post = $this->input->post();
                $data_post = $this->my_string->allow_post($data_post, array('title', 'image', 'link','division'));
                    if($this->Mitq_banner->insertBanner($data_post)==true){
                    $this->my_string->php_redirect('backend/banner/listbanner');
                }
            }else{
                $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
            }
        }
        $data['seo']['title']='Thêm banner - slide';
        $data['template']= 'backend/banner/addbanner';
        $this->load->view('backend/layout/home',$data);
    }
    public function listBanner(){
        $listBanner= $this->Mitq_banner->getAllBanner();
        $data['listBanner'] = $listBanner;
        $data['seo']['title']='Danh sách banner';
        $data['template']= 'backend/banner/listbanner';
        $this->load->view('backend/layout/home',$data);
    }
    public function editBanner($id){
        if($id==null)$this->my_string->php_redirect('backend/banner/listbanner');
        $infoType = $this->Mitq_banner->getBannerByID($id);
        if($this->input->post('submit')){
            $data_post = $this->input->post();
            $data_post = $this->my_string->allow_post($data_post, array('title', 'image', 'link','division'));
            $this->form_validation->set_rules('title','Tiêu đề','required|callback_checkTitlEdit['.$infoType['title'].']');
            if($this->form_validation->run() == true){
                $this->Mitq_banner->updateCustom($id,$data_post);
                $this->my_string->php_redirect('backend/banner/listbanner');
            }else{
                $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
            }
        }
        $data['infotype'] = $infoType;
        $data['seo']['title']='Sửa thuộc tính sản phẩm';
        $data['template']= 'backend/banner/editbanner';
        $this->load->view('backend/layout/home',$data);
    }

    public function deleteBanner($id){
        if($id==null)$this->my_string->php_redirect('backend/banner/listbanner');
        $this->Mitq_banner->deleteBanner($id);
        $this->my_string->php_redirect('backend/banner/listbanner');
    }



//--------------validation--------------
    public function checkTitlExit($title){
        if($this->Mitq_banner->countTitle($title)==0){
            return true;
        }else{
            $this ->form_validation->set_message('checkTitlExit', '%s đã tồn tại');
            return false;
        }
    }
    public function checkTitlEdit($title,$titledb){
        $title = trim($title);
        if($title == $titledb){
            return true;
        }else{
            if($this->Mitq_customs->countTitle($title)==0){
                return true;
            }else{
                $this ->form_validation->set_message('checkTitlEdit', '%s đã tồn tại');
                return false;
            }
        }
    }
}