<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
    $this->cek = $this->session->userdata('logged_in');
    $this->set = $this->session->userdata('hak_akses');
    date_default_timezone_set('Asia/Jakarta');
    if (empty($this->cek)) {
      redirect('home');
    }
  }

	public function index()
	{
		$data = array(
			'page' => "dashboard/a_main_content",
		);
		$this->load->view('dashboard/st_dashboard', $data);
	}

  public function narasumber(){
    $links = $this->uri->segment(3);

    if(!isset($_SESSION['logged_in'])){
      redirect('home');
    }else{
      if ($links == "add") {
        $data = array(
          'page' => "dashboard/crud_narasumber",
        );
      }else{
        $data = array(
          'page'  => "dashboard/narasumber",
        ); 
      }
    }

    $this->load->view('dashboard/st_dashboard', $data);
  }

	public function getLogin(){
    $u = $this->security->xss_clean($this->input->post('nip'));
    $p = md5($this->security->xss_clean($this->input->post('password')));
    $duser = array(
      'username'  => $u,
      'password'  => $p,
    );

    $q_cek_login = $this->m_admin->getLogin($duser);
    if (count($q_cek_login)>0) {
      foreach ($q_cek_login as $qck) {
        $sess_data['logged_in'] = 'yes';
        $sess_data['id']        = $qck->id;
        $sess_data['username']  = $qck->username;
        $sess_data['nama']      = $qck->nama;
        $sess_data['foto']  	  = $qck->foto;
        $sess_data['hak_akses'] = $qck->hak_akses;
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
    );
    $hasil_nip = $this->m_admin->getContent('tb_user', $nip_reg);
    if(count($hasil_nip)==0){
        echo "1";
    }else{
        echo "2";
    }    
  }

  public function getRegister() {
		$time = time();
		$path = './assets/back/images/peserta/';
		$config['upload_path']		= $path;
		$config['allowed_types']	= 'pdf|jpeg|jpg|png|bmp';
		$config['max_size']				= '150000';
		$config['file_name']			= $time;
		$this->load->library('upload', $config);

		$thumb['image_library']  = 'gd2';
    $thumb['create_thumb']   = TRUE;
    $thumb['maintain_ratio'] = TRUE;
    $thumb['width']          = 600;
    $thumb['height']         = 600;		

		$data_user = array(
			'id'				=> "",
			'username'	=> $this->input->post("nip"),
			'password'	=> md5($this->input->post('konf_password')),
			'hak_akses'		=> "peserta",
		);

		$data_peserta = array(
			'id'				  => "",
			'nip'	        => $this->input->post('nip'),
			'nama'	      => $this->input->post('nama'),
			'ktp'	        => $this->input->post('ktp'),
			'tmp_lahir'	  => $this->input->post('tmp_lahir'),
			'tgl_lahir'	  => $this->input->post('tgl_lahir'),
			'jns_kelamin'	=> $this->input->post('jns_kelamin'),
			'agama'	      => $this->input->post('agama'),
			'pendidikan'	=> $this->input->post('pendidikan'),
			'alamat_rm'	  => $this->input->post('alamat_rm'),
			'email'	      => $this->input->post('email'),
			'nohp'	      => $this->input->post('nohp'),
			'golongan'	  => $this->input->post('golongan'),
			'jabatan'	    => $this->input->post('jabatan'),
			'unker'	      => $this->input->post('unker'),
			'kab'	        => $this->input->post('kab'),
			'alamat_kt'	  => $this->input->post('alamat_kt'),
			'npwp'	      => $this->input->post('npwp'),
			'norek'	      => $this->input->post('norek'),
		);

		// KONDISI SAAT MEMASUKKAN FOTO
    if ($_FILES['foto']['name'] == "") {
    	$data_peserta['foto'] = "";
		}else{
			if ( ! $this->upload->do_upload('foto')){	
			$error = array('error' => $this->upload->display_errors());
			$pesan = $error['error'];
			echo $pesan;
      }else{
      	$data_peserta['foto'] = $this->upload->file_name;

      	$thumb['source_image'] = 'assets/back/images/peserta/'.$this->upload->file_name;
        $this->load->library('image_lib');
        $this->image_lib->initialize($thumb);
        $this->image_lib->resize();
				unlink($path.$this->upload->file_name);
      }
		}

    $ins_peserta = $this->m_admin->InsertData('tb_peserta', $data_peserta);
    if ($ins_peserta) {
      $ins_user = $this->m_admin->InsertData('tb_user', $data_user);
      if ($ins_user) {
        $this->session->set_flashdata('notif', "<script>alert('Registrasi Sukses !!Data registrasi akan diverifikasi terlebih dahulu oleh admin. Terimakasih');</script>");
        redirect('home');
      }else{
        $this->session->set_flashdata('notif', "<script>alert('Terjadi Kesalahan !!Silahkan coba lagi nanti atau hubungi admin.');</script>");
        redirect('home');
      }
    }
  }

  public function getLogout(){
    if (empty($this->cek)) {
      header('location:'.site_url());
    }else{
      $this->session->sess_destroy();
      header('location:'.site_url());
    }
  }
}