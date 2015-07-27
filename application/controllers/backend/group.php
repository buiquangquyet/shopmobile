<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class group extends MY_Controller{
    private $auth;

    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if ($this->auth == null) {
            $this->my_string->php_redirect('backend/auth/login');
        }
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->my_auth->allow($this->auth,$url);
    }

    public function addGroup(){
        $_post = $this->input->post();
        if($this->input->post('save')){
            $this->form_validation->set_rules('title', 'tên nhóm thành viên', 'required|callback_checkTitle');
            if ($this->form_validation->run() == true){
                $_post['group'] = implode($_post['group'],'.');
                $_post['usercreate'] =$this->auth['username'];
                $_post = $this->my_string->allow_post($_post,array('title','group','allow','usercreate'));
                if($this->Mitq_group->addGroup($_post)==false){
                    $this->my_string->js_redirect('Thành công',ITQ_BASE_URL.'backend/home/index');
                }else{
                    $this->my_string->js_redirect('không thành công',ITQ_BASE_URL.'backend/home/index');
                }
            }else{
                $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
            }
        }
        $data['_post']= $_post;
        $data['template']= 'backend/group/addgroup';
        $this->load->view('backend/layout/home',$data);
    }

//    public function listGroup($page=1){
//        if($page<=0)$page=1;
//        $sumrows= $this->Mitq_group->countAll();
//        $config=$this->my_common->backendPagination();
//        $config['total_rows']= $sumrows;
//        $config['base_url'] = 'backend/group/listgroup';
//
//        $start = ($page-1)*$config['per_page'];
//        $this->pagination->initialize($config);
//        $data['base_url']= base_url();
//        $data['listgroup'] =$listgroup = $this->Mitq_group->listGroup($start,$config['per_page']);
//        $data['template']= 'backend/group/listgroup';
//        $this->load->view('backend/layout/home',$data);
//    }
    public function listGroup2($page){
        if($page<=0)$page=1;
        $search = $this->input->get('txtsearch');
        $sort = $this->my_common->sort_orderby($this->input->get('sort_field'), $this->input->get('sort_value'));
        $config=$this->my_common->backendPagination();
        if(!empty($search)){
            $sumrows = $this->db->from('itq_group')->like('title', $search)->count_all_results();
        }else{
            $sumrows= $this->Mitq_group->countAll();
        }
        $config['total_rows']= $sumrows;
        $config['per_page']= 5;
        $config['base_url'] = 'backend/group/listgroup2';
        $config['suffix'] = ((isset($sort) && count($sort))?'?sort_field='.$sort['field'].'&sort_value='.$sort['value']:'');
        $config['suffix'] = $config['suffix'].((isset($search) && count($search))?'&txtsearch='.$search:'');

        $config['first_url'] = $config['base_url'].'//'.'1'.$config['suffix'];
        $start = ($page-1)*$config['per_page'];
        $this->pagination->initialize($config);
        $data['base_url']= base_url();
        $data['page']= $page;
        $data['sort']= $sort;
        $data['search']= $search;
        $data['listgroup'] =$listgroup = $this->Mitq_group->list_group($start,$config['per_page'],$sort['field'],$sort['value'],$search);
        $data['template']= 'backend/group/listgroup2';
        $this->load->view('backend/layout/home',$data);
    }

    public function edit($id){
        $_post = $this->input->post();
        $data['_post'] = $_post;
        $data['info'] = $info = $this->Mitq_group->getGroupById($id);
        if($this->input->post('edit')){
            $this->form_validation->set_rules('title', 'tên nhóm thành viên', 'required|callback_checkTitleEdit['.$info['title'].']');
            if ($this->form_validation->run() == true){
                $_post['group'] = implode('.',$_post['group']);
                $_post = $this->my_string->allow_post($_post,array('title','allow','group'));
                if($this->Mitq_group->EditGroupById($id,$_post) ==true){
                    $this->my_string->js_redirect('Cập nhật thành công',ITQ_BASE_URL.'backend/home/index');
                }else{
                    $this->my_string->js_redirect('Không thành công',ITQ_BASE_URL.'backend/home/index');
                }
            }else{
                $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
            }
        }


        $data['group'] = $group = explode('.',$info['group']);
        $data['template']= 'backend/group/edit';
        $this->load->view('backend/layout/home',$data);

    }

    public function delete($id){
        if($id==1){$this->my_string->js_redirect('Không đc phép xóa nhóm hệ thống',ITQ_BASE_URL.'backend/auth/logout');}
        if($id ==$this->auth['groupid']){$this->my_string->js_redirect('Không đc phép xóa nhóm của mình',ITQ_BASE_URL.'backend/auth/logout');}
        if($this->Mitq_group->deleteGroupByID($id) == true){
            $this->Mitq_user->deleteUsersByGroupID($id);
            $this->my_string->js_redirect('xóa thành công',ITQ_BASE_URL.'backend/group/listgroup2/1');
        }else{
            $this->my_string->js_redirect('xóa không thành công',ITQ_BASE_URL.'backend/home/index');
        }
    }




//-------------------validation-------------------
    public function checkTitle($title){
        if($this->Mitq_group->checkTitleExit($title)>0){
            $this ->form_validation->set_message('checkTitle', '%s đã bị trùng');
            return false;
        }else{
            return true;
        }
    }
    public function checkTitleEdit($title,$dataTitle){
        if($title == $dataTitle){
            return true;
        }else{
            if($this->Mitq_group->checkTitleExit($title)>0){
                $this ->form_validation->set_message('checkTitleExit', '%s đã bị trùng');
                return false;
            }else{
                return true;
            }
        }
    }


}