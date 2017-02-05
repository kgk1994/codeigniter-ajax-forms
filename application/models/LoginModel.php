<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function check($login)
	{
		$this->db->where('email',$login['email']);
		$this->db->where('password',$login['password']);
		$query = $this->db->get('tbl_user');				
		if($query->num_rows() == 1)
		{
			$ret = $query->row();
			return $ret->id;
		}
	}
}
