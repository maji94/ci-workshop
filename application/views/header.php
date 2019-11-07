<header class="section page-header rd-navbar-transparent-wrap">
  <!--RD Navbar-->
  <div class="rd-navbar-wrap">
    <nav class="rd-navbar rd-navbar-transparent" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="20px" data-xl-stick-up-offset="20px" data-xxl-stick-up-offset="20px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
      <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
      <div class="rd-navbar-aside-outer rd-navbar-collapse">
        <div class="rd-navbar-aside">
          <div class="rd-navbar-info">
            <div class="icon novi-icon mdi mdi-phone"></div><a style="font-size: 11px;">Telp. (0726) 21097, 21597, 344602, 28123 | Fax. (0726) 21597</a>
          </div>
          <ul class="list-lined" style="font-size: 11px;">
            <?php if ($this->session->userdata('nama') != null) { ?>
              <li><a href="<?php echo site_url('dashboard') ?>"><span class="icon novi-icon mdi mdi-account-outline"></span> <?php echo strtoupper($this->session->userdata('nama')); ?></a></li>
            <?php } ?>
            <li><p><?php echo nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')); ?></p></li>
          </ul>
        </div>
      </div>
      <div class="rd-navbar-main-outer">
        <div class="rd-navbar-main-inner">
          <div class="rd-navbar-main">
            <!--RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!--RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!--RD Navbar Brand-->
              <div class="rd-navbar-brand">
                <!--Brand--><a class="brand" href="<?php echo site_url(); ?>"><img class="brand-logo-dark" src="<?php echo base_url('assets/front/'); ?>images/logo-bengkulu-kemenag-black.png" alt="" width="146" height="22"/><img class="brand-logo-light" src="<?php echo base_url('assets/front/'); ?>images/logo-bengkulu-kemenag.png" alt="" height="22" style="max-width: unset;"/></a>
              </div>
            </div>
            <div class="rd-navbar-main-element">
              <div class="rd-navbar-nav-wrap">
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item <?php if($this->uri->segment(1) == "home" OR $this->uri->segment(1) == ""){echo "active";} ?>"><a class="rd-nav-link" href="<?php echo site_url(); ?>"><span class="icon novi-icon mdi mdi-home"></span></a>
                  </li>
                  <li class="rd-nav-item <?php echo $this->uri->segment(1) == "pembicara" ? "active":""; ?>"><a class="rd-nav-link" href="<?php echo site_url('pembicara/all'); ?>">Pembicara</a>
                  </li>
                  <li class="rd-nav-item <?php echo $this->uri->segment(1) == "galeri" ? "active":""; ?>"><a class="rd-nav-link" href="<?php echo site_url('galeri/all'); ?>">Galeri</a>
                  </li>
                  <li class="rd-nav-item <?php echo $this->uri->segment(1) == "tentang" ? "active":""; ?>"><a class="rd-nav-link" href="<?php echo site_url('tentang'); ?>">Tentang</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#" data-toggle="modal" data-target="#exampleModal" style="cursor: pointer;">Masuk / Log in</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#" data-toggle="modal" data-target="#exampleModal2" style="cursor: pointer;">Daftar</a></li>
                </ul>
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <?php if ($this->uri->segment(1) == "pembicara" OR $this->uri->segment(1) == "galeri" OR $this->uri->segment(1) == "tentang") { ?>
    <div class="rd-navbar-bg novi-background bg-image" style="background-image: url(<?php echo base_url('assets/front/images/bg-navbar.jpg'); ?>)"></div>
  <?php } ?>
</header>