<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
    $this->cek = $this->session->userdata('logged_in');
    $this->set = $this->session->userdata('hak_akses');
    $this->id_profil = $this->session->userdata('id_profil');
    $this->cek_status_workshop();

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

  public function cek_status_workshop(){
    $cek = $this->m_admin->cek_status_workshop();

    foreach ($cek as $d) {
      if (date('Y-m-d') > $d->tgl_tutup) {
        $this->m_admin->UpdateData('tb_workshop',array('status'=>"close"), array('id'=>$d->id));
      }
    }
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
        if ($this->set == "admin" OR $this->set == "pembina") {
          $data = array(
            'page' => "dashboard/crud_narasumber",
          );
        }else{
          redirect('dashboard');
        }
      }else if ($links == "do_add") {
        if ($this->set == "admin" OR $this->set == "pembina") {
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
        }else{
          redirect('dashboard');
        }
      }else if ($links == "edit"){
        if ($this->set == "admin" OR $this->set == "pembina") {
          $data = array(
            'page'  => "dashboard/crud_narasumber",
            'data'  => $this->m_admin->getNarasumber($links2),
          );
        }else{
          redirect('dashboard');
        }
      }else if ($links == "do_edit") {
        if ($this->set == "admin" OR $this->set == "pembina") {
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
        }else{
          redirect('dashboard');
        }
      }else if ($links == "delete") {
        if ($this->set == "admin" OR $this->set == "pembina") {
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
        }
        else{
          redirect('dashboard');
        }
      }else{
        if ($this->set == "admin" OR $this->set == "pembina") {
          $data = array(
            'page'  => "dashboard/narasumber",
            'data'  => $this->m_admin->getNarasumber(),
          );
        }else{
          redirect('dashboard');
        }
      }
    }

    $this->load->view('dashboard/st_dashboard', $data);
  }

  public function workshop(){
    $links = $this->uri->segment(3);
    $links2 = $this->uri->segment(4);
    $links3 = $this->uri->segment(5);

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
        if ($this->set == "admin" OR $this->set == "pembina" ) {
          $peserta = $this->m_admin->getListPeserta($links2);

          $data = array(
            'peserta'          => $peserta,
            'nip'              => $this->input->get('nip'),
            'nama'             => $this->input->get('nama'),
            'ktp'              => $this->input->get('ktp'),
            'ttl'              => $this->input->get('ttl'),
            'jns_kelamin'      => $this->input->get('jns_kelamin'),
            'agama'            => $this->input->get('agama'),
            'pendidikan'       => $this->input->get('pendidikan'),
            'alamat_rm'        => $this->input->get('alamat_rm'),
            'emailhp'          => $this->input->get('emailhp'),
            'unker'            => $this->input->get('unker'),
            'alamat_kt'        => $this->input->get('alamat_kt'),
            'jabatan'          => $this->input->get('jabatan'),
            'npwp'             => $this->input->get('npwp'),
            'norek'            => $this->input->get('norek'),
            'ttd'              => $this->input->get('ttd'),
          );
          // echo "<pre>";
          // print_r($data);
          $this->load->view('dashboard/print_daftar_hadir', $data);
        }
        else {
          redirect('dashboard/workshop');
        }
      } else if ($links == "cetak_biodata") {
        if ($this->set == "admin" OR $this->set == "pembina" ) {
          $data = array(
            'peserta' => $this->m_admin->getListPeserta($links2, $links3),
          );

          // echo "<pre>";
          // print_r($data);

          $this->load->view('dashboard/print_biodata', $data);        
        }else {
          redirect('dashboard/workshop');
        }
      } else {
        if ($links == "add") {
          if ($this->set == "admin" OR $this->set == "pembina" ) {
            $data = array(
              'page' => "dashboard/crud_workshop",
              'narsum' => $this->m_admin->getNarasumber(),
            );
          }
          else {
            redirect('dashboard/workshop');
          }
        }else if ($links == "do_add") {
          if ($this->set == "admin" OR $this->set == "pembina" ) {
            $input = sizeof($_FILES['file']['tmp_name']);
            $files = $_FILES['file'];
            for ($i=0; $i < $input ; $i++) {
              if ($files['name'][$i]) {
                $_FILES['file']['name']      = $files['name'][$i];
                $_FILES['file']['type']      = $files['type'][$i];
                $_FILES['file']['tmp_name']  = $files['tmp_name'][$i];
                $_FILES['file']['error']     = $files['error'][$i];
                $_FILES['file']['size']      = $files['size'][$i];

                $this->upload->do_upload('file');
              }
              $data_file[] = $files['name'][$i];
            }

            $data_narasumber = array(
              'id_narasumber' => $this->input->post('id_narasumber'),
              'nm_moderator' => $this->input->post('nm_moderator'),
              'waktu' => $this->input->post('waktu'),
              'file' => $data_file,
            );

            $data_workshop = array(
              'id'            => "",
              'narasumber'    => serialize($data_narasumber),
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
            // if ($_FILES['file_materi']['name'] == "") {
            //   $data_workshop['file_materi'] = "";
            // }else{
            //   if ( ! $this->upload->do_upload('file_materi')){ 
            //   $error = array('error' => $this->upload->display_errors());
            //   $pesan = $error['error'];
            //   echo $pesan;
            //   }else{
            //     $data_workshop['file_materi'] = $this->upload->file_name;
            //   }
            // }

            $ins_workshop = $this->m_admin->InsertData('tb_workshop', $data_workshop);
            if ($ins_workshop) {
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil ditambahkan.\",type: \"info\",styling: \"bootstrap3\"});'");
              redirect('dashboard/workshop');
            }else{
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal ditambahkan.\",type: \"error\",styling: \"bootstrap3\"});'");
              redirect('dashboard/workshop');
            }
          }
          else {
            redirect('dashboard/workshop');
          }
        }else if ($links == "edit"){
          if ($this->set == "admin" OR $this->set == "pembina" ) {
            $data_workshop = $this->m_admin->getWorkshop($links2);
            $data_narasumber = unserialize($data_workshop[0]->narasumber);
            $data = array(
              'page'  => "dashboard/crud_workshop",
              'narsum'  => $this->m_admin->getNarasumber(),
              'data_workshop'  => $data_workshop,
              'data_narasumber' => $data_narasumber,
            );
          }
          else {
            redirect('dashboard/workshop');
          }
        }else if ($links == "do_edit") {
          if ($this->set == "admin" OR $this->set == "pembina" ) {

            $get =  array('id' => $this->input->post('id'));
            $getData = $this->m_admin->getContent('tb_workshop', $get);
            $getFile = unserialize($getData[0]->narasumber)['file'];
            $n_getFile = sizeof($getFile);

            $input = sizeof($_FILES['file']['tmp_name']);
            $files = $_FILES['file'];

            // echo "<pre>";
            // print_r($input);
            for ($i=0; $i < $input ; $i++) {

              $_FILES['file']['name']     = $files['name'][$i];
              $_FILES['file']['type']     = $files['type'][$i];
              $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
              $_FILES['file']['error']    = $files['error'][$i];
              $_FILES['file']['size']     = $files['size'][$i];
              
              if ($_FILES['file']['name']) {
                $this->upload->do_upload('file');
                $data_file[] = $files['name'][$i];
              }else{
                $data_file[] = $this->input->post('oldFile')[$i];
              }
            }

            $data_narasumber = array(
              'id_narasumber' => $this->input->post('id_narasumber'),
              'nm_moderator' => $this->input->post('nm_moderator'),
              'waktu' => $this->input->post('waktu'),
              'file' => $data_file,
            );

            $data_workshop = array(
              'narasumber'    => serialize($data_narasumber),
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
            // if ($_FILES['file_materi']['name'] != "") {
            //   if ( ! $this->upload->do_upload('file_materi')){ 
            //   $error = array('error' => $this->upload->display_errors());
            //   $pesan = $error['error'];
            //   echo $pesan;
            //   }else{
            //     $data_workshop['file_materi'] = $this->upload->file_name;
            //     unlink($path.$this->input->post('oldfile'));
            //   }
            // }

            for ($i=0; $i < $n_getFile; $i++) { 
              if (in_array($getFile[$i], $data_file) == FALSE) {
                unlink($path.str_replace(' ', '_', $getFile[$i]));
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
          }
          else {
            redirect('dashboard/workshop');
          }
        }else if ($links == "delete") {
          if ($this->set == "admin" OR $this->set == "pembina" ) {
            $where = array('id'=>$links2);
            $where2 = array('id_workshop'=>$links2);
            
            $data_file = $this->m_admin->getContent('tb_workshop', $where);
            $getFile = unserialize($data_file[0]->narasumber)['file'];

            $n = sizeof($getFile);
            for ($i=0; $i < $n ; $i++) {
              unlink($path.str_replace(' ', '_', $getFile[$i]));
            }

            $del_workshop = $this->m_admin->DeleteData('tb_workshop', $where);
            if ($del_workshop) {
              $del_absen = $this->m_admin->DeleteData('tb_absen', $where2);
              if ($del_absen) {
                $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil dihapus.\",type: \"info\",styling: \"bootstrap3\"});'");
                redirect('dashboard/workshop');
              }else{
                $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal dihapus.\",type: \"error\",styling: \"bootstrap3\"});'");
                redirect('dashboard/workshop');
              }
            }else{
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal dihapus.\",type: \"error\",styling: \"bootstrap3\"});'");
              redirect('dashboard/workshop');
            }
          }
          else {
            redirect('dashboard/workshop');
          }
        }else if ($links == "detail") {
          if ($this->set == "admin" OR $this->set == "pembina" OR $this->set == "peserta") {
            $cek_absen = array(
              'id_peserta' => $this->id_profil,
              'id_workshop' => $links2,
            );

            $data_workshop = $this->m_admin->getWorkshop($links2);
            $list_narasumber = unserialize($data_workshop[0]->narasumber);
            $data_narasumber = $this->m_admin->getListNarasumber($list_narasumber['id_narasumber']);

            $data = array(
              'page'            => "dashboard/detail_workshop",
              'narsum'          => $this->m_admin->getNarasumber(),
              'data_workshop'   => $data_workshop,
              'data_narasumber' => $data_narasumber,
              'list_narasumber' => $list_narasumber,
              'absen'           => $this->m_admin->getContent('tb_absen', $cek_absen),
              'daftar'          => $this->m_admin->getAbsen($links2),
            );
          }
          else {
            redirect('dashboard/workshop');
          }
        }else if ($links == "register") {
          if ($this->set == "peserta") {
            $data_absen = array(
              'id_peserta' => $this->id_profil,
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
          }
          else {
            redirect('dashboard/workshop');
          }
        }else if ($links == "list_peserta") {
          if ($this->set == "admin" OR $this->set == "pembina" ) {
            $data = array(
              'page'  => "dashboard/list_peserta",
              'peserta' => $this->m_admin->getListPeserta($links2),
            );
          }
          else {
            redirect('dashboard/workshop');
          }
        }else{
          $data = array(
            'page'  => "dashboard/workshop",
            'data'  => $this->m_admin->getWorkshop(),
          );
        }
        $this->load->view('dashboard/st_dashboard', $data);
        // echo "<pre>";
        // print_r($data_narasumber);
        // echo "<br>";
        // print_r($getFile);
      }
    }
  }

  public function admin(){
    $links = $this->uri->segment(3);
    $links2 = $this->uri->segment(4);

    $time = time();
    $path = './assets/back/images/pembina/';
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
        if ($this->set == "admin") {
          $data = array(
            'page' => "dashboard/crud_admin",
          );
        }else {
          redirect('dashboard');
        }
      }else if ($links == "do_add") {
        if ($this->set == "admin") {
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

              $thumb['source_image'] = 'assets/back/images/pembina/'.$this->upload->file_name;
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
        }else {
          redirect('dashboard');
        }
      }else if ($links == "edit"){
        if ($this->set == "admin") {
          $data = array(
            'page'  => "dashboard/crud_admin",
            'data'  => $this->m_admin->getAdmin($links2),
          );
        }else {
          redirect('dashboard');
        }
      }else if ($links == "do_edit") {
        if ($this->set == "admin") {
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

              $thumb['source_image'] = 'assets/back/images/pembina/'.$this->upload->file_name;
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
        }else {
          redirect('dashboard');
        }
      }else if ($links == "delete") {
        if ($this->set == "admin") {
          $where = array('id'=>$links2);
          $filefoto = $this->m_admin->getContent('tb_pembina', $where);
          $path = './assets/back/images/pembina/';
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
        }else {
          redirect('dashboard');
        }
      }else if ($links == "ubah_psw") {
        if ($this->set == "admin") {
          $data_psw = array('password'=>md5($this->input->post('konf_psw')));

          $where = array('username'=>$this->input->post('nip'));
          $upd_psw = $this->m_admin->UpdateData('tb_user', $data_psw, $where);
          if ($upd_psw) {
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Password Berhasil diubah.\",type: \"info\",styling: \"bootstrap3\"});'");
            redirect('dashboard/admin');
          }else{
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Password gagal diubah.\",type: \"error\",styling: \"bootstrap3\"});'");
            redirect('dashboard/admin');
          }
        }else {
          redirect('dashboard');
        }
      }else{
        if ($this->set == "admin") {
          $data = array(
            'page'  => "dashboard/admin",
            'data'  => $this->m_admin->getAdmin(),
          );
        }else {
          redirect('dashboard');
        }
      }
    }

    // echo "<pre>";
    // print_r($data);

    $this->load->view('dashboard/st_dashboard', $data);
  }

  public function peserta(){
    $links = $this->uri->segment(3);
    $links2 = $this->uri->segment(4);

    $time = time();
    $path = './assets/back/images/peserta/';
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
      if ($links == "edit"){
        if ($this->set == "admin") {
          $data = array(
            'page'  => "dashboard/crud_a_peserta",
            'data'  => $this->m_admin->getPeserta($links2),
          );
        }else{
          redirect('dashboard/peserta');
        }
      }else if ($links == "do_edit") {
        if ($this->set == "admin") {
          $data_peserta = array(
            'nip'         => $this->input->post('nip'),
            'nama'        => $this->input->post('nama'),
            'ktp'         => $this->input->post('ktp'),
            'tmp_lahir'   => $this->input->post('tmp_lahir'),
            'tgl_lahir'   => $this->input->post('tgl_lahir'),
            'jns_kelamin' => $this->input->post('jns_kelamin'),
            'agama'       => $this->input->post('agama'),
            'pendidikan'  => $this->input->post('pendidikan'),
            'alamat_rm'   => $this->input->post('alamat_rm'),
            'email'       => $this->input->post('email'),
            'nohp'        => $this->input->post('nohp'),
            'golongan'    => $this->input->post('golongan'),
            'jabatan'     => $this->input->post('jabatan'),
            'unker'       => $this->input->post('unker'),
            'kab'         => $this->input->post('kab'),
            'alamat_kt'   => $this->input->post('alamat_kt'),
            'npwp'        => $this->input->post('npwp'),
            'norek'       => $this->input->post('norek'),
          );

          // KONDISI SAAT MEMASUKKAN FOTO
          if ($_FILES['foto']['name'] != "") {
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
              unlink($path.$this->input->post('oldfoto'));
            }
          }

          if ($this->input->post('oldNip') != $this->input->post('nip')) {
            $data_user = array('username'=>$this->input->post('nip'));

            $where2 = array('username'=>$this->input->post('oldNip'));
            $upd_username = $this->m_admin->UpdateData('tb_user', $data_user, $where2);
            if ($upd_username) {
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil diperbarui.\",type: \"info\",styling: \"bootstrap3\"});'");
              redirect('dashboard/peserta');
            }else{
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal diperbarui.\",type: \"error\",styling: \"bootstrap3\"});'");
              redirect('dashboard/peserta');
            }
          }
          
          $where = array('id'=>$this->input->post('id'));
          $upd_peserta = $this->m_admin->UpdateData('tb_peserta', $data_peserta, $where);
          if ($upd_peserta) {
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil diperbarui.\",type: \"info\",styling: \"bootstrap3\"});'");
            redirect('dashboard/peserta');
          }else{
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal diperbarui.\",type: \"error\",styling: \"bootstrap3\"});'");
            redirect('dashboard/peserta');
          }
        }else{
          redirect('dashboard/peserta');
        }
      }else if ($links == "delete") {
        if ($this->set == "admin") {
          $where = array('id'=>$links2);
          $filefoto = $this->m_admin->getContent('tb_peserta', $where);
          $path = './assets/back/images/peserta/';
          unlink($path.str_replace('.', '_thumb.', $filefoto[0]->foto));

          $del_peserta = $this->m_admin->DeleteData('tb_peserta', $where);
          if ($del_peserta) {
            $where2 = array('username'=>$filefoto[0]->nip);

            $del_user = $this->m_admin->DeleteData('tb_user', $where2);
            if ($del_user) {
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil dihapus.\",type: \"info\",styling: \"bootstrap3\"});'");
              redirect('dashboard/peserta');
            }else{
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal dihapus.\",type: \"error\",styling: \"bootstrap3\"});'");
              redirect('dashboard/peserta');  
            }
          }else{
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal dihapus.\",type: \"error\",styling: \"bootstrap3\"});'");
            redirect('dashboard/peserta');
          }
        }else{
          redirect('dashboard/peserta');
        }
      }else{
        if ($this->set == "admin" OR $this->set == "pembina") {
          $data = array(
            'page'  => "dashboard/a_peserta",
            'data'  => $this->m_admin->getPeserta(),
          );
        }else{
          redirect('dashboard');
        }
      }
    }
    // echo "<pre>";
    // print_r($data);

    $this->load->view('dashboard/st_dashboard', $data);
  }

  public function profil(){
    $links = $this->uri->segment(3);
    $links2 = $this->uri->segment(4);

    $time = time();
    $config['allowed_types']  = 'pdf|jpeg|jpg|png|bmp';
    $config['max_size']       = '150000';
    $config['file_name']      = $time;

    $thumb['image_library']  = 'gd2';
    $thumb['create_thumb']   = TRUE;
    $thumb['maintain_ratio'] = TRUE;
    $thumb['width']          = 600;
    $thumb['height']         = 600;

    if(!isset($_SESSION['logged_in'])){
      redirect('home');
    }else{
      if ($links == "do_edit") {
        if ($this->set == "pembina" OR $this->set == "peserta") {
          if ($this->set == "pembina") {
            $tableName = "tb_pembina";
            $path = './assets/back/images/pembina/';
            $path2 = 'assets/back/images/pembina/';
            $config['upload_path']    = $path;
            $this->load->library('upload', $config);

            $data_ubah = array(
              'nip'         => $this->input->post('nip'),
              'nama'        => $this->input->post('nama'),
              'bidang'      => $this->input->post('bidang'),
              'email'       => $this->input->post('email'),
              'nohp'        => $this->input->post('nohp'),
              'alamat'      => $this->input->post('alamat'),
            );
          }else if ($this->set == "peserta") {
            $tableName = "tb_peserta";
            $path = './assets/back/images/peserta/';
            $path2 = 'assets/back/images/peserta/';
            $config['upload_path']    = $path;
            $this->load->library('upload', $config);

            $data_ubah = array(
              'nip'         => $this->input->post('nip'),
              'nama'        => $this->input->post('nama'),
              'ktp'         => $this->input->post('ktp'),
              'tmp_lahir'   => $this->input->post('tmp_lahir'),
              'tgl_lahir'   => $this->input->post('tgl_lahir'),
              'jns_kelamin' => $this->input->post('jns_kelamin'),
              'agama'       => $this->input->post('agama'),
              'pendidikan'  => $this->input->post('pendidikan'),
              'alamat_rm'   => $this->input->post('alamat_rm'),
              'email'       => $this->input->post('email'),
              'nohp'        => $this->input->post('nohp'),
              'golongan'    => $this->input->post('golongan'),
              'jabatan'     => $this->input->post('jabatan'),
              'unker'       => $this->input->post('unker'),
              'kab'         => $this->input->post('kab'),
              'alamat_kt'   => $this->input->post('alamat_kt'),
              'npwp'        => $this->input->post('npwp'),
              'norek'       => $this->input->post('norek'),
            );
          }

          // KONDISI SAAT MEMASUKKAN FOTO
          if ($_FILES['foto']['name'] != "") {
            if ( ! $this->upload->do_upload('foto')){ 
            $error = array('error' => $this->upload->display_errors());
            $pesan = $error['error'];
            echo $pesan;
            }else{
              $data_ubah['foto'] = $this->upload->file_name;

              $thumb['source_image'] = $path2.$this->upload->file_name;
              $this->load->library('image_lib');
              $this->image_lib->initialize($thumb);
              $this->image_lib->resize();
              unlink($path.$this->upload->file_name);
              unlink($path.str_replace('.', '_thumb.', $this->input->post('oldfoto')));
            }
          }

          if ($this->input->post('oldNip') != $this->input->post('nip')) {
            $data_user = array('username'=>$this->input->post('nip'));

            $where2 = array('username'=>$this->input->post('oldNip'));
            $upd_username = $this->m_admin->UpdateData('tb_user', $data_user, $where2);
            if ($upd_username) {
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil diperbarui.\",type: \"info\",styling: \"bootstrap3\"});'");
              redirect('dashboard/profil');
            }else{
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal diperbarui.\",type: \"error\",styling: \"bootstrap3\"});'");
              redirect('dashboard/profil');
            }
          }
          
          $where = array('id'=>$this->input->post('id'));
          $upd_data = $this->m_admin->UpdateData($tableName, $data_ubah, $where);
          if ($upd_data) {
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil diperbarui.\",type: \"info\",styling: \"bootstrap3\"});'");
            redirect('dashboard/profil');
          }else{
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal diperbarui.\",type: \"error\",styling: \"bootstrap3\"});'");
            redirect('dashboard/profil');
          }
        }else {
          redirect('dashboard');
        }
      }else if ($links == "ubah_psw") {
        if ($this->set == "pembina" OR $this->set == "peserta") {
          $data_psw = array('password'=>md5($this->input->post('konf_psw')));

          $where = array('username'=>$this->input->post('nip'));
          $upd_psw = $this->m_admin->UpdateData('tb_user', $data_psw, $where);
          if ($upd_psw) {
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Password Berhasil diubah.\",type: \"info\",styling: \"bootstrap3\"});'");
            redirect('dashboard/profil');
          }else{
            $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Password gagal diubah.\",type: \"error\",styling: \"bootstrap3\"});'");
            redirect('dashboard/profil');
          }
        }else {
          redirect('dashboard');
        }
      }else{
        if ($this->set == "pembina" OR $this->set == "peserta") {
          if ($this->set == "pembina") {
            $page_data = $this->m_admin->getAdmin($this->id_profil);
            $workshop = $this->m_admin->getWorkshop();
          }else if ($this->set == "peserta") {
            $page_data = $this->m_admin->getPeserta($this->id_profil);
            $workshop = $this->m_admin->getListWorkshop($this->id_profil);
          }
          $data = array(
            'page'  => "dashboard/profile",
            'data'  => $page_data,
            'workshop' => $workshop,
          ); 
        }else {
          redirect('dashboard');
        }
      }
    }
    // echo "<pre>";
    // print_r($data);

    $this->load->view('dashboard/st_dashboard', $data);
  }

  public function galeri(){
    $links = $this->uri->segment(3);
    $links2 = $this->uri->segment(4);
    $links3 = $this->uri->segment(5);
    $tableName = 'tb_galeri';

    if(!isset($_SESSION['logged_in'])){
      redirect('login');
    }else{
      if ($links == "cetak") {
        if ($this->set == "admin" OR $this->set == "pembina") {
          $get = array('id'=>$links2);
          $data = array(
            'data' => $this->m_admin->getContent($tableName, $get),
          );

          $this->load->view('dashboard/print_galeri', $data);
          // echo "<pre>";
          // print_r($data);
        }else{
          redirect('dashboard/galeri');
        }
      }else{
        if ($links == "add") {
          if ($this->set == "admin" OR $this->set == "pembina") {
            $data = array(
              'page' => "dashboard/crud_galeri",
              'field' => "",
            );
          }else{
            redirect('dashboard/galeri');
          }
        }else if ($links == "do_add") {
          if ($this->set == "admin" OR $this->set == "pembina") {
            $path = './assets/back/images/galeri/';
            $time = time();
            $config['upload_path']    = $path;
            $config['allowed_types']  = 'jpeg|jpg|png|bmp';
            $config['max_size']       = '150000';
            $config['file_name']      = $time;
            $this->load->library('upload', $config);

            $thumb['image_library']  = 'gd2';
            $thumb['create_thumb']   = TRUE;
            $thumb['maintain_ratio'] = TRUE;
            $thumb['width']          = 1000;
            $thumb['height']         = 1000;

            $ins_data = array(
              'id'         => "",
              'judul'      => $this->input->post('judul'),
              'tanggal'    => $this->input->post('tanggal'),
            );

            $input = sizeof($_FILES['foto']['tmp_name']);
            $files = $_FILES['foto'];
            for ($i=0; $i < $input ; $i++) {
              $_FILES['foto']['name'] = $files['name'][$i];
              $_FILES['foto']['type'] = $files['type'][$i];
              $_FILES['foto']['tmp_name'] = $files['tmp_name'][$i];
              $_FILES['foto']['error'] = $files['error'][$i];
              $_FILES['foto']['size'] = $files['size'][$i];
              
              $this->upload->do_upload('foto');

              $thumb['source_image']   = 'assets/back/images/galeri/'.$this->upload->file_name;
              $this->load->library('image_lib');
              $this->image_lib->initialize($thumb);
              $this->image_lib->resize();

              $konten[] = $this->upload->file_name;
            }

            for ($j=0; $j < $input; $j++) { 
              unlink($path.$konten[$j]);
            }

            $ins_data['konten'] = serialize($konten);

            $ins_galeri = $this->m_admin->InsertData($tableName, $ins_data);
            if ($ins_galeri) {
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil ditambahkan.\",type: \"info\",styling: \"bootstrap3\"});'");
              redirect('dashboard/galeri');
            }
            else{
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal ditambahkan.\",type: \"error\",styling: \"bootstrap3\"});'");
              redirect('dashboard/galeri');
            }
          }else{
            redirect('dashboard/galeri');
          }
        }else if ($links == "edit") {
          if ($this->set == "admin" OR $this->set == "pembina") {
            $get = array('id'=>$links2);
            $data = array(
              'data' => $this->m_admin->getContent($tableName, $get),
              'page' => "dashboard/crud_galeri",
            );
          }else{
            redirect('dashboard/galeri');
          }
        }else if ($links == "do_edit") {
          if ($this->set == "admin" OR $this->set == "pembina") {
            $path = './assets/back/images/galeri/';
            $config['upload_path']    = $path;
            $config['allowed_types']  = 'jpeg|jpg|png|bmp';
            $config['max_size']       = '150000';
            $config['file_name']      = time();
            $this->load->library('upload', $config);

            $thumb['image_library']  = 'gd2';
            $thumb['create_thumb']   = TRUE;
            $thumb['maintain_ratio'] = TRUE;
            $thumb['width']          = 1000;
            $thumb['height']         = 1000;

            $get =  array('id' => $this->input->post('id'));
            $getData = $this->m_admin->getContent($tableName, $get);
            $getFoto = unserialize($getData[0]->konten);
            $n_getFoto = sizeof($getFoto);

            $input = sizeof($_FILES['foto']['tmp_name']);
            $files = $_FILES['foto'];

            // echo "<pre>";
            // print_r($input);
            for ($i=0; $i < $input ; $i++) {

              $_FILES['foto']['name'] = $files['name'][$i];
              $_FILES['foto']['type'] = $files['type'][$i];
              $_FILES['foto']['tmp_name'] = $files['tmp_name'][$i];
              $_FILES['foto']['error'] = $files['error'][$i];
              $_FILES['foto']['size'] = $files['size'][$i];
              
              if ($_FILES['foto']['name']) {
                $this->upload->do_upload('foto');
                $konten[] = $this->upload->file_name;
              }else{
                $konten[] = $this->input->post('oldFoto')[$i];
              }
              
              $thumb['source_image'] = 'assets/back/images/galeri/'.$this->upload->file_name;
              $this->load->library('image_lib');
              $this->image_lib->initialize($thumb);
              $this->image_lib->resize();
            }

            $upd_data = array(
              'judul' => $this->input->post('judul'),
              'konten' => serialize($konten),
            );

            for ($i=0; $i < $n_getFoto; $i++) { 
              if (in_array($getFoto[$i], $konten) == FALSE) {
                unlink($path.str_replace('.', '_thumb.', $getFoto[$i]));
              }
            }

            for ($j=0; $j < $input; $j++) { 
              unlink($path.$konten[$j]);
            }

            $upd_galeri  = $this->m_admin->UpdateData($tableName, $upd_data, $get);
            if ($upd_galeri) {
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil diperbarui.\",type: \"info\",styling: \"bootstrap3\"});'");
              redirect('dashboard/galeri');
            }
            else{
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal diperbarui.\",type: \"error\",styling: \"bootstrap3\"});'");
              redirect('dashboard/galeri');
            }
          }else{
            redirect('dashboard/galeri');
          }
        }else if ($links == "delete") {
          if ($this->set == "admin" OR $this->set == "pembina") {
            $path = './assets/back/images/galeri/';
            $where = array('id' => $links2);

            $filefoto = $this->m_admin->getContent($tableName, $where);
            $konten = unserialize($filefoto[0]->konten);
            $n = sizeof($konten);
            for ($i=0; $i < $n ; $i++) {
              unlink($path.str_replace('.', '_thumb.', $konten[$i]));
            }

            $del_galeri = $this->m_admin->DeleteData($tableName, $where);
            if ($del_galeri) {
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Data Berhasil dihapus.\",type: \"info\",styling: \"bootstrap3\"});'");
              redirect('dashboard/galeri');
            }
            else{
              $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Data gagal dihapus.\",type: \"error\",styling: \"bootstrap3\"});'");
              redirect('dashboard/galeri');
            }
          }else{
            redirect('dashboard/galeri');
          }
        }else{
          if ($this->set == "admin" OR $this->set == "pembina") {
            $data = array(
              'data'  => $this->m_admin->getGaleri(),
              'page' => "dashboard/galeri",
            );
          }else{
            redirect('dashboard');
          }
        }

      $this->load->view('dashboard/st_dashboard',$data);
      }
    }

    // echo "<pre>";
    // print_r($data);
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

  public function ubah_psw(){
    if ($this->set == "admin") {
      $data_psw = array('password'=>md5($this->input->post('konf_psw')));

      $where = array('username'=> "admins");
      $upd_psw = $this->m_admin->UpdateData('tb_user', $data_psw, $where);
      if ($upd_psw) {
        $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Berhasil\",text: \"Password Berhasil diubah.\",type: \"info\",styling: \"bootstrap3\"});'");
        redirect('dashboard/'.$this->uri->segment(3));
      }else{
        $this->session->set_flashdata('notif', "onload='new PNotify({title: \"Terjadi Kesalahan\",text: \"Password gagal diubah.\",type: \"error\",styling: \"bootstrap3\"});'");
        redirect('dashboard/'.$this->uri->segment(3));
      }
    }else{
      redirect('dashboard');
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