<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->Model('RegisterModel');
    }

	public function index()
	{
		if($this->session->userdata('user_id')=='')
		{
			$this->template->load('login_view');
		}
		else
		{
			redirect('index.php/Dashboard/index');
		}
	}
	public function logout()
	{
		if($this->session->userdata('user_id')!='')
		{
			$this->session->unset_userdata('user_id');
			redirect('index.php/Home/index');
		}
		else
		{
			redirect('index.php/Home/index');
		}
	}
}