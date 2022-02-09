<?php
/**
 * The template for displaying archive pages
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
  <!-- Tabs-->
<section class="zw-tabs-sections py-4 py-md-5">
    <div class="container">
      <div class="row pb-md-5">
        <div class="col-md-12 mb-0 zw-px-mob">
          <div class="zw-pills-container text-center">
            <ul class="nav nav-pills zw-pills-list" id="pills-tab" role="tablist">

             <?php
               $custom_terms = get_terms('manufacturingType');
               $l=0;
              foreach($custom_terms as $custom_term) {
                $args = array(
                  'post_type' => 'manufacturing',
                  'orderby' => 'name',
                  'order' => 'DESC',
                  'tax_query' => array(
                    array(
                      'taxonomy' => $custom_term->taxonomy,
                      'field' => 'slug',
                      'terms' => $custom_term->slug,
                    ),
                  ),
                 );

                 $loop = new WP_Query($args);
                 $unique_data = array();
                if($loop->have_posts()) {
                
                while($loop->have_posts()) : $loop->the_post();
                if( ! in_array( $custom_term->name, $unique_data ) ) :
                  $unique_data[] = $custom_term->name;
              ?>
              <li class="nav-item zw-pills-list__item w-50" role="presentation">
                <a class="zw-pills-link nav-link <?php if($l ==0){echo "active";}else{echo "";} ?>" id="pills-<?php echo $l; ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $l; ?>" role="tab" aria-controls="pills-manufact-process" aria-selected="true"><?php echo $custom_term->name; ?></a>
              </li>
              <?php  endif;endwhile; }$l++;} ?>
            </ul>
          </div>
        </div>
        <!-- Tabs main content-->
        <div class="tab-content" id="pills-tabContent">
          <?php
            $custom_termss = get_terms('manufacturingType');
            $count=0;
            foreach($custom_termss as $custom_term) {
            $args = array(
              'post_type' => 'manufacturing',
              'orderby' => 'name',
              'order' => 'DESC',
              'tax_query' => array(
                array(
                  'taxonomy' => $custom_term->taxonomy,
                  'field' => 'slug',
                  'terms' => $custom_term->slug,
                ),
              ),
             );
            $loop = new WP_Query($args);
            $unique_data = array();
            if($loop->have_posts()) {
          ?>

            <!--Process-->
            <?php while($loop->have_posts()) : $loop->the_post();
              if( ! in_array( $custom_term->name, $unique_data ) ) :
              $unique_data[] = $custom_term->name;
            ?>
            <div class="tab-pane fade <?php if($count ==0){echo "show active";}else{echo "";} ?>" id="pills-<?php echo $count; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $count; ?>-tab">
            <!-- Only Mobile-->
            <div class="row zw-only-mobile pt-4 pt-md-0">
              <div class="col-12 mobile-manufacturing">
                <div class="accordion accordion-flush" id="accordion-Ma-process">
                  
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                      <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Precision Manufacturing</div>
                    </h2>
                    <div class="accordion-collapse collapse show" id="flush-collapseOne" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-Ma-process">
                      <div class="accordion-body">
                        <ul class="zw-malist mb-0">
                          <li class="zw-malist__item"><a class="zw-malist__link" href="Precision-manufacturing-die-casting.html"><span>Die Casting</span></a></li>

                        </ul>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- Only Desktop-->
            <div class="row d-flex mx-0 zw-only-desktop">
              <ul class="col-md-4 px-0">
                <?php 
                  $custom_terms_tabs = get_the_terms(get_the_ID(),'manufacturingTabs');
                  $m=0;
                  foreach($custom_terms_tabs as $custom_term) {
                    $argsTbas = array(
                      'post_type' => 'manufacturing',
                      'orderby' => 'name',
                      'order' => 'DESC',
                      'tax_query' => array(
                        array(
                          'taxonomy' => $custom_term->taxonomy,
                          'field' => 'slug',
                          'terms' => $custom_term->slug,
                        ),
                      ),
                     );
                  $loopTabs = new WP_Query($argsTbas);          
                  if($loopTabs->have_posts()) {
                  while($loopTabs->have_posts()) : $loopTabs->the_post();
                ?>
                <li class="zw-pills-container zw-pills-container-vr">
                  <div class="nav flex-column nav-pills zw-pills-vr-list swiper-wrapper" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link zw-pills-link <?php if($m ==0){echo "show active";}else{echo "";} ?>" id="v-pills-<?php echo $m; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $m; ?>" role="tab" aria-controls="v-pills-<?php echo $m; ?>" aria-selected="true">
                      <?php echo $custom_term->name; ?>
                      <div class="zw-cap"></div>
                    </a>
                  </div>
                </li>
                <?php endwhile; }$m++;} ?>
              </ul>
              <div class="col-md-8 px-0">
                <div class="v-pills-tabContent tab-content" id="v-pills-tabContent">
                  <?php 
                    $custom_terms_tabss = get_the_terms(get_the_ID(),'manufacturingTabs');
                    $mcount=0;
                    foreach($custom_terms_tabss as $custom_termsss) {
                    $argsTbassss = array(
                      'post_type' => 'manufacturing',
                      'orderby' => 'name',
                      'order' => 'DESC',
                      'tax_query' => array(
                        array(
                          'taxonomy' => $custom_termsss->taxonomy,
                          'field' => 'slug',
                          'terms' => $custom_termsss->slug,
                        ),
                      ),
                    );
                  ?>
                  <div class="tab-pane fade <?php if($mcount ==0){echo "show active";}else{echo "";} ?>" id="v-pills-<?php echo $mcount; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $mcount; ?>-tab">
                    <?php 
                      $loopTabssss = new WP_Query($argsTbassss);
                      if($loopTabssss->have_posts()) {
                    ?>
                    <div class="zw-main-list">
                      <img class="img-fit" src="<?php echo $gdir; ?>/img/MA-listing/MA-process/precesion.png">
                      <div class="zw-main-list__content">
                        <ul class="zw-ma-blocklist w-100 mb-0">
                          <?php while($loopTabssss->have_posts()) : $loopTabssss->the_post();  ?>
                          <li class="zw-ma-blocklist__item">
                            <a class="zw-ma-blocklist-link" href="Precision-manufacturing-die-casting.html">
                              <span class="zw-ma-blocklist__text"><?php echo get_the_title(); ?></span>
                              <i class="icon icon-arrow"></i>
                            </a>
                          </li>
                          <?php endwhile; ?>
                        </ul>
                      </div>
                    </div>
                  <?php }?>
                  </div>
                <?php $mcount++; } ?>
                </div>
              </div>
            </div>
            </div>
            <?php endif; endwhile; ?>
          <?php }$count++;} ?>
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
