<?php
  $links = $this->uri->segment('3');
  if ($links == "add") {
    $action      = "do_add";
    $header      = "Tambah";
    $id          = "";
    $foto        = "";
    $nip         = "";
    $nama        = "";
    $ktp         = "";
    $tmp_lahir   = "";
    $tgl_lahir   = "";
    $jns_kelamin = "";
    $agama       = "";
    $pendidikan  = "";
    $alamat_rm   = "";
    $email       = "";
    $nohp        = "";
    $golongan    = "";
    $jabatan     = "";
    $unker       = "";
    $kab         ="";
    $alamat_kt   = "";
    $npwp        = "";
    $norek       = "";
    $req         = "required";
  }else{
    $action      = "do_edit";
    $header      = "Ubah";
    $id          = $data[0]->id;
    $foto        = str_replace('.', '_thumb.', $data[0]->foto);
    $nip         = $data[0]->nip;
    $nama        = $data[0]->nama;
    $ktp         = $data[0]->ktp;
    $tmp_lahir   = $data[0]->tmp_lahir;
    $tgl_lahir   = $data[0]->tgl_lahir;
    $jns_kelamin = $data[0]->jns_kelamin;
    $agama       = $data[0]->agama;
    $pendidikan  = $data[0]->pendidikan;
    $alamat_rm   = $data[0]->alamat_rm;
    $email       = $data[0]->email;
    $nohp        = $data[0]->nohp;
    $golongan    = $data[0]->golongan;
    $jabatan     = $data[0]->jabatan;
    $unker       = $data[0]->unker;
    $kab         = $data[0]->kab;
    $alamat_kt   = $data[0]->alamat_kt;
    $npwp        = $data[0]->npwp;
    $norek       = $data[0]->norek;
    $req         = "";
  }
?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Peserta</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <h2 style="margin: 0px;"><small><?php echo $header; ?> Data Peserta</small></h2>
            <div class="ln_solid"></div>
            <!-- start form for validation -->
            <?php echo form_open_multipart('dashboard/peserta/'.$action); ?>
            <!-- <form id="demo-form" data-parsley-validate> -->
              <label for="nama">NIP * :</label>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="hidden" name="oldNip" value="<?php echo $nip; ?>">
              <input type="text" id="NIP" class="form-control" name="nip" placeholder="NIP peserta" required value="<?php echo $nip; ?>">
              <br>
              <label for="nama">Nama * :</label>
              <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama beserta gelar" required value="<?php echo $nama; ?>">
              <br>
              <label for="ktp">KTP * :</label>
              <input type="text" id="ktp" class="form-control" name="ktp" placeholder="Nomor Kartu Tanda Penduduk (KTP)" required value="<?php echo $ktp; ?>">
              <br>
              <label for="tmp_lahir">Tempat Lahir * :</label>
              <input type="text" id="tmp_lahir" class="form-control" name="tmp_lahir" placeholder="Tempat Lahir" required value="<?php echo $tmp_lahir; ?>">
              <br>
              <label for="tgl_lahir">Tanggal Lahir * :</label>
              <input type="date" id="tgl_lahir" class="form-control" name="tgl_lahir" required value="<?php echo $tgl_lahir; ?>">
              <br>
              <label>Jenis Kelamin * :</label>
              <p>
                <input type="radio" class="flat" name="jns_kelamin" id="genderM" value="laki" required <?php if ($jns_kelamin == "laki" OR $jns_kelamin == "") {echo "checked";} ?>>
                Laki-laki: <br>
                <input type="radio" class="flat" name="jns_kelamin" id="genderF" value="perempuan" <?php if ($jns_kelamin == "perempuan") {echo "checked";} ?>>
                Perempuan:
              </p>
              <label for="agama">Agama * :</label>
              <input type="text" id="agama" class="form-control" name="agama" placeholder="Agama peserta" required value="<?php echo $agama; ?>">
              <br>
              <label for="pendidikan">Pendidikan * :</label>
              <input type="text" id="pendidikan" class="form-control" name="pendidikan" placeholder="Pendidikan peserta" required value="<?php echo $pendidikan; ?>">
              <br>
              <label for="alamat_rm">Alamat Rumah * :</label>
              <textarea id="alamat_rm" required="required" class="form-control" name="alamat_rm" rows="5" placeholder="Alamat rumah peserta"><?php echo $alamat_rm; ?></textarea>
              <br>
              <label for="email">Email * :</label>
              <input type="email" id="email" class="form-control" name="email" placeholder="Email peserta" required value="<?php echo $email; ?>">
              <br>
              <label for="nohp">No Handphone * :</label>
              <input type="text" id="nohp" class="form-control" name="nohp" placeholder="Nomor Handphone Peserta" required value="<?php echo $nohp; ?>">
              <br>
              <label for="golongan">Golongan * :</label>
              <input type="text" id="golongan" class="form-control" name="golongan" placeholder="Golongan peserta" required value="<?php echo $golongan; ?>">
              <br>
              <label for="jabatan">Jabatan * :</label>
              <input type="text" id="jabatan" class="form-control" name="jabatan" placeholder="Jabatan peserta" required value="<?php echo $jabatan; ?>">
              <br>
              <label for="unker">Unit Kerja * :</label>
              <input type="text" id="unker" class="form-control" name="unker" placeholder="Unit Kerja peserta" required value="<?php echo $unker; ?>">
              <br>
              <label for="kab">Kabupaten/Kota * :</label>
              <input type="text" id="kab" class="form-control" name="kab" placeholder="Kabupater/Kota peserta" required value="<?php echo $kab; ?>">
              <br>
              <label for="alamat_kt">Alamat Kantor * :</label>
              <textarea id="alamat_kt" required="required" class="form-control" name="alamat_kt" rows="5" placeholder="Alamat kantor peserta"><?php echo $alamat_kt; ?></textarea>
              <br>
              <label for="npwp">NPWP * :</label>
              <input type="text" id="npwp" class="form-control" name="npwp" placeholder="Nomor NPWP peserta" required value="<?php echo $npwp; ?>">
              <br>
              <label for="norek">No. Rekening * :</label>
              <input type="text" id="norek" class="form-control" name="norek" placeholder="Nomor rekening peserta. Contoh : 123456789 (Bank Bengkulu)" required value="<?php echo $norek; ?>">
              <br>
              <label for="foto">Foto * :</label>
              <input type="hidden" name="oldfoto" value="<?php echo $foto; ?>">
              <input type="file" id="foto" class="form-control" name="foto" <?php echo $req; ?>>
              <br>
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
              <a href="<?php echo site_url('dashboard/peserta'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
              <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
            <?php echo form_close(); ?>
            <!-- end form for validations -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>