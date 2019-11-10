<footer>
  <div class="pull-right">
    &copy; 2019. Kementerian Agama Kantor Wilayah Bengkulu. All right reserve.
  </div>
  <div class="clearfix"></div>
</footer>

<?php if ($this->session->userdata('hak_akses') == "admin") { ?>
	<div class="modal fade" id="a_ubah_psw" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
	        </button>
	        <h4 class="modal-title" id="myModalLabel">Ubah Password</h4>
	      </div>
	      <?php echo form_open('dashboard/ubah_psw/'.$this->uri->segment(2),'onSubmit="return cek_ubh_psw();"'); ?>
	      <div class="modal-body">
	        <div class="row">
	          <div class="col-md-12 col-sm-12 col-xs-12">
	            <!-- <form id="demo-form" data-parsley-validate> -->
	            <label for="password">Password Baru * :</label>
	            <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan password baru" required minlength="6" maxlength="12">
	            <br>
	            <label for="konf_psw">Konfirmasi Password Baru * :</label>
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
<?php } ?>