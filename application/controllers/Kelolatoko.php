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

        echo '<pre>'.print_r($_POST,1).'</pre>';
        die();

        $idKonsumen = $this->session->userdata('idKonsumen');
        $file_name = str_replace('.','',$idKonsumen);
		$config['upload_path']          = FCPATH.'/upload/avatar/';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['file_name']            = $file_name;
		$config['overwrite']            = true;
		$config['max_size']             = 1024; // 1MB
		$config['max_width']            = 1080;
		$config['max_height']           = 1080;

		$this->load->view('member/layout/header');
		$this->load->view('member/layout/menu');
		$this->load->view('member/kategori/formAdd');
		$this->load->view('member/layout/footer');
	}

	public function save(){
		if(empty($this->session->userdata('userName'))){
			redirect('memberpanel');
		}

		$namaKat = $this->input->post('namaKat');
		$rules = $this->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$this->add();
		}else{
			
			$dataInput=array('namaKat'=>$namaKat);
			$this->Mmember->insert('tbl_kategori', $dataInput);
			redirect('kategori');
		}

	}

	public function get_by_id($id){
		if(empty($this->session->userdata('userName'))){
			redirect('memberpanel');
		}
		$dataWhere = array('idkat'=>$id);
		$data['kategori'] = $this->Mmember->get_by_id('tbl_kategori', $dataWhere)->row_object();
		$this->load->view('member/layout/header');
		$this->load->view('member/layout/menu');
		$this->load->view('member/kategori/formEdit', $data);
		$this->load->view('member/layout/footer');
	}

	public function edit(){
		if(empty($this->session->userdata('userName'))){
			redirect('memberpanel');
		}
		$id = $this->input->post('id');	
		$namaKategori = $this->input->post('namaKat');	
		$dataUpdate = array('namaKat'=>$namaKategori);
		$this->Mmember->update('tbl_kategori', $dataUpdate, 'idkat', $id);
		redirect('kategori');
	}

	public function delete($id){
		if(empty($this->session->userdata('userName'))){
			redirect('memberpanel');
		}
		$this->Mmember->delete('tbl_kategori', 'idkat', $id);
		redirect('kategori');
	}
}
