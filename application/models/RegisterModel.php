<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {

	public function insert($ins)
	{
		$query = $this->db->insert('tbl_user',$ins);
		if($query)
		{
			$response = json_encode(array('status' => 'success' ,'msg' => 'Successfully Registered'));
		}
		else
		{
			$response = json_encode(array('status' => 'fail' ,'msg' => 'Cannot Register now please try again'));
		}
		return $response;
	}
}
