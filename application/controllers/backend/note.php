<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class note extends MY_Controller{
    private $auth;
    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if($this->auth == null){$this->my_string->php_redirect('backend/auth/login');}
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->my_auth->allow($this->auth,$url);

    }
    public function addnote(){
        $this->form_validation->set_rules('title', 'Tên bài đăng', 'required|callback_checkTitleExit');
        $this->form_validation->set_rules('description', 'Tóm tắt', 'required|max_length[750]');
        if ($this->form_validation->run() == true){
            if($this->input->post('submit')){
                $info = $this->input->post();
                $category = $this->input->post('category');
                $info = $this->my_string->allow_post($info,array('title','category-id','image','description','content','meta-title','meta-keywords','meta-description'));
                $userData = $this->auth;
                $info['userid-creat'] = $userData['id'];
                $info['alias']=$this->my_string->removeutf8($info['title']);
                $info['route'] = $info['alias']=$this->my_string->alias($info['alias']);
                $info['creattime']=gmdate('Y-m-d H:i:s', time() + 7*3600);
                $this->Mitq_note->insertNote($info);
                $id = $this->db->insert_id();
                if(is_array($category)){
                    foreach($category as $value){
                        $this->Mitq_note_category->insertNoteCategory($id,$value);
                    }
                }
            }else{
                $this->my_string->php_redirect('backend/note/listnote');
            }
        }else{
            $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
        }
        $data['seo']['title']=' Thêm bài đăng';
        $data['listtype']= $this->Mitq_type->getAllType();
        $listcat = $this->Mitq_category->getAllCategoryNote(22);
        $listcat = $this->my_string->PrintLevel($listcat);
        $data['listcategory'] = $listcat;
        $data['template']= 'backend/note/addnote';
        $this->load->view('backend/layout/home',$data);
    }

    public function listNote($page=0){
        if($page<=0)$page=1;
        $search = $this->input->get('txtsearch');
        $sort = $this->my_common->sort_orderby($this->input->get('sort_field'), $this->input->get('sort_value'));
        $config=$this->my_common->backendPagination();
        if(!empty($search)){
            $sumrows = $this->Mitq_note->countTitle_Search($search);
        }else{
            $sumrows= $this->Mitq_note->countTitle_NotSearch();
        }
        $config['total_rows']= $sumrows;
        $config['per_page']= 5;
        $config['base_url'] = 'backend/note/listnote';
        $config['suffix'] = ((isset($sort) && count($sort))?'?sort_field='.$sort['field'].'&sort_value='.$sort['value']:'');
        $config['suffix'] = $config['suffix'].((isset($search) && count($search))?'&txtsearch='.$search:'');
        $config['first_url'] = $config['base_url'].'//'.'1'.$config['suffix'];
        $start = ($page-1)*$config['per_page'];
        $this->pagination->initialize($config);
        $data['base_url']= base_url();
        $data['sumrows']= $sumrows;
        $data['start']=$start;
        $data['end']=$start+$config['per_page'];
        $data['page']= $page;
        $data['sort']= $sort;
        $data['search']= $search;
        $listnote = $this->Mitq_note->listNote($start,$config['per_page'],$sort['field'],$sort['value'],$search);
        foreach($listnote as $key=>$value){
            $listnote[$key]['fullname-created'] = $this->Mitq_user->getUserById($value['userid-creat']);
            $listnote[$key]['fullname-updated'] = $this->Mitq_user->getUserById($value['userid-update']);
        }
        $data['listnote'] = $listnote;
        $data['seo']['title']='Danh sách bài đăng';
        $data['template']= 'backend/note/listnote';
        $this->load->view('backend/layout/home',$data);
    }

    public function EditNote($id){
        if($id==null){$this->my_string->php_redirect('backend/note/listnote');}
        $infoProduct = $this->Mitq_note->getNoteById($id);
        $this->form_validation->set_rules('title', 'Tên sản phẩm', 'required|callback_checkTitleEdit['.$infoProduct['title'].']');
        $this->form_validation->set_rules('description', 'Tóm tắt', 'required|max_length[750]');
        if ($this->form_validation->run() == true){
            $infopost = $this->input->post();
            $category = $this->input->post('category');
            $infopost = $this->my_string->allow_post($infopost,array('title','category-id','image','meta-title','meta-keywords','meta-description'));
            $userData = $this->auth;
            $infopost['userid-update'] = $userData['id'];
            $infopost['alias']=$this->my_string->removeutf8($infopost['title']);
            $infopost['route'] = $infopost['alias']=$this->my_string->alias($infopost['alias']);
            $infopost['updatetime']=gmdate('Y-m-d H:i:s', time() + 7*3600);
            $this->Mitq_note->updateNote($id,$infopost);
            $this->Mitq_note_category->delNoteCategory($id);
            foreach($category as $key =>$value ){
                $this->Mitq_note_category->insertNoteCategory($id,$value);
            }
            $this->my_string->js_redirect('cập nhật thành công',ITQ_BASE_URL.'backend/note/listnote');

        }else{
            $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
        }
        $infoNote = $this->Mitq_note->getNoteById($id);
        $related = $this->Mitq_category->getAllCategoryNote();
        $related = $this->my_string->PrintLevel($related);
        $checked = $this->Mitq_note_category->getNotCatByid($id);
        $data['checked'] = $checked;
        $data['related'] = $related;
        $data['listcategory'] = $this->Mitq_category->getAllCategory();
        $data['infoNote'] = $infoNote;
        $data['seo']['title']='Update bài đăng';
        $data['template']= 'backend/note/editnote';
        $this->load->view('backend/layout/home',$data);
    }

    public function EditNew($id,$status){
        $this->Mitq_note->updatestatus($id,'new',$status);
        $this->my_string->php_redirect('backend/note/listnote');
    }
    public function EditPublish($id,$status){
        $this->Mitq_note->updatestatus($id,'publish',$status);
        $this->my_string->php_redirect('backend/note/listnote');
    }
    public function editis_right($id,$status){
        $this->Mitq_note->updatestatus($id,'is_right',$status);
        $this->my_string->php_redirect('backend/note/listnote');
    }
    public function editis_banner($id,$status){
        $this->Mitq_note->updatestatus($id,'is_banner',$status);
        $this->my_string->php_redirect('backend/note/listnote');
    }

    public function editorder(){
        $order = $this->input->post();
        unset($order['submit']);
        foreach($order as $key=>$value){
            $this->Mitq_note->updateorderNote($key,$value);
        }
        $this->my_string->php_redirect('backend/note/listnote');
    }
    public function deletenote($id){
        $this->Mitq_note->deleteNote($id);
        $this->my_string->php_redirect('backend/note/listnote');
    }







//----------------checkTitleExit-----------------
    public function checkTitleExit($title){
        $title = trim($title);
        if($this->Mitq_note->countTitle($title)==0){
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
            if($this->Mitq_product->counTitle($title)==0){
                return true;
            }else{
                $this ->form_validation->set_message('checkTitleEdit', '%s đã tồn tại');
                return false;
            }
        }
    }


}