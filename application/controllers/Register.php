<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->Model('RegisterModel');
		$this->load->library('form_validation');
    }
	public function index()
	{
		if($this->session->userdata('user_id') == '')
		{
			$this->template->load('home_view');
		}
		else
		{
			redirect('index.php/Dashboard/index');
		}
	}
	public function save()
	{
		if($this->session->userdata('user_id') == '')
		{
			if($this->input->post('name') != '')
			{
				$ins = array(
						'name' 		=> $this->input->post('name'),
						'email' 	=> $this->input->post('email'),
						'password' 	=> $this->input->post('password')
						);
				$response = $this->RegisterModel->insert($ins);
				print_r($response);die;
			}
		}
		else
		{
			redirect('index.php/Dashboard/index');
		}
	}
}