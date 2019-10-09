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
    $links2 = $this->uri->segment(4);

    $time = time();
    $path = './assets/back/images/narasumber/';
    $config['upload_path']    = $path;
    $config['allowed_types']  = 'pdf|jpeg|jpg|png|bmp';
    $config['max_size']       = '150000';
    $config['file_name']      = $time;
    $this->load->library('upload', $config);

    $thumb['image_library']  = 'gd2';
    $thumb['create_thumb']   = TRUE;
    $thumb['maintain_ratio'] = TRUE;
    $thumb['width']          = 600;
    $thumb['height']         = 600;

    if(!isset($_SESSION['logged_in'])){
      redirect('home');
    }else{
      if ($links == "add") {
        $data = array(
          'page' => "dashboard/crud_narasumber",
        );
      }else if ($links == "do_add") {
        $data_narasumber = array(
          'id'          => "",
          'nama'        => $this->input->post('nama'),
          'jns_kelamin' => $this->input->post('jns_kelamin'),
          'keterangan'  => $this->input->post('bio'),
        );

        // KONDISI SAAT MEMASUKKAN FOTO
        if ($_FILES['foto']['name'] == "") {
          $data_narasumber['foto'] = "";
        }else{
          if ( ! $this->upload->do_upload('foto')){ 
          $error = array('error' => $this->upload->display_errors());
          $pesan = $error['error'];
          echo $pesan;
          }else{
            $data_narasumber['foto'] = $this->upload->file_name;

            $thumb['source_image'] = 'assets/back/images/narasumber/'.$this->upload->file_name;
            $this->load->library('image_lib');
            $this->image_lib->initialize($thumb);
            $this->image_lib->resize();
            unlink($path.$this->upload->file_name);
          }
        }

        $ins_narasumber = $this->m_admin->InsertData('tb_narasumber', $data_narasumber);
        if ($ins_narasumber) {
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil ditambahkan.\",type: \"info\",styling: \"bootstrap3\"});'");
          redirect('dashboard/narasumber');
        }else{
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal ditambahkan.\",type: \"error\",styling: \"bootstrap3\"});'");
          redirect('dashboard/narasumber');
        }
      }else if ($links == "edit"){
        $data = array(
          'page'  => "dashboard/crud_narasumber",
          'data'  => $this->m_admin->getNarasumber($links2),
        );
      }else if ($links == "do_edit") {
        $data_narasumber = array(
          'nama' => $this->input->post('nama'),
          'jns_kelamin' => $this->input->post('jns_kelamin'),
          'keterangan' => $this->input->post('bio'),
        );

        // KONDISI SAAT MEMASUKKAN FOTO
        if ($_FILES['foto']['name'] != "") {
          if ( ! $this->upload->do_upload('foto')){ 
          $error = array('error' => $this->upload->display_errors());
          $pesan = $error['error'];
          echo $pesan;
          }else{
            $data_narasumber['foto'] = $this->upload->file_name;

            $thumb['source_image'] = 'assets/back/images/narasumber/'.$this->upload->file_name;
            $this->load->library('image_lib');
            $this->image_lib->initialize($thumb);
            $this->image_lib->resize();
            unlink($path.$this->upload->file_name);
            unlink($path.$this->input->post('oldfoto'));
          }
        }

        $where = array('id'=>$this->input->post('id'));
        $upd_narasumber = $this->m_admin->UpdateData('tb_narasumber', $data_narasumber, $where);
        if ($upd_narasumber) {
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil diperbarui.\",type: \"info\",styling: \"bootstrap3\"});'");
          redirect('dashboard/narasumber');
        }else{
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal diperbarui.\",type: \"error\",styling: \"bootstrap3\"});'");
          redirect('dashboard/narasumber');
        }
      }else if ($links == "delete") {
        $where = array('id'=>$links2);
        $filefoto = $this->m_admin->getContent('tb_narasumber', $where);
        $path = './assets/back/images/narasumber/';
        unlink($path.str_replace('.', '_thumb.', $filefoto[0]->foto));

        $del_narasumber = $this->m_admin->DeleteData('tb_narasumber', $where);
        if ($del_narasumber) {
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil dihapus.\",type: \"info\",styling: \"bootstrap3\"});'");
          redirect('dashboard/narasumber');
        }else{
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal dihapus.\",type: \"error\",styling: \"bootstrap3\"});'");
          redirect('dashboard/narasumber');
        }
      }else{
        $data = array(
          'page'  => "dashboard/narasumber",
          'data'  => $this->m_admin->getNarasumber(),
        ); 
      }
    }

    $this->load->view('dashboard/st_dashboard', $data);
  }

  public function workshop(){
    $links = $this->uri->segment(3);
    $links2 = $this->uri->segment(4);

    $time = time();
    $path = './assets/back/docs/materi/';
    $config['upload_path']    = $path;
    $config['allowed_types']  = 'pdf|docx|doc|pptx|ppt|xlsx|xls';
    $config['max_size']       = '150000';
    // $config['file_name']      = $time;
    $this->load->library('upload', $config);

    if(!isset($_SESSION['logged_in'])){
      redirect('home');
    }else{
      if ($links == "add") {
        $data = array(
          'page' => "dashboard/crud_workshop",
          'narsum' => $this->m_admin->getNarasumber(),
        );
      }else if ($links == "do_add") {
        echo "<pre>";
        print_r($_POST);
        $data_workshop = array(
          'id'            => "",
          'id_peserta'    => "",
          'id_narasumber' => $this->input->post('id_narasumber'),
          'nm_moderator'  => $this->input->post('nm_moderator'),
          'nm_kegiatan'   => $this->input->post('nm_kegiatan'),
          'status'        => $this->input->post('status'),
          'tgl_buka'      => $this->input->post('tgl_buka'),
          'tgl_tutup'     => $this->input->post('tgl_tutup'),
          'lokasi'        => $this->input->post('lokasi'),
          'kuota'         => $this->input->post('kuota'),
          'judul_materi'  => $this->input->post('judul_materi'),
          'keterangan'    => $this->input->post('keterangan'),
        );

        // KONDISI SAAT MEMASUKKAN FOTO
        if ($_FILES['file_materi']['name'] == "") {
          $data_workshop['file_materi'] = "";
        }else{
          if ( ! $this->upload->do_upload('file_materi')){ 
          $error = array('error' => $this->upload->display_errors());
          $pesan = $error['error'];
          echo $pesan;
          }else{
            $data_workshop['file_materi'] = $this->upload->file_name;
          }
        }

        $ins_workshop = $this->m_admin->InsertData('tb_workshop', $data_workshop);
        if ($ins_workshop) {
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil ditambahkan.\",type: \"info\",styling: \"bootstrap3\"});'");
          redirect('dashboard/workshop');
        }else{
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal ditambahkan.\",type: \"error\",styling: \"bootstrap3\"});'");
          redirect('dashboard/workshop');
        }
      }else if ($links == "edit"){
        $data = array(
          'page'  => "dashboard/crud_narasumber",
          'data'  => $this->m_admin->getNarasumber($links2),
        );
      }else if ($links == "do_edit") {
        $data_narasumber = array(
          'nama' => $this->input->post('nama'),
          'jns_kelamin' => $this->input->post('jns_kelamin'),
          'keterangan' => $this->input->post('bio'),
        );

        // KONDISI SAAT MEMASUKKAN FOTO
        if ($_FILES['foto']['name'] != "") {
          if ( ! $this->upload->do_upload('foto')){ 
          $error = array('error' => $this->upload->display_errors());
          $pesan = $error['error'];
          echo $pesan;
          }else{
            $data_narasumber['foto'] = $this->upload->file_name;

            $thumb['source_image'] = 'assets/back/images/narasumber/'.$this->upload->file_name;
            $this->load->library('image_lib');
            $this->image_lib->initialize($thumb);
            $this->image_lib->resize();
            unlink($path.$this->upload->file_name);
            unlink($path.$this->input->post('oldfoto'));
          }
        }

        $where = array('id'=>$this->input->post('id'));
        $upd_narasumber = $this->m_admin->UpdateData('tb_narasumber', $data_narasumber, $where);
        if ($upd_narasumber) {
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil diperbarui.\",type: \"info\",styling: \"bootstrap3\"});'");
          redirect('dashboard/narasumber');
        }else{
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal diperbarui.\",type: \"error\",styling: \"bootstrap3\"});'");
          redirect('dashboard/narasumber');
        }
      }else if ($links == "delete") {
        $where = array('id'=>$links2);
        $filefoto = $this->m_admin->getContent('tb_narasumber', $where);
        $path = './assets/back/images/narasumber/';
        unlink($path.str_replace('.', '_thumb.', $filefoto[0]->foto));

        $del_narasumber = $this->m_admin->DeleteData('tb_narasumber', $where);
        if ($del_narasumber) {
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil dihapus.\",type: \"info\",styling: \"bootstrap3\"});'");
          redirect('dashboard/narasumber');
        }else{
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal dihapus.\",type: \"error\",styling: \"bootstrap3\"});'");
          redirect('dashboard/narasumber');
        }
      }else{
        $data = array(
          'page'  => "dashboard/workshop",
          'data'  => $this->m_admin->getNarasumber(),
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

  public function getLogout(){
    if (empty($this->cek)) {
      header('location:'.site_url());
    }else{
      $this->session->sess_destroy();
      header('location:'.site_url());
    }
  }
}