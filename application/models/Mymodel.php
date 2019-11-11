<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {
	function ayo_login($username,$password){
		$this->load->database();
		$this->db->select('kd_petugas,nama_petugas,kd_layanan');
		$this->db->from('petugas');
		$this->db->where('username', $username);
		$this->db->where('password', $password);		
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$hasil = $query->result();
			return $hasil;
		}else{
			return false;
		}
	}

	function add_petugas($data_petugas){
		$add_petugas = $this->db->insert('petugas',$data_petugas);
		return $data_petugas;
	}

	function add_layanan($data_layanan){
		$add_layanan = $this->db->insert('layanan',$data_layanan);
		return $data_layanan;
	}

	function add_permohonan($data_permohonan){
		$add_permohonan = $this->db->insert('permohonan',$data_permohonan);
		return $data_permohonan;
	}

	function kecamatan($kec){
		$this->db->select('desa');
		$this->db->from('kecamatan');
		$this->db->where('kec', $kec);

		$querykec = $this->db->get();
		return $querykec;
	}

	public function q_data($query, $start="", $limit=""){
		
		if(($start=="" && $limit=="") || ($start==" " && $limit==" ")){
			$LimData = "";
		}else{
			$LimData = "limit $start, $limit";
		}
		
		$return = $this->query_all("$query $LimData");
		return $return;
	}

	function query_all($Query){
		return $this->db->query("$Query");
	}

	function pilih($table){
		return $this->db->get($table);
	}

	function delete_record($table,$id,$value){
		return $this->db->delete($table, array($id => $value));
	}

	function update_record($table,$arr_data,$klausa,$v_klausa){
		$this->db->where($klausa,$v_klausa);
		$this->db->update($table,$arr_data);

		// return $this->db->set();
		return true;
	}
	function pagging_hal($Number, $JmlBaris, $Limit, $Url){
		
		$Number	= $Number;
		$to		= ($Number+1+$Limit);
		if($to>$JmlBaris){
			$to = $JmlBaris;
		}
		$return = "<div class='datatable-bottom'>";
		// $return .= "<div class='pull-left'>";
		// $return .= "<div class='dataTables_info' id='DataTables_Table_0_info' role='status' aria-live='polite'>
		// Menampilkan ".($Number+1)." sampai ".$to." dari ".$JmlBaris." data</div>";
		// $return .= "</div>";
		$return .= "<div class=\"pull-right\">";
		$return .= "<div class=\"dataTables_paginate paging_bootstrap\" id=\"DataTables_Table_0_paginate\">";
		$return .= "<ul class=\"pagination pagination-sm\">";
	
		if($Number==0){ $Min = 0;
		}else{ $Min = $Number-2; if($Min<=0){ $Min = $Number-1; } }
		$Max	= ceil($JmlBaris/$Limit);
		
		if($Min>=2){
			$return .= "<li class=\"prev\"><a href=\"".site_url($Url."/".($Number-1))."\" title=\"Previous\">
			<i class=\"ti-arrow-left mr5\"></i>Previous</a></li>";
		}
		for($nav = $Min; $nav <$Max; $nav++){
			if($Number==$nav){ 
				$return .= "<li class=\"active\"><a href=\"#\">".($Number+1)."</a></li>";
			}else{
				$return .= "<li><a href='".site_url($Url."/".$nav)."'>".($nav+1)."</a></li>";
			}
			
		}
		if(($Number+1)<$Max){
			$return .= "<li class=\"next\">
			<a href='".site_url($Url."/".($Number+1))."' title=\"Next\">
			<i class=\"ti-arrow-right mr5\"></i>Next</a></li>";
			//$return .= "<li class='page-pre'><a href='".site_url($Url."/".($JmlBaris-1))."'>Last</a></li>";
		}
		
		$return .= "</ul></div></div></div>";
		return $return;
	}
}