 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validate_credentials');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
	}
	public function index()
	{   
		$data['page_title'] = 'Login';
		$data['login_form_url'] = base_url('auth/login');
        $this->load->view('login', $data);
	}

	public function login()
	{
		$data['page_title'] = 'Login';

		if ($this->form_validation->run() == true)
        {
        	//$this->_loginProcess();
        	$data = array(
        		'username' => $this->input->post('username'),
        		'is_logged_in' => 1
        	);

        	$this->session->set_userdata($data);

        	redirect('auth/home');
        } else {
        	$this->load->view('login', $data);
        }
	}

	public function validate_credentials()
	{
		$this->load->model('User');

		if($this->User->validLogin())
			return true;
		else {
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/password. Try Again');
			return false;
		}
	}

	public function home()
	{
		if($this->session->userdata('is_logged_in'))
			$this->load->view('home');
		else
			redirect('auth/login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}