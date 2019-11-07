<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function index()
	{
		$data = array(
			'page' => "tentang",
		);
		$this->load->view('st_front', $data);
	}
}
