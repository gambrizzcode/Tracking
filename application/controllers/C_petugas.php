<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_petugas extends CI_Controller {

	public function index(){
		$sess_login	= $this->session->userdata('login');
		if(empty($sess_login)){
			$this->load->view('tracking');
		}else{
			$this->grid_petugas();
		}
	}

	public function grid_petugas(){
		// $PageNumber					= $this->uri->segment(3)+0;
		// $Limit						= 200;
		// $PageLimit					= $PageNumber*$Limit;

		// $qdata_petugas				= "SELECT * FROM petugas ORDER BY kd_petugas ASC";
		// $Row_Accunt					= $this->Mymodel->q_data($qdata_petugas)->num_rows();
		// $Page						= $this->uri->segment(1)."/".$this->uri->segment(2);
		// $this->data['No']			= $PageLimit;
		// $this->data['qdatapetugas']	= $this->Mymodel->q_data($qdata_petugas, $PageLimit, $Limit)->result();
		// $this->data['pagging']		= $this->Mymodel->pagging_hal($PageNumber, $Row_Accunt, $Limit, $Page);

		$this->data['qdatapetugas']	= $this->Mymodel->pilih("petugas")->result();

		$this->data['page']			= "petugas/grid_petugas";
		$this->load->view('themes',$this->data);
	}

	public function detail_petugas(){
		$kd_petugas = $this->db->escape_str($this->uri->segment(3));
		$data 		= $this->Mymodel->query_all("SELECT * FROM petugas WHERE kd_petugas ='$kd_petugas'");

		if ($data->num_rows() == 1) {
			$this->data['kd_petugas'] 		= $data->row()->kd_petugas;
			$this->data['nama_petugas']		= $data->row()->nama_petugas;
			$this->data['username']			= $data->row()->username;
			$this->data['password']			= $data->row()->password;
			$this->data['kd_layanan']		= $data->row()->kd_layanan;
			$this->data['page']				= "petugas/detail_petugas";

			$this->load->view('themes',$this->data);
		}else{
			redirect('C_petugas','refresh');
		}
	}

	public function form_petugas(){
		$kd_petugas = $this->db->escape_str($this->uri->segment(3));
		$data 		= $this->Mymodel->query_all("SELECT * FROM petugas WHERE kd_petugas = '$kd_petugas'");
		if ($data->num_rows() == 1) {
			$this->data['kd_petugas'] 		= $data->row()->kd_petugas;
			$this->data['nama_petugas']		= $data->row()->nama_petugas;
			$this->data['username']			= $data->row()->username;
			$this->data['password']			= $data->row()->password;
			$this->data['kd_layanan']		= $data->row()->kd_layanan;
		}else{
			$this->data['kd_petugas'] 		= "";
			$this->data['nama_petugas']		= "";
			$this->data['username']			= "";
			$this->data['password']			= "";
			$this->data['kd_layanan']		= "";
		}
		$this->data['page']	= "petugas/form_petugas";
		$this->load->view('themes',$this->data);
	}

	public function simpan_petugas(){
		$data_petugas = array(
			'kd_petugas'	=> $this->db->escape_str($this->input->post('kd_petugas')),
			'nama_petugas'	=> $this->db->escape_str($this->input->post('nama_petugas')),
			'username'		=> $this->db->escape_str($this->input->post('username')),
			'password'		=> md5($this->db->escape_str($this->input->post('password'))),
			'kd_layanan'	=> $this->db->escape_str($this->input->post('kd_layanan')),
			'ket'			=> ''
		);

		$this->Mymodel->add_petugas($data_petugas);

		$this->session->set_flashdata('pesan','Berhasil !!<hr>');
		redirect('C_petugas/grid_petugas','refresh');
	}

	public function update_petugas(){
		$kd_petugas = $this->db->escape_str($this->input->post('kd_petugas'));
		$q_cek = $this->Mymodel->query_all("SELECT * FROM petugas WHERE kd_petugas = '$kd_petugas'")->row();
		$f_cek = $q_cek->password;
		if ($f_cek == $this->db->escape_str($this->input->post('password'))) {
			$pass_word = $f_cek;
		}else{
			$pass_word = md5($this->db->escape_str($this->input->post('password')));
		}
		$data_update = array(
			'kd_petugas'	=> $this->db->escape_str($this->input->post('kd_petugas')),
			'nama_petugas'	=> $this->db->escape_str($this->input->post('nama_petugas')),
			'username'		=> $this->db->escape_str($this->input->post('username')),
			'password'		=> $pass_word,
			'kd_layanan'	=> $this->db->escape_str($this->input->post('kd_layanan')),
			'ket'			=> ''
		);

		$this->Mymodel->update_record('petugas',$data_update,'kd_petugas',$kd_petugas);
		$this->session->set_flashdata('pesan','Update Data Berhasil !!<hr>');
		redirect('C_petugas','refresh');
	}

	public function delete_petugas(){
		$kd_petugas = $this->db->escape_str($this->uri->segment(3));
		$this->Mymodel->delete_record('petugas','kd_petugas',$kd_petugas);

		$this->session->set_flashdata('pesan','Delete Data Berhasil !!<hr>');
		redirect('C_petugas','refresh');
	}

	public function print_detail_petugas(){
		$kd_petugas = $this->db->escape_str($this->uri->segment(3));
		$data 		= $this->Mymodel->query_all("SELECT * FROM petugas WHERE kd_petugas ='$kd_petugas'");

		if ($data->num_rows() == 1) {
			$this->data['kd_petugas'] 		= $data->row()->kd_petugas;
			$this->data['nama_petugas']		= $data->row()->nama_petugas;
			$this->data['username']			= $data->row()->username;
			$this->data['password']			= $data->row()->password;
			$this->data['kd_layanan']		= $data->row()->kd_layanan;

			$this->load->view('petugas/print_petugas',$this->data);
		}else{
			redirect('C_petugas','refresh');
		}
	}
}