<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->Model('LoginModel');
    }

	public function index()
	{
		$this->template->load('login_view');
	}
	public function check()
	{
		if($this->session->userdata('user_id') == '')
		{
			if($this->input->post('email'))
			{
				$login = array();
				$login = array(	
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'), 
						);
				$result = $this->LoginModel->check($login);
				if($result)
				{
					$this->session->set_userdata('user_id',$result);
					echo json_encode(array('status' => 'success', 'msg' => 'Login Successful'));die;
				}
				else
				{
					echo json_encode(array('status' => 'fail', 'msg' => 'Login Failed'));die;
				}
			}
		}
		else
		{
			redirect('index.php/Home/index');
		}
	}
}