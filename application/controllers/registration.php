<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
	
	function __contruct(){
		parent::__contruct();
		
	}

	public function index()
	{
		$session_user = $this->session->userdata('username');
		if(!isset($session_user) || ($session_user==''))
		{
			$this->session->set_flashdata('msg',"Please login to register !!");
			redirect('admin');
		}
		$data['title']= "Register Page";
		$this->load->view('header',$data);
		$this->load->view('registration_view');
	}
}
?>