<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class type extends MY_Controller
{
    private $auth;
    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if($this->auth == null){$this->my_string->php_redirect('backend/auth/login');}
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->my_auth->allow($this->auth,$url);

    }
    public function addType(){
        $tile =trim($this->input->post('title'));
        if($this->input->post('submit')){
            $this->form_validation->set_rules('title','Thuộc tính','required|callback_checkTitlExit');
            if($this->form_validation->run() == true){
                if($this->Mitq_type->addType($tile)==true){
                    $this->my_string->js_redirect('Thêm thuộc tính thành công',ITQ_BASE_URL.'backend/type/listtype');
                }
            }else{
                $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
            }
        }
        $data['seo']['title']='Thêm thuộc tính sản phẩm';
        $data['template']= 'backend/type/addtype';
        $this->load->view('backend/layout/home',$data);
    }
    public function listType(){
        $listtype = $this->Mitq_type->getAllType();
        $data['listtype'] = $listtype;
        $data['seo']['title']='Thêm thuộc tính sản phẩm';
        $data['template']= 'backend/type/listtype';
        $this->load->view('backend/layout/home',$data);
    }
    public function editType($id){
        if($id==null)$this->my_string->php_redirect('backend/type/listtype');
        $infoType = $this->Mitq_type->getTypeByID($id);
        $tile =trim($this->input->post('title'));
        if($this->input->post('submit')){
            $this->form_validation->set_rules('title','Thuộc tính','required|callback_checkTitlEdit['.$infoType['title'].']');
            if($this->form_validation->run() == true){
                if($this->Mitq_type->updateType($id,array('title'=>$tile))==true){
                    $this->my_string->js_redirect('Thêm thuộc tính thành công',ITQ_BASE_URL.'backend/type/listtype');
                }
            }else{
                $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
            }
        }
        $data['infotype'] = $infoType;
        $data['seo']['title']='Sửa thuộc tính sản phẩm';
        $data['template']= 'backend/type/edittype';
        $this->load->view('backend/layout/home',$data);
    }
    public function deleteType($id){
        if($id==null)$this->my_string->php_redirect('backend/type/listtype');
        $this->Mitq_type->deletetype($id);
        $this->my_string->php_redirect('backend/type/listtype');
    }





//--------------validation--------------
    public function checkTitlExit($title){
        if($this->Mitq_type->countType($title)==0){
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
            if($this->Mitq_type->countType($title)==0){
                return true;
            }else{
                $this ->form_validation->set_message('checkTitlEdit', '%s đã tồn tại');
                return false;
            }
        }
    }
}