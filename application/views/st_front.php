<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo base_url('assets/front/') ?>images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>css/fonts.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>css/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap4.min.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}
  </style>
  </head>
  <body>
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
      <!-- <a class="banner banner-top" href="https://www.templatemonster.com/website-templates/monstroid2.html" target="_blank"><img src="<?php //echo base_url('assets/front/'); ?>images/monstroid.jpg" alt="" height="0"></a> -->
      <?php $this->load->view('header'); ?>

      <!-- main content -->
      <?php $this->load->view($page); ?>

      <!-- footer -->
      <!-- <a class="banner" href="https://www.templatemonster.com/website-templates/monstroid2.html" target="_blank"><img src="<?php //echo base_url('assets/front/'); ?>images/monstroid-big.jpg" alt="" height="0"></a> -->
      <?php $this->load->view('footer'); ?>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="<?php echo base_url('assets/front/'); ?>js/core.min.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>js/script.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <!--coded by Starlight-->
    <script>
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
        //var button = $(e.relatedTarget) // Button that triggered the modal
        //var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
       // var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        //modal.find('.modal-body input').val(recipient)
      });
      $('#exampleModal2').on('show.bs.modal', function (e) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog modal-dialog-centered modal-lg fadeInDown animated ');
      });
    </script>
    </div>
  </body>
</html>