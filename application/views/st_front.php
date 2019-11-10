<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <title>Aplikasi Pendaftaran Workshop Online v.1.1</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="author" content="Kementerian Agama Kantor Wilayah Agama Provinsi Bengkulu">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="<?php echo base_url('assets/front/') ?>images/logo-kemenag.png" rel="icon">
    <link href="<?php echo base_url('assets/front/') ?>images/logo-kemenag.png" rel="apple-touch-icon">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>css/fonts.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap4.min.css">
    <!-- lightbox -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}
  </style>
  </head>
  <body style="background-color: aliceblue;">
    <?php echo $this->session->flashdata('notif'); ?>
    <div class="container">
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="<?php echo base_url('assets/front/'); ?>images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="loader">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
        <p>Loading...</p>
      </div>
    </div>
    <div class="page">
      <!-- header -->
      <?php $this->load->view('header'); ?>

      <!-- main content -->
      <?php $this->load->view($page); ?>

      <!-- footer -->
      <?php $this->load->view('footer'); ?>

      <!-- <?php echo "<pre>";
      print_r($this->session->userdata()) ?> -->
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="<?php echo base_url('assets/front/'); ?>js/core.min.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>js/script.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <!-- lightbox.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    <!--coded by Starlight-->
    <script>
      var error = 1;var status_nip = 1;

      $(document).ready(function() {
        var table = $('#example').DataTable();
        $('.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          nav:true,
          responsive:{
            0:{
              items:1
            },
            600:{
              items:3
            },
            1000:{
              items:5
            }
          }
        })
      } );

      $('#exampleModal').on('show.bs.modal', function (e) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog modal-dialog-centered fadeInDown animated ');
      });
      $('#exampleModal2').on('show.bs.modal', function (e) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog modal-dialog-centered modal-lg fadeInDown animated ');
      });

      function cek_register(){
        var passBaru = $('#password_reg').val();
        var konfir = $('#konf_password').val();
        
        if (konfir == "") {
          $("#pesan_konfir").css('color','#fc5d32');
          $("#konf_password").css('border-color','#fc5d32');
          $("#pesan_konfir").html('Konfirmasi password tidak boleh kosong');
          $("#pesan_konfir").fadeIn(1000);
          error = 1;
        }else{
          if(konfir != passBaru){
            $("#pesan_konfir").css('color','#fc5d32');
            $("#konf_password").css('border-color','#fc5d32');
            $("#pesan_konfir").html('Maaf Konfirmasi password tidak valid');
            $("#pesan_konfir").fadeIn(1000);
            error = 1;
          }else{
            $("#pesan_konfir").css("color","#59c113");
            $("#konf_password").css("border-color","#59c113");
            $("#pesan_konfir").html("Konfirmasi password valid");
            $("#pesan_konfir").fadeIn(1000);
            error = 0;
          }
        }
      }

      function cek_nip(){
        var nip_reg = $("#nip_reg").val();
        $.ajax({
          url: "<?php echo site_url('home/cek_status_nip/'); ?>", //arahkan pada submit di controller register
          data: 'nip_reg='+nip_reg,
          type: "POST",
          success: function(msg){
            if(msg==1){
              status_nip = 0;
            }else{
              status_nip = 1;
            }
          }
        });
      }

      function cek_submit_reg(){
        var passBaru = $('#password_reg').val();
        var konfir = $('#konf_password').val();
        
        if (status_nip == 1) {
          alert('NIP sudah terdaftar.\nSilahkan hubungi admin untuk informasi lebih lanjut.');
          return false;
        }
      
        if (status_nip == 1 || error==1 || konfir!=passBaru || konfir=="" || passBaru=="") {
          alert('Data harus diisi dan valid');
          return false;
        }
      }

      $(document).on("click", '[data-toggle="lightbox"]', function(event) {
       event.preventDefault();
       $(this).ekkoLightbox();
     });
    </script>
    </div>
  </body>
</html>