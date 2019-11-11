<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_permohonan extends CI_Controller {

	public function index(){
		$sess_login	= $this->session->userdata('login');
		if(empty($sess_login)){
			$this->load->view('tracking');
		}else{
			$this->grid_permohonan();
		}
	}

	public function grid_permohonan(){
		$dari 	= $this->db->escape_str($this->input->post('dari'));
		$ke   	= $this->db->escape_str($this->input->post('ke'));
		$fillay = $this->db->escape_str($this->input->post('fillay'));

		if ($dari == "" && $ke == "" && $fillay == "") {
			$query = "SELECT * FROM permohonan ORDER BY tanggal DESC";
		}elseif($dari == "" && $ke == "" && $fillay != ""){
			$query = "SELECT * FROM permohonan WHERE kd_layanan = '$fillay' ORDER BY tanggal DESC";
		}elseif($dari != "" && $ke != "" && $fillay == ""){
			$query = "SELECT * FROM permohonan WHERE tanggal BETWEEN '$dari' AND '$ke' ORDER BY tanggal DESC";
		}elseif($dari != "" && $ke !="" && $fillay != ""){
			$query = "SELECT * FROM permohonan WHERE kd_layanan = '$fillay' AND tanggal BETWEEN '$dari' AND '$ke' ORDER BY tanggal DESC";
		}else{
			$query = "SELECT * FROM permohonan ORDER BY tanggal DESC";
		}

		$PageNumber						= $this->uri->segment(3)+0;
		$Limit							= 200;
		$PageLimit						= $PageNumber*$Limit;

		$qdata_permohonan				= $query;
		$Row_Accunt						= $this->Mymodel->q_data($qdata_permohonan)->num_rows();
		$Page							= $this->uri->segment(1)."/".$this->uri->segment(2);
		$this->data['No']				= $PageLimit;
		$this->data['qdatapermohonan']	= $this->Mymodel->q_data($qdata_permohonan, $PageLimit, $Limit)->result();
		$this->data['pagging']			= $this->Mymodel->pagging_hal($PageNumber, $Row_Accunt, $Limit, $Page);
		$this->data['fillay']			= $fillay;
		$this->data['dari']				= $dari;
		$this->data['ke']				= $ke;

		$this->data['page']				= "permohonan/grid_permohonan";
		$this->load->view('themes',$this->data);
	}

	public function detail_permohonan(){
		$tiga = $this->uri->segment(3);
		$empat = $this->uri->segment(4);
		$lima = $this->uri->segment(5);
		$enam = $this->uri->segment(6);
		$kd_reg = $tiga."/".$empat."/".$lima."/".$enam;
		$data 	= $this->Mymodel->query_all("SELECT * FROM permohonan WHERE kd_reg ='$kd_reg'");

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
			$this->data['page']			= "permohonan/detail_permohonan";

			$this->load->view('themes',$this->data);
		}else{
			// echo base64_encode($_SERVER['PHP_SELF']);
			// redirect('C_permohonan','refresh');
		}
	}

	public function form_permohonan(){
		$tiga = $this->uri->segment(3);
		$empat = $this->uri->segment(4);
		$lima = $this->uri->segment(5);
		$enam = $this->uri->segment(6);
		$kd_reg = $tiga."/".$empat."/".$lima."/".$enam;
		$data 		= $this->Mymodel->query_all("SELECT * FROM permohonan WHERE kd_reg = '$kd_reg'");
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
		}else{
			$this->data['kd_reg'] 		= "";
			$this->data['tanggal']		= "";
			$this->data['nik']			= "";
			$this->data['nama']			= "";
			$this->data['alamat']		= "";
			$this->data['rt']			= "";
			$this->data['rw']			= "";
			$this->data['desa']			= "";
			$this->data['kec']			= "";
			$this->data['kd_layanan']	= "";
			$this->data['status']		= "";
			$this->data['tgl_status']	= "";
			$this->data['ket']			= "";
		}
		$this->data['page']	= "permohonan/form_permohonan";
		$this->load->view('themes',$this->data);
	}

	public function simpan_permohonan(){
		$data_permohonan = array(
			'kd_reg'		=> $this->db->escape_str($this->input->post('kd_layanan')).$this->db->escape_str($this->input->post('kd_reg')),
			'tanggal'		=> date('Y-m-d H:i:s'),
			'nik'			=> $this->db->escape_str($this->input->post('nik')),
			'nama'			=> $this->db->escape_str($this->input->post('nama')),
			'alamat'		=> $this->db->escape_str($this->input->post('alamat')),
			'rt'			=> $this->db->escape_str($this->input->post('rt')),
			'rw'			=> $this->db->escape_str($this->input->post('rw')),
			'desa'			=> $this->db->escape_str($this->input->post('desa')),
			'kec'			=> $this->db->escape_str($this->input->post('kec')),
			'kd_layanan'	=> $this->db->escape_str($this->input->post('kd_layanan')),
			'status'		=> $this->db->escape_str($this->input->post('status')),
			'tgl_status'	=> $this->db->escape_str($this->input->post('tgl_status')),
			'ket'			=> $this->db->escape_str($this->input->post('ket')),
		);

		$this->Mymodel->add_permohonan($data_permohonan);

		$this->session->set_flashdata('pesan','Berhasil !!<hr>');
		redirect('C_permohonan/grid_permohonan','refresh');
	}

	public function update_permohonan(){
		$kd_reg = $this->db->escape_str($this->input->post('kd_reg'));
		$data_update = array(
			'kd_reg'		=> $this->db->escape_str($this->input->post('kd_reg')),
			'nik'			=> $this->db->escape_str($this->input->post('nik')),
			'nama'			=> $this->db->escape_str($this->input->post('nama')),
			'alamat'		=> $this->db->escape_str($this->input->post('alamat')),
			'rt'			=> $this->db->escape_str($this->input->post('rt')),
			'rw'			=> $this->db->escape_str($this->input->post('rw')),
			'desa'			=> $this->db->escape_str($this->input->post('desa')),
			'kec'			=> $this->db->escape_str($this->input->post('kec')),
			'kd_layanan'	=> $this->db->escape_str($this->input->post('kd_layanan')),
			'status'		=> $this->db->escape_str($this->input->post('status')),
			'tgl_status'	=> $this->db->escape_str($this->input->post('tgl_status')),
			'ket'			=> $this->db->escape_str($this->input->post('ket')),
		);

		$this->Mymodel->update_record('permohonan',$data_update,'kd_reg',$kd_reg);
		$this->session->set_flashdata('pesan','Update Data Berhasil !!<hr>');
		redirect('C_permohonan','refresh');
	}

	public function delete_permohonan(){
		$tiga = $this->uri->segment(3);
		$empat = $this->uri->segment(4);
		$lima = $this->uri->segment(5);
		$enam = $this->uri->segment(6);
		$kd_reg = $tiga."/".$empat."/".$lima."/".$enam;
		$this->Mymodel->delete_record('permohonan','kd_reg',$kd_reg);

		$this->session->set_flashdata('pesan','Delete Data Berhasil !!<hr>');
		redirect('C_permohonan','refresh');
	}

	public function print_detail_permohonan(){
		$tiga = $this->uri->segment(3);
		$empat = $this->uri->segment(4);
		$lima = $this->uri->segment(5);
		$enam = $this->uri->segment(6);
		$kd_reg = $tiga."/".$empat."/".$lima."/".$enam;
		$data 	= $this->Mymodel->query_all("SELECT * FROM permohonan WHERE kd_reg ='$kd_reg'");

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

			$this->load->view('permohonan/print_permohonan',$this->data);
		}else{
			redirect('C_permohonan','refresh');
		}
	}

	public function cetak_permohonan(){
		redirect('C_permohonan','refresh');
	}

	function kec_ajax(){
		$qkadapat = $this->Mymodel->kecamatan($_GET['kec']);
		$kadapat  = $qkadapat->result();
			echo "<option value=''>--- Pilih Desa</option>";
		foreach ($kadapat as $kk => $vk) {
			echo "<option value=".$vk->desa.">".$vk->desa."</option>";
		}
	}

}
