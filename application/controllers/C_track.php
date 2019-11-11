<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_track extends CI_Controller {

	public function index(){
		
	}

	public function cek_dulu(){
		$kode = $this->db->escape_str($this->input->post('kode'));
		$validasi = strpos($kode,"/");

		if ($validasi == "" || $validasi == null || $validasi == 0) { //NIK
			$jenis = "NIK";
			$klausa = "nik";
		}else{//Noreg
			$jenis = "Nomor Registrasi";
			$klausa = "kd_reg";
		}

		$data = $this->Mymodel->query_all("SELECT * FROM permohonan WHERE $klausa ='$kode' ORDER BY tanggal DESC");
		if ($data->num_rows() == 1) {
			$this->data['kd_reg'] 		= $data->row()->kd_reg;
			$this->data['tanggal']		= $data->row()->tanggal;
			$this->data['nik']			= $data->row()->nik;
			$this->data['nama']			= $data->row()->nama;
			$this->data['alamat']		= $data->row()->alamat;
			$this->data['rt']			= $data->row()->rt;
			$this->data['rw']			= $data->row()->rw;
			$this->data['desa']			= $data->row()->desa;
			$this->data['kec']			= $data->row()->kec;
			$this->data['kd_layanan']	= $data->row()->kd_layanan;
			$this->data['status']		= $data->row()->status;
			$this->data['tgl_status']	= $data->row()->tgl_status;
			$this->data['ket']			= $data->row()->ket;
			$this->data['info']			= "ada";
		}else{
			$this->data['info'] = "Data tidak ditemukan, mohon masukkan nomor registrasi atau NIK dengan Benar.";
		}

		$this->data['kode'] = $kode;
		$this->data['jenis'] = $jenis;
		// $this->data['info'] = $info;


		$this->load->view('result',$this->data);
	}
}
