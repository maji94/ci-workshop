<?php 
  $konten = unserialize($data[0]->konten);
 ?>
<!-- Breadcrumbs-->
<section class="breadcrumbs-custom bg-image novi-background bg-primary">
  <div class="container">
    <ul class="breadcrumbs-custom-path">
      <li><a href="<?php echo site_url(); ?>">Home</a></li>
      <li><a href="<?php echo site_url('galeri/all') ?>">Galeri</a></li>
      <li class="active">Detail Galeri</li>
    </ul>
  </div>
</section>
<!-- Our Story-->
<section class="section section-lg-top-50 bg-gray-100">
  <div class="container">
    <h3 class="title-icon"><?php echo $data[0]->judul; ?></h3>
      <?php echo tgl_indo(date($data[0]->tanggal)); ?>
    <div class="row row-30">
      <?php foreach ($data as $d) { 
        $m=0; foreach ($konten as $k) { 
          $m++; 
          if ($m == 1) {
      ?>
        <div class="col-md-8 col-12" style="margin:auto">
          <a href="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', $k)); ?>" data-toggle="lightbox" data-gallery="gallery" class="col-md-12">
            <div class="box-shadow-2">
              <img class="img-responsive" src="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', $k)); ?>" alt="" width="569" height="169"/>
            </div>
          </a>
        </div>
        <div class="col-md-8 col-12" style="margin: auto;">
        <?php }else if ($m > 1) {?>
            <a href="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', $k)); ?>" data-toggle="lightbox" data-gallery="gallery" class="col-md-12" style="padding-right:10px;padding-top:15px;max-height: 80px;padding-left: 0px;">
            <img class="img-responsive" src="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', $k)); ?>" alt="" style="width: 80px;height: 50px;border-radius: 5px;">
            </a>
        <?php } } } ?>
      </div>
    </div>
    <h3 class="title-icon" style="text-align: center;display: block;border-top: 1px solid #d0c9ce;padding-top: 1rem"><span class="text-light">Galeri Foto Lain</span></h3>
    <div class="row row-30">
      <?php foreach ($other as $o) { ?>
        <div class="col-md-4 col-6">
          <a href="<?php echo site_url('galeri/detail/'.$o->id.'/'.create_url($o->judul)); ?>" title="<?php echo $o->judul; ?>">
            <div class="box-shadow-2">
              <img class="img-responsive" src="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', unserialize($o->konten)[0])); ?>" alt="" width="569" height="169"/>
              <div class="box-shadow-header">
                <div class="unit flex-column flex-md-row">
                  <div class="unit-body">
                    <p><?php echo $o->judul; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<!-- Our Team-->
<section class="section section-lg-top-50 bg-gray">
</section>