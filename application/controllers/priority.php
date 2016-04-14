<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class priority extends CI_Controller {
	
	function __contruct(){
		parent::__contruct();		
	}
	
	public function index()
	{
		$session_user = $this->session->userdata('username');
		if(!isset($session_user) || ($session_user==''))
		{
			$this->session->set_flashdata('msg',"Please login to continue");
			redirect('admin');
		}
		$data['title'] = "Add New Priority Page";
		$this->load->view('header',$data);
		$this->load->view('add_new_priority_view');
	}

	public function create()
	{
		$session_user = $this->session->userdata('username');
		if(!isset($session_user) || ($session_user==''))
		{
			$this->session->set_flashdata('msg',"Please login to continue");
			redirect('admin');
		}
		
		
		
	 	$this->form_validation->set_rules('pname', 'Priority Name', 'trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('pdesc', 'Description', 'trim|required|alpha|min_length[3]|xss_clean');
       
        
        if( $this->form_validation->run() != false){
        	
        	
        	//insert the user registration details into database
            $data = array(
                'p_name' => $this->input->post('pname'),
                'p_description' => $this->input->post('pdesc'),
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
		
		$data['title'] = "Add New Priority Page";
		$this->load->view('header',$data);
		$this->load->view('add_new_priority_view');
	}
}
