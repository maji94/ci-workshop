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
                <!--Brand--><a class="brand" href="<?php echo site_url(); ?>"><img class="brand-logo-dark" src="<?php echo base_url('assets/front/'); ?>images/logo-bengkulu-kemenag.png" alt="" width="146" height="22"/><img class="brand-logo-light" src="<?php echo base_url('assets/front/'); ?>images/logo-bengkulu-kemenag.png" alt="" height="22" style="max-width: unset;"/></a>
              </div>
            </div>
            <div class="rd-navbar-main-element">
              <div class="rd-navbar-nav-wrap">
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="<?php echo site_url(); ?>"><span class="icon novi-icon mdi mdi-home"></span></a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="<?php echo site_url('pembicara'); ?>">Pembicara</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="<?php echo site_url('galeri'); ?>">Galeri</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="<?php echo site_url('tentang'); ?>">Tentang</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#">Masuk / Log in</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#"><strong>Daftar</strong></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <?php if ($this->uri->segment(1) != "") { ?>
    <div class="rd-navbar-bg novi-background bg-image" style="background-image: url(<?php echo base_url('assets/front/images/bg-navbar.jpg'); ?>)"></div>
  <?php } ?>
</header>