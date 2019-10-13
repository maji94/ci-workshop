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
		$this->db->select('tu.*, tp.foto, tp.nip, tp.nama');
		$this->db->join('tb_peserta tp','tp.nip = tu.username');
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
		$this->db->join('tb_narasumber tn', 'tn.id = tw.id_narasumber');
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

	public function getAdmin($id=null){
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$data = $this->db->get('tb_pembina');
		return $data->result();
	}

	public function getProfil($jenis){
		$this->db->select('*');
		$this->db->where('jenis_profil', $jenis);
		$data = $this->db->get('tb_profil');
		return $data->result();
	}
	
	public function getProdukNew(){
		$this->db->limit(5);
		$this->db->join('tb_tipe_dokumen','tb_tipe_dokumen.id_tipedokumen = tb_dokumen.tipe_dokumen');
		$this->db->order_by('id_dokumen','DESC');
		$data= $this->db->get('tb_dokumen');
		return $data->result();
	}

	public function getProduk($tipe="all",$tahun=null){
		$this->db->select('*');
		if ($tipe != "all") {
			$this->db->where('tipe_dokumen',$tipe);
		}

		if ($tahun != null) {
			$this->db->where('thntetap', $tahun);
		}

		$this->db->join('tb_tipe_dokumen','tb_tipe_dokumen.id_tipedokumen = tb_dokumen.tipe_dokumen');
		$this->db->order_by('id_dokumen','DESC');
		$data= $this->db->get('tb_dokumen');
		return $data->result();
	}

	public function getProdukRating($order=null){
		$this->db->select('*');
		$this->db->join('tb_tipe_dokumen','tb_tipe_dokumen.id_tipedokumen = tb_dokumen.tipe_dokumen');
		$this->db->order_by($order, 'DESC');
		$this->db->limit(10);
		$data = $this->db->get('tb_dokumen');
		return $data->result();
	}

	public function getJudulProduk($tipe=null){
		$this->db->select('id_dokumen, judul');
		if ($tipe != null) {
			$this->db->where('tipe_dokumen', $tipe);
		}
		$this->db->order_by('judul','ASC');
		$data = $this->db->get('tb_dokumen');
		return $data->result();
	}

	public function getTipeDokumen($id=null){
		$this->db->select('*');
		if ($id != null) {
			$this->db->where('id_tipedokumen', $id);
		}
		$data = $this->db->get('tb_tipe_dokumen');
		return $data->result();
	}

	public function getTahunProduk($idTipe="all"){
		$this->db->select('thntetap');
		$this->db->order_by('thntetap','DESC');
		$this->db->distinct();
		if ($idTipe != "all") {
			$this->db->where('tipe_dokumen', $idTipe);
		}
		$data = $this->db->get('tb_dokumen');
		return $data->result();
	}

	public function getSubjekProduk($idTipe){
		$tahun='<option value="0">-- Subjek Peraturan --</option>';

		$this->db->select('subjek');
		$this->db->order_by('subjek','ASC');
		$this->db->distinct();
		$thn= $this->db->get_where('tb_dokumen',array('thntetap'=>$idTipe));

		foreach ($thn->result_array() as $data ){
			$tahun.= "<option value='$data[subjek]'>$data[subjek]</option>";
		}

		return $tahun;
	}

	public function getJudul($idTipe){
		$tahun='';

		$this->db->select('id_dokumen, judul');
		$this->db->order_by('judul','ASC');
		$thn= $this->db->get_where('tb_dokumen',array('tipe_dokumen'=>$idTipe));

		foreach ($thn->result_array() as $data ){
			$tahun.= "<option value='$data[id_dokumen]'>$data[judul]</option>";
		}

		return $tahun;
	}

	public function getPesan(){
		$this->db->select('*');
		$this->db->order_by('id_pesan','DESC');
		$data = $this->db->get('tb_pesan');
		return $data->result();
	}

	public function getAnggota(){
		$this->db->select('*');
		$data = $this->db->get('tb_anggota');
		return $data->result();
	}

	public function getTotalAnggota(){
		$this->db->select('*');
		$data = $this->db->get('tb_anggota');
		return $data->num_rows();
	}

	public function getBerita(){
		$this->db->select("*");
		$this->db->order_by('id_berita','DESC');
		$data = $this->db->get('tb_berita');
		return $data->result();
	}

	public function getTotalBerita(){
		$this->db->select("*");
		$this->db->order_by('id_berita','DESC');
		$data = $this->db->get('tb_berita');
		return $data->num_rows();
	}

	public function getForum(){
		$this->db->select("*");
		$this->db->order_by('id_forum','DESC');
		$data = $this->db->get('tb_forum');
		return $data->result();
	}

	public function getKegiatan(){
		$this->db->select("*");
		$this->db->order_by('id_kegiatan','DESC');
		$data = $this->db->get('tb_kegiatan');
		return $data->result();
	}

	public function getGaleri($jenis_media){
		$this->db->select('*');
		$this->db->where('jenis_media',$jenis_media);
		$this->db->order_by('id_galeri','DESC');
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