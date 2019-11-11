<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_laporan extends CI_Controller {

	public function index(){
		$sess_login	= $this->session->userdata('login');
		if(empty($sess_login)){
			$this->load->view('tracking');
		}else{
			$this->data['page']	= "laporan/grid_laporan";
			$this->load->view('themes',$this->data);
		}
	}

	
}
