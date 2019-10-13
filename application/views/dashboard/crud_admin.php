<?php
  $links = $this->uri->segment('3');
  if ($links == "add") {
    $action = "do_add";
    $header = "Tambah";
    $id = "";
    $foto = "";
    $nama = "";
    $nip = "";
    $bidang = "";
    $email = "";
    $nohp = "";
    $alamat = "";
    $req = "required";
  }else{
    $action = "do_edit";
    $header = "Ubah";
    $id = $data[0]->id;
    $foto = str_replace('.', '_thumb.', $data[0]->foto);
    $nama = $data[0]->nama;
    $nip = $data[0]->nip;
    $bidang = $data[0]->bidang;
    $email = $data[0]->email;
    $nohp = $data[0]->nohp;
    $alamat = $data[0]->alamat;
    $req = "";
  }
?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Admin Bidang</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <h2 style="margin: 0px;"><small><?php echo $header; ?> Data Admin Bidang</small></h2>
            <div class="ln_solid"></div>
            <!-- start form for validation -->
            <?php echo form_open_multipart('dashboard/admin/'.$action,'id="demo-form data-parsley-validate"'); ?>
            <!-- <form id="demo-form" data-parsley-validate> -->
              <label for="nama">Nama * :</label>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama beserta gelar" required value="<?php echo $nama; ?>">
              <br>
              <label for="nip">NIP * :</label>
              <input type="hidden" name="oldNip" value="<?php echo $nip; ?>">
              <input type="text" id="nip" class="form-control" name="nip" placeholder="NIP tanpa spasi" required value="<?php echo $nip; ?>">
              <br>
              <label for="bidang">Bidang * :</label>
              <input type="text" id="bidang" class="form-control" name="bidang" placeholder="Bidang admin" required value="<?php echo $bidang; ?>">
              <br>
              <label for="email">Email * :</label>
              <input type="email" id="email" class="form-control" name="email" placeholder="Email aktif" required value="<?php echo $email; ?>">
              <br>
              <label for="nohp">Handphone * :</label>
              <input type="text" id="nohp" class="form-control" name="nohp" placeholder="Nomor handphone tanpat spasi" required value="<?php echo $nohp; ?>">
              <br>
              <label for="alamat">Alamat admin :</label>
              <textarea id="alamat" required="required" class="form-control" name="alamat" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-validation-threshold="10" placeholder="Masukkan alamat admin"><?php echo $alamat; ?></textarea>
              <br>
              <label for="foto">Foto * :</label>
              <input type="hidden" name="oldfoto" value="<?php echo $foto; ?>">
              <input type="file" id="foto" class="form-control" name="foto" <?php echo $req; ?>>
              <br>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo site_url('dashboard/admin'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
            <?php echo form_close(); ?>
            <!-- end form for validations -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>