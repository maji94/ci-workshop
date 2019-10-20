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
                    <table class="data table table-striped no-margin">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Project Name</th>
                          <th>Client Company</th>
                          <th class="hidden-phone">Hours Spent</th>
                          <th>Contribution</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>New Company Takeover Review</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">18</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>New Partner Contracts Consultanci</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">13</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Partners and Inverstors report</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">30</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>New Company Takeover Review</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">28</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end user projects -->

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                    <!-- start user projects -->
                    <table class="data table table-striped no-margin">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Project Name</th>
                          <th>Client Company</th>
                          <th class="hidden-phone">Hours Spent</th>
                          <th>Contribution</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>New Company Takeover Review</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">18</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>New Partner Contracts Consultanci</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">13</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Partners and Inverstors report</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">30</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>New Company Takeover Review</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">28</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                            </div>
                          </td>
                        </tr>
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
            <input type="password" id="konf_psw" class="form-control" name="konf_psw" placeholder="Konfirmasi password baru (ulangi password baru)" minlength="6" maxlength="12" required onkeyup="cek_register();">
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