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
            <h2>Daftar/List Peserta Workshop : <?php if ($peserta) {echo $peserta[0]->nm_kegiatan;} ?></h2>
            <div class="clearfix"></div>
            <a class="btn btn-success" href="<?php echo site_url('dashboard/workshop/cetak/'.$this->uri->segment(4)); ?>"><i class="fa fa-print"></i> Cetak Absen Peserta</a>
            <a href="<?php echo site_url('dashboard/workshop/detail/'.$this->uri->segment(4)); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
  
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="5%">No.</th>
                  <th width="12%">Foto</th>
                  <th width="18%">Nama</th>
                  <th width="15%">NIP</th>
                  <th width="40%">Asal Instansi/Organisasi</th>
                  <th width="10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($peserta as $d) { ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td align="center"><img width="150" height="180" src="<?php echo base_url('assets/back/images/peserta/'.str_replace('.', '_thumb.', $d->foto)) ?>" alt="gambar narasumber"></td>
                    <td><?php echo $d->nama; ?></td>
                    <td><?php echo $d->nip; ?></td>
                    <td><?php echo $d->unker; ?></td>
                    <td align="center">
                      <a style="width: 80px" class="btn btn-warning" href="<?php echo site_url('dashboard/workshop/detail/'.$d->id); ?>"><i class="fa fa-search"></i> Detail</a><br>
                      <a style="width: 80px" class="btn btn-default" href="<?php echo site_url('dashboard/workshop/delete_peserta/'.$d->id_peserta); ?>" onclick="return confirm('Data ini akan terhapus. Lanjutkan ?');"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                <?php }$no++; ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>