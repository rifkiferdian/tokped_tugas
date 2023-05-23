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

	public function formRegister($value='')
	{
		$qq = $this->Mmember->data_where("SELECT kode,nama FROM wilayah WHERE CHAR_LENGTH(kode)=5 ORDER BY nama;");
		$option = ''; 
		foreach ($qq->result() as $row)
		{
		        $option .= "<option value='$row->kode'>$row->nama</option>";
		}
		$data['option'] = $option;
		$this->load->view('member/register',$data);
	}

	public function registerMember($value='')
	{

		$rules = array(
				array(
						'field' => 'username',
						'label' => 'username',
						'rules' => 'required'
				),array(
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
						'field' => 'namaKonsumen',
						'label' => 'nama Lengkap',
						'rules' => 'required'
				),
				array(
						'field' => 'email',
						'label' => 'email',
						'rules' => 'required|valid_email'
				),
				array(
						'field' => 'telp',
						'label' => 'telp',
						'rules' => 'required'
				),
				array(
						'field' => 'alamat',
						'label' => 'alamat',
						'rules' => 'required'
				),
		);

		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE){
			$this->formRegister();
		}else{
			
			if ($this->input->post('password') !== $this->input->post('passconf')) {
				$this->session->set_flashdata('message','Konfirmasi password tidak sama !');
				redirect('memberpanel/formRegister');
			}

			$dataInput=array(
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'namaKonsumen' => $this->input->post('namaKonsumen'),
				'email' => $this->input->post('email'),
				'tlpn' => $this->input->post('telp'),
				'idKota' => $this->input->post('idKota'),
				'alamat' => $this->input->post('alamat'),
				'statusAktif' => 'Y',
			);
			$this->Mmember->insert('tbl_member', $dataInput);

			$this->session->set_flashdata('message','berhasil buat akun !');
			redirect('memberpanel/login');
		}
	}


    public function login($value='')
	{
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
