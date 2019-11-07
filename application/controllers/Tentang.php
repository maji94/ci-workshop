<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
		// $this->load->helper('security');
		// $this->load->helper('captcha');
    date_default_timezone_set('Asia/Jakarta');
  }

	public function index(){
		// $vals = array(
  //     'img_path'      => './captcha/',
  //     'img_url'       => './captcha/',
  //     'font_path'     => './path/to/fonts/texb.ttf',
  //     'img_width'     => '150',
  //     'img_height'    => '80',
  //     'expiration'    => 7200,
  //     'word_length'   => 8,
  //     'font_size'     => 40,
  //     'img_id'        => 'Imageid',
  //     'pool'          => '0123456789abcdefghijklmnopqrstuvwxyz',

  //     // White background and border, black text and red grid
  //     'colors'	=> array(
  //     'background' => array(255, 255, 255),
  //     'border' => array(0, 0, 0),
  //     'text' => array(0, 0, 0),
  //     'grid' => array(180, 180, 180)
  //     )
  //   );

		// $cap = create_captcha($vals);
		// $this->session->set_userdata('keycode', $cap['word']);

		$data = array(
			'page' => "tentang",
			// 'captcha'	=> $cap['image'],
		);

		$this->load->view('st_front', $data);
	}

	// public function lapor(){
	// 	$tableName = 'tb_pesan';
	// 	$captcha = $this->security->xss_clean($this->input->post('captcha'));

	// 	$data = array(
	// 		'nama'	=> $this->security->xss_clean($this->input->post('nama')),
	// 		'email'	=> $this->security->xss_clean($this->input->post('email')),
	// 		'nohp'	=> $this->security->xss_clean($this->input->post('nohp')),
	// 		'subjek'	=> $this->security->xss_clean($this->input->post('subjek')),
	// 		'isi'	=> $this->security->xss_clean($this->input->post('pesan')),
	// 		'status' => '1',
	// 	);

	// 	if ($captcha != $this->session->userdata('keycode')) {
	// 		$this->session->set_flashdata('notif','<div class="container" style="min-height: auto;margin-top:50px;"><div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Terjadi Kesalahan</h4>Pesan gagal dikirim.</div></div>');
	// 		redirect('kontak');
	// 	}else{
	// 		$res 	= $this->m_home->InsertData($tableName, $data);
	// 		if ($res) {
	// 			$this->session->set_flashdata('notif','<div class="container" style="min-height: auto;margin-top:50px;"><div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Sukses</h4>Pesan berhasil dikirim.</div></div>');
	// 			redirect('kontak');
	// 		}
	// 		else{
	// 			$this->session->set_flashdata('notif','<div class="container" style="min-height: auto;margin-top:50px;"><div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Terjadi Kesalahan</h4>Pesan gagal dikirim.</div></div>');
	// 			redirect('kontak');
	// 		}
	// 	}
	// }
}
