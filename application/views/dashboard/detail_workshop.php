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
          <div class="x_content">
            <h2 style="margin: 0px;"><small>Detail Workshop</small></h2>
            <div class="ln_solid"></div>
            <br>
            <form class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: normal;font-style: italic;">Nama Kegiatan : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" style="text-align: left;"><?php echo $data_workshop[0]->nm_kegiatan; ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: normal;font-style: italic;">Nama Narasumber : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" style="text-align: left;">
                    <?php for ($i=0; $i < count($list_narasumber['id_narasumber']); $i++) {
                            for ($j=0; $j < count($data_narasumber); $j++) {
                              if ($list_narasumber['id_narasumber'][$i] == $data_narasumber[$j]->id) {
                     ?>
                      <li type="1" style="text-transform: capitalize;">
                        <a style="cursor: pointer;" data-toggle="modal" data-target="#detail" 
                          data-foto="<?php echo base_url('assets/back/images/narasumber/'.str_replace('.', '_thumb.', $data_narasumber[$j]->foto)) ?>"
                          data-nama="<?php echo $data_narasumber[$j]->nama; ?>"
                          data-jns_kelamin="<?php echo $data_narasumber[$j]->jns_kelamin == 'laki' ? 'Laki=laki':'Perempuan'; ?>"
                          data-keterangan="<?php echo $data_narasumber[$j]->keterangan; ?>"><?php echo $data_narasumber[$j]->nama.' => ( '.$list_narasumber['waktu'][$i].' jam )'; ?>
                        </a>
                      </li>
                    <?php } } } ?>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: normal;font-style: italic;">Nama Moderator : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" style="text-align: left;">
                    <?php for ($i=0; $i < count($list_narasumber['id_narasumber']); $i++) { ?>
                      <li type="1" style="text-transform: capitalize;"><?php echo $list_narasumber['nm_moderator'][$i]; ?></li>
                    <?php } ?>                      
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: normal;font-style: italic;">Status Kegiatan : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" style="text-align: left;"><?php echo $data_workshop[0]->status; ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: normal;font-style: italic;">Tanggal Pembukaan : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" style="text-align: left;"><?php echo nama_hari(date($data_workshop[0]->tgl_buka)).', '.tgl_indo(date($data_workshop[0]->tgl_buka)); ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: normal;font-style: italic;">Tanggal Penutupan : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" style="text-align: left;"><?php echo nama_hari(date($data_workshop[0]->tgl_tutup)).', '.tgl_indo(date($data_workshop[0]->tgl_tutup)); ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: normal;font-style: italic;">Lokasi Kegiatan : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" style="text-align: left;"><?php echo $data_workshop[0]->lokasi; ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: normal;font-style: italic;">Kuota : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" style="text-align: left;"><?php echo $data_workshop[0]->kuota.'<em> ('.($data_workshop[0]->kuota-count($daftar)).') tersedia.</em>'; ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: normal;font-style: italic;">Judul Materi : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" style="text-align: left;"><?php echo $data_workshop[0]->judul_materi; ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: normal;font-style: italic;">File Materi : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" style="text-align: left;"><a class="btn btn-default" href="<?php echo site_url('dashboard/download/'.$this->uri->segment(4).'/'.$data_workshop[0]->file_materi); ?>" title="DOWNLOAD FILE MATERI WORSHOP"><i class="fa fa-download"></i> DOWNLOAD</a></label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-weight: normal;font-style: italic;">Deskripsi Kegiatan : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" style="text-align: justify;"><?php echo $data_workshop[0]->keterangan; ?></label>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <?php if ($this->session->userdata('hak_akses') == "peserta") {
                    if ($absen!=null) { ?>
                      <button class="btn btn-danger" disabled><i class="fa fa-check"></i> Anda sudah mendaftar</button>
                    <?php } else { ?>
                      <a class="btn btn-success" href="<?php echo site_url('dashboard/workshop/register/'.$this->uri->segment(4)); ?>"><i class="fa fa-edit"></i> Daftar</a>
                  <?php } } ?>
                  <?php if ($this->session->userdata('hak_akses') == "admin" OR $this->session->userdata('hak_akses') == "pembina") { ?>
                    <a class="btn btn-primary" href="<?php echo site_url('dashboard/workshop/list_peserta/'.$this->uri->segment(4)); ?>"><i class="fa fa-user"></i> Lihat Peserta</a>
                  <?php } ?>
                  <a type="submit" class="btn btn-dark" href="<?php echo site_url('dashboard/workshop'); ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Info Narasumber</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <img id="foto" alt="img" style="width: 50%;margin: 0 auto 20px;display: block;border: 1px solid grey;">
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 30px;">
            <span>Nama : <br><label style="text-transform: capitalize;" id="nama"></label></span><br>
            <span>Jenis Kelamin : <br><label style="text-transform: capitalize;" id="jns_kelamin"></label></span><br>
            <span>Biografi, Kompetensi dan lain-lain : <br><label style="text-transform: capitalize;text-align: justify;" id="keterangan"></label></span><br>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>