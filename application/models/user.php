<?php
Class User extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_json_data()
	{
		$this->db->select();
		$this->db->from('users');
		$this->db->order_by('id');
		$query = $this->db->get();
	
		return $query->result();
	}

	/*const TABLE = 'user';

	function __constructor()
	{
		parent::__construct();
		//$this->load->model('user/');
		echo ('aaa');
		die();
	}

	function getAll()
	{
		$query = $this->db->query("SELECT * FROM users");
		return $query->result();
	}

	function insert()
	{

		//$arrData = array('username'=>'test1;@$%', 'password'=>sha1('123'));
		//$this->simpleQuery(
		//"INSERT INTO ".self::TABLE."(username, password) VALUES (".$this->db->escape('test6').", ".$this->db->escape(sha1('123')).")"); 
	}

	function simpleQuery($Query)
	{
		if(! $this->db->simple_query($Query))
		{
			var_dump($this->db->error());
			die('Error Message');
		}
	}*/
}