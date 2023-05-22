<?php 


/**
 * 
 */
class Madmin extends CI_Model
{

	private $_table = 'tbl_admin';

	public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
		];
	}

	public function cek_login($username='',$password='')
	{
		$this->db->where('username', $username);
		$query = $this->db->get($this->_table);
		$user = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$user) {
			return 1;
		}

		// cek apakah passwordnya benar?
		if (!password_verify($password, $user->password)) {
			return 2;
		}

		return 0;
	}


	public function get_all_data($tabel){
		$q=$this->db->get($tabel);
		return $q;
	}

	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}

	public function get_by_id($tabel, $id){
		return $this->db->get_where($tabel, $id);
	}

	public function update($tabel, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

	public function delete($tabel, $id, $val){
		$this->db->delete($tabel, array($id => $val)); 
	}
}



 ?>