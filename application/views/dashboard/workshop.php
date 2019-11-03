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
          <?php if ($this->session->userdata('hak_akses') == "admin" OR $this->session->userdata('hak_akses') == "pembina") { ?>
          <div class="x_title">
            <a class="btn btn-success" href="<?php echo site_url('dashboard/workshop/add'); ?>"><i class="fa fa-plus"></i> Tambah</a>
            <div class="clearfix"></div>
          </div>
          <?php } ?>
          <div class="x_content">
  
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="5%">No.</th>
                  <th width="12%">Status</th>
                  <th width="40%">Nama Kegiatan</th>
                  <th width="15%">Lokasi Kegiatan</th>
                  <th width="18%">Tanggal Kegiatan</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($data as $d) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td align="center">
                    <?php if ($d->status == "open") { ?>
                      <span class="badge bg-green">Dibuka</span>
                    <?php } else if ($d->status == "ongoing") { ?>
                      <span class="badge bg-orange">Sedang<br>Berlangsung</span>
                    <?php } else if ($d->status == "close") { ?>
                      <span class="badge bg-red">Ditutup</span>
                    <?php } ?>
                  </td>
                  <td style="text-transform: capitalize;"><?php echo $d->nm_kegiatan; ?></td>
                  <td style="text-transform: capitalize;"><?php echo $d->lokasi; ?>
                  </td>
                  <td><?php echo "Mulai : <br>".nama_hari(date($d->tgl_buka)).', '.tgl_indo(date($d->tgl_buka))."<br>Selesai : <br>".nama_hari(date($d->tgl_tutup)).', '.tgl_indo(date($d->tgl_tutup)); ?></td>
                  <td>
                    <a style="width: 80px" class="btn btn-warning" href="<?php echo site_url('dashboard/workshop/detail/'.$d->id); ?>"><i class="fa fa-search"></i> Detail</a><br>
                    <?php if ($this->session->userdata('hak_akses') == "admin" OR $this->session->userdata('hak_akses') == "pembina") { ?>
                    <a style="width: 80px" class="btn btn-primary" href="<?php echo site_url('dashboard/workshop/edit/'.$d->id); ?>"><i class="fa fa-pencil"></i> Edit</a><br>
                    <a style="width: 80px" class="btn btn-default" href="<?php echo site_url('dashboard/workshop/delete/'.$d->id); ?>" onclick="return confirm('Data ini akan terhapus. Lanjutkan ?');"><i class="fa fa-trash"></i> Delete</a>
                    <?php } ?>
                  </td>
                </tr>
                <?php $no++;} ?>
              </tbody>
            </table>

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