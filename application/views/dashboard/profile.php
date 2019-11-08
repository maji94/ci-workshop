<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3 style="text-transform: capitalize;">Profil <?php echo $this->session->userdata('hak_akses'); ?></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <h2 style="margin: 0px;"><small>Data Profil</small></h2>
            <div class="ln_solid"></div>
            <div class="col-md-2 col-sm-12 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view" style="margin: auto;border: 1px solid black;" src="<?php echo base_url('assets/back/images/'.$this->session->userdata('hak_akses').'/'.str_replace('.', '_thumb.', $data[0]->foto)); ?>" alt="Avatar"><br>
                </div>
              </div>
            </div>
            <?php if ($this->session->userdata('hak_akses') == "peserta") { ?>
            <?php echo form_open_multipart('dashboard/profil/do_edit'); ?>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label for="nama">NIP :</label>
                <input type="hidden" name="id" value="<?php echo $data[0]->id; ?>">
                <input type="hidden" name="oldNip" value="<?php echo $data[0]->nip; ?>">
                <input type="text" id="NIP" class="form-control" name="nip" placeholder="NIP peserta" required value="<?php echo $data[0]->nip; ?>">
                <br>
                <label for="nama">Nama :</label>
                <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama beserta gelar" required value="<?php echo $data[0]->nama; ?>">
                <br>
                <label for="ktp">KTP * :</label>
                <input type="text" id="ktp" class="form-control" name="ktp" placeholder="Nomor Kartu Tanda Penduduk (KTP)" required value="<?php echo $data[0]->ktp; ?>">
                <br>
                <label for="tmp_lahir">Tempat Lahir * :</label>
                <input type="text" id="tmp_lahir" class="form-control" name="tmp_lahir" placeholder="Tempat Lahir" required value="<?php echo $data[0]->tmp_lahir; ?>">
                <br>
                <label for="tgl_lahir">Tanggal Lahir * :</label>
                <input type="date" id="tgl_lahir" class="form-control" name="tgl_lahir" required value="<?php echo $data[0]->tgl_lahir; ?>">
                <br>
                <label>Jenis Kelamin * :</label>
                <p>
                  <input type="radio" class="flat" name="jns_kelamin" id="genderM" value="laki" required <?php if ($data[0]->jns_kelamin == "laki" OR $data[0]->jns_kelamin == "") {echo "checked";} ?>>
                  Laki-laki: <br>
                  <input type="radio" class="flat" name="jns_kelamin" id="genderF" value="perempuan" <?php if ($data[0]->jns_kelamin == "perempuan") {echo "checked";} ?>>
                  Perempuan:
                </p>
                <label for="agama">Agama * :</label>
                <input type="text" id="agama" class="form-control" name="agama" placeholder="Agama peserta" required value="<?php echo $data[0]->agama; ?>">
                <br>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label for="pendidikan">Pendidikan * :</label>
                <input type="text" id="pendidikan" class="form-control" name="pendidikan" placeholder="Pendidikan peserta" required value="<?php echo $data[0]->pendidikan; ?>">
                <br>
                <label for="alamat_rm">Alamat Rumah * :</label>
                <textarea id="alamat_rm" required="required" class="form-control" name="alamat_rm" rows="5" placeholder="Alamat rumah peserta"><?php echo $data[0]->alamat_rm; ?></textarea>
                <br>
                <label for="email">Email :</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Email admin pembina" required value="<?php echo $data[0]->email; ?>">
                <br>
                <label for="nohp">No. Handphone :</label>
                <input type="text" id="nohp" class="form-control" name="nohp" placeholder="Nomor handphone admin pembina" required value="<?php echo $data[0]->nohp; ?>">
                <br>
                <label for="golongan">Golongan * :</label>
                <input type="text" id="golongan" class="form-control" name="golongan" placeholder="Golongan peserta" required value="<?php echo $data[0]->golongan; ?>">
                <br>
                <label for="jabatan">Jabatan * :</label>
                <input type="text" id="jabatan" class="form-control" name="jabatan" placeholder="Jabatan peserta" required value="<?php echo $data[0]->jabatan; ?>">
                <br>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <label for="unker">Unit Kerja * :</label>
                <input type="text" id="unker" class="form-control" name="unker" placeholder="Unit Kerja peserta" required value="<?php echo $data[0]->unker; ?>">
                <br>
                <label for="kab">Kabupaten/Kota * :</label>
                <input type="text" id="kab" class="form-control" name="kab" placeholder="Kabupater/Kota peserta" required value="<?php echo $data[0]->kab; ?>">
                <br>
                <label for="alamat_kt">Alamat Kantor * :</label>
                <textarea id="alamat_kt" required="required" class="form-control" name="alamat_kt" rows="5" placeholder="Alamat kantor peserta"><?php echo $data[0]->alamat_kt; ?></textarea>
                <br>
                <label for="npwp">NPWP * :</label>
                <input type="text" id="npwp" class="form-control" name="npwp" placeholder="Nomor NPWP peserta" required value="<?php echo $data[0]->npwp; ?>">
                <br>
                <label for="norek">No. Rekening * :</label>
                <input type="text" id="norek" class="form-control" name="norek" placeholder="Nomor rekening peserta. Contoh : 123456789 (Bank Bengkulu)" required value="<?php echo $data[0]->norek; ?>">
                <br>
                <label for="foto">Foto * :</label>
                <input type="hidden" name="oldfoto" value="<?php echo $data[0]->foto; ?>">
                <input type="file" id="foto" class="form-control" name="foto">
                <br>
                <div style="float: right">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah Profil</button>
                  <a style="cursor: pointer;" class="btn btn-info"
                  data-toggle="modal" data-target="#ubah_psw" 
                  data-nip="<?php echo $data[0]->nip; ?>" ><i class="fa fa-unlock-alt"></i> Ubah Password</a><br>
                </div>
              </div>
            <?php echo form_close(); ?>

            <?php }else if ($this->session->userdata('hak_akses') == "pembina") { ?>    
            <?php echo form_open_multipart('dashboard/profil/do_edit'); ?>
              <div class="col-md-5 col-sm-5 col-xs-12">
                <label for="nama">NIP :</label>
                <input type="hidden" name="id" value="<?php echo $data[0]->id; ?>">
                <input type="hidden" name="oldNip" value="<?php echo $data[0]->nip; ?>">
                <input type="text" id="NIP" class="form-control" name="nip" placeholder="NIP peserta" required value="<?php echo $data[0]->nip; ?>">
                <br>
                <label for="nama">Nama :</label>
                <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama beserta gelar" required value="<?php echo $data[0]->nama; ?>">
                <br>
                <label for="bidang">Bidang :</label>
                <input type="text" id="bidang" class="form-control" name="bidang" placeholder="Bidang admin pembina" required value="<?php echo $data[0]->bidang; ?>">
                <br>
              </div>
              <div class="col-md-5 col-sm-5 col-xs-12">
                <label for="alamat">Alamat :</label>
                <textarea id="alamat" required="required" class="form-control" name="alamat" rows="5" placeholder="Alamat admin pembina"><?php echo $data[0]->alamat; ?></textarea>
                <br>
                <label for="foto">Foto * :</label>
                <input type="hidden" name="oldfoto" value="<?php echo $data[0]->foto; ?>">
                <input type="file" id="foto" class="form-control" name="foto">
                <br>
                <div style="float: right">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah Profil</button>
                  <a style="cursor: pointer;" class="btn btn-info"
                  data-toggle="modal" data-target="#ubah_psw" 
                  data-nip="<?php echo $data[0]->nip; ?>" ><i class="fa fa-unlock-alt"></i> Ubah Password</a><br>
                </div>
              </div>
            <?php echo form_close(); ?>
            <?php } ?>

            <div class="ln_solid"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="profile_title">
                <div class="col-md-12">
                  <h2>Informasi Workshop</h2>
                </div>
              </div>
              <br>

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Akan Datang</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Riwayat Workshop</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                    <!-- start user projects -->
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">No.</th>
                          <th width="12%">Status</th>
                          <th width="40%">Nama Kegiatan</th>
                          <th width="20%">Lokasi Kegiatan</th>
                          <th width="18%">Tanggal Kegiatan</th>
                          <th width="5%">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $no=1; foreach ($workshop as $d) { 
                          if ($d->status != "close") {
                        ?>
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
                          <td><?php echo "Mulai : <br>".nama_hari(date($d->tgl_buka)).', '.tgl_indo(date($d->tgl_buka))."<br>Selesai : <br>".nama_hari(date($d->tgl_tutup)).', '.tgl_indo(date($d->tgl_tutup)); ?></td>
                          <td>
                            <a style="width: 80px" class="btn btn-warning" href="<?php echo site_url('dashboard/workshop/detail/'.$d->id); ?>"><i class="fa fa-search"></i> Detail</a><br>
                            <?php if ($this->session->userdata('hak_akses') == "admin" OR $this->session->userdata('hak_akses') == "pembina") { ?>
                            <a style="width: 80px" class="btn btn-primary" href="<?php echo site_url('dashboard/workshop/edit/'.$d->id); ?>"><i class="fa fa-pencil"></i> Edit</a><br>
                            <a style="width: 80px" class="btn btn-default" href="<?php echo site_url('dashboard/workshop/delete/'.$d->id); ?>" onclick="return confirm('Data ini akan terhapus. Lanjutkan ?');"><i class="fa fa-trash"></i> Delete</a>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php $no++; } } ?>
                      </tbody>

                    </table>
                    <!-- end user projects -->

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                    <!-- start user projects -->
                    <table id="datatables2" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">No.</th>
                          <th width="12%">Status</th>
                          <th width="40%">Nama Kegiatan</th>
                          <th width="20%">Lokasi Kegiatan</th>
                          <th width="18%">Tanggal Kegiatan</th>
                          <th width="5%">Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $no=1; foreach ($workshop as $d) { 
                          if ($d->status == "close") {
                        ?>
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
                          <td><?php echo "Mulai : <br>".nama_hari(date($d->tgl_buka)).', '.tgl_indo(date($d->tgl_buka))."<br>Selesai : <br>".nama_hari(date($d->tgl_tutup)).', '.tgl_indo(date($d->tgl_tutup)); ?></td>
                          <td>
                            <a style="width: 80px" class="btn btn-warning" href="<?php echo site_url('dashboard/workshop/detail/'.$d->id); ?>"><i class="fa fa-search"></i> Detail</a><br>
                            <?php if ($this->session->userdata('hak_akses') == "admin" OR $this->session->userdata('hak_akses') == "pembina") { ?>
                            <a style="width: 80px" class="btn btn-primary" href="<?php echo site_url('dashboard/workshop/edit/'.$d->id); ?>"><i class="fa fa-pencil"></i> Edit</a><br>
                            <a style="width: 80px" class="btn btn-default" href="<?php echo site_url('dashboard/workshop/delete/'.$d->id); ?>" onclick="return confirm('Data ini akan terhapus. Lanjutkan ?');"><i class="fa fa-trash"></i> Delete</a>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php $no++; } } ?>
                      </tbody>
                    </table>
                    <!-- end user projects -->

                  </div>
                </div>
              </div>
            </div>
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
      <?php echo form_open('dashboard/profil/ubah_psw','onSubmit="return cek_ubh_psw();"'); ?>
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

<!-- <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-hidden="true">
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
</div> -->