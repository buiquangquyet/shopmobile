<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/changeinfouser.php/welcome
	 *	- or -  
	 * 		http://example.com/changeinfouser.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /changeinfouser.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->library('recaptcha');
        if($this->input->post())
        {
            //Load Class Validation
            $this->load->library('form_validation');
            //Kiểm tra Recaptcha có đúng hay không
            $this->recaptcha->checkRecaptcha();

            //Nếu Validation Ok
            if($this->form_validation->run())
            {

            }
            else
            {

            }
        }

        $this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */