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
          <div class="x_title">
            <a class="btn btn-success" href="<?php echo site_url('dashboard/galeri/add'); ?>"><i class="fa fa-plus"></i> Tambah</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
  
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="2%">No.</th>
                  <th width="10%">Foto</th>
                  <th width="35%">Judul</th>
                  <th width="30%">Tanggal Kegaitan</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($data as $d) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td align="center"><img width="100" height="130" src="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', unserialize($d->konten)[0])) ?>" alt="gambar galeri"></td>
                  <td><?php echo $d->judul; ?></td>
                  <td><?php echo tgl_indo($d->tanggal) ?></td>
                  <td>
                    <a style="width: 80px" class="btn btn-primary" href="<?php echo site_url('dashboard/galeri/edit/'.$d->id); ?>"><i class="fa fa-pencil"></i> Edit</a><br>
                    <a style="width: 80px" class="btn btn-default" href="<?php echo site_url('dashboard/galeri/delete/'.$d->id); ?>" onclick="return confirm('Data ini akan terhapus. Lanjutkan ?');"><i class="fa fa-trash"></i> Delete</a>
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