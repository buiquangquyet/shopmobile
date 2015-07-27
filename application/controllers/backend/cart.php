<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cart extends MY_Controller {
    private $auth;
    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if($this->auth == null){$this->my_string->php_redirect('backend/auth/login');}
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->my_auth->allow($this->auth,$url);
    }

    public function listcart($page=1){
        if($page<=0)$page=1;
        $search = $this->input->get('txtsearch');
        $sort = $this->my_common->sort_orderby($this->input->get('sort_field'), $this->input->get('sort_value'));
        $config=$this->my_common->backendPagination();
        if(!empty($search)){
            $sumrows = $this->Mitq_cart->countTitle_Search($search);
        }else{
            $sumrows= $this->Mitq_cart->countTitle_NotSearch();
        }
        $config['total_rows']= $sumrows;
        $config['per_page']= 15;
        $config['base_url'] = 'backend/cart/listcart';
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
        $data['listcart'] =$listcart = $this->Mitq_cart->listCate($start,$config['per_page'],$sort['field'],$sort['value'],$search);
        $data['seo']['title']='Danh sách đơn hàng';
        $data['template']= 'backend/cart/listcart';
        $this->load->view('backend/layout/home',$data);
    }

    public function editstatus($id,$status){
        $this->Mitq_cart->updatestatus($id,'status',$status);
        $this->my_string->php_redirect('backend/cart/listcart');
    }

    public function detail($id){
        $cartdata = $this->Mitq_cart->getCartById($id);
        $data['cartdata'] = $cartdata;
        $data['seo']['title']='đơn hàng';
        $data['template']= 'backend/cart/detail';
        $this->load->view('backend/layout/home',$data);
    }

    public function del($id){
        $this->Mitq_cart->del($id);
        $this->my_string->php_redirect('backend/cart/listcart');
    }
} 