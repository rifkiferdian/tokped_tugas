<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

	/**
	 * Adminpanel Page for this controller.
	 *
	 *
	 * 
	 */
	public function index()
	{
		$this->load->view('admin/login');
	}

	public function login($value='')
	{
		$this->load->model('Madmin');
		$this->load->library('form_validation');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$rules = $this->Madmin->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('admin/login');
		}

		$cek = $this->Madmin->cek_login($username,$password);

		if ($cek === 0) {
			$dataSession = array('userName' => $username, 'status' => 'login',  );
			$this->session->set_userdata($dataSession);
			redirect('adminpanel/dashboard');
		}elseif ($cek === 1) {
			$this->session->set_flashdata('message','username salah !');
			redirect('adminpanel');
		}{
			$this->session->set_flashdata('message','Password salah !');
			redirect('adminpanel');
		}

	}

	public function logout($value='')
	{
		$this->session->sess_destroy();
		redirect('adminpanel');

	}

	public function dashboard($value='')
	{

		if (empty($this->session->userdata('username'))) {
			redirect('adminpanel');
		}

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		// $this->load->view('admin/layout/content');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layout/footer');
	}

	public function FunctionName($value='')
	{
		$this->session->sess_destroy();
	}
}
