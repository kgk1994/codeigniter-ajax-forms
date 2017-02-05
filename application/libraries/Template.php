<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	
class Template
{
  protected 	$ci;
  	# Header and footer location
 	public $header = 'header_view';
 	public $footer = 'footer_view';
	
	public function __construct()
	{
        $this->ci =& get_instance();
	}
	public function load($views='', $data='')
	{
		// load header
		if($this->header)
		{
			$this->ci->load->view($this->header, $data);
			$data = '';
		}
		// Load content, can be more than one view
		if(is_array($views))
		{
			foreach ($views as $view) 
			{
				$this->ci->load->view($view, $data);
				$data = '';
			}
		} 
		else 
		{
			$this->ci->load->view($views, $data);
		}
		// load footer
		if($this->footer)
		{
			$this->ci->load->view($this->footer, $data);
			$data = '';
		}
	}
}
