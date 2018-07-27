<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
				
		$this->load->library('form_validation');
		$this->load->helper('MY');
		$this->load->model('user_model');
    }
    
    public function index() {
		$user_id = $this->session->userdata('user_id');
		$nama_user=$this->user_model->get_user_details($user_id);

		$this->load->model('headline_model');
		$data =['gambar' => $this->headline_model->list2(),
			'nama_user' => $nama_user
				];
        $this->load->view('users/index',$data);
        
    }

    public function login_form(){
        
        $this->load->view('login');
        
    }

	// Register user
	public function register(){
		
		
		
		$data['page_title'] = 'Pendaftaran User';

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

		if($this->form_validation->run() === FALSE){
			$this->load->view('users/layouts/header');
			$this->load->view('users/register', $data);
			$this->load->view('users/layouts/footer');
		} else {
			// Encrypt password
			$enc_password = md5($this->input->post('password'));
			$this->load->model('user_model');
			$this->user_model->register($enc_password);

			// Set message
			$this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');

			redirect('user');
		}
	}

	// Log in user
	public function login(){
		
		$data['page_title'] = 'Log In';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('index');
			
		} else {
			
			// Get username
			$username = $this->input->post('username');
			// Get & encrypt password
			$password = md5($this->input->post('password'));

			// Login user
			$user_id = $this->user_model->login($username, $password);
			

			if($user_id){
				// Buat session
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true,
					'level' => $this->user_model->get_user_level($user_id)

				);

				$this->session->set_userdata($user_data);

				// Set message
				$this->session->set_flashdata('user_loggedin', 'Anda sudah login');

				$levels = $this->db->select('fk_level_id');
				if($user_data['level'] == '1'){
					
					$this->load->view('admin/index');
					
				}else{
				
			//$nama_user = $this->user_model->get_user_details($username);
			$nama_user=$this->user_model->get_user_details($user_id);
			$data=['nama_user' => $nama_user];
				
				redirect('user/index', $data);
				
				}
			} else {
				// Set message
				$this->session->set_flashdata('login_failed', 'Login invalid');

				redirect('user/login');
			}		
		}
	}

	// Log user out
	public function logout(){
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		// Set message
		$this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

		redirect('user/login');
	}

	// Fungsi Dashboard
	function dashboard()
	{
		// Must login
	//	if(!$this->session->userdata('logged_in')) 
	//		redirect('user/login');

	//	$user_id = $this->session->userdata('user_id');

		// Dapatkan detail dari User
		$data['user'] = $this->user_model->get_user_details( $user_id );

		// Load view
		//$this->load->view('templates/header', $data, FALSE);
		$this->load->view('users/index', $data);
		//$this->load->view('templates/footer', $data, FALSE);
	}

}