<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memberpanel extends CI_Controller {

	/**
	 * Adminpanel Page for this controller.
	 *
	 *
	 * 
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('Mmember');
	}

	public function index()
	{
		if (!empty($this->session->userdata('userName'))) {
			redirect('memberpanel/dashboard');
		}
		$this->load->view('member/login');
	}

    public function login($value='')
	{
		$this->load->model('Mmember');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$rules = $this->Mmember->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('member/login');
		}

		$cek = $this->Mmember->cek_login($username,$password);

		if ($cek === 0) {
			redirect('memberpanel/dashboard');
		}elseif ($cek === 1) {
			$this->session->set_flashdata('message','username salah !');
			redirect('memberpanel');
		}{
			$this->session->set_flashdata('message','Password salah !');
			redirect('memberpanel');
		}

	}

    public function dashboard($value='')
	{

		if (empty($this->session->userdata('userName'))) {
			redirect('memberpanel');
		}

		$this->load->view('member/layout/header');
		$this->load->view('member/layout/menu');
		$this->load->view('member/dashboard');
		$this->load->view('member/layout/footer');
	}

    public function logout($value='')
	{
		$this->session->sess_destroy();
		redirect('memberpanel');

	}
}
