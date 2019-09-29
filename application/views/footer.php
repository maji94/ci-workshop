<footer class="section footer-classic">
  <div class="footer-inner-1">
    <div class="container">
      <div class="row row-30">
        <div class="col-md-12 col-lg-3">
          <h5>Kontak</h5><hr style="margin-top:5px;">
          <div class="row row-30 align-items-left">
            <div class="col-12"><a class="link-image" href="http://bengkulu.kemenag.go.id"><img src="<?php echo base_url('assets/front/'); ?>images/logo-bengkulu-kemenag.png" alt="" height="35"/></a></div>
          </div>
          <ul class="contact-list font-weight-bold">
            <li>
              Kementerian Agama Kantor Wilayah Bengkulu
            </li>
            <li>
              <div class="unit unit-spacing-xs">
                <div class="unit-left">
                  <div class="icon icon-sm icon-primary novi-icon mdi mdi-map-marker"></div>
                </div>
                <div class="unit-body"><a href="#">Jl. Jendral Basuki Ramhat No. 10 Bengkulu, 38221</a></div>
              </div>
            </li>
            <li>
              <div class="unit unit-spacing-xs">
                <div class="unit-left">
                  <div class="icon icon-sm icon-primary novi-icon mdi mdi-phone"></div>
                </div>
                <div class="unit-body"><a>Telp. (0726) 21097, 21597, 344602, 28123 <br>Fax. (0726) 21597</a></div>
              </div>
            </li>
            <li>
              <div class="unit unit-spacing-xs">
                <div class="unit-left">
                  <div class="icon icon-sm icon-primary novi-icon mdi mdi-earth"></div>
                </div>
                <div class="unit-body"><a href="http://bengkulu.kemenag.go.id">http://bengkulu.kemenag.go.id</a></div>
              </div>
            </li>
            <li>
              <div class="unit unit-spacing-xs">
                <div class="unit-left">
                  <div class="icon icon-sm icon-primary novi-icon mdi mdi-email"></div>
                </div>
                <div class="unit-body"><a href="mailto:kanwilbengkulu@kemenag.go.id">kanwilbengkulu@kemenag.go.id</a></div>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-md-12 col-lg-5">
          <h5>Twitter</h5><hr style="margin-top:5px;">
          <div class="row row-5 justify-content-between">
            <div class="col-sm-12">
              <!-- <a class="twitter-timeline" data-height="400" data-theme="dark" href="https://twitter.com/Kemenagbkl?ref_src=twsrc%5Etfw">Tweets by Kemenagbkl</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <h5>Facebook</h5><hr style="margin-top:5px;">
          <div class="row row-30 text-center">
            <div class="col-12">
              <!-- <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FKanwilkemenagbengkulu-Bkl-1610630808947299%2F&tabs=timeline&width=340&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" height="400" style="border:none;overflow:hidden;width: 100%;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-inner-2">
    <div class="container">
      <p class="rights"><span>&copy;&nbsp;</span>2019. Kementerian Agama Kantor Wilayah Provinsi Bengkulu.</p>
    </div>
  </div>
</footer>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masuk / Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">NIP :</label>
            <input type="text" class="form-control" id="nip" name="nip" placeholder="Silahkan masukkan NIP anda (tanpa spasi)">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password :</label>
            <input type="password" class="form-control" id="  password" name="password" placeholder="Silahkan masukkan password anda">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="group-sm group-wrap-2">
          <button type="button" class="button button-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="button button-primary">Masuk</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar / Registrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('home/getRegister', 'onSubmit="return cek_submit_reg();"'); ?>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-6 col-12">
            <label for="nama" class="col-form-label">Nama : *</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Silahkan masukkan nama anda" required>
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="foto" class="col-form-label">Foto :</label>
            <input type="file" class="form-control-file" id="foto" name="foto">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 col-12">
            <label for="ktp" class="col-form-label">No KTP : *</label>
            <input type="text" class="form-control" id="ktp" name="ktp" minlength="16" maxlength="16" placeholder="Silahkan masukkan no KTP anda (tanpa spasi)" required>
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="tmp_lahir" class="col-form-label">Tempat Lahir : *</label>
            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Silahkan masukkan tempat lahir anda" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 col-12">
            <label for="tgl_lahir" class="col-form-label">Tanggal Lahir : *</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo date('Y-m-d'); ?>" required>
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="jns_kelamin" class="col-form-label">Jenis Kelamin : *</label>
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio1" name="jns_kelamin" class="custom-control-input" checked>
              <label class="custom-control-label" for="customRadio1" style="color: black;">Laki-laki</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio2" name="jns_kelamin" class="custom-control-input">
              <label class="custom-control-label" for="customRadio2" style="color: black;">Perempuan</label>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 col-12">
            <label for="agama" class="col-form-label">Agama : *</label>
            <input type="text" class="form-control" id="agama" name="agama" placeholder="Silahkan masukkan agama anda" required>
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="pendidikan" class="col-form-label">Pendidikan Terakhir :</label>
            <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Sarjana (III/II/I), Diploma (IV/III/II/I), SMA/Madrasah, dst.">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 col-12">
            <label for="alamat_rm" class="col-form-label">Alamat Rumah : *</label>
            <textarea class="form-control" name="alamat_rm" id="alamat_rm" cols="30" rows="3" placeholder="Silahkan masukkan alamat rumah anda"></textarea>
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="email" class="col-form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Silahkan masukkan email anda">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 col-12">
            <label for="nohp" class="col-form-label">No HP : *</label>
            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Silahkan masukkan nomor handphone yang aktif" required>
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="nip_reg" class="col-form-label">NIP : *</label>
            <input type="text" class="form-control" id="nip_reg" name="nip" placeholder="Silahkan masukkan NIP anda (tanpa spasi)"  minlength="16" maxlength="18" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 col-12">
            <label for="golongan" class="col-form-label">Golongan :</label>
            <input type="text" class="form-control" id="golongan" name="golongan" placeholder="Silahkan masukkan golongan anda">
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="jabatan" class="col-form-label">Jabatan :</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Silahkan masukkan jabatan anda">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 col-12">
            <label for="unker" class="col-form-label">Unit Kerja :</label>
            <input type="text" class="form-control" id="unker" name="unker" placeholder="Silahkan masukkan unit kerja anda">
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="kab" class="col-form-label">Kabupaten/Kota :</label>
            <input type="text" class="form-control" id="kab" name="kab" placeholder="Silahkan masukkan nama kabupaten/kota anda">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 col-12">
            <label for="alamat_kt" class="col-form-label">Alamat Kantor :</label>
            <textarea class="form-control" name="alamat_kt" id="alamat_kt" cols="30" rows="3" placeholder="Silahkan masukkan alamat kantor anda"></textarea>
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="npwp" class="col-form-label">NPWP :</label>
            <input type="text" class="form-control" id="npwp" name="npwp" placeholder="Silahkan masukkan NPWP anda">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 col-12">
            <label for="norek" class="col-form-label">No. Rekening dan Bank :</label>
            <input type="text" class="form-control" id="norek" name="norek" placeholder="Contoh. 123456789 (Bank Mandiri Syariah)">
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="password_reg" class="col-form-label">Password : *</label>
            <input type="password" class="form-control" id="password_reg" name="password_reg" placeholder="Silahkan masukkan password anda" required minlength="6" maxlength="12">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 col-12">
            <label for="konf_password" class="col-form-label">Konfirmasi Password : *</label>
            <input type="password" class="form-control" id="konf_password" name="konf_password" placeholder="Konfirmasi password, ulangi password anda" required minlength="6" maxlength="12" onkeyup="cek_register();">
            <span class="error" id="pesan_konfir"></span>
          </div>
          <div class="form-group col-md-6 col-12">
            <label style="font-style: italic;" class="col-form-label">( * ) kolom yang wajib diisi.</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="group-sm group-wrap-2">
          <button type="button" class="button button-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="button button-primary">Daftar</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>