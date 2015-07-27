<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_common{

	private $CI;

	public function __construct(){
		$this->CI =& get_instance();
	}

	public function sentmail($param = array()){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => $param['from'],
			'smtp_pass' => $param['password'],
			'charset' => 'utf-8',
			'newline' => "\r\n",
			'mailtype' => 'html',
		);
		$this->CI->load->library('email', $config);
		$this->CI->email->set_newline("\r\n");
		$this->CI->email->from($param['from'], $param['name']);
		$this->CI->email->to($param['to']);
		$this->CI->email->subject($param['subject']);
		$this->CI->email->message($param['message']);
		$this->CI->email->send();
		/* if (!$this->email->send()) show_error($this->email->print_debugger()); else echo 'Your e-mail has been sent!'; */
	}

	public function backend_pagination(){
		$param['base_url']			= '';
		$param['prefix']			= '';
		$param['suffix']			= '';
		$param['total_rows']		= 0;
		$param['per_page']			= 10;
		$param['num_links']			= 3;
		$param['cur_page']			= 0;
		$param['use_page_numbers']	= TRUE;
		$param['first_link']		= 'Trang đầu';
		$param['next_link']			= 'Tiếp tục';
		$param['prev_link']			= 'Lùi lại';
		$param['last_link']			= 'Trang cuối';
		$param['uri_segment']		= 4;
		$param['full_tag_open']		= '<ul>';
		$param['full_tag_close']	= '</ul>';
		$param['first_tag_open']	= '<li>';
		$param['first_tag_close']	= '</li>';
		$param['last_tag_open']		= '<li>';
		$param['last_tag_close']	= '</li>';
		$param['first_url']			= '';
		$param['cur_tag_open']		= '<li class="active">';
		$param['cur_tag_close']		= '</li>';
		$param['next_tag_open']		= '<li>';
		$param['next_tag_close']	= '</li>';
		$param['prev_tag_open']		= '<li>';
		$param['prev_tag_close']	= '</li>';
		$param['num_tag_open']		= '<li>';
		$param['num_tag_close']		= '</li>';
		return $param;
	}

    public function backendPagination(){
        $param['suffix']			= '';
        $param['first_url']			= '';
        $config['per_page']         =8;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment']      = 4;
        $config['first_link']       = 'đầu tiên';
        $config['next_link']        = 'Tiến';
        $config['prev_link']        = 'Lùi';
        $config['last_link']        = 'Cuối cùng';
        $config['next_tag_open']    ='<li>';
        $config['next_tag_close']   ='</li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']   = '</li>';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']   = '</li>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active">';
        $config['cur_tag_close']    = '</li>';
        return $config;
    }

	public function sort_orderby($field, $value){
		return (isset($field) && !empty($field) && isset($value) && !empty($value)) ? array(
			'field' => $field,
			'value' => $value
		):array(
			'field' => 'id',
			'value' => 'desc'
		);
	}

    public function count_view_product($id){
        session_start();

        $countViewProduct =  $this->CI->model_frontend->countViewProduct($id);
        if(isset($_SESSION['viewProduct'][$id]) && count($_SESSION['viewProduct'])){
            $countViewProduct = $countViewProduct;
        }else{
            $countViewProduct = $countViewProduct+1;
            $this->CI->db->where(array('id'=>$id))->update('itq_product',array('view'=>$countViewProduct));
            $_SESSION['viewProduct'][$id] =$id;
        }
        return($countViewProduct);
    }

}