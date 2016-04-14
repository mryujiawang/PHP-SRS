<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {        
   		parent::__construct();
   		$this->load->model('admin_model');
	}
	
	public function index()
	{	
//		$this->load->library('form_validation');
		$data['title'] = "IEHealth Login Page";
		$this->form_validation->set_rules('email_address','Email Address','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run() != false){
			$res = $this->admin_model->verify_user($this->input->post('email_address'),$this->input->post('password'));
//			print_r($res->u_name);die();
			if ($res != null){
				$this->session->set_userdata('username',$this->input->post('email_address'));
				$this->session->set_userdata('firstname',$res->u_name);
				$this->session->set_userdata('lastname',$res->u_last_name);
				redirect('welcome');
				
			}else{
				$this->session->set_flashdata('msg','Email address or password is incorrect !');
				$this->load->view('header', $data);
				$this->load->view('login_view');
			}
		}else{
			$this->load->view('header', $data);
			$this->load->view('login_view');
		}
	}
	
	
	public function registration(){
	
	 	$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[ie_user.u_email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[30]|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
        
        if( $this->form_validation->run() != false){
        	
        	
        	//insert the user registration details into database
            $data = array(
                'u_name' => $this->input->post('fname'),
                'u_last_name' => $this->input->post('lname'),
                'u_email' => $this->input->post('email'),
                'u_password' => sha1($this->input->post('password'))
            );
            

			$res = $this->admin_model->insert_user($data);

			if ($res == true){
				$this->session->set_flashdata('msg','Registeration done, please log in to continue');
				redirect('admin');
				
			}else{
				$data['title'] = "Register page";
				$this->load->view('header',$data);
				$this->load->view('registration_view');
			}
		}
		
		$data['title'] = "Register page";
		$this->load->view('header',$data);
		$this->load->view('registration_view');
		
	}
	
	
	public function reset_password(){
	
		$this->load->view('reset_password_view');
	
	}
	
	public function forget_password(){
	
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
		 if( $this->form_validation->run() != false){
		 	$this->admin_model->send_reset_password_email($this->input->post('email'));
		 }
		$this->load->view('reset_password_view');
	}
	
	
	
	public function logout(){
		
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('firstname');
		$this->session->unset_userdata('lastname');
		$this->session->sess_destroy();
		$data['title'] = "IEHealth Login Page";
		$this->load->view('header', $data);
		$this->load->view('login_view');
	
	}
}
