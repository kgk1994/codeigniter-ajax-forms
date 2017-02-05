<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
    }

	public function index()
	{
		if($this->session->userdata('user_id')!='')
		{
			$this->template->load('dashboard_view');
		}
		else
		{
			redirect('index.php/Home/index');
		}
	}
}
