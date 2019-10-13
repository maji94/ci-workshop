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
          <div class="x_title">
            <a class="btn btn-success" href="<?php echo site_url('dashboard/admin/add'); ?>"><i class="fa fa-plus"></i> Tambah</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
  
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="5%">No.</th>
                  <th width="12%">Foto</th>
                  <th width="10%">Nama</th>
                  <th width="8">NIP</th>
                  <th width="15%">Bidang</th>
                  <th width="15%">Email / Hp</th>
                  <th width="30*">Alamat</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($data as $d) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td align="center"><img width="150" height="180" src="<?php echo base_url('assets/back/images/admin/'.str_replace('.', '_thumb.', $d->foto)) ?>" alt="gambar admin"></td>
                  <td style="text-transform: capitalize;"><?php echo $d->nama; ?></td>
                  <td style="text-transform: capitalize;"><?php echo $d->nip; ?></td>
                  <td style="text-transform: capitalize;"><?php echo $d->bidang; ?></td>
                  <td><?php echo $d->email.' / <br>'.$d->nohp; ?></td>
                  <td><?php echo $d->alamat; ?></td>
                  <td>
                    <a style="width: 80px" class="btn btn-primary" href="<?php echo site_url('dashboard/admin/edit/'.$d->id); ?>"><i class="fa fa-pencil"></i> Edit</a><br>
                    <a style="width: 80px" class="btn btn-default" href="<?php echo site_url('dashboard/admin/delete/'.$d->id); ?>" onclick="return confirm('Data ini akan terhapus. Lanjutkan ?');"><i class="fa fa-trash"></i> Delete</a>
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