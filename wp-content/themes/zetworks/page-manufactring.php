<?php
  /**
   * Template Name: Manufacting
   *
   * This is the template that displays all pages by default.
   * Please note that this is the WordPress construct of pages
   * and that other 'pages' on your WordPress site may use a
   * different template.
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package theme_name
   */

  get_header();
  $t_options = get_option('tp_opt');
?>
<main class="zw-topspace8">
  <section class="zw-banner text-center">
    <div class="container zw-px-mob">
      <div class="row">
        <div class="position-relative">
          <div class="zw-banner__heading"> <img class="img-fit imgh450" src="<?php echo $gdir ?>/img/home/banners/home-banner.png" alt="Banner image"> </div>
          <!-- Content wrap-->
          <div class="zw-banner__content zw-hv-center zw-max800">
            <h1 class="h1 zw-banner__heading text-uppercase">Manufacturing: From A To Z</h1> </div>
        </div>
        <div class="col-12">
          <div class="zw-banner__des bg-blue">
            <p class="zw-max1100 zw-mob-bold">From apparels to aircraft engines, Zetwerk offers a full range of manufacturing solutions that ensure the right match for specifications at competitive costs and lead times. Whatever the demand in capital goods, consumer goods and precision parts, Zetwerk maximizes capacity, synchronizes capability and transforms markets.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="zw-tabs-sections py-4 py-md-5">
    <div class="container">
      <div class="row pb-md-5">
        <div class="col-md-12 mb-0 zw-px-mob">
          <div class="zw-pills-container text-center">
            <ul class="nav nav-pills zw-pills-list" id="pills-tab" role="tablist">
              <li class="nav-item zw-pills-list__item w-50" role="presentation"><a href="#pills-manufact-process-tab" class="zw-pills-link nav-link active" id="pills-manufact-process-tab" data-bs-toggle="pill" data-bs-target="#pills-manufact-process" role="tab" aria-controls="pills-manufact-process" aria-selected="true">Manufacturing processes</a></li>
              <li class="nav-item zw-pills-list__item w-50" role="presentation"><a href="#pills-manufact-industries-tab" class="zw-pills-link nav-link" id="pills-manufact-industries-tab" data-bs-toggle="pill" data-bs-target="#pills-manufact-industries" role="tab" aria-controls="pills-manufact-industries" aria-selected="false">Manufacturing For Industries</a></li>
            </ul>
          </div>
        </div>
        <!-- Tabs main content-->
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-manufact-process" role="tabpanel" aria-labelledby="pills-manufact-process-tab">
            <!--Process-->
            <!-- Only Mobile-->
            <div class="row zw-only-mobile pt-4 pt-md-0">
              <div class="col-12 mobile-manufacturing">
                <div class="accordion accordion-flush" id="accordion-Ma-process">
                  <?php
                    $mobMainTabs = carbon_get_the_post_meta( 'manufac_main_tabs_proce' );
                    $tabCount = 0;
                    foreach ( $mobMainTabs as $mobMainTab ) {
                    foreach ( $mobMainTab['manufac_main_tab'] as $levelOne ){
                  ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading<?php echo $tabCount; ?>">
                      <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $tabCount; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $tabCount; ?>"><?php echo $levelOne['manufac_sub_tabs_list']; ?></div>
                    </h2>
                    <div class="accordion-collapse collapse show" id="flush-collapse<?php echo $tabCount; ?>" aria-labelledby="flush-heading<?php echo $tabCount; ?>" data-bs-parent="#accordion-Ma-process">
                      <div class="accordion-body">
                        <ul class="zw-malist mb-0">
                          <?php 
                            foreach ( $levelOne['manufac_item_list'] as $levelTwo ){
                          ?>
                          <li class="zw-malist__item">
                            <a class="zw-malist__link" href="">
                              <span><?php echo $levelTwo['manufac_sub_tabs_list']; ?></span>
                            </a>
                          </li>
                          <?php $tabCount++; } ?>                          
                        </ul>
                      </div>
                    </div>
                  </div>
                  <?php }} 
                  ?>
                </div>
              </div>
            </div>
            <!-- Only Desktop-->
            <div class="row d-flex mx-0 zw-only-desktop">

              <div class="col-md-4 px-0">
                <div class="zw-pills-container zw-pills-container-vr">
                  <div class="nav flex-column nav-pills zw-pills-vr-list swiper-wrapper" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <?php 
                    $mainTabs = carbon_get_the_post_meta( 'manufac_main_tabs_proce' );
                    $mtNum = 0;
                    foreach ( $mainTabs as $mainTab ) {
                    foreach ( $mainTab['manufac_main_tab'] as $submainTab ){    
                  ?>
                    <a class="nav-link zw-pills-link <?php if($mtNum == 0){echo "active"; } ?>" id="v-pills-<?php echo $mtNum; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $mtNum; ?>" role="tab" aria-controls="v-pills-<?php echo $mtNum; ?>" aria-selected="true"><?php echo $submainTab['manufac_sub_tabs_list']; ?>
                      <div class="zw-cap"></div>
                    </a>
                  <?php $mtNum++; }} ?>
                  </div>
                </div>
              </div>

              <div class="col-md-8 px-0">
                <div class="v-pills-tabContent tab-content" id="v-pills-tabContent">
                  <?php 
                    $levelOne = carbon_get_the_post_meta( 'manufac_main_tabs_proce' );
                    $msNum = 0;
                    foreach ( $levelOne as $lvlOne ) {
                    foreach ( $lvlOne['manufac_main_tab'] as $lvlTwo ){
                  ?>
                    <div class="tab-pane fade <?php if($msNum == 0){echo "show active"; } ?>" id="v-pills-<?php echo $msNum; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $msNum; ?>-tab">
                      <div class="zw-main-list">
                        <img class="img-fit" src="<?php echo $lvlTwo['manufac_sub_tabs_img']; ?>">
                        <div class="zw-main-list__content">
                          <ul class="w-100 mb-0 tablist">
                            <?php 
                              foreach ( $lvlTwo['manufac_item_list'] as $lvlthree ){
                            ?>
                              <li class="">
                                <a class="zw-ma-blocklist-link" href="<?php echo $lvlthree['manufac_sub_tabs_url']; ?>">
                                  <span class="zw-ma-blocklist__text"><?php echo $lvlthree['manufac_sub_tabs_list']; ?></span>
                                  <i class="icon icon-arrow"></i>
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  <?php $msNum++; } } ?>
                </div>
              </div>

            </div>
          </div>
          <div class="tab-pane fade" id="pills-manufact-industries" role="tabpanel" aria-labelledby="pills-manufact-industries-tab">
            <!--Process-->
            <!-- Only Mobile-->
            <div class="row zw-only-mobile pt-4 pt-md-0">
              <div class="col-12 mobile-manufacturing">
                <div class="accordion accordion-flush" id="accordion-Ma-process">
                  <?php
                    $mobMainTabs = carbon_get_the_post_meta( 'manufac_main_tabs_indust' );
                    $tabCount = 0;
                    foreach ( $mobMainTabs as $mobMainTab ) {
                    foreach ( $mobMainTab['manufac_main_tab'] as $levelOne ){
                  ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading<?php echo $tabCount; ?>">
                      <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $tabCount; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $tabCount; ?>"><?php echo $levelOne['manufac_sub_tabs_list']; ?></div>
                    </h2>
                    <div class="accordion-collapse collapse show" id="flush-collapse<?php echo $tabCount; ?>" aria-labelledby="flush-heading<?php echo $tabCount; ?>" data-bs-parent="#accordion-Ma-process">
                      <div class="accordion-body">
                        <ul class="zw-malist mb-0">
                          <?php 
                            foreach ( $levelOne['manufac_item_list'] as $levelTwo ){
                          ?>
                          <li class="zw-malist__item">
                            <a class="zw-malist__link" href="">
                              <span><?php echo $levelTwo['manufac_sub_tabs_list']; ?></span>
                            </a>
                          </li>
                          <?php $tabCount++; } ?>                          
                        </ul>
                      </div>
                    </div>
                  </div>
                  <?php }} 
                  ?>
                </div>
              </div>
            </div>
            <!-- Only Desktop-->
            <div class="row d-flex mx-0 zw-only-desktop">

              <div class="col-md-4 px-0">
                <div class="zw-pills-container zw-pills-container-vr">
                  <div class="nav flex-column nav-pills zw-pills-vr-list swiper-wrapper" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <?php 
                    $mainTabs = carbon_get_the_post_meta( 'manufac_main_tabs_indust' );
                    $mtNum = 0;
                    $mssNum = 1;
                    foreach ( $mainTabs as $mainTab ) {
                    foreach ( $mainTab['manufac_main_tab'] as $submainTab ){    
                  ?>
                    <a class="nav-link zw-pills-link <?php if($mtNum == 0){echo "active"; } ?>" id="v-pills-<?php echo $mtNum; ?>-<?php echo $mssNum; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $mtNum; ?>-<?php echo $mssNum; ?>" role="tab" aria-controls="v-pills-<?php echo $mtNum; ?>" aria-selected="true"><?php echo $submainTab['manufac_sub_tabs_list']; ?>
                      <div class="zw-cap"></div>
                    </a>
                  <?php $mtNum++; }} ?>
                  </div>
                </div>
              </div>

              <div class="col-md-8 px-0">
                <div class="v-pills-tabContent tab-content" id="v-pills-tabContent">
                  <?php 
                    $levelOne = carbon_get_the_post_meta( 'manufac_main_tabs_indust' );
                    $msNum = 0;
                    $mssNum = 1;
                    foreach ( $levelOne as $lvlOne ) {
                    foreach ( $lvlOne['manufac_main_tab'] as $lvlTwo ){
                  ?>
                    <div class="tab-pane fade <?php if($msNum == 0){echo "show active"; } ?>" id="v-pills-<?php echo $msNum; ?>-<?php echo $mssNum; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $msNum; ?>-<?php echo $mssNum; ?>-tab">
                      <div class="zw-main-list">
                        <img class="img-fit" src="<?php echo $lvlTwo['manufac_sub_tabs_img']; ?>">
                        <div class="zw-main-list__content">
                          <ul class="w-100 mb-0 tablist">
                            <?php 
                              foreach ( $lvlTwo['manufac_item_list'] as $lvlthree ){
                            ?>
                              <li class="">
                                <a class="zw-ma-blocklist-link" href="<?php echo $lvlthree['manufac_sub_tabs_url']; ?>">
                                  <span class="zw-ma-blocklist__text"><?php echo $lvlthree['manufac_sub_tabs_list']; ?></span>
                                  <i class="icon icon-arrow"></i>
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  <?php $msNum++; } } ?>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!--Free quote  -->
  <section class="bg-blue zw-hero-panel">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1 col-xxl-8 offset-xxl-2 d-flex align-items-md-center flex-colum-mb">
          <div class="zw-hero-panel__cnt-info pe-4 pe-md-0">
            <h3 class="h2">Do you want a free quote in 24 hours?</h3>
            <p class="fnt-16 zm-clr-gre4">Sign up for a free trial and find out how Zetwerk makes Manufacturing simple.</p><a class="zw-btn zw-btn--default mt-4 mt-md-5" href="<?php echo get_site_url(); ?>/contact-us/"><span>Get in touch</span><img class="ms-3" src="<?php echo $gdir ?>/img/icons/arrow-white.svg" alt="Arrow image"></a> </div>
          <div class="zw-hero-panel__figwrap mb-3 mb-md-0"><img class="img-fit" src="<?php echo $gdir ?>/img/home/free-quote.svg" alt="illustartion"></div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
	get_footer();
?>
<script>
  jQuery(document).ready(function($) {
  })
jQuery(document).ready(() => {
  let url = location.href.replace(/\/$/, "");

  if (location.hash) {
    const hash = url.split("#");
    $('#pills-tab a[href="#'+hash[1]+'"]').tab("show");
    url = location.href.replace(/\/#/, "#");
    history.replaceState(null, null, url);
    setTimeout(() => {
      $(window).scrollTop(0);
    }, 400);
  } 
  
  $('a[data-toggle="tab"]').on("click", function() {
    let newUrl;
    const hash = $(this).attr("href");
    if(hash == "#pills-manufact-process-tab") {
      newUrl = url.split("#")[0];
    } else {
      newUrl = url.split("#")[0] + hash;
    }
    newUrl += "/";
    history.replaceState(null, null, newUrl);
  });
});

</script>