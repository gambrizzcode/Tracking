<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_themes extends CI_Controller {

	public function index(){
		$sess_login	= $this->session->userdata('login');
		if(empty($sess_login)){
			$this->load->view('tracking');
		}else{
			$this->data['page']	= "themes/dashboard";
			$this->load->view('themes',$this->data);
		}
	}
}
