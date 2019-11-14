<!--Swiper-->
<section class="section swiper-container swiper-slider swiper-slider-1 context-dark" data-loop="true" data-autoplay="5000" data-simulate-touch="false">
  <div class="swiper-wrapper">
    <?php if (count($galeri) > 2) {
     for ($j=0; $j < 3; $j++) { ?>
    <div class="swiper-slide" data-slide-bg="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', unserialize($galeri[$j]->konten)[0])); ?>">
      <div class="swiper-slide-caption section-lg">
        <div class="container" style="margin-top: 130px;" style="margin-top: 130px;">
          <div class="row">
            <div class="col-md-9 col-lg-7 offset-md-1 offset-xxl-0">
              <h1><span class="d-block" data-caption-animate="fadeInUp" data-caption-delay="200" style="text-shadow: 5px 5px 10px #2e3844;"><a href="<?php echo site_url('galeri/detail/'.$galeri[$j]->id.'/'.create_url($galeri[$j]->judul)); ?>" title="<?php echo $galeri[$j]->judul; ?>"><?php echo $galeri[$j]->judul; ?></a></span></h1>
              <div class="button-wrap-default" data-caption-animate="fadeInUp" data-caption-delay="450"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } }else {if (count($galeri) == 2) { 
      foreach ($galeri as $g) { ?>
     ?>
      <div class="swiper-slide" data-slide-bg="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', unserialize($g->konten)[0])); ?>">
        <div class="swiper-slide-caption section-lg">
          <div class="container" style="margin-top: 130px;" style="margin-top: 130px;">
            <div class="row">
              <div class="col-md-9 col-lg-7 offset-md-1 offset-xxl-0">
                <h1><span class="d-block" data-caption-animate="fadeInUp" data-caption-delay="200" style="text-shadow: 5px 5px 10px #2e3844;"><a href="<?php echo site_url('galeri/detail/'.$g->id.'/'.create_url($g->judul)); ?>" title="<?php echo $g->judul; ?>"><?php echo $g->judul; ?></a></span></h1>
                <div class="button-wrap-default" data-caption-animate="fadeInUp" data-caption-delay="450"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } }else {
      foreach ($galeri as $g) {
     ?>
      <div class="swiper-slide" data-slide-bg="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', unserialize($g->konten)[0])); ?>">
        <div class="swiper-slide-caption section-lg">
          <div class="container" style="margin-top: 130px;" style="margin-top: 130px;">
            <div class="row">
              <div class="col-md-9 col-lg-7 offset-md-1 offset-xxl-0">
                <h1><span class="d-block" data-caption-animate="fadeInUp" data-caption-delay="200" style="text-shadow: 5px 5px 10px #2e3844;"><a href="<?php echo site_url('galeri/detail/'.$g->id.'/'.create_url($g->judul)); ?>" title="<?php echo $g->judul; ?>"><?php echo $g->judul; ?></a></span></h1>
                <div class="button-wrap-default" data-caption-animate="fadeInUp" data-caption-delay="450"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } } } ?>
  </div>
  <!--Swiper Pagination-->
  <div class="swiper-pagination-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-lg-7 offset-md-1 offset-xxl-0">
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Our Principles-->
<section class="section" style="color: #fff">
  <div class="container text-center">
    <div class="row">
      <div class="col" style="background-color: #2ecc71;">
        <div class="box-numbered-left unit">
          <div class="unit-body">
            <h5 class="title" style="color: #fff">Integritas</h5>
            <div class="content">Keselarasan antara hati, pikiran, perkataan, dan perbuatan yang baik dan benar</div>
          </div>
        </div>
      </div>
      <div class="col-md-2" style="background-color: #4765a0;">
        <div class="box-numbered-left unit">
          <div class="unit-body">
            <h5 class="title" style="color: #fff">Profesionalitas</h5>
            <div class="content">Bekerja secara disiplin, kompeten, dan tepat waktu dengan hasil terbaik</div>
          </div>
        </div>
      </div>
      <div class="col-md-2" style="background-color: #e74c3c;">
        <div class="box-numbered-left unit">
          <div class="unit-body">
            <h5 class="title" style="color: #fff">Inovasi</h5>
            <div class="content">Menyempurnakan yang sudah ada dan mengkreasi hal baru yang lebih baik</div>
          </div>
        </div>
      </div>
      <div class="col-md-2" style="background-color: #f1c40f;">
        <div class="box-numbered-left unit">
          <div class="unit-body">
            <h5 class="title" style="color: #fff">Tanggung Jawab</h5>
            <div class="content">Bekerja secara tuntas dan konsekuen</div>
          </div>
        </div>
      </div>
      <div class="col" style="background-color: #3498db;">
        <div class="box-numbered-left unit">
          <div class="unit-body">
            <h5 class="title" style="color: #fff">Keteladanan</h5>
            <div class="content">Menjadi contoh yang baik bagi orang lain</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Our Schedule-->
<section class="section bg-default section-sm">
  <div class="container">
    <div class="row row-30">
      <div class="col-md-7">
        <h2 class="title-icon"><span class="icon icon-default mercury-icon-pin"></span><span>Jadwal <span class="text-light">Workshop</span></span></h2><hr style="margin: 10px 0;">
        
        <div class="table-responsive text-nowrap">
          <!--Table-->
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Status</th>
                    <th>Nama Kegaitan</th>
                    <th>Lokasi Kegiatan</th>
                    <th>Tanggal Kegiatan</th>
                </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($workshop as $w) { ?>
                <tr>
                    <th><?php echo $no; ?></th>
                    <?php if ($w->status == "open") { ?>
                      <td><span class="badge badge-pill badge-success">Dibuka</span></td>
                    <?php }else if ($w->status == "ongoing") { ?>
                      <td><span class="badge badge-pill badge-warning">Sedang Berlangsung</span></td>
                    <?php }else if ($w->status == "close") { ?>
                      <td><span class="badge badge-pill badge-danger">Ditutup</span></td>
                    <?php } ?>
                    <td>
                      <?php if ($this->session->userdata('logged_in') == "yes") { ?>
                        <a style="cursor: pointer;" href="<?php echo site_url('dashboard/workshop/detail/'.$w->id); ?>" target="_blank"><?php echo $w->nm_kegiatan; ?></a>
                      <?php } else{ ?>
                        <a href="#" data-toggle="modal" data-target="#exampleModal" style="cursor: pointer;"><?php echo $w->nm_kegiatan; ?></a>
                      <?php } ?>
                      </td>
                    <td><?php echo $w->lokasi; ?></td>
                    <td>Mulai : <?php echo tgl_indo(date($w->tgl_buka)); ?><br>Selesai : <?php echo tgl_indo(date($w->tgl_tutup)); ?></td>
                </tr>
              <?php $no++; } ?>
            </tbody>
          </table>
          <!--Table-->
        </div>
      </div>
      <div class="col-md-5">
        <h2 class="title-icon"><span class="icon icon-default mercury-icon-cup"></span><span>Foto <span class="text-light">Kegiatan</span></span></h2><hr style="margin: 10px 0;">
        <?php for ($i=0; $i < 1; $i++) { ?>
          <a href="<?php echo site_url('galeri/detail/'.$galeri[$i]->id.'/'.create_url($galeri[$i]->judul)); ?>" title="<?php echo $galeri[$i]->judul; ?>">
            <div class="box-shadow-2">
              <img class="img-responsive" src="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', unserialize($galeri[$i]->konten)[0])); ?>" alt="" width="569" height="169"/>
              <div class="box-shadow-header">
                <div class="unit flex-column flex-md-row">
                  <div class="unit-left" style="margin-left: 0px">
                    <div class="heading-5 text-center"><?php echo date('d',strtotime($galeri[$i]->tanggal))."<br>".date('m', strtotime($galeri[$i]->tanggal))."<br>".date('Y', strtotime($galeri[$i]->tanggal)); ?></div>
                  </div>
                  <div class="unit-body" style="text-align: justify;">
                    <p><p><?php echo $galeri[$i]->judul; ?></p></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        <?php } ?>
        <a class="button button-primary" href="<?php echo site_url('galeri/all'); ?>">Lihat semua foto</a>
      </div>
    </div>
  </div>
</section>

<!-- Our Team-->
<section class="section section-lg bg-default">
  <div class="container text-center text-lg-left">
    <h2 class="title-icon"><span class="icon icon-default mercury-icon-speak"></span><span><span class="text-light">Daftar</span> Pembicara</h2>
    <div class="row row-40">
      <?php foreach ($narasumber as $n) { ?>
      <div class="col-md-4">
        <div class="team-box-left">
          <div class="team-meta unit align-items-center">
            <div class="unit-left"><img class="img" src="<?php echo base_url('assets/back/images/narasumber/'.str_replace('.', '_thumb.', $n->foto)) ?>" alt="" width="138" height="69" style="height: 138px">
            </div>
            <div class="unit-body">
              <h5 class="title" style="text-transform: capitalize;"><?php echo $n->nama; ?></h5>
            </div>
          </div>
          <div class="content"><?php echo substr($n->keterangan, 0, 120); ?> ...</div>
        </div>
      </div>
      <?php } ?>
    </div>
    <a class="button button-primary" href="<?php echo site_url('pembicara/all'); ?>">Lihat semua pembicara</a>
  </div>
</section>