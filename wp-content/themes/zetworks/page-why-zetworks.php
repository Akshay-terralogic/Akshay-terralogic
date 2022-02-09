<?php
  /**
   * Template Name: Why Zetworks
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

<?php if (have_posts()) : while ( have_posts() ) : the_post();?>
<main class="zw-topspace8">
  <section class="zw-banner">
    <div class="container">
      <div class="row text-center">
        <div class="position-relative">
          <div class="zw-banner__heading position-relative">
            <img class="img-fit imgh310" src="<?php echo get_template_directory_uri(); ?>/dist/img/why-zetwerk/Banner.png" alt="Maximize Manufacturing">
            <div class="zw-overlay zw-overlay--info"></div>
          </div>
          <!-- Content warp-->
          <div class="zw-banner__content zw-hv-center">
            <h1 class="h1 zw-banner__heading text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_wzb_banner' ); ?></h1>
          </div>
        </div>
      </div>
    </div>
    <div class="container zw-section-padding65">   
      <ul class="row mx-0 zw-banner-list">
        <li class="col-md-6 pe-md-4">
          <p class="zw-section-lead__des zm-clr-gr4c mb-3">Zetwerk is a global manufacturing network that maximizes efficiency, quality and value. Its manufacturing capabilities help customers reduce costs of existing and new production parts, optimize the number of suppliers and execute high quality production faster.</p>
        </li>
        <li class="col-md-6 pe-md-4">
          <p class="zw-section-lead__des zm-clr-gr4c mb-3">Zetwerk is a partner to leading players in precision parts, capital goods and consumer goods categories, offering a full spectrum of manufacturing services – from custom-made components to mass production, from quality certification to inventory and supply chain management.</p>
        </li>
      </ul>
    </div>
  </section>

  <section class="zw-hero-bg">
    <div class="position-relative">
      <div class="zw-banner__heading">
        <img class="img-fit imgh310" src="<?php echo carbon_get_the_post_meta( 'crb_tze_banner_img' ); ?>" alt="The Zetwerk Effect">
        <div class="zw-overlay zw-overlay--dang"></div>
      </div>
      <!-- Content warp-->
      <div class="zw-banner__content zw-hv-center top-40 text-center">
        <h2 class="h2 text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_tze_banner' ); ?></h2>
      </div>
    </div>
  </section>
  
  <section class="zw-hero-list mt-150 zw-only-desktop-hidden">
    <div class="container">
      <div class="col-12 js-zw-hero-list">
        <div class="swiper-wrapper">
          <?php 
            $tzes = carbon_get_the_post_meta( 'crb_tze_blocks' );
            foreach ( $tzes as $tze ) {
          ?>
          <div class="col-md-6 col-lg-3 zwPanel swiper-slide">
            <div class="d-flex align-items-center">
              <div class="-svgIcons img-small-icon me-3">
                <?php echo $tze['crb_tze_block_svg']; ?>
              </div>
              <h3 class="fnt-22 fnt-700 mb-0 fnt-gow-bold"><?php echo $tze['crb_tze_block_title']; ?></h3>
            </div>
            <p class="zw-section-lead__des zm-clr-gr4c my-3"><?php echo $tze['crb_tze_block_subtext']; ?></p>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <section class="zw-section-padding65 bg-ivory">
    <div class="container">
      <div class="row align-item-center">
        <div class="col-md-12 col-xl-4 px-xl-3 mb-2">
          <h2 class="h2 mb-2 mb-md-3 text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_pm_title' ); ?></h2>
        </div>
        <div class="col-md-6 col-xl-5 px-xl-3 zw-list-block__item-iner-text Light mb-2"> 
          <p class="zm-clr-gr4c fnt-500"><?php echo carbon_get_the_post_meta( 'crb_pm_sub_text' ); ?></p>
        </div>
        <div class="col-md-6 col-xl-3 px-xl-3 zw-list-block__item-iner-text Light mb-2"> 
          <h4 class="fnt-21 fnt-700 pe-lg-3 pe-xl-4"><?php echo carbon_get_the_post_meta( 'crb_pm_btn_top_text' ); ?></h4><a class="zw-btn zw-btn--pri mt-4 mt-md-3" href="<?php echo carbon_get_the_post_meta( 'crb_pm_btn_link' ); ?>"><span>Learn more</span><i class="icon icon-arrow ms-2"></i></a>
        </div>
      </div>
    </div>
  </section>

  <section class="zw-only-tablet-hidden">
    <div class="container-fluid px-0 js-ourNumbers">
      <ul class="swiper-wrapper">
        <?php 
          $heroblocks = carbon_get_the_post_meta( 'crb_hc_blocks' );
          $heroblocknum = 0;
          foreach ( $heroblocks as $heroblock ) {
        ?>
        <li class="col-md-4 px-md-0 swiper-slide">
          <div class="zw-hero-card zw-h700-fix zw-h700-fix--small">
            <img class="img-fit" src="<?php echo $heroblock['crb_hc_bg_img']; ?>" alt="Hero Card image">
            <!-- Overlay top of the content-->
            <div class="zw-hero-card__body <?php if($heroblocknum == 1){echo "zw-cbg-primary";}?>">
              <div class="zw-hero-card__cnt-wrap">
                <img class="img-md-icon me-3" src="<?php echo $heroblock['crb_hc_icon_img']; ?>" alt="<?php echo $heroblock['crb_hc_title'] ?>">
                <h3 class="fnt-22 my-3 fnt-gow-bold"><?php echo $heroblock['crb_hc_title']; ?></h3>
                <p class="zw-hero-card__des mb-4"><?php echo $heroblock['crb_hc_sub_text']; ?></p>
              </div>
            </div>
          </div>
        </li>
      <?php $heroblocknum++; } ?>
      </ul>
    </div>
  </section>
  <section class="zw-section-margin50">
    <div class="container zw-bg-black">
      <div class="row">
        <div class="col-md-6 zw-block-column zw-block-column--left">
          <div class="zw-expertise-layer__fg-img-wr -layer">
            <img class="img-fit imgx700" src="<?php echo $gdir ?>/img/why-zetwerk/make-india-hero.png" alt="Make In India,">
            <div class="zw-overlay zw-overlay--info"></div>
          </div>
          <div class="zw-block-column__item">
            <div class="mb-auto">
              <h2 class="h2 mb-2 mb-md-3 text-uppercase">
                <?php echo carbon_get_the_post_meta( 'crb_mii_title' ); ?>
              </h2>
            </div>
            <div class="zw-contact">
              <h3 class="fnt-22 my-3 fnt-gow-bold text-white">To become a Zetwerk supplier :</h3>
              <ul class="zw-nav-list mb-0">
                <li class="zm-nav-list__item">
                  <a class="zm-nav-link" href="mailto:<?php echo carbon_get_the_post_meta( 'crb_mii_email' ); ?>">
                    <img class="me-2" src="<?php echo $gdir ?>/img/icons/mail-icon.svg" alt="Mail icon"><?php echo carbon_get_the_post_meta( 'crb_mii_email' ); ?>
                  </a>
                </li>
                <li class="zm-nav-list__item">
                  <a class="zm-nav-link" href="tel:<?php echo carbon_get_the_post_meta( 'crb_mii_phonenumber' ); ?>">
                    <img class="me-2" src="<?php echo $gdir ?>/img/icons/phone-icon.svg" alt="Mail icon"><?php echo carbon_get_the_post_meta( 'crb_mii_phonenumber' ); ?>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 zw-block-column zw-block-column--right">
          <?php echo carbon_get_the_post_meta( 'crb_mii_textblock' ); ?>
        </div>
      </div>
    </div>
  </section>

<section class="zw-section-padding65 zw-only-tablet-hidden">
  <div class="container">
    <div class="row align-item-center">
      <div class="col-md-12 col-xl-4 pe-xl-5 mb-2">
        <h2 class="h2 mb-2 mb-md-3 text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_tznet_sectitle' ); ?></h2>
      </div>
      <div class="col-md-6 col-xl-6 px-xl-3 mb-2"> 
        <p class="zm-clr-gr4c fnt-500"><?php echo carbon_get_the_post_meta( 'crb_tznet_secstitle' ); ?></p>
      </div>
    </div>
    <div class="row zw-section-padding65">
      <div class="col-md-7 col-xl-8 NetwerkListPane">
        <!-- svg -->
        <svg class="w-100 zw-scaleout-09" id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 911 619" style="enable-background:new 0 0 911 619;" xml:space="preserve">
          <style type="text/css">
            .st0{fill:#F4D7C6;}
            .st1{fill:none;stroke:#231F20;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
            .st2{fill:#231F20;}
            .zw-global-svg.active .st2{ fill: #FAF3E7;}
            .zw-global-svg.active .st1{ stroke: #FAF3E7;}
            .st3{fill:none;stroke:#FFFFFF;stroke-width:2;stroke-miterlimit:10;}
            .st4{fill:#FAEAD5;}
            .st5{fill:#E4DED3;}
            .st6{fill:#FFDEB6;}
            .st7{fill:none;stroke:#231F20;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;}
            .st8{fill:none;stroke:#231F20;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:8.71,8.71;}
            .st9{fill:none;stroke:#231F20;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:8.28,8.28;}
            .st10{fill:none;stroke:#231F20;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:7.76,7.76;}
            .st11{fill:#B7CCE2;}
            
          </style>
          <g class="zw-global-svg active" id="link0">
            <path class="st0 zw-bg-change" d="M593.1,179c-30.7-55.9-79.2-100.9-137.8-127.1c-36.8-16.5-77.4-25.7-120.2-25.7C174,26.2,43.1,155.6,41,316.3                        c10.9,0.4,21.6,0.7,32.2,1.2c39.1,2,78.7,1.5,118.1,1.2c0.9-73,56.2-132.9,127.1-141c5.5-0.6,11.1-0.9,16.7-0.9                        c50.3,0,94.6,25.8,120.2,64.9c14.8,22.6,23.6,49.7,23.6,78.8c0,28.8-8.5,55.6-23,78.1l-0.7,0.4c25.7,39.3,70,65.4,120.5,65.4                        c5.6,0,11-0.4,16.5-0.9l0.6-0.6c23.3-42.1,36.7-90.7,36.7-142.3C629.1,269.2,616.1,221,593.1,179z"></path>
            <path class="st1" d="M187.6,317.8h-52.9V250h73"></path>
            <path class="st1" d="M207.7,250h-40.5v-62.1l64.6-44.9l-0.7,33.7l66.3-33.7v33.7l66.3-33.7v33.7v11.2"></path>
            <path class="st1" d="M420.2,197.4h153.2l37.4,49.6v77.8H498.3"></path>
            <path class="st2" d="M463.4,197.4h-51.6L419.9,79h37.7L463.4,197.4z"></path>
            <path class="st1" d="M164,268.1h-11.2v31.8H164V268.1z"></path>
            <path class="st1" d="M479.5,293.2h131.2v117.3"></path>
            <path class="st1" d="M167.2,250v-44.8h76.6"></path>
            <path class="st2" d="M570.2,220.1h-85.6v50.5h85.6V220.1z"></path>
            <path class="st3" d="M484.6,253.7h85.7"></path>
            <path class="st3" d="M484.6,236.9h85.7"></path>
            <path class="st3" d="M541.7,220.1v50.5"></path>
            <path class="st3" d="M513.2,220.1v50.5"></path>
            <path class="st1" d="M83.6,191.4v-29.9h51v29.9"></path>
            <path class="st1" d="M66.9,262.2h67.7v16.7H46.7"></path>
            <path class="st3" d="M414.6,158.9h44.4"></path>
            <path class="st1" d="M66.9,199.3c12-8.4,26.5-13.3,42.3-13.3c23.8,0,45.1,11.3,58.5,28.8"></path>
            <path class="st2" d="M183.8,174.3l8.8-119.4h16.8l6.7,97.4"></path>
            <path class="st1" d="M248.4,167.8L256.9,2h16.8l6.9,149.4"></path>
            <path class="st1" d="M489.9,324.8h-7"></path>
            <path class="st1" d="M59,262.2h-7.5"></path>
          </g>
          <g class="inactive zw-global-svg" id="link1">
            <path class="st4 zw-bg-change" d="M594.6,182.5l0.7-0.3h2.3c3.9,0.1,7.7,0.7,11.6,1.5c63.9,14.6,111.6,71.7,111.7,140h150.2                        C870.9,161.3,739.3,29.8,576.9,29.8c-40.7,0-79.5,8.3-114.5,23.1c-1.9,0.8-3.7,1.6-5.6,2.5C515.4,81.6,563.9,126.6,594.6,182.5z"></path>
            <path class="st1" d="M786.4,120.1v166.9c0,8.4-6.8,15.2-15.2,15.2h-52.1"></path>
            <path class="st1" d="M627.7,187.2V53c0-8.4,6.8-15.2,15.2-15.2h15.4"></path>
            <path class="st1" d="M710.5,181.3c21.3,0,38.6-3.5,38.6-7.8c0-4.3-17.3-7.8-38.6-7.8c-21.3,0-38.6,3.5-38.6,7.8                        C671.9,177.8,689.2,181.3,710.5,181.3z"></path>
            <path class="st2" d="M710.5,18c-28.7,0-52.1,23.3-52.1,52.1s52.1,101.3,52.1,101.3s52.1-72.6,52.1-101.3S739.2,18,710.5,18z                        M710.8,84.5c-12.1,0-21.2-9.9-21.7-21.7c-0.6-11.8,10.4-21.7,21.7-21.7c12.1,0,21.2,9.9,21.7,21.7                        C733.1,74.6,722.2,84.5,710.8,84.5z"></path>
            <path class="st1" d="M712.9,272.5c1.3-0.5,2.8-0.7,4.3-0.6c5.4,0.5,9.3,5.3,8.8,10.6c-0.5,4.3-3.6,7.7-7.6,8.6"></path>
            <path class="st1" d="M709,262.8h55.8"></path>
            <path class="st1" d="M771.3,262.8h7.7"></path>
            <path class="st1" d="M627.7,61.1h25"></path>
            <path class="st1" d="M627.7,112.4h-70.2V30.4"></path>
            <path class="st1" d="M799,240.4h42.7v79.5"></path>
            <path class="st1" d="M524.3,34.5v60.2"></path>
            <path class="st1" d="M571.7,146.4h56"></path>
            <path class="st1" d="M786.4,211.2h65.3"></path>
          </g>
          <g class="inactive zw-global-svg" id="link2">
            <path class="st5 zw-bg-change" d="M722.7,322c0,0.8,0,1.5,0,2.3c0,73.9-55.7,134.7-127.5,142.9c-0.3,0-0.7,0.1-1.2,0.1                        c-31.6,54.9-80.4,98.6-139,124c1.2,0.6,2.3,1.1,3.5,1.6c36.8,16.5,77.4,25.7,120.2,25.7c162.5,0,294.2-131.7,294.2-294.2                        c0-0.8,0-1.5,0-2.3H722.7V322z"></path>
            <path class="st2" d="M816.4,396c-2.1,4.8-7.5,7-12.3,5.4c-1.9,7.6-2.1,15.3-0.7,22.6c4.9-1.8,10.4,0.7,12.4,5.7                        c2,5-0.5,10.6-5.4,12.7c4,6.5,9.3,12.1,15.9,16.6c2.2-4.9,7.9-7.2,13-5c5,2.1,7.2,7.9,5.1,12.8c7.7,1.8,15.5,1.8,23,0.2                        c-1.9-5,0.6-10.6,5.6-12.6c4.9-2,10.5,0.3,12.6,5.1c6.3-4.1,11.8-9.5,16.1-16c-4.6-2.3-6.5-7.8-4.4-12.6c2-4.7,7.2-7,11.9-5.5                        c1.6-7.5,1.5-15.1,0-22.3c-4.7,1.2-9.6-1.4-11.4-6c-1.8-4.6,0-9.6,4.1-12c-4-6.2-9.1-11.6-15.4-15.8c-2.6,3.9-7.7,5.5-12.1,3.6                        c-4.4-1.9-6.8-6.8-5.6-11.3c-7.4-1.8-14.8-1.9-22.1-0.5c1.1,4.7-1.4,9.5-6,11.2c-4.7,1.9-9.8-0.1-12.1-4.3                        c-6.3,3.9-11.9,9-16.2,15.3C816.5,386,818.4,391.3,816.4,396z M843.6,443.9c-7.2-3.2-12.7-8.6-16-15.2l14-5.6c1.8,3,4.4,5.5,7.9,7                        c3.4,1.5,7.1,1.8,10.5,1.1l5.5,14C858.6,447.3,850.9,447,843.6,443.9z M848.2,410.7c2-4.6,7.4-6.7,11.9-4.7c4.6,2,6.7,7.4,4.7,11.9                        s-7.4,6.7-11.9,4.7C848.3,420.6,846.2,415.3,848.2,410.7z M886,427.2c-3.2,7.2-8.6,12.7-15.2,16l-5.5-14c3-1.8,5.5-4.4,6.9-7.9                        c1.5-3.4,1.8-7.1,1-10.5l14-5.5C889.5,412.2,889.2,419.9,886,427.2z M869.3,384.8c7.2,3.2,12.7,8.6,16,15.2l-14,5.5                        c-1.8-2.9-4.4-5.5-7.9-6.9c-3.4-1.5-7.1-1.8-10.5-1.1l-5.5-14C854.4,381.3,862.1,381.7,869.3,384.8z M842,385.5l5.5,14                        c-2.9,1.8-5.5,4.4-6.9,7.9c-1.5,3.4-1.8,7.1-1,10.5l-14,5.5c-2.1-7-1.8-14.7,1.3-21.9C830.1,394.3,835.6,388.8,842,385.5z"></path>
            <path class="st1" d="M606.6,468c21.4,7.2,35.5,28.7,32.6,51.9c-3.3,26.6-27.6,45.4-54.2,42.1c-17.2-2.1-31.2-13.1-37.9-27.7                        M517.6,559.3l-2.3,2.2c-3.7,3.6-4.2,9.5-1,13.5c3.3,4.2,9.2,5.1,13.5,2.2l2.7-1.8c2.8,2.7,5.7,5.3,8.8,7.6l-1.4,2.9                        c-2.2,4.7-0.5,10.4,4,13c4.6,2.7,10.4,1.4,13.4-2.9l1.9-2.7c3.9,1.6,7.8,2.9,11.9,4.1l-0.1,3.3c-0.2,5.3,3.6,9.9,8.9,10.5                        c5.1,0.7,9.9-2.7,11.1-7.8l0.7-3.2c4.7,0.1,9.3-0.2,13.9-0.9l1,3c1.9,5,7.1,7.7,12.3,6.3c5-1.4,8.1-6.4,7.1-11.6l-0.6-3.2                        c3.9-1.5,7.6-3.4,11.1-5.5l2.1,2.5c3.5,4,9.6,4.4,13.8,1.2c4.1-3.2,5.1-9,2.3-13.4l-1.8-2.8c3-2.9,6-6.2,8.5-9.6l2.9,1.4                        c4.8,2.3,10.5,0.6,13.2-4.1c2.6-4.6,1.3-10.3-2.9-13.3l-2.7-1.9c1.8-4.1,3.3-8.3,4.4-12.7l3.3,0.1c5.3,0.2,9.9-3.6,10.6-8.9                        c0.7-5.1-2.7-9.9-7.8-11.1l-3.2-0.7c0.1-4.1-0.1-8.1-0.6-12l3-1.1c5-1.8,7.9-7,6.5-12.1c-1.3-5-6.2-8.3-11.3-7.5l-3.2,0.5                        c-1.8-4.6-3.7-8.9-6.2-13l2.5-2.1c4-3.5,4.4-9.6,1.2-13.8c-3.2-4.1-9-5.1-13.4-2.3l-2.7,1.8"></path>
            <path class="st1" d="M707.7,575.7c10.8,0,19.6-8.8,19.6-19.6c0-10.8-8.8-19.6-19.6-19.6c-10.8,0-19.6,8.8-19.6,19.6                        C688.1,566.9,696.9,575.7,707.7,575.7z"></path>
            <path class="st2" d="M707.7,563.1c3.9,0,7-3.1,7-7c0-3.9-3.1-7-7-7c-3.9,0-7,3.1-7,7C700.7,559.9,703.9,563.1,707.7,563.1z"></path>
            <path class="st1" d="M788.3,324.2c7.7,5.8,12.6,15.2,12.6,25.6c0,17.7-14.5,32.2-32.2,32.2c-17.7,0-32.2-14.5-32.2-32.2                        c0-10.9,5.4-20.4,13.5-26.3"></path>
            <path class="st1" d="M768.7,369.4c10.8,0,19.6-8.8,19.6-19.6c0-10.8-8.8-19.6-19.6-19.6c-10.8,0-19.6,8.8-19.6,19.6                        C749.1,360.6,757.9,369.4,768.7,369.4z"></path>
            <path class="st1" d="M693.5,478.8c-3.3-1.1-6.3-2.1-9.3-3.2c-2-0.7-2-0.7-2.1-2.7c-0.3-6.3,0.1-12.6,1.5-18.8                        c0.1-0.7,0.5-0.9,1-1.1c3.5-0.6,7-1.2,10.5-1.8c0.3,0,0.7-0.4,0.8-0.6c1.6-4.1,3.5-7.9,5.8-11.7c0,0,0,0,0-0.1                        c0.7-0.9,0.7-1.8,0.1-2.8c-1.5-2.8-2.9-5.7-4.3-8.6c-0.2-0.6-0.2-0.9,0.2-1.4c4.3-5,9.3-9.3,15.1-13c0.7-0.5,1.2-0.4,1.9,0.1                        c2.7,2,5.5,4,8.3,6c0.5,0.4,0.9,0.5,1.5,0.1c4.2-1.9,8.5-3.3,13-4.2c0.2-0.1,0.7-0.4,0.7-0.7c1.2-3.4,2.3-6.8,3.4-10.3                        c0.2-0.6,0.5-0.7,1-0.8c6.8-0.6,13.5,0,20.1,1.5c0.6,0.1,0.8,0.4,0.9,0.9c0.6,3.4,1.2,6.9,1.8,10.3c0.1,0.7,0.3,1.1,1.1,1.3                        c3.9,1.5,7.7,3.3,11.1,5.6c1.1,0.7,1.9,0.8,3,0.2c2.8-1.5,5.6-2.8,8.4-4.2c0.7-0.4,1.1-0.2,1.6,0.2c5.1,4.4,9.5,9.6,13.1,15.4                        c0.4,0.5,0.1,0.8-0.1,1.2c-2,2.7-4,5.5-6,8.2c-0.6,0.7-0.6,1.3-0.2,2.1c1.9,4.1,3.2,8.2,4.1,12.6c0.1,0.6,0.4,0.8,0.9,0.9                        c3.4,1.1,6.7,2.2,10,3.3c0.6,0.2,0.8,0.5,0.8,1.1c0.6,6.8,0,13.5-1.5,20.2c-0.1,0.6-0.4,0.7-0.9,0.8c-3.4,0.6-6.8,1.2-10,1.6                        c-0.8,0.1-1.3,0.5-1.6,1.3c-1.6,4.1-3.5,7.9-6,11.6c-0.5,0.6-0.4,1.2,0,1.8c1.5,3,3,6.1,4.6,9.1c0.3,0.6,0.2,1.1-0.2,1.5                        c-4.4,5.1-9.5,9.5-15.2,13.1c-0.6,0.3-0.9,0.3-1.4-0.1c-2.8-2-5.5-4-8.3-6c-0.6-0.5-1.1-0.5-1.8-0.2c-4.1,1.9-8.3,3.2-12.7,4.1                        c-0.6,0.1-0.8,0.4-0.9,0.9c-1.1,3.4-2.2,6.9-3.4,10.3c-0.1,0.2-0.5,0.6-0.7,0.6c-7,0.6-13.9,0.1-20.7-1.5c-0.5-0.1-0.6-0.3-0.6-0.8                        c-0.6-3.4-1.2-6.8-1.6-10.3c-0.1-0.8-0.4-1.2-1.2-1.4c-4.2-1.6-8.1-3.6-11.8-6.1c-0.6-0.3-0.9-0.3-1.5-0.1c-3,1.5-6.1,3-9.1,4.6                        c-0.6,0.3-1.1,0.2-1.6-0.2c-5-4.3-9.3-9.3-13-14.9c-0.5-0.7-0.5-1.2,0-1.8c2-2.7,4-5.5,6-8.3c0.3-0.5,0.5-0.9,0.1-1.5                        c-1.9-4.2-3.3-8.5-4.2-13.1C693.7,479.3,693.5,478.9,693.5,478.8z M761.2,439.3c-16.5-7.5-36-0.1-43.4,16.3                        c-7.6,16.6-0.2,36.1,16.2,43.5c16.6,7.5,36.1,0.2,43.5-16.3C785,466.4,777.7,446.8,761.2,439.3z"></path>
          </g>
          <g class="inactive zw-global-svg" id="link3">
            <path class="st6 zw-bg-change" d="M71.4,317.8c-10.6-0.4-21.4-0.8-32.2-1.2c0,1.4,0,2.7,0,4.1c0,162.5,131.7,294.2,294.2,294.2                        c42.8,0,83.6-9.1,120.2-25.7c-26.3-11.8-50.4-27.3-71.9-45.9c-25.8-22.3-47.6-48.9-64.4-78.9c-0.2-0.5-0.6-0.9-0.8-1.5l-0.8,0.3                        c-71-8.8-126.1-69.3-126.1-142.8c0-0.6,0-1.2,0-1.8C150.1,319.3,110.5,319.8,71.4,317.8z"></path>
            <path class="st1" d="M156,506.7L143,528.4l12.3,7.3l12.9-21.8L156,506.7z"></path>
            <path class="st1" d="M149.5,517.4l-6.5,10.9l12.3,7.3l6.5-10.9L149.5,517.4z"></path>
            <path class="st2" d="M178,513l-19.3,32.5c-0.8,1.3-2.5,1.8-3.7,0.9l-3.3-2c-1.3-0.8-1.8-2.5-0.9-3.7l19.3-32.5                        c0.8-1.3,2.5-1.8,3.7-0.9l3.3,2C178.3,510,178.8,511.7,178,513z"></path>
            <path class="st1" d="M205,491.3l-0.4,0.7c-0.7,1.2-2.2,1.5-3.4,0.8l-58.4-34.7c-1.2-0.7-1.5-2.2-0.8-3.4l0.3-0.7                        c0.7-1.2,2.2-1.5,3.4-0.8l58.4,34.7C205.2,488.6,205.7,490.1,205,491.3z"></path>
            <path class="st1" d="M173.8,476.6L163,494.8L88.6,444l-36.2-22.2c-9.1-5.6-15.9-14.4-18.9-24.6l-2.6-8.6"></path>
            <path class="st1" d="M0.4,370.8c-0.1,0.2-0.2,0.5-0.2,0.7c-1.1,12.8,2.3,25.6,9.5,36.3l0.1,0.1c4.7,7,10.9,12.7,18.1,17l64.8,38.4                        c7.4,4.4,12.3,11.9,13.3,20.4l3,26.2c0.9,8.5,5.8,16.1,13.3,20.4l14.6,8.6l26.4-44.4l11.6,8.9c4.8,3.6,11.7,2.3,14.7-2.8l7.6-12.8                        l0.3-0.7l7.6-12.8c3-5.1,0.9-11.8-4.6-14.2l-13.3-6l26.4-44.4l-14.6-8.6c-7.4-4.4-16.3-5-24.3-1.9l-24.4,9.9                        c-7.9,3.3-16.9,2.6-24.3-1.9l-64.8-38.4c-7.2-4.3-15.3-6.9-23.6-7.7h-0.2c-12.8-1.2-25.7,2-36.4,9.1C0.7,370.5,0.5,370.6,0.4,370.8                        z"></path>
            <path class="st1" d="M206.9,448.8l12.9-21.8l-12.3-7.3l-12.9,21.8L206.9,448.8z"></path>
            <path class="st1" d="M213.4,438l6.5-10.9l-12.3-7.3l-6.5,10.9L213.4,438z"></path>
            <path class="st2" d="M211,456.9l18.2-30.6c0.8-1.3,0.4-3-0.9-3.7l-2.8-1.6c-1.3-0.8-3-0.4-3.7,0.9l-18.2,30.6                        c-0.8,1.3-0.4,3,0.9,3.7l2.8,1.6C208.6,458.6,210.2,458.1,211,456.9z"></path>
            <path class="st2" d="M204.6,491.9l0.4-0.7c0.7-1.2,0.4-2.7-0.8-3.4l-58.4-34.7c-1.2-0.7-2.7-0.4-3.4,0.8l-0.3,0.7                        c-0.7,1.2-0.4,2.7,0.8,3.4l58.4,34.7C202.4,493.5,203.9,493,204.6,491.9z"></path>
            <path class="st1" d="M176.7,471.7l10.7-18.1l-80.2-41l-36.8-21.1c-9.2-5.4-20.2-7-30.7-4.8l-8.8,1.9"></path>
            <path class="st1" d="M53.7,394.7c3.3-1.4,7.4-1.2,10.9,0.9"></path>
            <path class="st1" d="M53.4,414.2c-3.2-1.9-5.1-4.9-5.8-8.1"></path>
            <path class="st1" d="M62.5,428l18.2-30.8"></path>
            <path class="st2" d="M101.3,409l-18.5,31.1l4.5,2.7l18.5-31.1L101.3,409z"></path>
            <path class="st1" d="M96.3,427.7l45.9,26.9"></path>
            <path class="st2" d="M302.1,559.6c5.8,0.9,9.7,2.8,9.7,4.9c0,3.2-8.8,5.7-19.5,5.7c-10.7,0-19.5-2.6-19.5-5.7c0-2,3.4-3.6,8.4-4.7"></path>
            <path class="st1" d="M320.1,511.3c0,15.3-27.8,53.9-27.8,53.9s-27.8-38.6-27.8-53.9c0-15.3,12.4-27.8,27.8-27.8                        S320.1,496,320.1,511.3z"></path>
            <path class="st1" d="M292.4,518.8c-6.1,0-11.1-4.9-11.1-11.1c0-6.1,4.9-11.1,11.1-11.1c6.2,0,11.1,4.9,11.1,11.1                        c0,0.9-0.1,1.8-0.3,2.7"></path>
            <path class="st7" d="M198.2,510.4c0,0,1.6,0.4,4.4,1.3"></path>
            <path class="st8" d="M212.1,515.5c12.3,5.5,30.1,16,42.8,34.8"></path>
            <path class="st9" d="M65.1,349.7c20.2-9.2,62.1-22.8,108.2-5.1"></path>
            <path class="st10" d="M303.2,601.3c10.6-13.1,32.6-34.6,69.8-48.6"></path>
            <path class="st2" d="M179.3,336l12.4,15.5l-19.1,4.8L179.3,336z"></path>
            <path class="st2" d="M264.5,564.5l-15.9-9.7l13.9-7.8L264.5,564.5z"></path>
          </g>
          <g class="inactive zw-global-svg" id="link4">
            <path class="st11 zw-bg-change" d="M594.2,466.8c-31.6,54.9-80.4,98.6-139,124c-24.9-11.6-47.9-26.5-68.4-44.2c-25.8-22.3-47.6-48.9-64.4-78.9                        c-0.2-0.5-0.6-0.9-0.8-1.5c-23.3-42.1-36.7-90.7-36.7-142.3c0-51.8,13.4-100.5,37-142.9c5.5-0.6,11.1-0.9,16.7-0.9                        c50.3,0,94.6,25.8,120.2,64.9c-14.8,22.6-23.6,49.7-23.6,78.8c0,29,8.5,55.9,23.3,78.5c25.7,39.3,70,65.4,120.5,65.4                        C584.1,467.7,589.3,467.3,594.2,466.8z"></path>
            <path class="st2" d="M314.5,215.2h-28.4v13h28.4V215.2z"></path>
            <path class="st1" d="M286.9,388.4h40.3V425h-22.6"></path>
            <path class="st2" d="M327.2,388.4h-14.6V425h14.6V388.4z"></path>
            <path class="st1" d="M423.1,388.4h-40.3V425h40.3V388.4z"></path>
            <path class="st2" d="M423.1,388.4h-14.6V425h14.6V388.4z"></path>
            <path class="st1" d="M440.4,359.5H275v21.9h165.4V359.5z"></path>
            <path class="st1" d="M434.9,381.5H280.8v6.9h154.1V381.5z"></path>
            <path class="st1" d="M434.6,330.9h-7.2v28.3h7.2V330.9z"></path>
            <path class="st1" d="M416.1,330.7H347v28.1h69.1V330.7z"></path>
            <path class="st1" d="M422.7,226.1l-2.1-1.5l-9.8,18.7l-84.5,25.9l2.1,7.9l84.2-25.8l20.5,21l0.8-4.6                        C434,266.6,439.1,238.1,422.7,226.1z"></path>
            <path class="st1" d="M427.6,266.9v64.1"></path>
            <path class="st2" d="M377,263.6c0,7.6-6.2,13.8-13.7,13.8c-7.6,0-13.8-6.2-13.8-13.8c0-7.6,6.2-13.8,13.8-13.8                        C371,249.9,377,256.1,377,263.6z"></path>
            <path class="st3" d="M371.5,263.4c0,4.4-3.6,8.1-8.1,8.1c-4.4,0-8.1-3.6-8.1-8.1s3.6-8.1,8.1-8.1                        C367.9,255.3,371.5,258.9,371.5,263.4z"></path>
            <path class="st1" d="M335.5,275l14.7,56"></path>
            <path class="st1" d="M369,275.8h-9.9v54.9h9.9V275.8z"></path>
            <path class="st1" d="M369,279l-9.9,5.5l9.9,7l-9.9,3.9v3l9.9,5.5l-9.9,4.2v2.9l9.9,4.4l-9.9,4.9v3.2l9.9,5.5"></path>
            <path class="st1" d="M314.7,306.3h-32.5v53.2h32.5V306.3z"></path>
            <path class="st1" d="M331.2,306.3h-16.2v53.2h16.2V306.3z"></path>
            <path class="st2" d="M335.4,299.9h-58.3v8.6h58.3V299.9z"></path>
            <path class="st1" d="M307.9,227.9h-21v72h21V227.9z"></path>
            <path class="st1" d="M286.9,244.4h21"></path>
            <path class="st1" d="M286.9,275h21"></path>
            <path class="st1" d="M409.8,555.3c0-19.1,15.5-34.7,34.7-34.7c19.1,0,34.7,15.5,34.7,34.7"></path>
            <path class="st1" d="M444.4,510.5c8,0,14.5-6.5,14.5-14.5s-6.5-14.5-14.5-14.5c-8,0-14.5,6.5-14.5,14.5S436.4,510.5,444.4,510.5z"></path>
            <path class="st1" d="M353.8,496c0-12.8,10.4-23.3,23.3-23.3c13,0,23.3,10.4,23.3,23.3"></path>
            <path class="st1" d="M377,465.8c5.4,0,9.7-4.3,9.7-9.7c0-5.4-4.3-9.7-9.7-9.7c-5.4,0-9.7,4.3-9.7,9.7                        C367.3,461.4,371.7,465.8,377,465.8z"></path>
            <path class="st1" d="M493.3,516.9c0-12.8,10.4-23.3,23.3-23.3c13,0,23.3,10.4,23.3,23.3"></path>
            <path class="st1" d="M516.7,486.7c5.4,0,9.7-4.3,9.7-9.7c0-5.4-4.3-9.7-9.7-9.7c-5.4,0-9.7,4.3-9.7,9.7                        C507,482.3,511.3,486.7,516.7,486.7z"></path>
          </g>
        </svg>
        <!-- svg Ends -->
        <ul class="NetwerkLists zw-only-desktop mt-4 mt-xl-5">
          <?php 
            $netwerks = carbon_get_the_post_meta( 'crb_tznet_blocks' );
            $netwerkNum = 0;
            $netwerkNumClass = 1;
            foreach ( $netwerks as $netwerk ) {
          ?>
          <li class="NetwerkLists__item<?php echo $netwerkNumClass; ?> boxlink <?php if($netwerkNum == 0){echo "active";} ?> " id="NetwerkBoxlink<?php echo $netwerkNum; ?>">
            <h2 class="h2 fnt-gow"><?php echo $netwerk['crb_tznet_title']; ?></h2>
            <p class="zw-hero-card__des"><?php echo $netwerk['crb_tznet_sub_title']; ?></p>
          </li>
          <?php $netwerkNum++; $netwerkNumClass++; } ?>
        </ul>
      </div>
      <div class="col-md-5 col-xl-4 pt-md-5 pt-md-0">
        <ul class="borderGray p-4 p-xl-5 zw-only-desktop zw-rect-box">
          <?php 
            $netwerks = carbon_get_the_post_meta( 'crb_tznet_blocks' );
            $netwerkNum = 0;
            foreach ( $netwerks as $netwerk ) {
          ?>
          <li class="boxlink <?php if($netwerkNum == 0){echo "active";} ?>" id="NetwerkBoxlink<?php echo $netwerkNum; ?>">
            <h2 class="h2 fnt-gow text-tick-blue"><?php echo $netwerk['crb_tznet_title']; ?></h2>
            <p class="zw-hero-card__des mb-4 borderBottom"><?php echo $netwerk['crb_tznet_sub_title']; ?></p>
            <p class="notRequired"><?php echo $netwerk['crb_tznet_sub_details']; ?></p>
          </li>
          <?php $netwerkNum++; } ?>
        </ul>
      </div>
    </div>
    <div class="row zw-only-mobile">
      <div class="col-12 js-mb-ntwrk-slider">
        <ul class="p-md-4 p-xl-5 swiper-wrapper">
          <?php 
            $netwerks = carbon_get_the_post_meta( 'crb_tznet_blocks' );
            $netwerkNum = 0;
            foreach ( $netwerks as $netwerk ) {
          ?>
          <li class="swiper-slide">
            <h2 class="h2 fnt-gow text-tick-blue"><?php echo $netwerk['crb_tznet_title']; ?></h2>
            <p class="zw-hero-card__des mb-4 borderBottom"><?php echo $netwerk['crb_tznet_sub_title']; ?></p>
            <p class="notRequired"><?php echo $netwerk['crb_tznet_sub_details']; ?></p>
          </li>
          <?php $netwerkNum++; } ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="section-padding150 bg-ivory">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-5">
        <div class="zw-section-lead zw-border-right pb-4 pb-md-0">
          <!-- MIXIN OUR SERVICES LIST MIXIN-->
          <h2 class="h2 text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_qcert_sectitle' ); ?></h2>
          <p class="zw-section-lead__des zm-clr-gr4c mt-md-2"><?php echo carbon_get_the_post_meta( 'crb_qcert_secstitle' ); ?></p>
          <a class="zw-btn zw-btn--pri mt-3 mt-md-4 mt-lg-5" href="<?php echo carbon_get_the_post_meta( 'crb_qcert_btn_link' ); ?>"><span>Learn more</span><i class="icon icon-arrow ms-2"></i></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-7">
        <!-- MIXIN OUR SERVICES LIST MIXIN-->
        <ul class="zw-logolist w-100 mb-0">
          <?php 
            $qcs = carbon_get_the_post_meta( 'crb_qcert_logos' );
            foreach ( $qcs as $qc ) {
          ?>
          <li class="zw-logolist__item">
            <img class="img-fit" src="<?php echo $qc['crb_qcert_logo_img']; ?>" alt="Logo">
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
          <h3 class="h2"><?php echo carbon_get_the_post_meta( 'crb_wzcta_title' ); ?></h3>
          <p class="fnt-16 zm-clr-gre4"><?php echo carbon_get_the_post_meta( 'crb_wzcta_subtitle' ); ?></p>
          <a class="zw-btn zw-btn--default mt-4 mt-md-5" href="<?php echo get_site_url(); ?>/contact-us/"><span>Get in touch</span>
            <img class="ms-3" src="<?php echo $gdir ?>/img/icons/arrow-white.svg" alt="Arrow image">
          </a>
        </div>
        <div class="zw-hero-panel__figwrap mb-3 mb-md-0">
          <img class="img-fit" src="<?php echo carbon_get_the_post_meta( 'crb_wzcta_img' ); ?>" alt="illustartion">
        </div>
      </div>
    </div>
  </div>
</section>

</main>
<?php endwhile; endif; ?>

<?php
get_footer();
