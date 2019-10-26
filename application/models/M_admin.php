<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	public function cek_password($user,$password){
    $this->db->select('*');
    $this->db->where('username', $user);
    $this->db->where('password',$password);
    $data = $this->db->get('tb_user');
    return $data->result();
  }

	public function getLogin($data){
		$this->db->select('tu.*, tp.foto, tp.nip, tp.nama, tp.id AS id_profil');
		$this->db->join('tb_peserta tp','tp.nip = tu.username');
		$data = $this->db->get_where('tb_user tu',$data);
		return $data->result();
	}

	public function getLogin2($data){
		$this->db->select('tu.*, tp.foto, tp.nip, tp.nama, tp.id AS id_profil');
		$this->db->join('tb_pembina tp','tp.nip = tu.username');
		$data = $this->db->get_where('tb_user tu',$data);
		return $data->result();
	}

	public function getContent($tableName, $field){
		$data = $this->db->get_where($tableName, $field);
		return $data->result();
	}

	public function getByTime($tableName, $time){
		$data = $this->db->get_where($tableName, $time);
		return $data->result();	
	}

	public function getNarasumber($id=null){
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$data = $this->db->get('tb_narasumber');
		return $data->result();
	}

	public function getWorkshop($id=null){
		if ($id != null) {
			$this->db->where('tw.id', $id);
		}
		$this->db->select('tw.*, tn.foto, tn.nama, tn.jns_kelamin, tn.keterangan AS bio');
		$this->db->join('tb_narasumber tn', 'tn.id = tw.id_narasumber','left');
		$data = $this->db->get('tb_workshop tw');
		return $data->result();
	}

	public function getAbsen($id=null){
		if ($id != null) {
			$this->db->where('id_workshop', $id);
		}
		$data = $this->db->get('tb_absen');
		return $data->result();
	}

	public function getListPeserta($id){
		$this->db->select('ta.id AS id_absen, ta.id_workshop, ta.id_peserta, tp.*, tw.nm_kegiatan, tw.tgl_buka, tw.tgl_tutup');
		$this->db->join('tb_peserta tp','tp.id = ta.id_peserta');
		$this->db->join('tb_workshop tw','tw.id = ta.id_workshop');
		$this->db->where('ta.id_workshop',$id);
		$this->db->order_by('tp.nama','ASC');
		$data = $this->db->get('tb_absen ta');
		return $data->result();
	}

	public function getAdmin($id=null, $nip=null){
		if ($id != null) {
			$this->db->where('id', $id);
		}
		if ($nip != null) {
			$this->db->where('nip', $nip);
		}
		$data = $this->db->get('tb_pembina');
		return $data->result();
	}

	public function getPeserta($id=null, $nip=null){
		if ($id != null) {
			$this->db->where('id', $id);
		}
		if ($nip != null) {
			$this->db->where('nip', $nip);
		}
		$data = $this->db->get('tb_peserta');
		return $data->result();
	}

	public function getListWorkshop($id=null){
		$this->db->select('tw.*, tn.foto, tn.nama, tn.jns_kelamin, tn.keterangan AS bio');
		$this->db->join('tb_workshop tw', 'tw.id = ta.id_workshop');
		$this->db->join('tb_narasumber tn', 'tn.id = tw.id_narasumber');
		$this->db->where('ta.id_peserta', $id);
		$data = $this->db->get('tb_absen ta');
		return $data->result();
	}

	public function getGaleri(){
		$this->db->select('*');
		$this->db->order_by('id','DESC');
		$data = $this->db->get('tb_galeri');
		return $data->result();
	}

	public function getTotalGaleri(){
		$video = $this->getGaleri('video');
		$getFoto = $this->getGaleri('foto');

		foreach ($getFoto as $d) {
			$foto[] = unserialize($d->konten);
		}

		$cf=0;
		foreach ($foto as $f) {
			$n=sizeof($f);
			$cf=$cf+$n;
		}		

		$cv = sizeof($video);
		$count = $cv+$cf;
		return $count;
	}

	// function untuk masukkan data
  public function InsertData($tabelName, $data){
    $res = $this->db->insert($tabelName, $data);
    return $res;
  }

  // function untuk masukkan banyak data
  public function InsertBatch($tabelName, $data){
    $res = $this->db->insert_batch($tabelName, $data);
    return $res;
  }

  // function untuk update data
  public function UpdateData($tabelName, $data, $where){
    $res = $this->db->update($tabelName, $data, $where);
    return $res;
  }

  // function untuk hapus data
  public function DeleteData($tabelName, $where){
    $res = $this->db->delete($tabelName, $where);
    return $res;
  }
}