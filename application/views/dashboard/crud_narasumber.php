<?php
  $links = $this->uri->segment('3');
  if ($links == "add") {
    $action = "do_add";
    $header = "Tambah";
    $id = "";
    $foto = "";
    $nama = "";
    $jns_kelamin = "";
    $keterangan = "";
    $req = "required";
  }else{
    $action = "do_edit";
    $header = "Ubah";
    $id = $data[0]->id;
    $foto = str_replace('.', '_thumb.', $data[0]->foto);
    $nama = $data[0]->nama;
    $jns_kelamin = $data[0]->jns_kelamin;
    $keterangan = $data[0]->keterangan;
    $req = "";
  }
?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Narasumber</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><small style="margin-left: 0;"><?php echo $header; ?> Data Narasumber</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- start form for validation -->
            <?php echo form_open_multipart('dashboard/narasumber/'.$action,'id="demo-form data-parsley-validate"'); ?>
            <!-- <form id="demo-form" data-parsley-validate> -->
              <label for="nama">Nama * :</label>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama beserta gelar" required value="<?php echo $nama; ?>">
              <br>
              <label>Jenis Kelamin * :</label>
              <p>
                <input type="radio" class="flat" name="jns_kelamin" id="genderM" value="laki" required <?php if ($jns_kelamin == "laki" OR $jns_kelamin == "") {echo "checked";} ?>>
                Laki-laki: <br>
                <input type="radio" class="flat" name="jns_kelamin" id="genderF" value="perempuan" <?php if ($jns_kelamin == "perempuan") {echo "checked";} ?>>
                Perempuan:
              </p>
              <label for="bio">Biografi/Informasi Kompetensi, dan lain-lain :</label>
              <textarea id="bio" required="required" class="form-control" name="bio" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-validation-threshold="10" placeholder="Biografi, Informasi Kompentensi, Pengalaman Pembicara dan lain-lain"><?php echo $keterangan; ?></textarea>
              <br>
              <label for="foto">Foto * :</label>
              <input type="hidden" name="oldfoto" value="<?php echo $foto; ?>">
              <input type="file" id="foto" class="form-control" name="foto" <?php echo $req; ?>>
              <br>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo site_url('dashboard/narasumber'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
            <?php echo form_close(); ?>
            <!-- end form for validations -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>