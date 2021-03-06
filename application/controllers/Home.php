<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
    date_default_timezone_set('Asia/Jakarta');
    $this->cek_status_workshop();
  }

	public function index()
	{
		$data = array(
			'workshop' => $this->m_admin->getWorkshop(),
			'galeri' => $this->m_admin->getGaleri(),
			'narasumber' => $this->m_admin->getOther('tb_narasumber'),
			'page' => "home",
		);
		$this->load->view('st_front', $data);
	}

	public function cek_status_workshop(){
    $cek = $this->m_admin->cek_status_workshop();

    foreach ($cek as $d) {
      if (date('Y-m-d') > $d->tgl_tutup) {
        $this->m_admin->UpdateData('tb_workshop',array('status'=>"close"), array('id'=>$d->id));
      }
    }
  }

	public function getLogin() {
		if($_SESSION['logged_in']){
      redirect('home');
    }else{
	    $u = $this->security->xss_clean($this->input->post('nip'));
	    $p = md5($this->security->xss_clean($this->input->post('password')));
	    $duser = array(
	      'username'  => $u,
	      'password'  => $p,
	    );

	    if ($u == "admins") {
		    $q_cek_login = $this->m_admin->getContent('tb_user', $duser);
		    if (count($q_cek_login)>0) {
		      foreach ($q_cek_login as $qck) {
		        $sess_data['logged_in'] = 'yes';
		        $sess_data['id']        = $qck->id;
		        $sess_data['username']  = $qck->username;
		        $sess_data['hak_akses'] = $qck->hak_akses;
		        $this->session->set_userdata($sess_data);

		        redirect('dashboard');
		      }
		    }else{
		      $this->session->set_flashdata('notif',"<script>alert('Username Atau Password Tidak Valid');</script>");
		      redirect('home');
	    	}
	    }else{
		    $q_cek_login = $this->m_admin->getLogin($duser);
		    if (count($q_cek_login)>0) {
		      foreach ($q_cek_login as $qck) {
		        $sess_data['logged_in'] = 'yes';
		        $sess_data['id']        = $qck->id;
		        $sess_data['username']  = $qck->username;
		        $sess_data['nama']      = $qck->nama;
		        $sess_data['foto']  	  = $qck->foto;
		        $sess_data['hak_akses'] = $qck->hak_akses;
		        $sess_data['id_profil'] = $qck->id_profil;
		        $this->session->set_userdata($sess_data);

		        redirect('dashboard');
		      }
		    }else{
		    	$q_cek_login2 = $this->m_admin->getLogin2($duser);
		    	if (count($q_cek_login2)>0) {
			      foreach ($q_cek_login2 as $qck) {
			        $sess_data['logged_in'] = 'yes';
			        $sess_data['id']        = $qck->id;
			        $sess_data['username']  = $qck->username;
			        $sess_data['nama']      = $qck->nama;
			        $sess_data['foto']  	  = $qck->foto;
			        $sess_data['hak_akses'] = $qck->hak_akses;
			        $sess_data['id_profil'] = $qck->id_profil;
			        $this->session->set_userdata($sess_data);

			        redirect('dashboard');
			      }
		    	}else{
			      $this->session->set_flashdata('notif',"<script>alert('Username Atau Password Tidak Valid');</script>");
			      redirect('home');
		    	}
		    }	
	    }
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
  	if($_SESSION['logged_in']){
      redirect('home');
    }else{
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
	}
}