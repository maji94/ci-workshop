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
      if ($links == "cetak") {
        $narasumber=array();
        $peserta = $this->m_admin->getListPeserta($links2);
        if (!empty($peserta)) {
          $narasumber = $this->m_admin->getWorkshop($peserta[0]->id_workshop);
        }

        $data = array(
          'peserta' => $peserta,
          'narasumber' => $narasumber,
        );
        $this->load->view('dashboard/print_daftar_hadir', $data);
      } else {
        if ($links == "add") {
          $data = array(
            'page' => "dashboard/crud_workshop",
            'narsum' => $this->m_admin->getNarasumber(),
          );
        }else if ($links == "do_add") {
          $data_workshop = array(
            'id'            => "",
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
            'page'  => "dashboard/crud_workshop",
            'narsum'  => $this->m_admin->getNarasumber(),
            'data'  => $this->m_admin->getWorkshop($links2),
          );
        }else if ($links == "do_edit") {
          $data_workshop = array(
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
          if ($_FILES['file_materi']['name'] != "") {
            if ( ! $this->upload->do_upload('file_materi')){ 
            $error = array('error' => $this->upload->display_errors());
            $pesan = $error['error'];
            echo $pesan;
            }else{
              $data_workshop['file_materi'] = $this->upload->file_name;
              unlink($path.$this->input->post('oldfile'));
            }
          }

          $where = array('id'=>$this->input->post('id'));
          $upd_workshop = $this->m_admin->UpdateData('tb_workshop', $data_workshop, $where);
          if ($upd_workshop) {
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil diperbarui.\",type: \"info\",styling: \"bootstrap3\"});'");
            redirect('dashboard/workshop');
          }else{
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal diperbarui.\",type: \"error\",styling: \"bootstrap3\"});'");
            redirect('dashboard/workshop');
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
        }else if ($links == "detail") {
          $cek_absen = array(
            'id_peserta' => $this->session->userdata('id'),
            'id_workshop' => $links2,
          );
          $data = array(
            'page'  => "dashboard/detail_workshop",
            'narsum'  => $this->m_admin->getNarasumber(),
            'data'  => $this->m_admin->getWorkshop($links2),
            'absen' => $this->m_admin->getContent('tb_absen', $cek_absen),
            'daftar' => $this->m_admin->getAbsen($links2),
          );
        }else if ($links == "register") {
          $data_absen = array(
            'id_peserta' => $this->session->userdata('id'),
            'id_workshop' => $links2,
          );

          $cek_register = $this->m_admin->getContent('tb_absen', $data_absen);
          if ($cek_register == null) {
            $ins_absen = $this->m_admin->InsertData('tb_absen', $data_absen);
            if ($ins_absen) {
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Selamat, Registrasi Berhasil Dilakukan.\",type: \"info\",styling: \"bootstrap3\"});'");
              redirect('dashboard/workshop/detail/'.$links2);
            }else{
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Mohon Maaf, Registrasi Gagal Dilakukan.\",type: \"error\",styling: \"bootstrap3\"});'");
              redirect('dashboard/workshop/detail/'.$links2);
            }
          }else{
            redirect('dashboard/workshop/detail/'.$links2);
          }
        }else if ($links == "list_peserta") {
          $data = array(
            'page'  => "dashboard/list_peserta",
            'peserta' => $this->m_admin->getListPeserta($links2),
          );
        }else{
          $data = array(
            'page'  => "dashboard/workshop",
            'data'  => $this->m_admin->getWorkshop(),
          );
        }
        $this->load->view('dashboard/st_dashboard', $data);
      }
    }
    // echo "<pre>";
    // print_r($data);
    // echo "<br>";
    // print_r($this->session->userdata());
  }

  public function admin(){
    $links = $this->uri->segment(3);
    $links2 = $this->uri->segment(4);

    $time = time();
    $path = './assets/back/images/admin/';
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
          'page' => "dashboard/crud_admin",
        );
      }else if ($links == "do_add") {
        $data_admin = array(
          'id'     => "",
          'nama'   => $this->input->post('nama'),
          'nip'    => $this->input->post('nip'),
          'bidang' => $this->input->post('bidang'),
          'email'  => $this->input->post('email'),
          'nohp'   => $this->input->post('nohp'),
          'alamat' => $this->input->post('alamat'),
        );

        // KONDISI SAAT MEMASUKKAN FOTO
        if ($_FILES['foto']['name'] == "") {
          $data_admin['foto'] = "";
        }else{
          if ( ! $this->upload->do_upload('foto')){ 
          $error = array('error' => $this->upload->display_errors());
          $pesan = $error['error'];
          echo $pesan;
          }else{
            $data_admin['foto'] = $this->upload->file_name;

            $thumb['source_image'] = 'assets/back/images/admin/'.$this->upload->file_name;
            $this->load->library('image_lib');
            $this->image_lib->initialize($thumb);
            $this->image_lib->resize();
            unlink($path.$this->upload->file_name);
          }
        }

        $ins_admin = $this->m_admin->InsertData('tb_pembina', $data_admin);
        if ($ins_admin) {
          $data_user = array(
            'username' => $this->input->post('nip'),
            'password' => md5($this->input->post('nip')),
            'hak_akses' => "pembina",
          );

          $ins_user = $this->m_admin->InsertData('tb_user', $data_user);
          if ($ins_user) {
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil ditambahkan.\",type: \"info\",styling: \"bootstrap3\"});'");
            redirect('dashboard/admin');
          }else{
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal ditambahkan.\",type: \"error\",styling: \"bootstrap3\"});'");
            redirect('dashboard/admin');  
          }
        }else{
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal ditambahkan.\",type: \"error\",styling: \"bootstrap3\"});'");
          redirect('dashboard/admin');
        }
      }else if ($links == "edit"){
        $data = array(
          'page'  => "dashboard/crud_admin",
          'data'  => $this->m_admin->getAdmin($links2),
        );
      }else if ($links == "do_edit") {
        $data_admin = array(
          'nama'   => $this->input->post('nama'),
          'nip'    => $this->input->post('nip'),
          'bidang' => $this->input->post('bidang'),
          'email'  => $this->input->post('email'),
          'nohp'   => $this->input->post('nohp'),
          'alamat' => $this->input->post('alamat'),
        );

        // KONDISI SAAT MEMASUKKAN FOTO
        if ($_FILES['foto']['name'] != "") {
          if ( ! $this->upload->do_upload('foto')){ 
          $error = array('error' => $this->upload->display_errors());
          $pesan = $error['error'];
          echo $pesan;
          }else{
            $data_admin['foto'] = $this->upload->file_name;

            $thumb['source_image'] = 'assets/back/images/admin/'.$this->upload->file_name;
            $this->load->library('image_lib');
            $this->image_lib->initialize($thumb);
            $this->image_lib->resize();
            unlink($path.$this->upload->file_name);
            unlink($path.$this->input->post('oldfoto'));
          }
        }

        $where = array('id'=>$this->input->post('id'));
        $upd_admin = $this->m_admin->UpdateData('tb_pembina', $data_admin, $where);
        if ($upd_admin) {
          $data_user = array('username'=>$this->input->post('nip'));
          $where2 = array('username'=>$this->input->post('oldNip'));

          $upd_user = $this->m_admin->UpdateData('tb_user', $data_user, $where2);
          if ($upd_user) {
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil diperbarui.\",type: \"info\",styling: \"bootstrap3\"});'");
            redirect('dashboard/admin');
          }else{
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal diperbarui.\",type: \"error\",styling: \"bootstrap3\"});'");
            redirect('dashboard/admin');
          }
        }else{
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal diperbarui.\",type: \"error\",styling: \"bootstrap3\"});'");
          redirect('dashboard/admin');
        }
      }else if ($links == "delete") {
        $where = array('id'=>$links2);
        $filefoto = $this->m_admin->getContent('tb_pembina', $where);
        $path = './assets/back/images/admin/';
        unlink($path.str_replace('.', '_thumb.', $filefoto[0]->foto));

        $del_admin = $this->m_admin->DeleteData('tb_pembina', $where);
        if ($del_admin) {
          $where2 = array('username'=>$filefoto[0]->nip);

          $del_user = $this->m_admin->DeleteData('tb_user', $where2);
          if ($del_user) {
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil dihapus.\",type: \"info\",styling: \"bootstrap3\"});'");
            redirect('dashboard/admin');
          }else{
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal dihapus.\",type: \"error\",styling: \"bootstrap3\"});'");
            redirect('dashboard/admin');  
          }
        }else{
          $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal dihapus.\",type: \"error\",styling: \"bootstrap3\"});'");
          redirect('dashboard/admin');
        }
      }else{
        $data = array(
          'page'  => "dashboard/admin",
          'data'  => $this->m_admin->getAdmin(),
        ); 
      }
    }

    // echo "<pre>";
    // print_r($data);

    $this->load->view('dashboard/st_dashboard', $data);
  }

  public function download(){
    $this->load->helper('download');
    $file = $this->uri->segment(4);
    if ($file) {
      force_download('assets/back/docs/materi/'.$file, NULL);
    }else{
      $this->session->set_flashdata('notif', "onload=\"alert('Maaf saat ini file materi belum tersedia')\"");
      redirect('dashboard/workshop/detail/'.$this->uri->segment(3));
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