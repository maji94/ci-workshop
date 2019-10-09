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
            <a class="btn btn-success" href="<?php echo site_url('dashboard/workshop/add'); ?>"><i class="fa fa-plus"></i> Tambah</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
  
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="5%">No.</th>
                  <th width="12%">Foto</th>
                  <th width="18%">Nama</th>
                  <th width="15%">Jenis Kelamin</th>
                  <th width="45%">Biografi, Keterangan lain</th>
                  <th width="5%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($data as $d) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td align="center"><img width="150" height="180" src="<?php echo base_url('assets/back/images/narasumber/'.str_replace('.', '_thumb.', $d->foto)) ?>" alt="gambar narasumber"></td>
                  <td style="text-transform: capitalize;"><?php echo $d->nama; ?></td>
                  <td><?php if ($d->jns_kelamin == "laki") {echo "Laki-laki";}else {echo "Perempuan";} ?></td>
                  <td><?php echo $d->keterangan; ?></td>
                  <td>
                    <a style="width: 80px" class="btn btn-warning" href="<?php echo site_url('dashboard/narasumber/detail/'.$d->id); ?>"><i class="fa fa-search"></i> Detail</a><br>
                    <a style="width: 80px" class="btn btn-primary" href="<?php echo site_url('dashboard/narasumber/edit/'.$d->id); ?>"><i class="fa fa-pencil"></i> Edit</a><br>
                    <a style="width: 80px" class="btn btn-default" href="<?php echo site_url('dashboard/narasumber/delete/'.$d->id); ?>" onclick="return confirm('Data ini akan terhapus. Lanjutkan ?');"><i class="fa fa-trash"></i> Delete</a>
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