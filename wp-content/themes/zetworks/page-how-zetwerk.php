<?php
  /**
   * Template Name: How Zetwerk
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
	        <div class="zw-banner__heading">
	        	<img class="img-fit imgh310" src="<?php echo carbon_get_the_post_meta( 'crb_wzcta_img' ); ?>" alt="Banner image">
	        </div>
	        <!-- Content warp-->
	        <div class="zw-banner__content zw-hv-center">
	          <h1 class="h1 zw-banner__heading text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_hz_banner_title' ); ?></h1>
	        </div>
	      </div>
	      <div class="col-12">
	        <div class="zw-banner__des bg-blue">
	          <p class="zw-max1100 zw-mob-bold"><?php echo carbon_get_the_post_meta( 'crb_hz_banner_sub_text' ); ?></p>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>

  <section class="zw-tabs-sections">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-md-3 zw-px-mob">
          <div class="zw-pills-container text-center">
            <ul class="nav nav-pills zw-pills-list" id="pills-tab" role="tablist">
						<?php 
								$tabs = carbon_get_the_post_meta( 'crb_hwmt_main_tabs' );
								$tabNum = 0;
								foreach ( $tabs as $tab ) {
						?>
            <li class="nav-item zw-pills-list__item" role="presentation">
            	<a class="zw-pills-link nav-link <?php if($tabNum == 0){ echo "active"; } ?>" id="pills-tab-<?php echo $tabNum; ?>" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $tabNum; ?>" role="tab" aria-controls="pills-<?php echo $tabNum; ?>" aria-selected="true"><?php echo $tab['crb_hwmt_main_tab_titles']; ?></a>
            </li>
            <?php $tabNum++; } ?>
            </ul>
          </div>
        </div>
        <!-- Tabs main content-->
        <div class="tab-content pt-md-4" id="pills-tabContent">
					<?php 
						$tabdetails = carbon_get_the_post_meta( 'crb_hwmt_main_tabs' );
						$tabNum = 0;
						$displayTabNum = 1;
						foreach ( $tabdetails as $details ) {
					?>
          <div class="tab-pane fade <?php if($tabNum == 0){ echo "show active"; } ?>" id="pills-<?php echo $tabNum; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $tabNum; ?>-tab">
            <div class="zw-media d-flex">
              <div class="zw-media__left flex-shrink-0"><span class="zw-number-lg">0<?php echo $displayTabNum; ?></span></div>
              <div class="zw-media__right flex-grow-1">
                <h2 class="h2 text-uppercase me-3 me-md-5"><?php echo $details['crb_hwmt_main_tab_title_text']; ?></h2>
                <p class="zm-clr-gr4c"><?php echo $details['crb_hwmt_main_tab_title_details']; ?></p>
              </div>
            </div>
            <!-- Sub-tabs-->
            <!-- Only Mobile-->
            <div class="row zw-only-mobile-md pt-4 pt-md-0"> 
              <div class="col-12 zw-mobile-tabslider">
                <ul class="swiper-wrapper mb-0">
                	<?php 
                		foreach ( $details['crb_hwmt_subtabs_tab'] as $subtabtext ) {
                	?>
                  <li class="swiper-slide">
                    <h2 class="fnt-22 fnt-gow-bold zw-max220"><?php echo $subtabtext['crb_hwmt_main_sub_tab_title']; ?></h2><img class="img-fit imgxh140" src="<?php echo $gdir ?>/img/MA-listing/gif/customers/1.gif" alt="gif image" id="1" data-bs-toggle="modal" data-bs-target="#GifModal">
                  </li>
                	<?php } ?>
                </ul>
              </div>
            </div>
            <!-- Only Desktop-->
            <div class="row d-flex pt-md-4 mx-0 mt-3 zw-only-desktop">
              <div class="col-md-4 px-0">
                <div class="zw-pills-container zw-pills-container-vr">
                  <div class="nav flex-column nav-pills zw-pills-vr-list swiper-wrapper" id="v-pills-tab" role="tablist" aria-orientation="vertical">
										<?php 
											$detailNum = 0;
	                		foreach ( $details['crb_hwmt_subtabs_tab'] as $subtabtext ) {
	                	?>
                  	<a class="nav-link zw-pills-link <?php if($detailNum == 0){echo "active";} ?>" id="v-pills<?php echo $displayTabNum."-"; echo $detailNum; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $displayTabNum."-"; echo $detailNum; ?>" role="tab" aria-controls="v-pills-<?php echo $displayTabNum."-"; echo $detailNum; ?>" aria-selected="true"><?php echo $subtabtext['crb_hwmt_main_sub_tab_title']; ?>
                      <div class="zw-cap"></div>
                    </a>
                    <?php $detailNum++;} ?>
                  </div>
                </div>
              </div>
              <div class="col-md-8 px-0">
                <div class="v-pills-tabContent tab-content" id="v-pills-tabContent">
									<?php
										$detailNum = 0;
	                	foreach ( $details['crb_hwmt_subtabs_tab'] as $subtabtext ) {
	                ?>
                  <div class="tab-pane fade <?php if($detailNum == 0){echo "active show";} ?>" id="v-pills-<?php echo $displayTabNum."-"; echo $detailNum; ?>" role="tabpanel" aria-labelledby="v-pills<?php echo $displayTabNum."-"; echo $detailNum; ?>-tab">
                  	<img class="img-fit img-fit-gif" src="<?php echo $subtabtext['crb_hwmt_tab_img']; ?>" id="4" data-bs-toggle="modal" data-bs-target="#GifModal">
                  </div>
                  <?php $detailNum++;} ?>
                </div>
              </div>
            </div>
            <!-- Customer review slider-->
            <section class="section-padding150 pb-md-0">
              <div class="row">
                <div class="col-12">
                  <h2 class="h2 mb-3 mb-md-4 text-uppercase">Testimonials</h2>
                </div>
              </div>
              <div class="row mx-md-0 pb-0 flex-colum-mb">   
                <div class="col-md-6 px-0">
                  <div class="zw-bg-black zw-quote-slider-wrapper">
                    <div class="swiper-container zw-quote-slider13">
                      <div class="swiper-wrapper">
                        <?php
                          foreach ( $details['crb_hwmt_testimonals'] as $testi ) {
                        ?>
                        <div class="swiper-slide">
                          <figure>
                            <blockquote class="mb-3"><span class="fnt-24 mb-3 zw-quote-slider-text">“<?php echo $testi['crb_hwtesti_quotes']; ?></span>
                              <p class="zw-quote-slider-des"><?php echo $testi['crb_hwtesti_quotes_sub_text']; ?>”</p>
                            </blockquote>
                            <figcaption class="zw-quote-slider-author"><?php echo $testi['crb_hwtesti_quotes_auto_company']; ?></figcaption>
                          </figure>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                    <!-- Pagination-->
                    <div class="swiper-pagination swiper-pagination13"></div>
                  </div>
                </div>
                <div class="col-md-6 px-0">
                  <div class="zw-image-slider-wrapper">
                    <div class="swiper-container zw-image-slider13">
                      <div class="swiper-wrapper">
                        <?php
                          foreach ( $details['crb_hwmt_testimonals'] as $testi ) {
                        ?>
                        <div class="swiper-slide">
                          <picture>
                            <img class="img-fit imgxh636" src="<?php echo $testi['crb_hwtesti_quotes_logo']; ?>">
                          </picture>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
					<?php $tabNum++; $displayTabNum++;} ?>
        </div>
      </div>
    </div>
  </section>

  <section class="zw-metrics section-padding150">
    <div class="container">
      <div class="row">
        <h2 class="h2 mb-3 mb-md-4 text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_keymet_section_title' ); ?></h2>
        <div class="col-12">
          <ul class="zw-metrics-blocklist">
            <?php 
              $keyMets = carbon_get_the_post_meta( 'crb_keymet_reps' );
              foreach ( $keyMets as $keyMet ) {
            ?>
            <li class="zw-metrics-blocklist__item">
              <span class="h2 mb-2 zw-blocklist-number"><?php echo $keyMet['crb_keymet_count']; ?></span>
              <p class="zm-clr-gr4c"><?php echo $keyMet['crb_keymet_subtext']; ?></p>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-blue zw-hero-panel">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1 col-xxl-8 offset-xxl-2 d-flex align-items-md-center flex-colum-mb">
          <div class="zw-hero-panel__cnt-info pe-4 pe-md-0">
            <h3 class="h2"><?php echo carbon_get_the_post_meta( 'crb_hzcta_title' ); ?></h3>
            <p class="fnt-16 zm-clr-gre4"><?php echo carbon_get_the_post_meta( 'crb_hzcta_subtitle' ); ?></p><a class="zw-btn zw-btn--default mt-4 mt-md-5" href="<?php echo carbon_get_the_post_meta( 'crb_hzcta_btn' ); ?>"><span>Get in touch</span><img class="ms-3" src="<?php echo $gdir ?>/img/icons/arrow-white.svg" alt="Arrow image"></a>
          </div>
          <div class="zw-hero-panel__figwrap mb-3 mb-md-0">
            <img class="img-fit" src="<?php echo carbon_get_the_post_meta( 'crb_hzcta_img' ); ?>" alt="illustartion">
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();
