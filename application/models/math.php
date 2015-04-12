<?php

class Math extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    
	public function add()
	{
		$this->load->library('encrypt');
		return $this->encrypt->encode(1+1);
	}
}