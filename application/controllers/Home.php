<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array(
			'page' => "home",
		);
		$this->load->view('st_front', $data);
	}
}

// data pribadi
// ============
// -foto
// -nama
// -no KTP
// -tempat lahir
// -tanggal lahir
// -jenis kelamin
// -agama
// -pendidikan terakhir
// -alamat rumah
// -email
// -no hp

// data kerjaan
// ============
// -nip
// -golongan
// -jabatan
// -unit kerja
// -kabupaten/kota
// -alamat kantor
// -npwp
// -norek dan bank