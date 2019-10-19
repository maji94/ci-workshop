<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Profil</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <h2 style="margin: 0px;"><small>Profil Admin Pembina</small></h2>
            <div class="ln_solid"></div>
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view" style="width: 60%;margin: auto;" src="<?php echo base_url('assets/back/images/'.$this->session->userdata('hak_akses').'/'.str_replace('.', '_thumb.', $data[0]->foto)); ?>" alt="Avatar"><br>
                </div>
              </div>
              <?php echo form_open_multipart('dashboard/peserta/do_edit'); ?>
                <label for="nama">NIP * :</label>
                <input type="hidden" name="id" value="<?php echo $data[0]->id; ?>">
                <input type="hidden" name="oldNip" value="<?php echo $data[0]->nip; ?>">
                <input type="text" id="NIP" class="form-control" name="nip" placeholder="NIP peserta" required value="<?php echo $data[0]->nip; ?>">
                <br>
                <label for="nama">Nama * :</label>
                <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama beserta gelar" required value="<?php echo $data[0]->nama; ?>">
                <br>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah Profil</button>
              <?php echo form_close(); ?>

            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
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
<?php 
echo "<pre>"; 
print_r($this->session->userdata());
?>