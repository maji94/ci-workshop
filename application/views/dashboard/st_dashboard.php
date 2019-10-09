<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Pendaftaran Workshop Online | v 1.0</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/back'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/back'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/back'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('assets/back'); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url('assets/back'); ?>/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url('assets/back'); ?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo base_url('assets/back'); ?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo base_url('assets/back'); ?>/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url('assets/back'); ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/back'); ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/back'); ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/back'); ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/back'); ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="<?php echo base_url('assets/back'); ?>/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/back'); ?>/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/back'); ?>/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/back'); ?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md" <?php echo $this->session->flashdata('notif'); ?>>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url('dashboard'); ?>" class="site_title">
              <i class="fa fa-home"></i> <span>Dashboard</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url('assets/back/') ?>images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Online</span>
                <h2 style="text-transform: capitalize;"><?php echo $this->session->userdata('nama'); ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Main Menu</h3>
                <ul class="nav side-menu">
                  <li class="<?php if($this->uri->segment(2) == ""){echo "active";} ?>"><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-home"></i> Beranda </a>
                  </li>
                  <li class="<?php if($this->uri->segment(2) == "narasumber"){echo "active";} ?>"><a href="<?php echo site_url('dashboard/narasumber'); ?>"><i class="fa fa-edit"></i> Narasumber </a></li>
                  <li class="<?php if($this->uri->segment(2) == "workshop"){echo "active";} ?>"><a href="<?php echo site_url('dashboard/workshop'); ?>"><i class="fa fa-table"></i> Workshop </a></li>
                  <li class="<?php if($this->uri->segment(2) == "peserta"){echo "active";} ?>"><a href="<?php echo site_url('dashboard/'); ?>"><i class="fa fa-desktop"></i> Peserta </a></li>
                  <li class="<?php if($this->uri->segment(2) == "galeri"){echo "active";} ?>"><a href="<?php echo site_url('dashboard/'); ?>"><i class="fa fa-image"></i> Galeri </a></li>
                  <li class="<?php if($this->uri->segment(2) == "bidang"){echo "active";} ?>"><a href="<?php echo site_url('dashboard/'); ?>"><i class="fa fa-clone"></i>Admin Bidang </a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php $this->load->view('dashboard/a_header'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <?php $this->load->view($page); ?>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('dashboard/a_footer'); ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/back'); ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/back'); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/back'); ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/back'); ?>/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/back'); ?>/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url('assets/back'); ?>/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url('assets/back'); ?>/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url('assets/back'); ?>/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url('assets/back'); ?>/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/back'); ?>/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo base_url('assets/back'); ?>/vendors/starrr/dist/starrr.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url('assets/back'); ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/back'); ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/back'); ?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url('assets/back'); ?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url('assets/back'); ?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <!-- PNotify -->
    <script src="<?php echo base_url('assets/back'); ?>/vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url('assets/back'); ?>/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url('assets/back'); ?>/vendors/pnotify/dist/pnotify.nonblock.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/back'); ?>/build/js/custom.min.js"></script>
    <script>
      $(document).ready(function (){
        $('.ui-pnotify').remove();
        // $('#datatable_wrapper').DataTable();
      });
    </script>
  </body>
</html>
