<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
    date_default_timezone_set('Asia/Jakarta');
  }

	public function index()
	{
		$data = array(
			'page' => "home",
		);
		$this->load->view('st_front', $data);
	}

	public function getLogin() {
    $u = $this->security->xss_clean($this->input->post('user'));
    $p = md5($this->security->xss_clean($this->input->post('password')));
    $duser = array(
      'username'  => $u,
      'password'  => $p,
    );

    $q_cek_login = $this->m_admin->getLogin($duser);
    if (count($q_cek_login)>0) {
      foreach ($q_cek_login as $qck) {
        $sess_data['logged_in']  = 'yes';
        $sess_data['foto']  		 = $qck->foto;
        $sess_data['lvl_user']   = $qck->level;
        $sess_data['id_user']    = $qck->id_user;
        $sess_data['username']   = $qck->username;
        $this->session->set_userdata($sess_data);

        redirect('admin');
      }
    }
    else{
      echo "<script>alert('Username Atau Password Tidak Valid');</script>";
    }
  }

  public function cek_status_nip(){
    $nip_reg = array(
    	'username' => $_POST['nip_reg']
    	// 'username' => '1771022407940004'
    );
    $hasil_nip = $this->m_admin->getContent('tb_user', $nip_reg);
    if(count($hasil_nip)==0){
        echo "1";
    }else{
        echo "2";
    }    
  }

  public function getRegister() {
  	echo "<pre>";
  	print_r($_POST);
    $u = $this->security->xss_clean($this->input->post('nip_reg'));
    $p = md5($this->security->xss_clean($this->input->post('konf_password')));
    $duser = array(
      'username'  => $u,
      'password'  => $p,
    );

    // $q_cek_login = $this->m_admin->getLogin($duser);
    // if (count($q_cek_login)>0) {
    //   foreach ($q_cek_login as $qck) {
    //     $sess_data['logged_in']  = 'yes';
    //     $sess_data['foto']  		 = $qck->foto;
    //     $sess_data['lvl_user']   = $qck->level;
    //     $sess_data['id_user']    = $qck->id_user;
    //     $sess_data['username']   = $qck->username;
    //     $this->session->set_userdata($sess_data);

    //     redirect('admin');
    //   }
    // }
    // else{
    //   echo "<script>alert('Username Atau Password Tidak Valid');</script>";
    // }
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