<?php
  $links = $this->uri->segment('3');
  if ($links == "add") {
    $action = "do_add";
    $header = "Tambah";
    $id = "";
    $judul = "";
    $konten = "";
    $konten0 = "";
    $n_konten = "";
    $req = "required";
  }else{
    $action = "do_edit";
    $header = "Ubah";
    $id = $data[0]->id;
    $judul = $data[0]->judul;
    $konten = unserialize($data[0]->konten);
    $konten0 = base_url('assets/backend/dist/img/galeri/'.str_replace('.', '_thumb.', $konten[0]));
    $n_konten = sizeof($konten);
    $req = "";
  }
?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Galeri</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <h2 style="margin: 0px;"><small><?php echo $header; ?> Data Galeri</small></h2>
            <div class="ln_solid"></div>
            <!-- start form for validation -->
            <?php echo form_open_multipart('dashboard/galeri/'.$action); ?>
            <!-- <form id="demo-form" data-parsley-validate> -->
              <label for="nama">Judul * :</label>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama beserta gelar" required value="<?php echo $nama; ?>">
              <br>
              <label for="foto">Foto * :</label>
              <input type="hidden" name="oldfoto" value="<?php echo $foto; ?>">
              <input type="file" id="foto" class="form-control" name="foto" <?php echo $req; ?>>
              <br>
              <input type="hidden" name="n_edit" id="n_edit" value="<?php echo $n_konten; ?>">

              <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                  <h4 style="font-weight: bold;">Unggah Foto</h4>
                  <input type="file" id="foto[0]" name="foto[0]" onchange="PreviewImage('foto[0]','prevFoto[0]','#oldFoto0');">
                </div>
                <div class="form-group">
                  <?php if ($posisi == "edit") { ?>
                  <input type="hidden" name="oldFoto[]" id="oldFoto0" value="<?php echo $konten[0]; ?>"><?php } ?>
                  <img src="<?php echo $konten0; ?>" class="form-control" id="prevFoto[0]" style="height: 200px; width: 100%;" alt="Foto Galeri">
                </div>
              </div>

              <?php if ($posisi == "edit") {
                for ($i=1; $i <$n_konten ; $i++) { ?>

                  <div class="col-sm-3 col-xs-6" id="<?php echo 'finput'.$i; ?>">
                    <div class="form-group">
                      <h4 style="font-weight: bold;">Unggah Foto</h4>
                      <input type="file" id="<?php echo 'foto['.$i.']'; ?>" name="<?php echo 'foto['.$i.']'; ?>" onchange="PreviewImage('<?php echo "foto[".$i."]"; ?>','<?php echo "prevFoto[".$i."]"; ?>','<?php echo "#oldFoto".$i; ?>');">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="<?php echo 'oldFoto[]'; ?>" id="<?php echo 'oldFoto'.$i; ?>" value="<?php echo $konten[$i]; ?>">
                      <img src="<?php echo base_url('assets/backend/dist/img/galeri/'.str_replace('.', '_thumb.', $konten[$i])); ?>" class="form-control" id="<?php echo 'prevFoto['.$i.']'; ?>" style="height: 200px; width: 100%;" alt="Foto Galeri">
                    </div><button class="btn btn-default btn-xs" type="button" onclick="hapus('#finput<?php echo $i; ?>');"><i class="fa fa-times"></i> Hapus</button>
                  </div>

            <?php } } ?>
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