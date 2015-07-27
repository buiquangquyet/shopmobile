<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category extends MY_Controller{
    private $auth;
    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if($user = $this->auth == null){$this->my_string->php_redirect('backend/auth/login');}
        $data['data']['fullname']=($this->auth['fullname']!=null)?$this->auth['fullname']:$this->auth['username'];
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->my_auth->allow($this->auth,$url);
    }

    public function addCategory(){
        $this->form_validation->set_rules('title', 'Tiêu đề chuyên mục', 'required|callback_checkTitleExit');
        if ($this->form_validation->run() == true){
            if($this->input->post('submit')){
                $infoData = $this->input->post();
                $style = $infoData['style'];
                $infoData['alias']=$this->my_string->removeutf8($infoData['title']);
                $infoData['alias']=$this->my_string->alias($infoData['alias']);
                $infoData['route']=$infoData['alias'];
                $infoData = $this->my_string->allow_post($infoData,array('title','alias','route','parentid','type_category','image','description','meta-title','meta-keywords','meta-description','source'));
                $userData = $this->auth;
                $infoData['userid-created'] = $userData['id'];
                if($style==1){
                    if($this->Mitq_category->addCategoryLast($infoData)==true){
                        $this->my_string->js_redirect('thêm thành công',ITQ_BASE_URL.'backend/category/listcategory');
                    };
                }else{
                    if($this->Mitq_category->addCategoryFirst($infoData)==true){
                        $this->my_string->js_redirect('thêm thành công',ITQ_BASE_URL.'backend/category/listcategory');
                    };
                }
            }
        }else{
            $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
        }
        $data['seo']['title']= 'Thêm danh mục';
        $listcategory = $this->Mitq_category->listCategory3();
        foreach ($listcategory as $key=>$value){
            $listcategory[$key]['title']= str_repeat('|------',$value['level']).$value['title'];
            if($value['type_category']==11){$listcategory[$key]['type_category']='sản phẩm';}
            if($value['type_category']==22){$listcategory[$key]['type_category']='Tin tức';}
            if($value['type_category']==0){$listcategory[$key]['type_category']='';}
        }
        $data['listcategory'] = $listcategory;
        $listtype = $this->db->select('id,title')->from('itq_type_category')->get()->result_array();
        $data['listtype'] = $listtype;
        $data['template'] = 'backend/category/addcategory';
        $this->load->view('backend/layout/home',isset($data)?$data:null);
    }


    public function editCategory($id){
        $infocategory = $this->Mitq_category->getCategoryById($id);

        if($this->input->post('submit')){
            $this->form_validation->set_rules('title', 'Tiêu đề chuyên mục', 'required|callback_checkTitleEdit['.$infocategory['title'].']');
            if ($this->form_validation->run() == true){
                $info = $this->input->post();
                $style = $info['style'];
                $info['alias']=$this->my_string->removeutf8($info['title']);
                $info['alias']=$this->my_string->alias($info['alias']);
                $info['route']=$info['alias'];
                $info = $this->my_string->allow_post($info,array('title','type_category','alias','route','parentid','image','description','meta-title','meta-keywords','meta-description','source'));
                $info['userid-updated'] = $this->auth['id'];
                $info['updated']=gmdate('Y-m-d H:i:s', time() + 7*3600);
                if($style==1){
                    if($this->Mitq_category->updateCategoryLast($id,$info)){$this->my_string->js_redirect('sửa chuyên mục thành công',ITQ_BASE_URL.'backend/category/listcategory');}else{$this->my_string->js_redirect('không đc phép',ITQ_BASE_URL.'backend/category/listcategory');}
                }else{
                    if($this->Mitq_category->updateCategoryFirst($id,$info)){$this->my_string->js_redirect('sửa chuyên mục thành công',ITQ_BASE_URL.'backend/category/listcategory');}else{$this->my_string->js_redirect('không đc phép',ITQ_BASE_URL.'backend/category/listcategory');}
                }
            }else{
                $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
            }
        }
        $listcategory = $this->Mitq_category->listCategory3();
        foreach ($listcategory as $key=>$value){
            $listcategory[$key]['title']= str_repeat('|------',$value['level']).$value['title'];
            if($value['type_category']==11){$listcategory[$key]['type_category']='sản phẩm';}
            if($value['type_category']==22){$listcategory[$key]['type_category']='Tin tức';}
            if($value['type_category']==0){$listcategory[$key]['type_category']='';}
        }
        $listtype = $this->db->select('id,title')->from('itq_type_category')->get()->result_array();
        $data['listtype'] = $listtype;
        $data['infocategory'] = $infocategory;
        $data['listcategory'] = $listcategory;
        $data['seo']['title'] = 'Sửa chuyên mục';
        $data['template'] = 'backend/category/editcategory';
        $this->load->view('backend/layout/home',isset($data)?$data:null);
    }

    public function deleteCategory($id){
        if($this->Mitq_category->deleteCategory($id)==true){
            $this->my_string->php_redirect('backend/category/listcategory');
        }else{
            $this->my_string->js_redirect('Hỏng',ITQ_BASE_URL.'backend/category/listcategory');
        }
    }

    public function editShowHome($id,$value){
        $this->Mitq_category->updateIsHomeByid($id,$value);
        $this->my_string->php_redirect('backend/category/listcategory');
    }
    public function editShowGrid($id,$value){
        $this->Mitq_category->updateIsGridByid($id,$value);
        $this->my_string->php_redirect('backend/category/listcategory');
    }
    public function editShowRight($id,$value){
        $this->Mitq_category->updateIsRightByid($id,$value);
        $this->my_string->php_redirect('backend/category/listcategory');
    }
    public function editShowPublish($id,$value){
        $this->Mitq_category->updatePublishByid($id,$value);
        $this->my_string->php_redirect('backend/category/listcategory');
    }
    public function editShowMenu($id,$value){
        $this->Mitq_category->updateMenuByid($id,$value);
        $this->my_string->php_redirect('backend/category/listcategory');
    }
    public function editorder(){
        $array = $this->input->post('id');
        foreach($array as $key=>$value){
            $this->Mitq_category->updateOrder($key,$value);
        }
        $this->my_string->php_redirect('backend/category/listcategory');
    }
    public function listcategory(){
        $listcategory = $this->Mitq_category->listCategory3();
        $listtype = $this->db->select('id,title')->from('itq_type_category')->get()->result_array();

        foreach ($listcategory as $key=>$value){
            $listcategory[$key]['title']= str_repeat('|------',$value['level']).$value['title'];
            foreach($listtype as $key2=>$value2){
                if($value['type_category']==$value2['id']){$listcategory[$key]['type_category']=$value2['title'];}
            }

        }
        $data['listcategory'] = $listcategory;
        $data['seo']['title'] = 'Danh sách chuyên mục';
        $data['template'] = 'backend/category/listcategory3';
        $this->load->view('backend/layout/home',isset($data)?$data:null);
    }









// ------------------------ validation----------------------------//
    public function checkTitleExit($title){
        if($this->Mitq_category->counTitle($title)==0){
            return true;
        }else{
            $this ->form_validation->set_message('checkTitleExit', '%s đã tồn tại');
            return false;
        }
    }

    public function checkTitleEdit($title,$titledb){
        if($title ==$titledb){
            return true;
        }else{
            if($this->Mitq_category->counTitle($title)==0){
                return true;
            }else{
                $this ->form_validation->set_message('checkTitleEdit', '%s đã tồn tại');
                return false;
            }
        }
    }




}