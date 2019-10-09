<?php
  $links = $this->uri->segment('3');
  if ($links == "add") {
    $action = "do_add";
    $header = "Tambah";
    $id = "";
    $id_narasumber = "";
    $nm_moderator = "";
    $nm_kegiatan = "";
    $status = "";
    $tgl_buka = "";
    $tgl_tutup = "";
    $lokasi = "";
    $kuota = "";
    $judul_materi = "";
    $file_materi = "";
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
        <h3>Workshop</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><small style="margin-left: 0;"><?php echo $header; ?> Data Workshop</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- start form for validation -->
            <?php echo form_open_multipart('dashboard/workshop/'.$action); ?>
            <!-- <form id="demo-form" data-parsley-validate> -->
              <label for="nm_kegiatan">Nama Kegiatan * :</label>
              <input type="text" id="nm_kegiatan" class="form-control" name="nm_kegiatan" placeholder="Silahkan masukkan nama kegiatan" required value="<?php echo $nm_kegiatan; ?>">
              <br>
              <label for="id_narasumber">Nama Narasumber * :</label>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <select name="id_narasumber" id="id_narasumber" class="form-control">
                <?php foreach ($narsum as $d) { ?>
                  <option value="<?php echo $d->id; ?>"><?php echo strtoupper($d->nama); ?></option>
                <?php } ?>
              </select>
              <br>
              <label for="nm_moderator">Nama Moderator * :</label>
              <input type="text" id="nm_moderator" class="form-control" name="nm_moderator" placeholder="Silahkan masukkan nama moderator" required value="<?php echo $nm_moderator; ?>">
              <br>
              <label for="status">Status Kegiatan * :</label>
              <select name="status" id="status" class="form-control">
                <option value="open">Open (Dibuka)</option>
                <option value="ongoing">On Going (Sedang Berlangsung)</option>
                <option value="close">Close (Ditutup)</option>
              </select>
              <br>
              <label for="tgl_buka">Tanggal Pembukaan * :</label>
              <input type="date" class="form-control" name="tgl_buka" id="tgl_buka" required>
              <br>
              <label for="tgl_tutup">Tanggal Penutupan * :</label>
              <input type="date" class="form-control" name="tgl_tutup" id="tgl_tutup" required>
              <br>
              <label for="lokasi">Lokasi Kegiatan * :</label>
              <input type="teks" class="form-control" name="lokasi" id="lokasi" placeholder="Silahkan masukkan lokasi kegiatan">
              <br>
              <label for="kuota">Kuota * :</label>
              <input type="number" class="form-control" name="kuota" id="kuota" required min="0" step="5" value="0">
              <br>
              <label for="judul_materi">Judul Materi * :</label>
              <input type="text" class="form-control" name="judul_materi" id="judul_materi" placeholder="Silahkan masukkan judul materi">
              <br>
              <label for="file_materi">File Materi (pdf,docx,pptx,xlsx) :</label>
              <input type="hidden" name="oldfile" value="<?php echo $file_materi; ?>">
              <input type="file" id="file_materi" class="form-control" name="file_materi" <?php echo $req; ?>>
              <br>
              <label for="keterangan">Deskripsi Kegiatan :</label>
              <textarea id="keterangan" required="required" class="form-control" name="keterangan" rows="5" placeholder="Deskripsi kegiatan, dan keterangan lain yang dianggap perlu."><?php echo $keterangan; ?></textarea>
              <br>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo site_url('dashboard/workshop'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
            <?php echo form_close(); ?>
            <!-- end form for validations -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>