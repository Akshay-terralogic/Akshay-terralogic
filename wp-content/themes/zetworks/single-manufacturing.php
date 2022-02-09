<?php
/**
 * Single Template for Menufacturing CPT
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme_name
 */

get_header();
$t_options = get_option('tp_opt');
?>

<main class="zw-topspace8">
	<!--Main-->
	<section class="d-block d-md-none">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12 ZWBreadcrumb">
	        <a class="ZWBreadcrumb__Link" href="<?php echo get_site_url(); ?>/manufacturing/">
	          <i class="icon icon-arrow zw-backpage__black06 me-2"></i><span>Zetwerk For Precision Manufacturing</span>
	        </a>
	      </div>
	    </div>
	  </div>
	</section>
	<!--banner-->
	<section class="zw-detail-banner <?php $padding = carbon_get_the_post_meta('crb_manufac_banner_padding'); if ($padding == "1"){echo "zw-section-paddingb90";}elseif($padding == "2"){echo " ";} ?>">
	  <div class="container">
	    <div class="row flex-colum-mb">
	      <div class="col-md-6 col-lg-7 bg-Primary zw-detail-banner__item">
	        <div class="ZWBreadcrumb d-md-block d-none">
	          <a class="ZWBreadcrumb__Link" href="<?php echo get_site_url(); ?>/manufacturing/"">
	            <i class="icon icon-arrow zw-backpage__white06 me-2"></i>
	            <span>Zetwerk For Precision Manufacturing</span>
	          </a>
	        </div>
	        <h2 class="h2 mb-2 mb-md-3 text-uppercase"><?php echo carbon_get_the_post_meta( 'crb_manufac_banner_title' ); ?></h2>
	        <p class="zw-section-lead__des zm-clr-gr4c mt-md-2"><?php echo carbon_get_the_post_meta( 'crb_manufac_banner_sub_text' ); ?></p>
	      </div>
	      <div class="col-md-6 col-lg-5 px-0 zw-hero-bg">
	      	<img class="imgxh200 imgxh200--lg" src="<?php echo carbon_get_the_post_meta( 'crb_manufac_image' ); ?>" alt="<?php echo carbon_get_the_post_meta( 'crb_manufac_banner_title' ); ?>">
	        <div class="zw-overlay zw-overlay--info"></div>
	      </div>
	    </div>
	  </div>
	</section>
	<?php 
		$query_data = carbon_get_the_post_meta( 'crb_manufact_section' );
		foreach ( $query_data as $data ) {
	?>
	<?php
		switch ( $data['_type'] ) { 
		case 'manufac_hero':
	?>
		<section class="zw-hero-bg">
		  <div class="position-relative">
		    <div class="zw-banner__heading">
		    	<img class="img-fit imgh310" src="<?php echo $data['crb_manufac_section_bg_img']; ?>" alt="Core Capabilities">
		      <div class="zw-overlay zw-overlay--dang"></div>
		    </div>
		    <!-- Content warp-->
		    <div class="zw-banner__content zw-hv-center top-40 text-center">
		      <h2 class="h2 text-uppercase"><?php echo $data['crb_manufac_section_heading']; ?></h2>
		    </div>
		  </div>
		</section>
		<!--  NEW ICONS UPDATED-->
		<section class="zw-hero-list mt-150 zw-only-desktop-hidden zw-section-padding80 pt-0">
		  <div class="container">
		    <div class="col-12 js-zw-hero-list zw-border-info">
		      <div class="swiper-wrapper d-md-flex flex-md-wrap">
		        <?php 
		        	foreach ( $data['crb_post_menufac_sec_list'] as $sub_data ){
		        ?>
		        <div class="col-md-6 col-lg-3 zwPanel swiper-slide">
		          <h3 class="fnt-18 fnt-700 fnt-gow-bold"><?php echo $sub_data['crb_manufac_hero_list'] ?></h3>
		          <?php echo $sub_data['crb_manufac_hero_list_items'] ?>
		        </div>
		        <?php  } ?>
		      </div>
		    </div>
		  </div>
		</section>
	<?php
		break;
	?>
	<?php case 'manufac_client_logos': ?>
		<section class="section-padding150 bg-ivory client-icons">
		  <div class="container">
		    <div class="row align-items-center">
		      <div class="col-md-6 col-lg-4">
		        <div class="zw-section-lead zw-border-right pb-4 pb-md-0">
		          <!-- MIXIN OUR SERVICES LIST MIXIN-->
		          <h2 class="h2 text-uppercase"><?php echo $data['crb_manufac_client_logo_heading']; ?></h2>
		          <p class="zw-section-lead__des zm-clr-gr4c mt-md-2"><?php echo $data['crb_manufac_client_logo_sub_text']; ?></p>
		          <a class="zw-btn zw-btn--pri mt-3 mt-md-4 mt-lg-5" href="<?php echo $data['crb_manufac_client_logo_btn_link']; ?>"><span>Learn more</span><i class="icon icon-arrow ms-2"></i></a>
		        </div>
		      </div>
		      <div class="col-md-6 col-lg-8">
		        <!-- MIXIN OUR SERVICES LIST MIXIN-->

		        <ul class="zw-logolist w-100 mb-0">
						<?php foreach($data['crb_post_menufac_sec_list'] as $clogo){ ?>
		          <li class="zw-logolist__item"><img class="img-fit" src="<?php echo $clogo['crb_manufac_client_logo_file']; ?>" alt="<?php echo $clogo['crb_manufac_client_logo_name']; ?>"></li>
		        <?php } ?>
		        </ul>
		      </div>
		    </div>
		  </div>
		</section>	
	<?php break; ?>

	<?php case 'manufac_text_right_img': ?>
	  <section class="zw-hero-panel-casting-quality <?php if($data['manufac_section_bg'] == "1"){echo 'bg-ivory';} ?> "> 
	    <div class="container"> 
	      <div class="row align-items-md-center"> 
	        <div class="col-md-6 col-lg-5"> 
	          <div class="zw-hero-panel-casting-quality__info">
	            <!-- MIXIN OUR SERVICES LIST MIXIN-->
	            <h2 class="h2 mb-2 mb-md-3 text-uppercase"><?php echo $data['manufac_tri_sec_heading']; ?></h2>
	            <p class="zw-section-lead__des zm-clr-gr4c mt-md-2"><?php echo $data['manufac_tri_sec_sub_text']; ?></p>
	          </div>
	        </div>
	        <div class="col-md-6 col-lg-7">
	          <div class="zw-hero-bg">
	            <figure><img class="img-fit" src="<?php echo $data['manufac_tri_sec_img']; ?>" alt="finishing-touch-forging">
	              <div class="zw-overlay zw-overlay--dang <?php if($data['manufac_section_img_overlay'] == "1"){echo "zw-overlay--info";}elseif($data['manufac_section_img_overlay'] == "2"){echo "zw-overlay--dang";} ?>"></div>
	            </figure>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	<?php break; ?>

	<?php case 'manufac_client_bltspnts_with_right_img': ?>

		<section class="zw-section-margin50 zw-bg-black zw-only-mobile-hidden">
		  <div class="container">
		    <div class="row">
		      <div class="col-xl-6">
		        <div class="zw-block-container">
		          <h2 class="h2 mb-0 mb-md-3 text-uppercase"><?php echo $data['crb_manufac_bltspnts_heading']; ?></h2>
		          <ul class="ZW-unOrderList mb-0">
		          	<?php foreach($data['crb_manufac_bltspnts_rep'] as $list){ ?>
		            <li>
		              <p class="ZW-unOrderList__desc"><?php echo $list['crb_manufac_bltspnts_item'] ?></p>
		            </li>
		            <?php } ?>
		          </ul>
		        </div>
		      </div>
		    </div>
		  </div>
		  <div class="zw-expertise-layer zw-expertise-layer--w45 d-none d-xl-block">
		    <div class="zw-expertise-layer__fg-img-wr">
		    	<img class="img-fit" src="<?php echo $data['crb_manufac_bltspnts_right_img']; ?>" alt="Molding">
		    </div>
		  </div>
		</section>
	<?php break; ?>

	<?php case 'manufac_client_bltspnts_with_right_img_four_rows': ?>
		<section class="zw-bg-thrice">
      <div class="container">
        <div class="row">
          <div class="col-xl-7 zw-bg-thrice__item">
            <div class="zw-List-container">
              <h2 class="h2 mb-2 mb-md-5 text-uppercase"><?php echo $data['crb_manufac_bltspnts_heading_four_rows']; ?></h2>
              <ul class="ZW-unOrderList ZW-unOrderList--primary">
								<?php foreach($data['crb_manufac_bltspnts_rep_four_rows'] as $list){ ?>
                <li>
                  <p class="ZW-unOrderList__desc"><?php echo $list['crb_manufac_bltspnts_item_four_rows']; ?></p>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-xl-5 p-0 zw-bg-thrice__item d-none d-xl-block">
          	<img class="w-100 h-100" src="<?php echo $data['crb_manufac_bltspnts_right_img_four_rows']; ?>" alt="Materials">
          </div>
        </div>
      </div>
    </section>
	<?php break; ?>

	<?php case 'manufac_info_hero': ?>
	  <section class="px-3 zw-section-paddingb90">
	    <div class="container bg-size-blue-block">
	      <div class="row">
	        <div class="col-md-6 bg-size-blue-block__item">               
	          <h2 class="h2 mb-2 mb-md-5 text-uppercase"><?php echo $data['manufac_ih_heading']; ?></h2>
	          <ul class="zw-second-unorderList">
	            <li class="Item">
	              <h4 class="h4Title"><?php echo $data['manufac_ih_part_size_heading']; ?></h4>
	              <p class="desc"><?php echo $data['manufac_ih_part_size_sub_text']; ?></p>
	            </li>
	            <li class="Item">
	              <h4 class="h4Title"><?php echo $data['manufac_ih_part_size_heading2']; ?></h4>
	              <p class="desc"><?php echo $data['manufac_ih_part_size_sub_text2']; ?></p>
	            </li>
	          </ul>
	          <p class="zw-section-lead__des zm-clr-gr4c my-md-2"><?php echo $data['manufac_ih_part_size_bottom_text']; ?></p>
	        </div>
	        <div class="col-md-6 px-0 zw-hero-bg">
	        	<img class="imgxh200 imgxh200--lg" src="<?php echo $data['manufac_ih_sec_img']; ?>" alt="Sizes">
	          <div class="zw-overlay zw-overlay--info"></div>
	        </div>
	      </div>
	    </div>
	  </section>
	<?php break; ?>


	<?php case 'manufac_indust_slider': ?>
		<section class="zw-die-casting-industries section-padding80">
		  <div class="container"> 
		    <div class="row"> 
		      <div class="col-12"> 
		        <div class="zw-heading-container pb-md-5 pb-3">
		          <h2 class="h2 text-uppercase"><?php echo $data['crb_manufac_indust_slider_heading']; ?></h2>
		          <div class="zw-slider-controlers-right-wrap zw-only-desktop">
		            <div class="zw-btn-arrow-left zw-circle zw-circle--sec zw-circle--lg swiper-button-prev swiper-button-prev__industries">
		              <div class="zw-circle zw-circle--sec zw-circle--sm flex-center"><svg class="zw-arrow-icon" width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 1L1.5 5.5L6 10" stroke="#4C4A48" stroke-width="2"/></svg>
		              </div>
		            </div>
		            <div class="zw-btn-arrow-right zw-circle zw-circle--sec zw-circle--lg swiper-button-next swiper-button-next__industries">
		              <div class="zw-circle zw-circle--sec zw-circle--sm flex-center"><svg class="zw-arrow-icon" width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5.5 5.5L1 10" stroke="#4C4A48" stroke-width="2"/></svg>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="js-die-casting-industries swiper-container">
		          <ul class="swiper-wrapper">
		          	<?php 
		          		foreach($data['crb_manufac_indust_slider'] as $slider){
		          	?>
		            <li class="swiper-slide">
		              <div class="zw-hero-bg">
		                <figure>
		                	<img class="img-fit" src="<?php echo $slider['crb_manufac_indust_slider_image']; ?>" alt="aerospace">
		                  <div class="zw-overlay zw-overlay--info"></div>
		                </figure>
		              </div>
		              <div class="card-heading">
		                <h4 class="fnt-28 text-white mb-md-0 text-uppercase fnt-gow fnt-18-resp"><?php echo $slider['crb_manufac_indust_slider_img_text']; ?></h4>
		              </div>
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
	<?php break; ?>

	<?php case 'manufac_top_text_btm_img': ?>
		<section class="zw-hero-panel-casting-methods">
	    <div class="container">
	      <div class="row"> 
	        <div class="col-12 p-0"> 
	          <div class="zw-hero-panel-casting-methods-card"> 
	            <h2 class="h2 me-md-5 text-uppercase"><?php echo $data['manufac_top_text_btm_heading']; ?></h2>
	            <p class="fnt-21 zm-clr-gr4c"><?php echo $data['manufac_top_text_btm_subtext']; ?></p>
	          </div>
	        </div>
	        <div class="col-12 p-0">
	          <div class="zw-hero-bg">
	            <figure><img class="img-fit" src="<?php echo $data['manufac_top_btm_imgs']; ?>" alt="methods-img">
	              <div class="zw-overlay zw-overlay--dang"></div>
	            </figure>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
  <?php break; ?>
  <?php case 'manufac_tobi_section': ?>
	 <section class="zw-sand-casting-finishing-touch">
	    <div class="container">
	    	<?php if ($data['manufac_tobi_section_heading_main']): ?>
					<div class="row"> 
		        <div class="col-md-12">
		          <h2 class="h2 mb-3 mb-md-4 text-uppercase"><?php echo $data['manufac_tobi_section_heading_main']; ?></h2>
		        </div>
		      </div> 
	    	<?php endif ?>
	      <div class="row"> 
	      	<?php foreach($data['crb_manufac_indust_slider'] as $bgslider){ ?>
	        <div class="col-md-6"> 
	          <div class="zw-sand-casting-finish-card">
	            <div class="zw-hero-bg">
	              <figure>
	              	<img class="img-fit" src="<?php echo $bgslider['manufac_tobi_section_img']; ?>" alt="die-casting">
	                <div class="zw-overlay zw-overlay--lightBlue"></div>
	              </figure>
	            </div>
	            <div class="card-heading">
	              <!-- MIXIN OUR SERVICES LIST MIXIN-->
	              <h2 class="h2 mb-2 mb-md-3 text-uppercase"><?php echo $bgslider['manufac_tobi_section_heading']; ?></h2>
	              <p class="zw-section-lead__des zm-clr-gr4c mt-md-2"><?php echo $bgslider['manufac_tobi_section_sub_text']; ?></p>
	            </div>
	          </div>
	        </div>
	        <?php } ?>
	      </div>
	    </div>
	  </section>  
  <?php break; ?>

  <?php case 'manufac_service_section': ?>
		<section class="zw-die-casting-finishing-touch"> 
		  <div class="container"> 
		    <div class="row"> 
		      <div class="col-md-12">
		        <div class="zw-heading-container pb-md-5 pb-4">
		          <h2 class="h2 mb-md-0 text-uppercase"><?php echo $data['manufac_service_heading']; ?></h2>
		          <!-- Slider arrows-->
		          <div class="zw-slider-controlers-right-wrap zw-only-desktop">
		            <div class="zw-btn-arrow-left zw-circle zw-circle--sec zw-circle--lg swiper-button-prev swiper-button-prev__final">
		              <div class="zw-circle zw-circle--sec zw-circle--sm flex-center"><svg class="zw-arrow-icon" width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 1L1.5 5.5L6 10" stroke="#4C4A48" stroke-width="2"/></svg>
		              </div>
		            </div>
		            <div class="zw-btn-arrow-right zw-circle zw-circle--sec zw-circle--lg swiper-button-next swiper-button-next__final">
		              <div class="zw-circle zw-circle--sec zw-circle--sm flex-center"><svg class="zw-arrow-icon" width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5.5 5.5L1 10" stroke="#4C4A48" stroke-width="2"/></svg>
		              </div>
		            </div>
		          </div>
		        </div>
		        <!-- Slider main content-->
		        <div class="js-die-casting-finishing-touch swiper-container">
		          <ul class="swiper-wrapper mb-md-0">
		          	<?php 
		          		foreach($data['crb_manufac_indust_slider'] as $slider){
		          	?>
		            <li class="swiper-slide">
		              <div class="zw-hero-bg">
		                <figure>
		                	<img class="img-fit" src="<?php echo $slider['manufac_service_section_img']; ?>" alt="die-casting">
		                  <div class="zw-overlay zw-overlay--info"></div>
		                </figure>
		              </div>
		              <div class="card-heading">
		                <!-- MIXIN OUR SERVICES LIST MIXIN-->
		                <h2 class="h2 mb-2 mb-md-3 text-uppercase"><?php echo $slider['manufac_service_section_heading']; ?></h2>
		                <p class="zw-section-lead__des zm-clr-gr4c mt-md-2"><?php echo $slider['manufac_service_section_sub_text']; ?></p>
		              </div>
		            </li>
		            <?php } ?>
		          </ul>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>   	
  <?php break; ?>
  <?php case 'manufac_hero_horz_list': ?>
	<section class="zw-banner">
    <div class="container">
      <div class="row bg-blue zw-rowpanel-boxes__cnt">
        <div class="col-10 col-md-8">
          <h2 class="h2 zw-clr-fa text-uppercase mb-md-4"><?php echo $data['manufac_hero_horz_list_heading']; ?></h2>
        </div>
        <div class="col-12">
          <ul class="zw-unorder-list zw-unorder-list-five mb-0">
          	<?php foreach($data['manufac_hero_horz_list_comp'] as $list){ ?>
            <li><a class="zm-nav-link" href="#"><?php echo $list['manufac_hero_horz_list_item']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <?php break; ?>

  <?php case 'manufac_hero_horz_list_black_bg': ?>
  	<section class="zw-bg-black zw-only-mobile-hidden">
		  <div class="container">
		    <div class="row">
		      <div class="col-md-12">
		        <div class="zw-block-container pb-md-5 ps-4 ps-md-0">
		          <h2 class="h2 mb-0 mb-md-4 text-uppercase"><?php echo $data['manufac_hero_horz_list_heading_black_bg']; ?></h2>
		          <ul class="zw-unorder-list zw-unorder-list-five mb-0">
		          	<?php foreach ($data['manufac_hero_horz_list_comp_black_bg'] as $blist): ?>
		            <li><span class="zm-nav-link"><?php echo $blist['manufac_hero_horz_list_item_black_bg'] ?></span></li>
		            <?php endforeach ?>
		          </ul>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>
  <?php break; ?>
  <?php case 'manufac_tabs': ?>
    <section class="section-padding80 zw-explore-solution-lg manufact-tabs">
	    <div class="container"> 
	      <div class="zw-heading-container row">
	        <ul class="nav nav-pills col-md-12 pb-md-5 pt-md-4 pb-4" id="pills-tab" role="tablist">
    				<?php $i=0; foreach ($data['manufac_tabs_main'] as $mtab): ?>
		          <li class="nav-item" role="presentation">
		            <button class="nav-link <?php if($i == 0){echo "active";}else{echo " ";} ?>" id="pills-<?php echo $i; ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $i; ?>" type="button" role="tab" aria-controls="pills-<?php echo $i; ?>" aria-selected="true"><?php echo $mtab['manufac_tabs_title']; ?></button>
		          </li>
						<?php  $i++; endforeach; ?>
	        </ul>
	        <div class="tab-content" id="pills-tabContent col-md-12">
	        	<?php $tabnum=0; foreach ($data['manufac_tabs_main'] as $mtab): ?>
	          <div class="tab-pane fade <?php if($tabnum == 0){echo "show active";}else{echo " ";} ?>" id="pills-<?php echo $tabnum; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $tabnum; ?>-tab"> 
	            <div class="zw-block-panel-container">
	              <ul class="ZW-unOrderList--listnew mb-0">
	            		<?php $i=0; foreach ($mtab['manufac_tabs_content'] as $tabContent): ?>
	                <li>
	                  <p class="ZW-unOrderList__desc"><?php echo $tabContent['manufac_tabs_txt']; ?></p>
	                </li>
									<?php $i++; endforeach ?>
	              </ul>
	            </div>
	          </div>
	          <?php  $tabnum++; endforeach; ?>
	        </div>
				</div>
	    </div>
	  </section>
  <?php break; ?>
  <?php case 'manufac_hero_bg_with_horzintal_list': ?>
	  <section class="zw-banner zw-section-padding65 pb-0">
	    <div class="position-relative">
	      <div class="zw-banner__heading">
	      	<img class="img-fit zw-hero-fig" src="<?php echo $data['manufac_hero_bg_img']; ?>" alt="Banner image">
	        <div class="zw-overlay zw-overlay--dang"></div>
	      </div>
	    </div>
	    <div class="container">
	      <div class="row">
	        <div class="col-12">
	          <div class="zw-rowpanel-boxes">
	          	<?php foreach ($data['manufac_hero_bg_with_horzintal_main_list'] as $mbox): ?>
		            <div class="<?php if($mbox['manufac_hero_bg_with_horzintal_section_bg'] == "1"){echo "bg-black";}elseif($mbox['manufac_hero_bg_with_horzintal_section_bg'] == "2"){echo "bg-blue";} ?> zw-rowpanel-boxes__cnt">
		              <h2 class="h2 zw-clr-fa text-uppercase mb-md-4"><?php echo $mbox['manufac_tabs_title'] ?></h2>
		              <ul class="zw-unorder-list zw-unordemanufac_hero_bg_with_horzintal_section_bg zw-unorder-list-five">
		              	<?php foreach ($mbox['manufac_hero_bg_with_horzintal_main_item'] as $boxdata): ?>
		                <li>
		                	<a class="zm-nav-link" href=""><?php echo $boxdata['manufac_hero_bg_with_horzintal_txt']; ?></a>
		                </li>
		                <?php endforeach ?>
		              </ul>
		            </div>
							<?php endforeach ?>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
  <?php break; ?>

  <?php case 'manufac_status': ?>
		<section class="zw-banner zw-section-padding65 pb-0">
			<div class="position-relative">
			  <div class="zw-banner__heading">
			  	<img class="img-fit zw-hero-fig zw-hero-fig--sm" src="<?php echo $data['manufac_status_img']; ?>" alt="Banner image">
			    <div class="zw-overlay zw-overlay--dang"></div>
			  </div>
			  <div class="zw-hero-cnt-box">
			    <!-- Overlay text info-->
			    <div class="container">
			      <div class="row">
			        <div class="col-12 text-center">
			          <h3 class="h2 zw-clr-fa text-uppercase mb-md-5 pb-3"><?php echo $data['manufac_status_stitle']; ?></h3>
			        </div>
			        <div class="col-12">
			          <div class="bg-black">
			            <ul class="zw-operations-list mb-0">
			            	<?php foreach ($data['manufac_status_rep'] as $statusData): ?>
			              <li class="zw-operations-list__item">
			              	<span class="fnt-24 mb-0 mb-md-2 zw-operations-list__title"><?php echo $statusData['manufac_status_txt'] ?></span>
			                <p><?php echo $statusData['manufac_status_stxt'] ?></p>
			              </li>
			              <?php endforeach ?>
			            </ul>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</section>
  <?php break; ?>
	<?php 
	 }}
	?>
  <section class="zw-explore-solution zw-section-paddingb90">
    <div class="container"> 
      <div class="row"> 
        <div class="col-md-12"> 
          <h2 class="h2 text-uppercase me-5 me-md-0">Explore our Solutions</h2>
          <div class="zw-heading-container pb-md-5 pt-md-4 pb-4">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Manufacturing processes</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Manufacturing For industries</button>
              </li>
            </ul>
            <div>
              <div class="zw-slider-controlers-right-wrap zw-only-desktop">
                <div class="zw-btn-arrow-left zw-circle zw-circle--sec zw-circle--lg swiper-button-prev swiper-button-prev__explore">
                  <div class="zw-circle zw-circle--sec zw-circle--sm flex-center"><svg class="zw-arrow-icon" width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 1L1.5 5.5L6 10" stroke="#4C4A48" stroke-width="2"/></svg>
                  </div>
                </div>
                <div class="zw-btn-arrow-right zw-circle zw-circle--sec zw-circle--lg swiper-button-next swiper-button-next__explore">
                  <div class="zw-circle zw-circle--sec zw-circle--sm flex-center"><svg class="zw-arrow-icon" width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5.5 5.5L1 10" stroke="#4C4A48" stroke-width="2"/></svg>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"> 
              <div class="js-die-casting-explore-solution swiper-container">
                <ul class="swiper-wrapper">
									<?php
									  $args = array(
									    'post_type' => 'manufacturing',
									    'posts_per_page' => -1,
									    'order' => 'ASC',
									    	'tax_query' => array(
									        array(
									        'taxonomy' => 'manufacturingType',
									        'terms' => 'manufacturing-processes',
									        'field' => 'slug',
									        'operator' => 'IN',
									    	),
									    )
									  );
									  $team = new WP_Query($args);
									?>
									<?php if($team->have_posts()) : ?>
									  <?php while($team->have_posts()) : $team->the_post();?>
											<li class="swiper-slide">
												<a href="<?php the_permalink(); ?>">
			                    <div class="zw-hero-bg">
			                      <figure>
			                      	<img class="img-fit" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
			                        <div class="zw-overlay zw-overlay--info"></div>
			                      </figure>
			                    </div>
			                    <div class="card-heading">
			                      <h4 class="fnt-28 text-white mb-md-0 text-uppercase fnt-gow fnt-18-resp"><?php the_title(); ?></h4>
			                    </div>
		                  	</a>
		                  </li>
									  <?php endwhile; wp_reset_query(); ?>
									<?php endif ?>
                </ul>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="js-die-casting-manufacturing-industries swiper-container"> 
                <ul class="swiper-wrapper">
									<?php
									  $args = array(
									    'post_type' => 'manufacturing',
									    'posts_per_page' => -1,
									    'order' => 'ASC',
									    	'tax_query' => array(
									        array(
									        'taxonomy' => 'manufacturingType',
									        'terms' => 'manufacturing-for-industries',
									        'field' => 'slug',
									        'operator' => 'IN',
									    	),
									    )
									  );
									  $team = new WP_Query($args);
									?>
									<?php if($team->have_posts()) : ?>
										<?php while($team->have_posts()) : $team->the_post();?>
		                  <li class="swiper-slide">
		                  	<a href="<?php the_permalink(); ?>">
			                    <div class="zw-hero-bg">
			                      <figure>
			                      	<img class="img-fit" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
			                        <div class="zw-overlay zw-overlay--info"></div>
			                      </figure>
			                    </div>
			                    <div class="card-heading">
			                      <h4 class="fnt-28 text-white mb-md-0 text-uppercase fnt-gow fnt-18-resp"><?php the_title(); ?></h4>
			                    </div>
		                  	</a>
		                  </li>
										<?php endwhile; wp_reset_query(); ?>
									<?php endif ?>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

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
