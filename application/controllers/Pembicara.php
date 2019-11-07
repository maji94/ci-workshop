<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembicara extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
    date_default_timezone_set('Asia/Jakarta');
  }

	public function index(){
	}

	public function all(){
		$id = $this->uri->segment(2);
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM `tb_narasumber`")->num_rows();
		$per_page		= 6;
		
		$awal	= $this->uri->segment(3); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;

		$data = array(
			'narasumber' => $this->m_admin->getNarasumber('',$akhir,$awal),
			'page' => "pembicara",
		);

		$data['pagi']	= _page($total_row, $per_page, 3, site_url("pembicara/".$id));
		$this->load->view('st_front', $data);
	}
}
