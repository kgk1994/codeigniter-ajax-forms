<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->Model('ProfileModel');
    }

	public function index()
	{
		$this->template->load('profile_view');
	}
	
	public function getProfileData()
	{
		if($this->session->userdata('user_id') != '')
		{
			$id = $this->session->userdata('user_id');
			$data = $this->ProfileModel->get_profile($id);
			if($data)
			{
				echo json_encode($data);die;	
			}
		}
		else
		{
			redirect('index.php/Home/index');
		}
	}

	public function update_userdata()
	{ 
		if($this->session->userdata('user_id') != '')
		{ 
			if($this->input->post())
			{
				$id = $this->session->userdata('user_id');
			    $config['upload_path']   = './assets/images/user/';
			    $config['allowed_types'] = 'jpg|jpeg|png|bmp';
			    $config['file_name']     = $_FILES['image']['name'];
			    //Load upload library and initialize configuration
			    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
			    $this->load->library('upload',$config);
			    $this->upload->initialize($config);
			    if($this->upload->do_upload('image'))
			    {
					$uploadData = $this->upload->data();
					$picture = $uploadData['file_name'];
			    }
			    else
			    {
					$picture = '';
			    }
				$update = array(
						'name' => $this->input->post('name'),
						'image' => $picture
						);
				//print_r($update);die;
				$result = $this->ProfileModel->update_prof($id,$update);
				echo $result;die;
				if($result)
				{
					$response = array('status'=>'success');
					echo json_encode($response);die;
				}
				else
				{
					$response = array('status'=>'failure');
					echo json_encode($response);die;
				}
			}
		}
		else
		{
			redirect('index.php/Home/index');
		}
	}
	public function check_current_password()
	{
		if($this->session->userdata('user_id') != '')
		{ 
			if($this->input->post('password'))
			{
				$id 		= $this->session->userdata('user_id');
				$cur_pass 	= $this->input->post('password');
				$response  	= $this->ProfileModel->check_passwd($cur_pass,$id);
				echo $response; die;
			}
		}
	}
	public function change_password()
	{
		if($this->session->userdata('user_id') != '')
		{ 
				$id 			=	$this->session->userdata('user_id');
				$cur_pass 		=	$this->input->post('cur_pass');
				$new_pass		=	$this->input->post('new_pass');
				$conf_new_pass	=	$this->input->post('conf_new_pass');
				$ins 			= 	array('password'=>$new_pass);		
				$update = $this->ProfileModel->change_password($ins,$id);
				echo $update;die;
		}
	}
}