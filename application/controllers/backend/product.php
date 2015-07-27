<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class product extends MY_Controller{
    private $auth;
    public function __construct(){
        parent::__construct();
        $this->auth = $this->my_auth->check();
        if($this->auth == null){$this->my_string->php_redirect('backend/auth/login');}
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->my_auth->allow($this->auth,$url);
    }

    public function addproduct(){
        $this->form_validation->set_rules('title', 'Tên sản phẩm', 'required|callback_checkTitleExit');
        $this->form_validation->set_rules('price', 'Giá hiện tại', 'numeric');
        $this->form_validation->set_rules('priceold', 'Giá cũ', 'numeric');
        if ($this->form_validation->run() == true){
            if($this->input->post('submit')){
                $info = $this->input->post();
                $category = $this->input->post('category');
                $info = $this->my_string->allow_post($info,array('title','categoryid','order','image','description','content','price','priceold','type-id','meta-title','meta-keywords','meta-description'));
                $userData = $this->auth;
                $info['userid-created'] = $userData['id'];
                $info['alias']=$this->my_string->removeutf8($info['title']);
                $info['route'] = $info['alias']=$this->my_string->alias($info['alias']);
                $info['creattime']=gmdate('Y-m-d H:i:s', time() + 7*3600);
                $this->Mitq_product->addProduct($info);
                $id = $this->db->insert_id();
                $images= $this->input->post('images');
                $newdata= $this->input->post();
                if(isset($newdata['images']) && count($newdata['images'])){
                    foreach($images as $value){
                        if($value==''){
                            echo '';
                        }else{
                            $this->Mitq_images_product->addImages($id,$value);
                        }
                    }
                }
				
				if(isset($newdata['category']) && count($newdata['category'])){				
					foreach($category as $key=>$value){
						if($value==''){
							echo '';
						}else{
							$this->Mitq_product_category->insertProductCategory($id,$value);
						}
					}
				}
				
            }else{
                $this->my_string->php_redirect('backend/product/listproduct');
            }
        }else{
            $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
        }
        $data['seo']['title']=' Thêm sản phẩm';
        $data['listtype']= $this->Mitq_type->getAllType();
    	$listcategory = $this->Mitq_category->getAllCategoryProduct();
        foreach ($listcategory as $key=>$value){
            $listcategory[$key]['title']= str_repeat('|------',$value['level']).$value['title'];
        }
        $data['listcategory']= $listcategory ;
        $data['template']= 'backend/product/addproduct';
        $this->load->view('backend/layout/home',$data);
    }

    public function listproduct($page=0){
        if($page<=0)$page=1;
        $search = $this->input->get('txtsearch');
        $sort = $this->my_common->sort_orderby($this->input->get('sort_field'), $this->input->get('sort_value'));
        $config=$this->my_common->backendPagination();
        if(!empty($search)){
            $sumrows = $this->db->from('itq_product')->like('title', $search)->count_all_results();
        }else{
            $sumrows= $this->db->from('itq_product')->count_all_results();
        }
        $config['total_rows']= $sumrows;
        $config['per_page']= 8;
        $config['base_url'] = 'backend/product/listproduct';
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
        $listproduct = $this->Mitq_product->listProduct($start,$config['per_page'],$sort['field'],$sort['value'],$search);
        foreach($listproduct as $key=>$value){
            $value['type-id'];
            $listproduct[$key]['type-title'] = $this->Mitq_type->getTypeByID($value['type-id']);
            $listproduct[$key]['fullname-created'] = $this->Mitq_user->getUserById($value['userid-created']);
            $listproduct[$key]['fullname-updated'] = $this->Mitq_user->getUserById($value['userid-update']);

        }
        $data['listproduct'] = $listproduct;
        $data['seo']['title']='Danh sách sản phẩm';
        $data['template']= 'backend/product/listproduct';
        $this->load->view('backend/layout/home',$data);
    }

    public function EditBestBuy($id,$status){
        $this->Mitq_product->updatestatus($id,'buy-best',$status);
        $this->my_string->php_redirect('backend/product/listproduct');
    }
    public function EditNew($id,$status){
        $this->Mitq_product->updatestatus($id,'new',$status);
        $this->my_string->php_redirect('backend/product/listproduct');
    }
    public function Editpublish($id,$status){
        ($status==1)?$value =0:$value=1;
        $this->Mitq_product->updatestatus($id,'publish',$status);
        $data['icon']  = my_string::getIconAjax($value);
        $data['status'] = 'backend/product/editpublish/'.$id.'/'.$value;
        echo json_encode($data);
        
    }
    public function editis_banner($id,$status){
        $this->Mitq_product->updatestatus($id,'is_banner',$status);
        $this->my_string->php_redirect('backend/product/listproduct');
    }
    public function editis_right($id,$status){
        $this->Mitq_product->updatestatus($id,'is_right',$status);
        $this->my_string->php_redirect('backend/product/listproduct');
    }

    public function EditProduct($id){
        if($id==null){$this->my_string->php_redirect('backend/product/listproduct');}
        $infoProduct = $this->Mitq_product->getProductById($id);
        $this->form_validation->set_rules('title', 'Tên sản phẩm', 'required|callback_checkTitleEdit['.$infoProduct['title'].']');
        $this->form_validation->set_rules('price', 'Giá hiện tại', 'numeric');
        $this->form_validation->set_rules('priceold', 'Giá cũ', 'numeric');
        if ($this->form_validation->run() == true){
            $infopost = $this->input->post();
            $listCatPro = $this->input->post('category');
            $infopost = $this->my_string->allow_post($infopost,array('title','categoryid','image','description','content','price','priceold','type-id','meta-title','meta-keywords','meta-description'));
            $userData = $this->auth;
            $infopost['userid-update'] = $userData['id'];
            $infopost['alias']=$this->my_string->removeutf8($infopost['title']);
            $infopost['route'] = $infopost['alias']=$this->my_string->alias($infopost['alias']);
            $infopost['updatetime']=gmdate('Y-m-d H:i:s', time() + 7*3600);
            $this->Mitq_product->updateProduct($id,$infopost);

            if(is_array($listCatPro)){
                $this->Mitq_product_category->delProductCategory($id);
                foreach($listCatPro as $value){
                    $this->Mitq_product_category->insertProductCategory($id,$value);
                }
            }
//----------up thêm ảnh
            $images = $this->input->post('images');
            if(isset($images) && count($images)){
                $this->Mitq_images_product->deleteImagebyProductid($id);
                foreach($images as $value){
                    if($value==''){
                        echo '';
                    }else{
                        $this->Mitq_images_product->addImages($id,$value);
                    }
                }
            }
//----------end upload
            $this->my_string->js_redirect('cập nhật thành công',ITQ_BASE_URL.'backend/product/listproduct');
        }else{
            $this->form_validation->set_error_delimiters('<li><p class="error-red">', '</p></li>');
        }
        $checklist1 = $this->Mitq_product_category->getProCatByid($id);
        if(isset($checklist1) && count($checklist1)){
            foreach($checklist1 as $key=>$value){
                $checklist[]=$value['category_id'];
            }
        }else{
            $checklist ='';
        }
        $infoProduct = $this->Mitq_product->getProductById($id);
        $imagesProduct = $this->Mitq_images_product->getImagesById($id);
        $listcategory = $this->Mitq_category->getAllCategoryProduct();
        foreach ($listcategory as $key=>$value){
            $listcategory[$key]['title']= str_repeat('|------',$value['level']).$value['title'];
        }
        $data['listcategory']= $listcategory ;
        $data['checklist'] = $checklist;
        $data['imagesProduct'] = $imagesProduct;
        $data['listtype']= $this->Mitq_type->getAllType();
        $data['infoProduct'] = $infoProduct;
        $data['seo']['title']='Update sản phẩm';
        $data['template']= 'backend/product/editproduct';
        $this->load->view('backend/layout/home',$data);
    }

    public function deleteImages($id,$productid){
        $image = $this->Mitq_images_product->getImgae($id);
        unlink($image['url']);
        $this->Mitq_images_product->deleteImage($id);
        $this->my_string->php_redirect('backend/product/editproduct/'.$productid);
    }
    public function deleteProduct($id){
        if($id==null){$this->my_string->php_redirect('backend/product/listproduct');}
        $datadel = $this->Mitq_images_product->getImagesById($id);
        if(isset($datadel) && count($datadel)){
            foreach($datadel as $key=>$value){
                unlink($value['url']);
            }
        }
        $this->Mitq_images_product->deleteImagebyProductid($id);
        $this->Mitq_product->deleteproduct($id);
        $this->my_string->php_redirect('backend/product/listproduct');
    }

    public function editorder(){
        $order = $this->input->post();
        unset($order['submit']);
        foreach($order as $key=>$value){
            $this->Mitq_product->updateorderProduct($key,$value);
        }
        $this->my_string->php_redirect('backend/product/listproduct');
    }









    // ------------------------ validation--------------------------//
    public function checkTitleExit($title){
        // $title =  trim($title);
        if($this->Mitq_product->countTitle($title)==0){
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