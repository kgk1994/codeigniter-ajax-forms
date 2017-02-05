<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewController extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->Model('RegisterModel');
    }

	public function index()
	{
		$this->load->view('new_view');
	}
}
