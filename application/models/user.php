<?php
class User extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function validLogin()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', sha1($this->input->post('password')));
		$query = $this->db->get('users');

		if($query->num_rows() == 1)
			return true;
		else
			return false; 
	}

	public function validUsername()
	{
		$this->db->where('username', $this->input->post('username'));
		$query = $this->db->get('users');

		if($query->num_rows() >0)
			return false;
		else
			return true; 
	}

	public function validEmail()
	{
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get('users');

		if($query->num_rows() >0)
			return false;
		else
			return true; 
	}

	public function addUser($Username, $Password, $Email)
	{
		$arrInput = array('username'=>$Username, 'password'=>$Password, 'email'=>$Email);
		$query = $this->db->insert('users', $arrInput); 

		if($query)
			return true;
		else
			return false;
	}
}