<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolatoko extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mmember');
	}

	public function index(){
		if(empty($this->session->userdata('userName'))){
			redirect('memberpanel');
		}

        $idKonsumen = $this->session->userdata('idKonsumen');
		$dataWhere = array('idKonsumen' => $idKonsumen);
		$cek_toko_ada = $this->Mmember->get_by_id('tbl_toko', $dataWhere)->row();

        $this->load->view('member/layout/header');
        $this->load->view('member/layout/menu');

        if (!$cek_toko_ada) {
            $this->load->view('member/toko/addToko');
        }else{
            $data['data'] = $cek_toko_ada;
            $this->load->view('member/toko/toko', $data);
        }

		$this->load->view('member/layout/footer');
	}

	public function add(){
		if(empty($this->session->userdata('userName'))){
			redirect('memberpanel');
		}

        $rules = array(
				array(
						'field' => 'namaToko',
						'label' => 'namaToko',
						'rules' => 'required'
				),
				array(
						'field' => 'deskripsi',
						'label' => 'deskripsi',
						'rules' => 'required'
				)
		);

		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$idKonsumen = $this->session->userdata('idKonsumen');
			        
	        $file_name = str_replace('.','',$idKonsumen);
			$config['upload_path']          = FCPATH.'/assets/upload/logoToko/';
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['file_name']            = $file_name;
			$config['overwrite']            = true;
			$config['max_size']             = 1024; // 1MB
			$config['max_width']            = 1080;
			$config['max_height']           = 1080;
			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload('logo')){
				$this->session->set_flashdata('message',$this->upload->display_errors());

			}else{
				$res_upload = $this->upload->data();
				$dataInput=array(
					'idKonsumen' => $idKonsumen,
					'namaToko' => $this->input->post('namaToko'),
					'deskripsi' => $this->input->post('deskripsi'),
					'logo' => $res_upload['file_name'],
					'statusAktif' => 'Y',
				);
				$this->Mmember->insert('tbl_toko', $dataInput);
				$this->session->set_flashdata('message','Berhasil membuat toko !');

			}

			$this->index();
		}

	}

	public function editForm($value='')
	{
		if (empty($this->session->userdata('userName'))) {
			redirect('memberpanel');
		}

		$idKonsumen = $this->session->userdata('idKonsumen');
		$dataWhere = array('idKonsumen' => $idKonsumen);
		$dt_toko = $this->Mmember->get_by_id('tbl_toko', $dataWhere)->row();
		$data['data'] = $dt_toko;

		$this->load->view('member/layout/header');
		$this->load->view('member/layout/menu');
		$this->load->view('member/toko/editToko', $data);
		$this->load->view('member/layout/footer');
	}

	public function edit($value='')
	{
		if(empty($this->session->userdata('userName'))){
			redirect('memberpanel');
		}

		$rules = array(
				array(
						'field' => 'namaToko',
						'label' => 'namaToko',
						'rules' => 'required'
				),
				array(
						'field' => 'deskripsi',
						'label' => 'deskripsi',
						'rules' => 'required'
				)
		);

		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE){
			$this->editForm();
		}else{
			$idKonsumen = $this->session->userdata('idKonsumen');
			        
	        $file_name = str_replace('.','',$idKonsumen);
			$config['upload_path']          = FCPATH.'/assets/upload/logoToko/';
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['file_name']            = $file_name;
			$config['overwrite']            = true;
			$config['max_size']             = 1024; // 1MB
			$config['max_width']            = 1080;
			$config['max_height']           = 1080;
			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload('logo')){

				$dataInput=array(
					'namaToko' => $this->input->post('namaToko'),
					'deskripsi' => $this->input->post('deskripsi'),
					'statusAktif' => $this->input->post('statusAktif'),
				);
				$this->Mmember->update('tbl_toko', $dataInput, 'idToko', $this->input->post('idToko'));

			}else{
				$res_upload = $this->upload->data();
				$dataInput=array(
					'namaToko' => $this->input->post('namaToko'),
					'deskripsi' => $this->input->post('deskripsi'),
					'logo' => $res_upload['file_name'],
					'statusAktif' => $this->input->post('statusAktif'),
				);
				$this->Mmember->update('tbl_toko', $dataInput, 'idToko', $this->input->post('idToko'));

			}

			$this->index();
		}
	}

	
}
