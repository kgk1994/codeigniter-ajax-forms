<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileModel extends CI_Model {

	public function get_profile($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_user');
		if($query->num_rows() == 1)
		{
			$result = $query->row();
			echo json_encode($result);
		}
	}
	public function update_prof($id,$update)
	{
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_user',$update);
		if($query)
		{
			return $query;
		}	
	}
	public function check_passwd($passwd,$id)
	{ 
		$this->db->where('id',$id);
		$this->db->where('password',$passwd);
		$query = $this->db->get('tbl_user');
		if($query->num_rows() == 1)
		{
			$response = json_encode(array('status' => 'matched', 'msg' => 'Passwords matched' ));	
			return $response;
		}
		else
		{
			$response = json_encode(array('status' => 'not_matched', 'msg' => 'Password is not matched with existing password' ));	
			return $response;
		}
	}

	public function change_password($ins,$id)
	{ 
		$this->db->where('id',$id);		
		$query = $this->db->update('tbl_user',$ins);
		if($query)
		{
			$response = json_encode(array('status' => 'updated', 'msg' => 'Passwords changed' ));	
			return $response;
		}
		else
		{
			$response = json_encode(array('status' => 'not_updated', 'msg' => 'Cannot change password please try again' ));	
			return $response;
		}
	}
}