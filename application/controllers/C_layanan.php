<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_layanan extends CI_Controller {

	public function index(){
		$sess_login	= $this->session->userdata('login');
		if(empty($sess_login)){
			$this->load->view('tracking');
		}else{
			$this->grid_layanan();
		}
	}

	public function grid_layanan(){
		$this->data['qdatalayanan']	= $this->Mymodel->pilih("layanan")->result();

		$this->data['page']			= "layanan/grid_layanan";
		$this->load->view('themes',$this->data);
	}

	public function detail_layanan(){
		$kd_layanan = $this->db->escape_str($this->uri->segment(3));
		$data 		= $this->Mymodel->query_all("SELECT * FROM layanan WHERE kd_layanan ='$kd_layanan'");

		if ($data->num_rows() == 1) {
			$this->data['kd_layanan'] 		= $data->row()->kd_layanan;
			$this->data['nama_layanan']		= $data->row()->nama_layanan;
			$this->data['page']				= "layanan/detail_layanan";

			$this->load->view('themes',$this->data);
		}else{
			redirect('C_layanan','refresh');
		}
	}

	public function form_layanan(){
		$kd_layanan = $this->db->escape_str($this->uri->segment(3));
		$data 		= $this->Mymodel->query_all("SELECT * FROM layanan WHERE kd_layanan = '$kd_layanan'");
		if ($data->num_rows() == 1) {
			$this->data['kd_layanan'] 		= $data->row()->kd_layanan;
			$this->data['nama_layanan']		= $data->row()->nama_layanan;
		}else{
			$this->data['kd_layanan'] 		= "";
			$this->data['nama_layanan']		= "";
		}
		$this->data['page']	= "layanan/form_layanan";
		$this->load->view('themes',$this->data);
	}

	public function simpan_layanan(){
		$data_layanan = array(
			'kd_layanan'	=> $this->db->escape_str($this->input->post('kd_layanan')),
			'nama_layanan'	=> $this->db->escape_str($this->input->post('nama_layanan')),
			'ket'			=> ''
		);

		$this->Mymodel->add_layanan($data_layanan);

		$this->session->set_flashdata('pesan','Berhasil !!<hr>');
		redirect('C_layanan/grid_layanan','refresh');
	}

	public function update_layanan(){
		$kd_layanan = $this->db->escape_str($this->input->post('kd_layanan'));
		$data_update = array(
			'kd_layanan'	=> $this->db->escape_str($this->input->post('kd_layanan')),
			'nama_layanan'	=> $this->db->escape_str($this->input->post('nama_layanan')),
			'ket'			=> ''
		);

		$this->Mymodel->update_record('layanan',$data_update,'kd_layanan',$kd_layanan);
		$this->session->set_flashdata('pesan','Update Data Berhasil !!<hr>');
		redirect('C_layanan','refresh');
	}

	public function delete_layanan(){
		$kd_layanan = $this->db->escape_str($this->uri->segment(3));
		$this->Mymodel->delete_record('layanan','kd_layanan',$kd_layanan);

		$this->session->set_flashdata('pesan','Delete Data Berhasil !!<hr>');
		redirect('C_layanan','refresh');
	}

	public function print_detail_layanan(){
		$kd_layanan = $this->db->escape_str($this->uri->segment(3));
		$data 		= $this->Mymodel->query_all("SELECT * FROM layanan WHERE kd_layanan ='$kd_layanan'");

		if ($data->num_rows() == 1) {
			$this->data['kd_layanan'] 		= $data->row()->kd_layanan;
			$this->data['nama_layanan']		= $data->row()->nama_layanan;

			$this->load->view('layanan/print_layanan',$this->data);
		}else{
			redirect('C_layanan','refresh');
		}
	}
}
