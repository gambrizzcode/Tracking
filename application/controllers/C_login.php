<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function index(){
		$sess_login	= $this->session->userdata('login');
		if(empty($sess_login)){
			$this->load->view('petugas/login');
		}else{
			$this->data['page']	= "themes/dashboard";
			$this->load->view('themes',$this->data);
		}
	}

	public function do_login(){
		$username 	= $this->db->escape_str($this->input->post('username'));
		$password 	= $this->db->escape_str($this->input->post('password'));
		$pass 		= md5($password);

		$log_in = $this->Mymodel->ayo_login($username,$pass);

		if ($log_in) {
			foreach ($log_in as $row) {
				$sess_array = array(
					'kd_petugas' 	=> $row->kd_petugas,
					'nama_petugas' 	=> $row->nama_petugas,
					'kd_layanan'	=> $row->kd_layanan
				);
				$this->session->set_userdata('login',$sess_array);
			}
			if ($this->session->userdata('login')) {
				$session 				= $this->session->userdata('login');
				$data['kd_petugas']		= $session['kd_petugas'];
				$data['nama_petugas']	= $session['nama_petugas'];
				$data['kd_layanan']		= $session['kd_layanan'];
				redirect('C_themes','refresh');
			}
		}else{
			redirect('C_themes','refresh');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
