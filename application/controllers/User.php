<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['pagetitle'] = 'Demo page for Angular JS';
		$data['viewname'] = 'index_v';
		$data['scripts']['demo1'] = 'demo1';

		$this->load->view('master',$data);
	}

	public function json_get_user()
	{
		$this->load->model('Demo1_m','demo');
		$data = $this->demo->get_json_data();
		print json_encode($data);
	}
}
