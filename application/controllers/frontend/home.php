<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class home extends MY_Controller{
    private $countUserView;
    public function __construct(){
        parent::__construct();
        //$this->countUserView = $this->model_frontend->count_all_user_view();
        $this->load->library('Cart');
        $newdata = array(
            'ip'  => $_SERVER['REMOTE_ADDR'],
            'url' =>  $_SERVER['PHP_SELF'],
            'logged_in' => TRUE,
        );
        $this->session->set_userdata($newdata);
    }
    public function __destruct(){

    }
    public function index(){
        $data['meta_title']=$this->Mitq_config->getstatusbykeywords('keyword','meta_title');
        $data['meta_title'] = $data['meta_title']['value'];
        $data['title']=$data['meta_title'];
        $data['meta_keywords']=$this->Mitq_config->getstatusbykeywords('keyword','meta_keywords');
        $data['meta_keywords'] = $data['meta_keywords']['value'];
        $data['meta_description']=$this->Mitq_config->getstatusbykeywords('keyword','meta_description');
        $data['meta_description'] = $data['meta_description']['value'];
        $gird = $this->model_frontend->getProduct('new',1);
        $gird = $this->my_string->CreateLinkProduct($gird);
        $data['gird'] = $gird;
        $CatHome = $this->model_frontend->getCategory('is-home',1);
        foreach($CatHome as $key=>$value){
            $CatHome[$key]['listProduct'] =$this->model_frontend->getProductByCatIDShowHome($value['id'],4);
        }
        $banner = $this->model_frontend->getBannerbyid(1);
        $data['banner'] = $banner;
        $data['CatHome']=$CatHome;
        $catRightProduct= $this->model_frontend->getCategoryRight();
        $data['catRightProduct']= $catRightProduct;
        $data['template']='frontend/home/index';
        $this->load->view('frontend/layout/layout', isset($data)?$data:NULL);
    }
    public function listproduct($id,$page=1){
        if($page<=0)$page=1;
        $perpage = $this->Mitq_config->getstatusbykeywords('keyword','perpage');
        $perpage = $perpage['value'];
        $sumrows= $this->db->where('category_id',$id)->from('itq_product_category')->count_all_results();
        $config=$this->my_common->backendPagination();
        $config['total_rows']= $sumrows;
        $config['per_page']= $perpage;
        $config['base_url'] = 'san-pham-11-'.$id;
        $start = ($page-1)*$config['per_page'];
        $config['uri_segment']= 2;
        $config['first_url'] = $config['base_url'].'/'.'1';
        $this->pagination->initialize($config);
        $data['base_url']= base_url();
        $infoCat = $this->model_frontend->getCategoryByID($id);
        $listProduct = $this->model_frontend->getListProductByCatID($id,$config['per_page'],$start);
        $listProduct = $this->my_string->CreatLink($listProduct,'san-pham');
        $catRightProduct= $this->model_frontend->getCategoryRight();
        $data['catRightProduct']= $catRightProduct;
        $data['listProduct'] = $listProduct;
        $data['title'] = $infoCat['title'];
        $data['meta_title'] = $infoCat['meta-title'];
        $data['meta_keywords'] = $infoCat['meta-keywords'];
        $data['meta_description'] = $infoCat['meta-description'];
        $data['template']='frontend/home/listProduct';
        $this->load->view('frontend/layout/layout2', isset($data)?$data:NULL);
    }

    public function detailproduct($id=null){
        $countViewProduct = $this->my_common->count_view_product($id);
        $check = $this->Mitq_product->check_note_by_id($id);
        if($check==0){$this->my_string->php_redirect('frontend/home/index');}
        $infoproduct = $this->Mitq_product->getProductById($id);
        if($id == null || !is_numeric($id)){$this->my_string->php_redirect('frontend/home/index');}
        $images = $this->Mitq_images_product->Get_All_Images_Of_Product($id);
        $data['imagesproduct'] = $images;
        $data['infoproduct'] = $infoproduct;
        $listcategoryProduct = $this->model_frontend->list_category(11);
        $listcategoryProduct = $this->my_string->CreateLinkCat($listcategoryProduct);
        $data['listcategoryProduct']=$listcategoryProduct;
        $listcategoryNote = $this->model_frontend->list_category(22);
        $listcategoryNote = $this->my_string->CreateLinkCat($listcategoryNote);
        $data['listcategoryNote']=$listcategoryNote;
        $sameproduct = $this->Mitq_product->getProductByParentid($infoproduct['categoryid']);
        $catRightProduct= $this->model_frontend->getCategoryRight();
        $data['catRightProduct']= $catRightProduct;
        $data['sameproduct']= $sameproduct;
        $data['countViewProduct']= $countViewProduct;
        $data['title'] = $infoproduct['title'];
        $data['meta_title']=$this->Mitq_product->getseobyid($id,'meta-title');
        $data['meta_title'] = $data['meta_title']['meta-title'];
        $data['meta_keywords']=$this->Mitq_product->getseobyid($id,'meta-keywords');
        $data['meta_keywords'] = $data['meta_keywords']['meta-keywords'];
        $data['meta_description']=$this->Mitq_product->getseobyid($id,'meta-description');
        $data['meta_description'] = $data['meta_description']['meta-description'];
        $catid=$this->Mitq_product->get_category_by_id($id);
        $data['catid']=$catid['categoryid'];
        $data['template']='frontend/home/detailproduct';
        $this->load->view('frontend/layout/layout2', isset($data)?$data:NULL);
    }

    public function listnote($id,$page=1){
        if($page<=0)$page=1;
        $sumrows = $this->db->where('category-id',$id)->from('itq_note')->count_all_results();
        if($sumrows == 1){
            $infoNote = $this->db->where(array('category_id'=>$id))->from('itq_note_category')->get()->row_array();
            $id = $infoNote['note_id'];
            $infoNote = $this->db->where(array('id'=>$id))->from('itq_note')->get()->row_array();
            $this->my_string->php_redirect('tin-tuc/'.$infoNote['alias'].'/'.$id.'.html');
        }else{
            $perpage = $this->Mitq_config->getstatusbykeywords('keyword','perpage');
            $perpage = $perpage['value'];
            $config=$this->my_common->backendPagination();
            $config['total_rows']= $sumrows;
            $config['per_page']= $perpage;
            $config['uri_segment']=2;
            $config['base_url'] = 'tin-tuc-22-'.$id;
            $config['first_url'] = $config['base_url'].'/'.'1';
            $start = ($page-1)*$config['per_page'];
            $this->pagination->initialize($config);
            $data['base_url']= base_url();
            $data['sumrows']= $sumrows;
            $data['start']=$start;
            $data['end']=$start+$config['per_page'];
            $listNote = $this->model_frontend->getListNoteByCatID($id,$config['per_page'],$start);
            $listNote = $this->my_string->CreatLink($listNote,'tin-tuc');
        }
//        seo

        $data['meta_title']=$this->Mitq_category->getseobyid($id,'meta-title');
        $data['meta_title'] = $data['meta_title']['meta-title'];
        $data['meta_keywords']=$this->Mitq_category->getseobyid($id,'meta-keywords');
        $data['meta_keywords'] = $data['meta_keywords']['meta-keywords'];
        $data['meta_description']=$this->Mitq_category->getseobyid($id,'meta-description');
        $data['meta_description'] = $data['meta_description']['meta-description'];
        $catRightProduct= $this->model_frontend->getCategoryRight();
        $data['catRightProduct']= $catRightProduct;
        $data['listNote']=$listNote;
        $data['title']= $data['meta_title'];
        $data['template']='frontend/home/listnote';
        $this->load->view('frontend/layout/layout', isset($data)?$data:NULL);
    }

    public function detailnote($id=null){
        if($id == null||!is_numeric($id)){$this->my_string->php_redirect('frontend/home/index');}
        $infoNote = $this->db->where(array('id'=>$id))->from('itq_note')->get()->row_array();
        $data['infoNote'] = $infoNote;
        $listNote = $this->model_frontend->getListNote($infoNote['category-id']);
        $titleCate = $this->model_frontend->getTitleCate($infoNote['category-id']);
        $data['titleCate'] = $titleCate;
        $data['listNote'] =$listNote;
        $data['title'] = $infoNote['title'];
        $data['meta_title']=$this->Mitq_note->getseobyid($id,'meta-title');
        $data['meta_title'] = $data['meta_title']['meta-title'];
        $data['meta_keywords']=$this->Mitq_note->getseobyid($id,'meta-keywords');
        $data['meta_keywords'] = $data['meta_keywords']['meta-keywords'];
        $data['meta_description']=$this->Mitq_note->getseobyid($id,'meta-description');
        $data['meta_description'] = $data['meta_description']['meta-description'];
        $catid=$this->Mitq_note->get_category_by_id($id);
        $data['catid']=$catid['category-id'];
        $data['template']='frontend/home/detailnote';
        $this->load->view('frontend/layout/layout', isset($data)?$data:NULL);
    }






    public function contact($id){
        $this->load->library('recaptcha');
        if($this->input->post())
        {
            //Load Class Validation
            $this->load->library('form_validation');
            //Kiểm tra Recaptcha có đúng hay không
            $this->recaptcha->checkRecaptcha();
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            //Nếu Validation Ok
            if($this->form_validation->run())
            {
                $comment = $this->input->post();
                $comment = $this->my_string->allow_post($comment,array('email','contact','name','telephone'));
                if($this->Mitq_contact->insertContact($comment)==true){
                    $this->my_string->js_redirect('cảm ơn bạn đã đóng góp ý kiến',ITQ_BASE_URL.'frontend/home/index');
                }
            }
            else
            {
                $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
            }
        }

//        seo
        $data['meta_title']=$this->Mitq_category->getseobyid($id,'meta-title');
        $data['meta_title'] = $data['meta_title']['meta-title'];
        $data['meta_keywords']=$this->Mitq_category->getseobyid($id,'meta-keywords');
        $data['meta_keywords'] = $data['meta_keywords']['meta-keywords'];
        $data['meta_description']=$this->Mitq_category->getseobyid($id,'meta-description');
        $data['meta_description'] = $data['meta_description']['meta-description'];

//      contact_content
        $contact['authorship'] = $this->Mitq_config->getstatusbykeywords('keyword','authorship');
        $contact['telephone'] = $this->Mitq_config->getstatusbykeywords('keyword','telephone');
        $contact['address'] = $this->Mitq_config->getstatusbykeywords('keyword','address');
        foreach($contact as $key =>$value){
            $contact[$key] = $contact[$key]['value'];
        }
        $data['contact_content']= $contact;
        $data['template']='frontend/home/contact';
        $this->load->view('frontend/layout/layout', isset($data)?$data:NULL);
    }

    public function search($page=1){
        $dataget = $this->input->get();
        $config=$this->my_common->backendPagination();
        $sumrows = $this->model_frontend->count_product_like_title($dataget['titlesearch'],$dataget['priceMin'],$dataget['priceMax']);
        $config['total_rows']= $sumrows;
        $config['per_page']= 8;
        $config['base_url'] = 'frontend/home/search';
        $config['suffix'] = '?titlesearch='.$dataget['titlesearch'].'&priceMin='.$dataget['priceMin'].'&priceMax='.$dataget['priceMax'].'&search=search';
        $config['first_url'] = $config['base_url'].'//'.'1'.$config['suffix'];
        $start = ($page-1)*$config['per_page'];
        $this->pagination->initialize($config);
        if($dataget['titlesearch']==null){$dataget['titlesearch']='';}
        $data['title']='Tìm kiếm';
        $data['meta_title']='Tìm kiếm';
        $data['meta_keywords']='Tìm Kiếm';
        $data['meta_description']='Tìm kiếm theo tên';
        $listProduct = $this->model_frontend->get_product_like_title($dataget['titlesearch'],$dataget['priceMin'],$dataget['priceMax'],$start,$config['per_page']);
        $listProduct = $this->my_string->CreatLink($listProduct,'san-pham');
        $data['listProduct']=$listProduct;
        $data['catRightProduct']= $this->model_frontend->getCategoryRight();
        $data['template']='frontend/home/search';
        $this->load->view('frontend/layout/layout',isset($data)?$data:NULL);
    }

    public function buy($id){
        $check = $this->Mitq_category->check_note_by_id($id);
        if($check==0){$this->my_string->php_redirect('trang-chu.html');}
        if($id == null || $id==1 || $id ==2 || !is_numeric($id)){$this->my_string->php_redirect('trang-chu.html');}

        if($this->input->post('submit')){
            $info = $this->input->post();
        }
        //addcart
        $infoproduct = $this->Mitq_product->getProductById($id);
        $cart[] = array(
            'id'=>$infoproduct['id'],
            'name'=>$infoproduct['alias'],
            'qty'=>'1',
            'price'=>$infoproduct['price'],
            'image'=>$infoproduct['image'],
        );
        $this->cart->insert($cart); 		//chèn vào giỏ hàng
        $this->my_string->php_redirect('gio-hang.html');
    }
    public function showcart(){
        $data['title'] = 'giỏ hàng';
        $data['meta_title'] = 'thêm giỏ hàng';
        $data['meta_keywords'] = 'thêm giỏ hàng';
        $data['meta_description'] = 'thêm giỏ hàng';

        $info=$this->cart->contents();			//lấy cả giỏ hàng
        $data['totalitem']=$this->cart->total_items();
        $data['totalmoney']=$this->cart->total();
        $data['infocart']=$info;
        $data['template']='frontend/home/showcart';
        $this->load->view('frontend/layout/layout', isset($data)?$data:NULL);
    }

    public function updatecart(){
        $datapost = $this->input->post();
        unset($datapost['submit']);

        $dataqty = $datapost['data'];
        foreach($dataqty as $key=>$value){
            $data =array(
                'rowid'=>$key,
                'qty'=>$value,
            );
            $this->cart->update($data);
        }
        $this->my_string->php_redirect('gio-hang.html');
    }

    public function deleteproductincart($row){
        $data =array(
            'rowid'=>$row, //rowid của giỏ hàng cần update
            'qty'=>0,				// cập nhật lại số lượng
        );
        $this->cart->update($data);
        $this->my_string->php_redirect('gio-hang.html');
    }

    public function deleteAllCart(){
        $this->cart->destroy();// hủy cả giỏ hàng
        $this->my_string->php_redirect('trang-chu.html');
    }

    public function addpay(){
        //seo
        $data['title'] = 'Thanh toán giỏ hàng';
        $data['meta_title'] = 'Thanh toán giỏ hàng';
        $data['meta_keywords'] = 'Thanh toán giỏ hàng';
        $data['meta_description'] = 'Thanh toán hàng';
        //lấy cả giỏ hàng
        $info=$this->cart->contents();
        $data['totalitem']=$this->cart->total_items();
        $data['totalmoney']=$this->cart->total();
        foreach($info as $key =>$value){
            $info[$key]['title'] = $this->model_frontend->findTitle($value['id']);
        }
        $data['infocart']=$info;
        $this->form_validation->set_rules('fullname', 'Tên quý khách', 'required|max_length[100]');
        $this->form_validation->set_rules('email', 'Thư điện tử', 'required|max_length[100]|valid_email');
        $this->form_validation->set_rules('telephone', 'Số điện thoại', 'required|max_length[100]|numeric');
        $this->form_validation->set_rules('address', 'Địa chỉ', 'required|max_length[250]');
        $this->form_validation->set_rules('order', 'yêu cầu thêm', 'max_length[1000]');
        $datapost = $this->input->post();
        $data['datapost']=$datapost;
        if($this->form_validation->run() == true){
            $datapost = $this->input->post();
            $datapost = $this->my_string->allow_post($datapost,array('fullname','email','telephone','address','order'));
            $datapost['dataproduct'] = json_encode($info);
            $datapost['totalitem'] = $this->cart->total_items();
            $datapost['totalmoney'] = $this->cart->total();
            $datapost['ip'] = $_SERVER['REMOTE_ADDR'];
            $datapost['time'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
            $this->Mitq_cart->insertCart($datapost);
            $this->my_string->js_redirect('Đặt hàng thành công chúng tôi sẽ sớm liên hệ với quý khách',ITQ_BASE_URL.'xoa-gio-hang.html');
        }else{
            $this->form_validation->set_error_delimiters('<li><p class="error-red">','</p></li>');
        }
        $data['template']='frontend/home/addpay';
        $this->load->view('frontend/layout/layout', isset($data)?$data:NULL);
    }

    public function compare($id){
        session_start();
        if(count($_SESSION['compare'])<3){
            $_SESSION['compare'][]= $id;
        }
        //$dataCompare = $this->model_frontend->getCompare($id);
        //$data['dataCompare'] = $dataCompare;
        $data['template']='frontend/home/compare';
        $this->load->view('frontend/layout/layout', isset($data)?$data:NULL);
    }

}