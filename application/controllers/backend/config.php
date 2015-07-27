<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class config extends MY_Controller
{
    private $auth;
    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if($this->auth == null){$this->my_string->php_redirect('backend/auth/login');}
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->my_auth->allow($this->auth,$url);

    }
    public function index($group='seo'){
        if(!isset($group) || empty($group)) $this->my_string->php_redirect('backend/home/index');
        $config = $this->db->select('label, keyword, value, type')->where(array('group' => $group, 'publish' => 1))->from('itq_config')->get()->result_array();
        if(!isset($config) || count($config) == 0) $this->my_string->php_redirect('backend/home/index');
        $data['seo']['title'] = 'Cấu hình hệ thống';
        $data['data']['_config'] = $config;
        $data['data']['group'] = $group;
        $_allow_post = null;
        foreach($config as $key=>$value){
            $_allow_post[] = $value['keyword'];
        }

        if($this->input->post('change')) {
            $_post = $this->input->post();
            $data['data']['_post'] = $_post;
            $_post = $this->my_string->allow_post($_post, $_allow_post);
//            echo '<pre>';
//            print_r($_post);
//            echo '</pre>';

            foreach($_post as $keyPost => $valPost){
                $_data[] = array(
                    'keyword' => $keyPost,
                    'value' => $valPost,
                    'updated' => gmdate('Y-m-d H:i:s', time() + 7*3600),
                );
            }
            $this->db->update_batch('itq_config', $_data, 'keyword');
            $this->my_string->js_redirect('thay đổi cấu hình thành công','backend/config/index');

        }

        $data['template'] = 'backend/config/index';
        $this->load->view('backend/layout/home',isset($data)?$data:null);


    }
}