<?php
/**
* Template Name: careers
*
* @package WordPress
*/
get_header();
$t_options = get_option('tp_opt');
?>
<main class="zw-topspace8">

<section class="zw-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 position-relative text-center">
        <div class="zw-banner__heading">
          <div class="zw-hero-bg">
            <img class="img-fit imgh310" src="<?php echo carbon_get_the_post_meta('crb_careers_banner_img'); ?>" alt="Banner image">
            <div class="zw-overlay zw-overlay--info"></div>
          </div>
        </div>
        <!-- Content warp-->
        <div class="zw-banner__content zw-hv-center">
          <h1 class="h1 zw-banner__heading upper"><?php echo carbon_get_the_post_meta('crb_careers_banner_text'); ?></h1>
        </div>
      </div>
      <div class="col-12">
        <div class="zw-bg-black zw-box-innerspace zw-section-padding65">
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <h2 class="h2 text-uppercase"><?php echo carbon_get_the_post_meta('crb_careers_banner_heading'); ?></h2>
            </div>
            <div class="col-md-6 col-lg-8">
              <p class="zw-section-lead__des"><?php echo carbon_get_the_post_meta('crb_careers_banner_subtxt'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Rise In Good Company-->
<section class="pt-md-5 pb-5 pb-md-0">
  <div class="container zw-section-padding65 py-0">
    <div class="row align-item-center mx-0">
      <div class="col-md-6 col-xl-6 px-0">
        <div class="bg-ivory zw-section-padding80">
          <h2 class="h2 mb-2 mb-md-4 text-uppercase"><?php echo carbon_get_the_post_meta('crb_careers_gtitle'); ?></h2>
          <div class="zw-section-text">
            <?php echo carbon_get_the_post_meta('crb_careers_gsubtxt'); ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-6 p-0">
        <img class="imgxh200 zw-img-filter" src="<?php echo carbon_get_the_post_meta('crb_careers_gimg'); ?>" alt="Rise In Good Company">
      </div>
    </div>
  </div>
</section>
<!-- partners-->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12 zw-px-mob">
        <div class="zw-section-padding80 bg-blue">
          <!-- MIXIN OUR SERVICES LIST MIXIN-->
          <ul class="zw-logolist w-100 mb-0">
            <?php 
              $career_logos = carbon_get_the_post_meta( 'crb_career_logos' );
              foreach ( $career_logos as $logo ) {
            ?>
            <li class="zw-logolist__item">
              <img class="img-fit" src="<?php echo $logo['crb_careers_logo']; ?>" alt="Logo">
            </li>
            <?php
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- How Zetwerk Recruits-->
<section class="zw-section-padding60 zw-mob-bg-black">
  <div class="container">
    <div class="row d-flex flex-colum-mb mx-0">
      <div class="col-md-6 px-0">
        <img class="imgxh200" src="<?php echo carbon_get_the_post_meta('crb_chzr_img'); ?>" alt="<?php echo carbon_get_the_post_meta('crb_chzr_title'); ?>">
      </div>
      <div class="col-md-6 px-0">
        <div class="zw-bg-black zw-block-column zw-block-column--right h-100">
          <h2 class="h2 mb-3 text-uppercase"> <span><?php echo carbon_get_the_post_meta('crb_chzr_title'); ?></span></h2>
          <p class="zw-section-lead__des zm-clr-gr4c mb-md-3"><?php echo carbon_get_the_post_meta('crb_chzr_stext'); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="zw-section-padding60 zw-mob-bg-black zw-section-careers">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h2 class="careers-list-title">VIEW CURRENT OPENINGS</h2>
      </div>
      <div class="col-md-9">
        <div class="row">
          <?php 
           $results = careers_curl_fun(); 
            $arr = [];
            $resultsArr = [];
            $countPos = [];
            $inerArry = [];
            for($i=0; $i < count($results['content']);$i++){
              $arr['department'] = $results['content'][$i]['department'];
              $arr['open_positions'] = $results['content'][$i]['open_positions'];
              array_push($resultsArr,$arr);
              array_push($countPos, $results['content'][$i]['department']);
            }
			$uniqueValues = array_unique($countPos);
			$finalUniqueValues = array_values($uniqueValues);
			for($k=0; $k < count($resultsArr);$k++){
				for($m=0; $m < count($finalUniqueValues);$m++){
					if($resultsArr[$k]['department'] == $finalUniqueValues[$m]){
						$inerArry[$resultsArr[$k]['department']] += $resultsArr[$k]['open_positions'];
					}
				}
			}
			foreach($inerArry as $keys=>$values){
			 ?>
            <a class="col-md-4 careers-card-link" href="https://zetwerk.skillate.com/?department=<?php echo $keys; ?>">
              <div class="careers-card">
                <div class="card-title">
                  <?php echo $keys; ?>
                </div>
                <div class="card-descp">
                  <?php echo $values; ?> Open Positions
                </div>
              </div>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>  
  </div>
</section>
<!-- zetwerk-leadership-->
<section class="zw-leadership-list zw-only-desktop-hidden">
  <div class="container zw-section-padding65 px-md-0 pb-0">
    <div class="row">
      <div class="col-8">
        <h2 class="h2 mb-2 mb-md-3 text-uppercase">Zetwerk Leadership</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12 js-zw-leadership-list pt-2 pt-md-4 pt-lg-5">
        <div class="swiper-wrapper">
          <?php 
            $leaders = carbon_get_the_post_meta( 'crb_leaders' );
            foreach ( $leaders as $leader ) {
          ?>
          <div class="col-md-6 col-lg-3 swiper-slide box">
            <a class="zw-leader" href="<?php echo $leader['crb_leaders_linked']; ?>" target="_blank">
              <img class="imgxh246" src="<?php echo $leader['crb_leaders_image']; ?>" alt="<?php echo $leader['crb_leaders_names']; ?>">
              <div class="-description">
                <div class="-description__block pb-2 mb-2 pb-md-3 mb-md-3">
                  <h3 class="-description__name"><?php echo $leader['crb_leaders_names']; ?></h3>
                </div>
              </div>
            </a>
          </div>            
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
        <!-- Contact us-->
<section class="zw-metrics section-padding150">
  <div class="container">
    <div class="row px-2 px-md-0">
      <h2 class="h2 mb-1 mb-md-4 text-uppercase">Contact Us</h2>
    </div>
    <div class="row zw-needHelp-blocklist">
      <?php 
        $contactCards = carbon_get_the_post_meta( 'crb_careers_contact_section' );
        foreach ( $contactCards as $contactCard ) {
      ?>
      <div class="zwPanel">
        <h3 class="fnt-24 fnt-700 mb-0 fnt-gow-bold"><?php echo $contactCard['crb_careers_contact_section_heading']; ?></h3>
        <p class="zw-section-lead__des zm-clr-gr4c my-3"><?php echo $contactCard['crb_careers_contact_section_officename']; ?></p>
        <p class="zw-section-lead__des zm-clr-gr4c my-3"><?php echo $contactCard['crb_careers_contact_address']; ?></p>
      </div>
      <?php } ?>
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
          <p class="fnt-16 zm-clr-gre4">Sign up for a free trial and find out how Zetwerk makes Manufacturing simple.</p><a class="zw-btn zw-btn--default mt-4 mt-md-5" href="<?php echo get_site_url(); ?>/contact-us/"><span>Get in touch</span><img class="ms-3" src="<?php echo $gdir; ?>/img/icons/arrow-white.svg" alt="Arrow image"></a>
        </div>
        <div class="zw-hero-panel__figwrap mb-3 mb-md-0"><img class="img-fit" src="<?php echo $gdir; ?>/img/home/free-quote.svg" alt="illustartion"></div>
      </div>
    </div>
  </div>
</section>

</main>

<?php
get_footer();