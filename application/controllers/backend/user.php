<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class user extends MY_Controller{
    private $auth;
    private $access;
    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if($this->auth == null){$this->my_string->php_redirect('backend/auth/login');}
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->my_auth->allow($this->auth,$url);
    }
    public function index(){

    }
    public function created(){
        $info = $this->input->post();
        $data['info'] = $info;
        $this->form_validation->set_rules('username', 'Tên đăng nhập', 'required|min_length[6]|callback_checkUsername');
        $this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[6]');
        $this->form_validation->set_rules('repassword', 'Mật Khẩu xác thực', 'required|callback_checkRepassword['.$info['password'].']');
        $this->form_validation->set_rules('email', 'thư điện tử', 'required|valid_email|callback_checkEmail');
        if ($this->form_validation->run() == true){
            $info = $this->my_string->allow_post($info,array('username','password','email','fullname','group'));
            $info['salt']= $this-> my_string->random(69,true);
            $info['password'] = $this->my_string->encode_password($info['username'],$info['password'],$info['salt']);
            $info['usercreat'] = $this->auth['username'];
            if($this->Mitq_user->insertUserData($info)==false){
                $this->my_string->js_redirect('thêm thành công',ITQ_BASE_URL.'backend/home/index');
            };
        }else{
            $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
        }

        $data['optiongroup'] = $this->Mitq_group->getAllGroup();

        $data['template']= 'backend/user/created';
        $this->load->view('backend/layout/home',$data);
    }

    public function listuser($page=1){
        if($page<=0)$page=1;
        //phân trang
        $config=$this->my_common->backendPagination();
        $config['total_rows'] = $this->Mitq_user->countUsers();
        $config['base_url'] = ITQ_BASE_URL."backend/user/listuser";
        $this->pagination->initialize($config);
        $start = ($page-1)*$config['per_page'];
        $like = $this->input->post('txtsearch');
        $data['like'] =$like;
        $infoUser = $this->Mitq_user->listUser($start,$config['per_page'],isset($like)?$like:"");
        $data['listuser'] = $infoUser;
        $data['template']= 'backend/user/listuser';
        $this->load->view('backend/layout/home',$data);
    }


    public function edit($id){
        if($this->input->post('edit')){
            $_post = $this->input->post();
            $data['_post']= $_post;
        }
        $data['info'] = $info = $this->Mitq_user->getInfoById($id);
        $this->form_validation->set_rules('email', 'thư điện tử', 'required|valid_email|callback_checkEmailEdit['.$info['email'].']');
        $this->form_validation->set_rules('fullname', 'Tên đầy đủ', 'required');
        if ($this->form_validation->run() == true){
            $_post['id']=$id;
            $_post['updatetime']=gmdate('Y-m-d H:i:s', time() + 7*3600);
            $_post = $this->my_string->allow_post($_post,array('fullname','groupid','email','updatetime'));
            $this->Mitq_user->updateUserByid($id,$_post);
        }else{
            $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
        }

        $data['optiongroup'] = $this->Mitq_group->getAllGroup();
        $data['template']= 'backend/user/edit';
        $this->load->view('backend/layout/home',$data);
    }
    public function delete($id){
        if($this->auth['id'] !== $id){
            $this->Mitq_user->deleteUserById($id);
        }else{
            $this->my_string->js_redirect('Không được xóa chính bạn',ITQ_BASE_URL.'backend/home/index');
        }
    }


//------------------validation------------------
    public function checkEmailEdit($email,$emaidb){
        if($email == $emaidb){
            return true;
        }else{
            if($this->Mitq_user->checkEmail($email)==0){
                return true;
            }else{
                $this ->form_validation->set_message('checkEmailEdit', '%s đã bị trùng');
                return false;
            }
        }

    }

    public function checkUsername($username){
        if($this->Mitq_user->countUser($username)==0){
            return true;
        }else{
            $this ->form_validation->set_message('checkUsername', '%s đã tồn tại');
            return false;
        }
    }
    public function checkRepassword($password,$repassword){
        if($password == $repassword){
            return true;
        }else{
            $this ->form_validation->set_message('checkRepassword', '%s Không khớp');
            return false;
        }
    }
    public function checkEmail($email){
        if($this->Mitq_user->checkEmail($email)==0){
            return true;
        }else{
            $this ->form_validation->set_message('checkEmail', '%s đã tồn tại');
            return false;
        }
    }


}