<?php
	/**
	 * The template for Home Page
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package theme_name
	*/
	get_header();
	$t_options = get_option('tp_opt');
?>
<?php if (have_posts()) : while ( have_posts() ) : the_post();?>
<main class="zw-topspace7">
<section class="zm-banner-slider">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center zw-pe-mob" id="banner-section">
        <div class="swiper-container bannerSlider">
          <div class="swiper-wrapper">
						<?php
							$slides = carbon_get_the_post_meta( 'crb_slides' );
							foreach ( $slides as $slide ) {
						?>
						<div class="swiper-slide">
              <!-- Image wrap-->
              <div class="zm-banner-slider__figwrap"> 
                <div class="em-ovewraly-gradient"></div>
                <img class="img-fit bannerImg" src="<?php echo $slide['crb_slider_img']; ?>" alt="Banner image">
              </div>
              <!-- Content warp-->
              <div class="zm-banner-slider__content zw-hv-center">
                <h1 class="h1 zm-banner-slider__heading pb-3 mb-md-3"><?php echo $slide['crb_slider_title']; ?></h1>
                <?php echo $slide['crb_slider_center']; ?>
                <a class="zw-btn zw-btn--default mt-3 mt-md-4" href="<?php echo $slide['crb_slider_btn_url']; ?>"><span>Learn more</span>
                	<img class="ms-3" src="<?php echo $gdir ?>/img/icons/arrow-white.svg" alt="Arrow image">
                </a>
              </div>
            </div>
						<?php
							}
						?>
          </div>
          <div class="zw-slider-controlers-wrap flex-center zw-only-desktop">
            <div class="zw-btn-arrow-left zw-circle zw-circle--lg swiper-button-prev">
              <div class="zw-circle zw-circle--sm flex-center"><svg class="zw-arrow-icon" width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 1L1.5 5.5L6 10" stroke="#FAF3E7" stroke-width="2"/></svg>
              </div>
            </div>
            <div class="zw-btn-arrow-right zw-circle zw-circle--lg swiper-button-next">
              <div class="zw-circle zw-circle--sm flex-center"><svg class="zw-arrow-icon" width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5.5 5.5L1 10" stroke="#FAF3E7" stroke-width="2"/></svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="zw-section-margin50 zw-bg-black zw-only-mobile-hidden">
  <div class="container">
    <div class="row">
      <div class="col-xl-6">
        <div class="zw-block-container js-manufacturing">
          <!-- MIXIN OUR SERVICES LIST MIXIN-->
          <h2 class="h2 mb-2 mb-md-3 text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_manuf_title' ); ?></h2>
          <p class="zw-section-lead__des zm-clr-gr4c mt-md-2"><?php echo carbon_get_the_post_meta( 'crb_manuf_sub_text' ); ?></p>
          <ul class="zw-list-block zw-list-block--white mb-0 mt-4 mt-md-5 swiper-wrapper">
            <li class="zw-list-block__item swiper-slide">
              <div class="zw-list-block__item-iner-text ps-0" data-toggle="collapse" data-parent="#panel-814345" href="#zw-collapse">
                <h4 class="fnt-24 zw-listitem-heading"><?php echo carbon_get_the_post_meta( 'crb_manuf_column_one_title' ); ?></h4>
                <p class="fnt-500"><?php echo carbon_get_the_post_meta( 'crb_manuf_column_one_sub_text' ); ?></p>
                <ul class="zw-unorder-list panel-collapse collapse" id="zw-collapse">
                	<?php
									  $args = array(
									    'post_type' => 'manufacturing',
									    'posts_per_page' => -1,
									    'order' => 'DESC',
											'tax_query' => array(
									      array(
									        'taxonomy' => 'manufacturingType',
									        'terms' => array('manufacturing-processes'),
									        'field' => 'slug',
									        'operator' => 'IN',
									    	),                        
                        array(
                          'taxonomy' => 'manufacturingType',
                          'terms' => array('show-on-home'),
                          'field' => 'slug',
                          'operator' => 'IN',
                        ),
									    )									    
									  );
									  $team = new WP_Query($args);
									?>
									<?php if($team->have_posts()) : ?>
									  <?php while($team->have_posts()) : $team->the_post();?>
									  	<li><a class="zm-nav-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
									  <?php endwhile; wp_reset_query(); ?>
									<?php endif ?>
                </ul>
                <div class="panel-heading"><a class="zw-btn zw-btn--default mt-3 mt-md-5" href="<?php echo get_site_url(); ?>/manufacturing/"><span>Learn more</span><img class="ms-3" src="<?php echo $gdir ?>/img/icons/arrow-white.svg" alt="Arrow image"></a></div>
              </div>
            </li>
            <li class="zw-list-block__item swiper-slide">
              <div class="zw-list-block__item-iner-text pe-0" data-toggle="collapse" data-parent="#zw-collapse12" href="#zw-collapse12">
                <h4 class="fnt-24 zw-listitem-heading"><?php echo carbon_get_the_post_meta( 'crb_manuf_column_two_title' ); ?></h4>
                <p class="fnt-500"><?php echo carbon_get_the_post_meta( 'crb_manuf_column_two_sub_text' ); ?></p>
                <ul class="zw-unorder-list panel-collapse collapse" id="zw-collapse12">
									<?php
									  $args = array(
									    'post_type' => 'manufacturing',
									    'posts_per_page' => -1,
									    'order' => 'DESC',
											'tax_query' => array(
									        array(
									        'taxonomy' => 'manufacturingType',
									        'terms' => array('manufacturing-for-industries'),
									        'field' => 'slug',
									        'operator' => 'IN',
									    	),                          
                        array(
                          'taxonomy' => 'manufacturingType',
                          'terms' => array('show-on-home'),
                          'field' => 'slug',
                          'operator' => 'IN',
                        ),
									    )									    
									  );
									  $team = new WP_Query($args);
									?>
									<?php if($team->have_posts()) : ?>
									  <?php while($team->have_posts()) : $team->the_post();?>
									  	<li><a class="zm-nav-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
									  <?php endwhile; wp_reset_query(); ?>
									<?php endif ?>
                </ul>
                <div class="panel-heading"><a class="zw-btn zw-btn--default mt-3 mt-md-5" href="<?php echo get_site_url(); ?>/manufacturing/#pills-manufact-industries-tab"><span>Learn more</span><img class="ms-3" src="<?php echo $gdir ?>/img/icons/arrow-white.svg" alt="Arrow image"></a></div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="zw-expertise-layer zw-expertise-layer--w45 d-none d-xl-block">
    <div class="zw-expertise-layer__fg-img-wr">
      <img class="img-fit" src="<?php echo $gdir ?>/img/home/manfracture-img.jpg" alt="Gif image">
    </div>
  </div>
</section>

<section class="zw-only-tablet-hidden">
  <div class="container-fluid px-0 js-ourNumbers">
    <ul class="swiper-wrapper">
			<?php
				$status = carbon_get_the_post_meta( 'crb_hero_card' );
				$stateNum = 0;
				foreach ( $status as $state ) {
			?>
      <li class="col-md-4 px-md-0 swiper-slide">
        <div class="zw-hero-card zw-h700-fix">
        	<img class="img-fit" src="<?php echo $state['crb_hero_img']; ?>" alt="Hero Card image">
          <!-- Overlay top of the content-->
          <div class="zw-hero-card__body <?php if($stateNum == 1){echo "zw-cbg-pri";} ?> <?php if($stateNum == 2){echo "zw-cbg-info";} ?>">
            <div class="zw-hero-card__cnt-wrap">
            	<?php echo $state['crb_hero_subtext']; ?>
              <p class="zw-hero-card__des mt-3 mt-md-4"><?php echo $state['crb_hero_title']; ?></p>
            </div>
          </div>
        </div>
      </li>
    	<?php $stateNum++; }  ?>
    </ul>
  </div>
</section>

<section class="zw-section-padding65 zw-only-mobile-hidden">
  <div class="container">
    <div class="row align-item-center">
      <div class="col-md-10 col-lg-5 col-xl-4">
        <!-- MIXIN OUR SERVICES LIST MIXIN-->
      <h2 class="h2 mb-2 mb-md-3 text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_hzw_title' ); ?></h2>
      <p class="zw-section-lead__des zm-clr-gr4c mt-md-2"><?php echo carbon_get_the_post_meta( 'crb_hzw_subtext' ); ?></p>
      </div>
      <div class="col-lg-7 col-xl-8 d-md-flex pt-4 pt-md-0 js-howit-Works">
        <ul class="zw-list-block mb-0 zw-list-block--init swiper-wrapper">
					<?php
						$status = carbon_get_the_post_meta( 'crb_hzw_cards' );
						foreach ( $status as $state ) {
					?>
          <li class="zw-list-block__item swiper-slide">
            <div class="zw-list-block__item-iner-text"> 
              <h4 class="fnt-24 zw-listitem-heading"><?php echo $state['crb_hzw_title']; ?></h4>
              <p class="zm-clr-gr4c fnt-500"><?php echo $state['crb_hzw_subtext']; ?></p><a class="zw-btn zw-btn--pri mt-4 mt-md-3" href="<?php echo $state['crb_hzw_btnurl']; ?>"><span>Learn more</span><i class="icon icon-arrow ms-2"></i></a>
            </div>
          </li>
					<?php } ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="zw-hero-bg">
  <figure class="mb-0"><img class="img-fit" src="<?php echo carbon_get_the_post_meta( 'crb_img_herobg' ); ?>" alt="Hero banner">
    <div class="zw-overlay zw-overlay--dang"></div>
  </figure>
</section>

<section class="section-padding150 bg-ivory">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-5">
        <div class="zw-section-lead zw-border-right pb-4 pb-md-0">
          <!-- MIXIN OUR SERVICES LIST MIXIN-->
          <h2 class="h2 text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_pac_title' ); ?></h2>
          <p class="zw-section-lead__des zm-clr-gr4c mt-md-2"><?php echo carbon_get_the_post_meta( 'crb_pac_subtext' ); ?></p>
          <a class="zw-btn zw-btn--pri mt-3 mt-md-4 mt-lg-5" href="<?php echo carbon_get_the_post_meta( 'crb_pac_btnlink' ); ?>"><span>View Case Studies</span><i class="icon icon-arrow ms-2"></i></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-7">
        <!-- MIXIN OUR SERVICES LIST MIXIN-->
        <ul class="zw-logolist w-100 mb-0 zw-logolist--sec">
					<?php
						$logos = carbon_get_the_post_meta( 'crb_pac_logos' );
						foreach ( $logos as $logo ) {
					?>
          <li class="zw-logolist__item">
          	<img class="img-fit" src="<?php echo $logo['crb_pac_logo_img'] ?>" alt="Logo">
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="zw-bg-black">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="zw-block-container zw-block-container--sec zw-570">
          <!-- MIXIN OUR SERVICES LIST MIXIN-->
          <h2 class="h2 mb-2 mb-md-3 text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_gmn_title' ); ?></h2>
          <p class="zw-section-lead__des zm-clr-gr4c mt-md-2"><?php echo carbon_get_the_post_meta( 'crb_gmn_subtext' ); ?></p>
          <a class="zw-btn zw-btn--default mt-3 mt-md-5" href="<?php echo carbon_get_the_post_meta( 'crb_gmn_btnlink' ); ?>"><span>Learn more</span>
          	<img class="ms-3" src="<?php echo $gdir ?>/img/icons/arrow-white.svg" alt="Arrow image"></a>
        </div>
      </div>
    </div>
  </div>
  <div class="zw-expertise-layer zw-expertise-layer--w60">
    <div class="zw-expertise-layer__fg-img-wr">
      <iframe class="imgx700" src="<?php echo carbon_get_the_post_meta( 'crb_gmn_vidlink' ); ?>?autoplay=0&amp;showinfo=0&amp;controls=0&quot;" frameborder="0" allowfullscreen=""></iframe>
    </div>
  </div>
</section>

<section class="section-padding150 bg-ivory">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-5">
        <div class="zw-section-lead zw-border-right pb-4 pb-md-0">
          <!-- MIXIN OUR SERVICES LIST MIXIN-->
          <h2 class="h2 text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_qc_title' ); ?></h2>
          <p class="zw-section-lead__des zm-clr-gr4c mt-md-2"><?php echo carbon_get_the_post_meta( 'crb_qc_subtext' ); ?></p>
          <a class="zw-btn zw-btn--pri mt-3 mt-md-4 mt-lg-5" href="<?php echo carbon_get_the_post_meta( 'crb_qc_btnlink' ); ?>"><span>Learn more</span><i class="icon icon-arrow ms-2"></i></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-7">
        <!-- MIXIN OUR SERVICES LIST MIXIN-->
        <ul class="zw-logolist w-100 mb-0">
					<?php
						$logos = carbon_get_the_post_meta( 'crb_qc_logos' );
						foreach ( $logos as $logo ) {
					?>
          <li class="zw-logolist__item">
          	<img class="img-fit" src="<?php echo $logo['crb_qc_logo_img'] ?>" alt="Logo">
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
          <h3 class="h2"><?php echo carbon_get_the_post_meta( 'crb_cta_title' ); ?></h3>
          <p class="fnt-16 zm-clr-gre4"><?php echo carbon_get_the_post_meta( 'crb_cta_subtext' ); ?></p>
          <a class="zw-btn zw-btn--default mt-4 mt-md-5" href="<?php echo carbon_get_the_post_meta( 'crb_cta_btnlink' ); ?>">
          	<span>Get in touch</span>
          	<img class="ms-3" src="<?php echo $gdir ?>/img/icons/arrow-white.svg" alt="Arrow image">
          </a>
        </div>
        <div class="zw-hero-panel__figwrap mb-3 mb-md-0">
        	<img class="img-fit" src="<?php echo carbon_get_the_post_meta( 'crb_cta_logo_img' ); ?>" alt="illustartion">
        </div>
      </div>
    </div>
  </div>
</section>

</main>
<?php endwhile; endif; ?>
<?php
get_footer();