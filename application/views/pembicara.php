<!-- Breadcrumbs-->
<section class="breadcrumbs-custom bg-image novi-background bg-primary">
  <div class="container">
    <ul class="breadcrumbs-custom-path">
      <li><a href="<?php echo site_url(); ?>">Home</a></li>
      <li class="active">Pembicara</li>
    </ul>
  </div>
</section>
<!-- Our Story-->
<section class="section section-lg-top-50 bg-gray-100">
  <div class="container">
    <h2 class="title-icon"><span class="icon icon-default mercury-icon-speak"></span><span><span class="text-light">Daftar</span> Pembicara</h2>
    <div class="row row-30">
      <?php foreach ($narasumber as $d) { ?>
        <div class="col-md-6 col-xl-4">
          <blockquote class="quote quote-center quote-center-active">
            <div class="quote-meta"><img class="quote-img" src="<?php echo base_url('assets/back/images/narasumber/'.str_replace('.', '_thumb.', $d->foto)); ?>" style="height: 138px" alt="" width="138" height="69"/>
              <div class="author">
                <cite style="text-transform: capitalize;"><?php echo $d->nama; ?></cite>
              </div>
            </div>
            <q class="big"><?php echo substr($d->keterangan, 0,120); ?> ....</q>
          </blockquote>
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