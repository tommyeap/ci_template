<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['pagetitle'] = 'Demo page for Angular JS';
		$data['viewname'] = 'index_v';
		$data['scripts']['demo1'] = 'demo1';

		$this->load->view('login.html',$data);
	}

	public function json_get_user()
	{
		$this-$gt;load-$gt;model('Demo1_m','demo');
		$data = $this->demo->get_json_data();
		print json_encode($data);
	}
}
