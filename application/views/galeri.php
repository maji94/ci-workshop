<!-- Breadcrumbs-->
<section class="breadcrumbs-custom bg-image novi-background bg-primary">
  <div class="container">
    <ul class="breadcrumbs-custom-path">
      <li><a href="index.html">Home</a></li>
      <li class="active">Galeri</li>
    </ul>
  </div>
</section>
<!-- Our Story-->
<section class="section section-lg-top-50 bg-gray-100">
  <div class="container">
    <h2 class="title-icon"><span class="icon icon-default mercury-icon-cup"></span><span><span class="text-light">Our</span> Galeri</h2>
    <div class="row row-30">
      <?php foreach ($galeri as $d) { ?>
        <div class="col-md-4 col-6">
          <a href="<?php echo site_url('galeri/detail/'.$d->id.'/'.create_url($d->judul)); ?>" title="<?php echo $d->judul; ?>">
            <div class="box-shadow-2">
              <img class="img-responsive" src="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', unserialize($d->konten)[0])); ?>" alt="" width="569" height="169"/>
              <div class="box-shadow-header">
                <div class="unit flex-column flex-md-row">
                  <div class="unit-left" style="margin-left: 0px">
                    <div class="heading-5 text-center"><?php echo date('d',strtotime($d->tanggal))."<br>".date('m', strtotime($d->tanggal))."<br>".date('Y', strtotime($d->tanggal)); ?></div>
                  </div>
                  <div class="unit-body">
                    <p><?php echo $d->judul; ?></p>
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
  <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
    <ul class="pagination" style="width: max-content;margin: 0 auto 15px;">
      <?php echo $pagi; ?>
    </ul>
  </div>
</section>