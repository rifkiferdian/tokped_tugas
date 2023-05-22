<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Madmin');
	}

	public function index(){
		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
		$data['member']=$this->Madmin->get_all_data('tbl_member')->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/member/tampil', $data);
		$this->load->view('admin/layout/footer');
	}

	public function get_by_id($id){
		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
		$statusArray = array('Y' => 'Aktif', 'N' => 'Non Aktif', );
		$dataWhere = array('idKonsumen'=>$id);
		$data['statusArray'] = $statusArray;
		$data['Member'] = $this->Madmin->get_by_id('tbl_member', $dataWhere)->row_object();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/member/formEdit', $data);
		$this->load->view('admin/layout/footer');
	}

	public function edit(){
		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}

		// var_dump($_POST); die();

		$id = $this->input->post('id');	
		$statusAktif = $this->input->post('statusAktif');	
		$dataUpdate = array('statusAktif'=>$statusAktif);
		$this->Madmin->update('tbl_member', $dataUpdate, 'idKonsumen ', $id);
		redirect('member');
	}

	public function delete($id){
		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
		$this->Madmin->delete('tbl_member', 'idKonsumen', $id);
		redirect('member');
	}
}
