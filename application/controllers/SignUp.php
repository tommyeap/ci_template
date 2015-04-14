 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SignUp extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->process();
	}

    public function process()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data['page_title'] = 'Sign Up';

        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_uniqueUsername');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|callback_uniqueEmail');
        
        $this->form_validation->set_message('is_unique_email', 'The email has been taken. Try another.');

        if ($this->form_validation->run() == true)
        {
            $this->load->model('User');
            $blnAddedResult = $this->User->addUser($this->input->post('username'), sha1($this->input->post('password')), $this->input->post('email'));

            if($blnAddedResult == true)
            {
                $data = array(
                    'username' => $this->input->post('username'),
                    'is_logged_in' => 1
                );

                $this->session->set_userdata($data);
                redirect('auth/home');
            }
        }

        //fallback for unsuccess cases
        $this->load->view('signup', $data);
    }

    public function uniqueUsername()
    {
        $this->load->model('User');

        if($this->User->validUsername())
            return true;
        else {
            $this->form_validation->set_message('uniqueUsername', 'The username has been taken. Try another.');
            return false;
        }

    }

    public function uniqueEmail()
    {
        $this->load->model('User');

        if($this->User->validEmail())
            return true;
        else {
            $this->form_validation->set_message('uniqueEmail', 'The email has been used. Try another.');
            return false;
        }
    }
}