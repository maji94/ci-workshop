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
                  <th width="25*">Alamat</th>
                  <th width="10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($data as $d) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td align="center"><img width="80" height="110" src="<?php echo base_url('assets/back/images/pembina/'.str_replace('.', '_thumb.', $d->foto)) ?>" alt="gambar admin"></td>
                  <td style="text-transform: capitalize;"><?php echo $d->nama; ?></td>
                  <td style="text-transform: capitalize;"><?php echo $d->nip; ?></td>
                  <td style="text-transform: capitalize;"><?php echo $d->bidang; ?></td>
                  <td><?php echo $d->email.' / <br>'.$d->nohp; ?></td>
                  <td><?php echo $d->alamat; ?></td>
                  <td>
                    <a style="width: 140px" class="btn btn-primary" href="<?php echo site_url('dashboard/admin/edit/'.$d->id); ?>"><i class="fa fa-pencil"></i> Edit</a><br>
                    <a style="width: 140px;cursor: pointer;" class="btn btn-info"
                      data-toggle="modal" data-target="#ubah_psw" 
                      data-nip="<?php echo $d->nip; ?>" ><i class="fa fa-unlock-alt"></i> Ubah Password</a><br>
                    <a style="width: 140px" class="btn btn-default" href="<?php echo site_url('dashboard/admin/delete/'.$d->id); ?>" onclick="return confirm('Data ini akan terhapus. Lanjutkan ?');"><i class="fa fa-trash"></i> Delete</a>
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

<div class="modal fade" id="ubah_psw" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Ubah Password</h4>
      </div>
      <?php echo form_open('dashboard/admin/ubah_psw','onSubmit="return cek_ubh_psw();"'); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- <form id="demo-form" data-parsley-validate> -->
            <label for="password">Password Baru * :</label>
            <input type="hidden" name="nip" id="nip">
            <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan password baru" required minlength="6" maxlength="12">
            <br>
            <label for="konf_psw">Konfirmasi Password Baru * :</label>
            <input type="hidden" name="id" id="id">
            <input type="password" id="konf_psw" class="form-control" name="konf_psw" placeholder="Konfirmasi password baru (ulangi password baru)" minlength="6" required onkeyup="cek_register();">
            <span class="error" id="pesan_konfir"></span>
            <br>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>