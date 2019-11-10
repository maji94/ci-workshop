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

    <title>Aplikasi Pendaftaran Workshop Online v.1.0</title>
    <link href="<?php echo base_url('assets/front/') ?>images/logo-kemenag.png" rel="icon">
    <link href="<?php echo base_url('assets/front/') ?>images/logo-kemenag.png" rel="apple-touch-icon">

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
              <a href="<?php echo site_url(); ?>" class="site_title" target="_blank">
              <i class="fa fa-home"></i> <span>Homepage</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php if($this->session->userdata('hak_akses') != "admin"){echo base_url('assets/back/images/'.$this->session->userdata('hak_akses').'/'.str_replace('.', '_thumb.', $this->session->userdata('foto')));}else{echo base_url('assets/back/images/img.jpg');} ?>" alt="profile pict" class="img-circle profile_img">
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
                  <?php if ($this->session->userdata('hak_akses') == "admin" OR $this->session->userdata('hak_akses') == "pembina") { ?>
                  <li class="<?php if($this->uri->segment(2) == "narasumber"){echo "active";} ?>"><a href="<?php echo site_url('dashboard/narasumber'); ?>"><i class="fa fa-edit"></i> Narasumber </a></li>
                  <?php } ?>
                  <li class="<?php if($this->uri->segment(2) == "workshop"){echo "active";} ?>"><a href="<?php echo site_url('dashboard/workshop'); ?>"><i class="fa fa-table"></i> Workshop </a></li>
                  <?php if ($this->session->userdata('hak_akses') == "admin" OR $this->session->userdata('hak_akses') == "pembina") { ?>
                  <li class="<?php if($this->uri->segment(2) == "peserta"){echo "active";} ?>"><a href="<?php echo site_url('dashboard/peserta'); ?>"><i class="fa fa-desktop"></i> Peserta </a></li>
                  <li class="<?php if($this->uri->segment(2) == "galeri"){echo "active";} ?>"><a href="<?php echo site_url('dashboard/galeri'); ?>"><i class="fa fa-image"></i> Galeri </a></li>
                  <?php } ?>
                  <?php if ($this->session->userdata('hak_akses') == "admin") { ?>
                  <li class="<?php if($this->uri->segment(2) == "admin"){echo "active";} ?>"><a href="<?php echo site_url('dashboard/admin'); ?>"><i class="fa fa-clone"></i>Admin Bidang </a></li>
                  <?php }else{ ?>
                  <li class="<?php if($this->uri->segment(2) == "profil"){echo "active";} ?>"><a href="<?php echo site_url('dashboard/profil'); ?>"><i class="fa fa-clone"></i>Profil </a></li>
                  <?php } ?>
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo site_url('dashboard/getLogout'); ?>">
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
        $('#datatables2').DataTable();

        $('#detail').on('show.bs.modal', function (event){

          var div = $(event.relatedTarget)
          var foto = div.data('foto')
          var nip = div.data('nip')
          var nama = div.data('nama')
          var ktp = div.data('ktp')
          var tmp_lahir = div.data('tmp_lahir')
          var tgl_lahir = div.data('tgl_lahir')
          var jns_kelamin = div.data('jns_kelamin')
          var agama = div.data('agama')
          var pendidikan = div.data('pendidikan')
          var alamat_rm = div.data('alamat_rm')
          var email = div.data('email')
          var nohp = div.data('nohp')
          var jabatan = div.data('jabatan')
          var golongan = div.data('golongan')
          var unker = div.data('unker')
          var kab = div.data('kab')
          var alamat_kt = div.data('alamat_kt')
          var npwp = div.data('npwp')
          var norek = div.data('norek')
          var keterangan = div.data('keterangan')
          var modal = $(this)

          modal.find('#foto').attr("src",foto)
          modal.find('#nip').html(nip)
          modal.find('#nama').html(nama)
          modal.find('#ktp').html(ktp)
          modal.find('#ttl').html(tmp_lahir+", "+tgl_lahir)
          modal.find('#jns_kelamin').html(jns_kelamin)
          modal.find('#agama').html(agama)
          modal.find('#pendidikan').html(pendidikan)
          modal.find('#alamat_rm').html(alamat_rm)
          modal.find('#emailhp').html(email+"/<br>"+nohp)
          modal.find('#jabgol').html(jabatan+"/"+golongan)
          modal.find('#unkerkab').html(unker+", "+kab)
          modal.find('#alamat_kt').html(alamat_kt)
          modal.find('#npwp').html(npwp)
          modal.find('#norek').html(norek)
          modal.find('#keterangan').html(keterangan)
          
        });

        $('#ubah_psw').on('show.bs.modal', function (event){

          var div = $(event.relatedTarget)
          var nip = div.data('nip')
          var modal = $(this)

          modal.find('#nip').attr("value",nip)
          // modal.find('#nip').html(nip)
          
        });
      });

      function cek_register(){
        var passBaru = $('#password').val();
        var konfir = $('#konf_psw').val();
        
        if (konfir == "") {
          $("#pesan_konfir").css('color','#fc5d32');
          $("#konf_psw").css('border-color','#fc5d32');
          $("#pesan_konfir").html('Konfirmasi password tidak boleh kosong');
          $("#pesan_konfir").fadeIn(1000);
          error = 1;
        }else{
          if(konfir != passBaru){
            $("#pesan_konfir").css('color','#fc5d32');
            $("#konf_psw").css('border-color','#fc5d32');
            $("#pesan_konfir").html('Maaf Konfirmasi password tidak valid');
            $("#pesan_konfir").fadeIn(1000);
            error = 1;
          }else{
            $("#pesan_konfir").css("color","#59c113");
            $("#konf_psw").css("border-color","#59c113");
            $("#pesan_konfir").html("Konfirmasi password valid");
            $("#pesan_konfir").fadeIn(1000);
            error = 0;
          }
        }
      }

      function cek_ubh_psw(){
        var passBaru = $('#password').val();
        var konfir = $('#konf_psw').val();
      
        if (error==1 || konfir!=passBaru || konfir=="" || passBaru=="") {
          alert('Data harus diisi dan valid');
          return false;
        }
      }

      function hapus(id){
        $(id).remove();
      }

      function PreviewImage(upload,uploadPreview) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById(upload).files[0]);

        oFReader.onload = function (oFREvent) {
          document.getElementById(uploadPreview).src = oFREvent.target.result;
        }
      }

      <?php if ($this->uri->segment(3) == "add") { ?>
        var i = 1;
      <?php }else if ($this->uri->segment(3) == "edit") { ?>
        var i = parseInt($("#n_edit").val());
      <?php } ?>
      
      <?php if ($this->uri->segment(2) == "galeri") { ?>
        function additem() {
          //                menentukan target append
            var itemlist = document.getElementById('itemlist');
            
          //                membuat element
            var col = document.createElement('div');
            col.setAttribute('class', 'col-md-2 col-sm-3 col-xs-12');
            var fg = document.createElement('div');
            fg.setAttribute('class', 'form-group');
            var label = document.createElement('label');
            label.innerHTML = 'Unggah Foto * :';
            var fg2 = document.createElement('div');
            fg2.setAttribute('class', 'form-group');

          //                meng append element
            itemlist.appendChild(col);
            col.appendChild(fg);
            col.appendChild(fg2);
            fg.appendChild(label);

          //                membuat element input
            var jenis_input = document.createElement('input');
            jenis_input.setAttribute('type', 'file');
            jenis_input.setAttribute('name', 'foto[]');
            jenis_input.setAttribute('id', 'foto[' + i + ']');
            jenis_input.setAttribute('onchange', 'PreviewImage("foto['+i+']","prevFoto['+i+']");');

            var preview = document.createElement('img');
            preview.setAttribute('id', 'prevFoto[' + i + ']');
            preview.setAttribute('class', 'form-control');
            preview.setAttribute('alt', 'Foto Galeri');
            preview.style = "width : 100%; height : 200px;";

            var hapus = document.createElement('span');

          //                meng append element input
            fg.appendChild(jenis_input);
            fg2.appendChild(preview);
            fg2.appendChild(hapus);

            hapus.innerHTML = '<button class="btn btn-danger btn-xs" type="button"><i class="fa fa-times"></i> Hapus</button><br>';
          //                membuat aksi delete element
            hapus.onclick = function () {
                col.parentNode.removeChild(col);
            };

            i++;
        }
      <?php }if ($this->uri->segment(2) == "workshop" AND ($this->uri->segment(3) == "add" OR $this->uri->segment(3) == "edit")) { ?>
        function additem() {
            var j = 1;
          //                menentukan target append
            var itemlist = document.getElementById('itemlist');
            
          //                membuat element
            var col = document.createElement('div');
            col.setAttribute('class', 'col-md-2 col-sm-3 col-xs-12');
            var fg = document.createElement('div');
            fg.setAttribute('class', 'form-group');
            var label = document.createElement('label');
            label.innerHTML = 'Nama Narasumber * :';
            var label2 = document.createElement('label');
            label2.innerHTML = 'Nama Moderator * :';
            var label3 = document.createElement('label');
            label3.innerHTML = 'Waktu (jam) * :';
            var br = document.createElement('br');
            var br2 = document.createElement('br');

          //                meng append element
            itemlist.appendChild(col);
            col.appendChild(fg);

          //                membuat element input
            var sel = document.createElement('select');
            sel.setAttribute('class', 'form-control');
            sel.setAttribute('name', 'id_narasumber[]');
            <?php foreach ($narsum as $d) { ?>
              var opt = document.createElement('option');
              opt.setAttribute('value', '<?php echo $d->id; ?>');
              opt.innerHTML = '<?php echo strtoupper($d->nama); ?>'
              sel.appendChild(opt);
            <?php } ?>
            var moderator = document.createElement('input');
            moderator.setAttribute('type', 'text');
            moderator.setAttribute('id', 'nm_moderator[' + i + ']');
            moderator.setAttribute('class', 'form-control');
            moderator.setAttribute('name', 'nm_moderator[]');
            moderator.setAttribute('placeholder', 'Silahkan masukkan nama moderator');
            moderator.setAttribute('required', '');

            var waktu = document.createElement('input');
            waktu.setAttribute('type', 'number');
            waktu.setAttribute('id', 'waktu[' + i + ']');
            waktu.setAttribute('class', 'form-control');
            waktu.setAttribute('name', 'waktu[]');
            waktu.setAttribute('placeholder', 'Masukkan waktu narasumber');
            waktu.setAttribute('min', '1');
            waktu.setAttribute('value', '1');
            waktu.setAttribute('required', '');

            var hapus = document.createElement('span');

          //                meng append element input
            fg.appendChild(label);
            fg.appendChild(sel);
            fg.appendChild(br);
            fg.appendChild(label2);
            fg.appendChild(moderator);
            fg.appendChild(br2);
            fg.appendChild(label3);
            fg.appendChild(waktu);
            fg.appendChild(hapus);

            hapus.innerHTML = '<button class="btn btn-danger btn-xs" type="button"><i class="fa fa-times"></i> Hapus</button><br>';
          //                membuat aksi delete element
            hapus.onclick = function () {
                col.parentNode.removeChild(col);
            };

            i++;
        }
      <?php } ?>
    </script>
  </body>
</html>
