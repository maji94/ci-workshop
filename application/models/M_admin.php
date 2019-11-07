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

	public function getContent($tableName=null, $field=null){
		$data = $this->db->get_where($tableName, $field);
		return $data->result();
	}

	public function getByTime($tableName, $time){
		$data = $this->db->get_where($tableName, $time);
		return $data->result();	
	}

	public function getNarasumber($id=null,$limit=null,$offset=null){
		if ($id != null) {
			$this->db->where('id', $id);
		}
    if ($limit != null) {
      $this->db->limit($limit,$offset);
    }
		$data = $this->db->get('tb_narasumber');
		return $data->result();
	}

	public function getListNarasumber($id_narasumber){
		$this->db->select('*');
		$this->db->where_in('id', $id_narasumber);
		$data = $this->db->get('tb_narasumber');
		return $data->result();
	}

	public function getWorkshop($id=null){
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->select('*');
		$data = $this->db->get('tb_workshop');
		return $data->result();
	}

	public function getAbsen($id=null){
		if ($id != null) {
			$this->db->where('id_workshop', $id);
		}
		$data = $this->db->get('tb_absen');
		return $data->result();
	}

	public function getListPeserta($id,$id_peserta=null){
		$this->db->select('ta.id AS id_absen, ta.id_workshop, ta.id_peserta, tp.*, tw.nm_kegiatan, tw.tgl_buka, tw.tgl_tutup, tw.lokasi');
		$this->db->join('tb_peserta tp','tp.id = ta.id_peserta');
		$this->db->join('tb_workshop tw','tw.id = ta.id_workshop');
		$this->db->where('ta.id_workshop',$id);
		if ($id_peserta != null) {
			$this->db->where('ta.id_peserta',$id_peserta);
		}
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
		$this->db->select('tw.*');
		$this->db->join('tb_workshop tw', 'tw.id = ta.id_workshop');
		$this->db->where('ta.id_peserta', $id);
		$data = $this->db->get('tb_absen ta');
		return $data->result();
	}

	public function getGaleri($id=null,$limit=null,$offset=null){
		if ($id != null) {
			$this->db->where('id', $id);
		}
    if ($limit != null) {
      $this->db->limit($limit,$offset);
    }
		$this->db->select('*');
		$this->db->order_by('id','DESC');
		$data = $this->db->get('tb_galeri');
		return $data->result();
	}

	public function getOther($tableName=null){
		$this->db->order_by('id','RANDOM');
		$this->db->limit(3);
		$data = $this->db->get($tableName);
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