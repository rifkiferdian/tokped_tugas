<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

	/**
	 * Adminpanel Page for this controller.
	 *
	 *
	 * 
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('Madmin');
	}

	public function index()
	{
		if (!empty($this->session->userdata('userName'))) {
			redirect('adminpanel/dashboard');
		}
		$this->load->view('admin/login');
	}


	public function profilAdmin($value='')
	{

		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}

		$userName = $this->session->userdata('userName');
		$dataWhere = array('username'=>$userName);
		$data['data'] = $this->Madmin->get_by_id('tbl_admin', $dataWhere)->row_object();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/profil_admin', $data);
		$this->load->view('admin/layout/footer');
	}

	public function gantiPassword($value='')
	{

		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
		
		$userName = $this->session->userdata('userName');
		$dataWhere = array('username'=>$userName);
		$data['data'] = $this->Madmin->get_by_id('tbl_admin', $dataWhere)->row_object();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/ganti_password', $data);
		$this->load->view('admin/layout/footer');
	}

	public function actionGantiPassword(Type $var = null)
	{

		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}

		$rules = array(
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required'
				),
				array(
						'field' => 'passconf',
						'label' => 'Password Confirmation',
						'rules' => 'required'
				),
				array(
						'field' => 'passwordLama',
						'label' => 'password Lama',
						'rules' => 'required'
				)
		);
		$passwordLama = $this->input->post('passwordLama');
		$password = $this->input->post('password');
		$passconf = $this->input->post('passconf');

		$this->form_validation->set_rules($rules);

		$username = $this->session->userdata('userName');
		$cek_pass_lama = $this->Madmin->cek_login($username,$passwordLama);

		if($this->form_validation->run() == FALSE){
			$this->gantiPassword();
		}else{

			if ($cek_pass_lama === 2) {
				$this->session->set_flashdata('message','Password lama salah !');
				redirect('adminpanel/gantiPassword');
			}

			if ($password !== $passconf) {
				$this->session->set_flashdata('message','Konfirmasi password tidak sama !');
				redirect('adminpanel/gantiPassword');
			}

			$dataUpdate = array('password' => password_hash($password, PASSWORD_DEFAULT));
			$this->Madmin->update('tbl_admin', $dataUpdate, 'username', $username);

			$this->session->set_flashdata('message','Password berhasil di rubah !');
			redirect('adminpanel/profilAdmin');
		}

	}


	public function login($value='')
	{
		$this->load->model('Madmin');
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

		if (empty($this->session->userdata('userName'))) {
			redirect('adminpanel');
		}

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		// $this->load->view('admin/layout/content');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layout/footer');
	}
}
