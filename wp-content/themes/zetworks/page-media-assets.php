<?php
  /**
   * Template Name: Media Assets
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
  <section class="zw-resources-tabs zw-section-paddingb90">
    <div class="container"> 
      <div class="row"> 
        <div class="col-md-12"> 
          <div class="zw-heading-container pb-md-5 pt-4 pb-4">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?php echo get_site_url(); ?>/press-release/"> Press release</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?php echo get_site_url(); ?>/media-coverage/">Media coverage</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?php echo get_site_url(); ?>/case-studies/">Case studies</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?php echo get_site_url(); ?>/blog/">Blogs</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?php echo get_site_url(); ?>/media-assets/">Media Assets</a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

              <div class="row justify-content-between"> 
                <div class="col-md-4 col-lg-2">
                  <div class="ui dropdown c-media-dropdown">
                    <input type="hidden" name="sort">
                    <div class="default text">Videos</div><i class="dropdown icon"></i>
                    <div class="menu menu--resDropdown">
                      <div class="item" data-value="1" data-id="vedio-wrp">Videos</div>
                      <div class="item" data-value="0" data-id="photo-wrp">Photo</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="m-card-wrp">
                <?php 
                  $mediaAssets = carbon_get_the_post_meta( 'crb_ma_section' );
                  foreach ( $mediaAssets as $media_assets ) {
                    switch ( $media_assets['_type'] ) { 
                      case 'crb_ma_video':
                ?>
                  <div class="vedio-wrp resource-media-wrap active">
                    <div class="row m-card-wrp__container"> 
                      <?php $videCount = 0; foreach ( $media_assets['crb_ma_video_complex'] as $video ) { ?>
                      <div class="col-6 col-md-4 m-card-wrp__card">
                        <a class="text-decoration-none w-100" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticvideo-<?php echo $videCount; ?>"> 
                          <div class="m-card-wrp__img-wrp"> 
                            <img class="card-img" src="<?php echo $video['crb_ma_vide_thumbnail']; ?>" alt="">
                            <div class="vedio-play">
                              <img src="<?php echo $gdir; ?>/img/resources/media-assets/vedio-play.svg" alt="">
                            </div>
                          </div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp"><?php echo $video['crb_ma_title'] ?></h4>
                          </div>
                        </a>
                      </div>
                    <?php $videCount++; } ?>
                    </div>
                  </div>
                  <?php $videCount = 0; foreach ( $media_assets['crb_ma_video_complex'] as $video ) { ?>
                  <div class="modal fade c-model" id="staticvideo-<?php echo $videCount; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticvideoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header d-block">
                          <div class="main-head"> 
                            <p class="c-date fnt-16"><?php echo $video['crb_ma_date'] ?></p>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="sub-head mt-2"> 
                            <h3 class="c-head"><?php echo $video['crb_ma_title'] ?></h3>
                          </div>
                        </div>
                        <div class="modal-body p-0"> 
                          <div class="c-img">
                            <iframe class="iframe-video-popup" src="<?php echo $video['crb_ma_vide_url'] ?>" allowfullscreen=""></iframe>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php $videCount++; } ?>
                <?php
                  break;
                ?>
                <?php
                case 'crb_ma_image':
                ?>

                <div class="photo-wrp resource-media-wrap">
                  <div class="zw-heading-container pb-md-5 pb-3">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                      <?php $imgCount = 0; foreach ( $media_assets['crb_ma_image_complex'] as $video ) { ?>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link nav-link--small <?php if($imgCount == 0){echo "active"; }?>" id="pills-home-<?php echo $imgCount; ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-home-<?php echo $imgCount; ?>" type="button" role="tab" aria-controls="pills-home-<?php echo $imgCount; ?>" aria-selected="true"><?php echo $video['crb_mai_tab_heading']; ?></button>
                        </li>
                      <?php $imgCount++; } ?>
                    </ul>
                  </div>
                  <div class="tab-content" id="pills-tabContent">
                    <?php 
                    $imgCount = 0;

                    foreach ( $media_assets['crb_ma_image_complex'] as $image ) {
                      ?>
<div class="tab-pane fade <?php if($imgCount == 0 ){echo "show active";} ?>" id="pills-home-<?php echo $imgCount; ?>" role="tabpanel" aria-labelledby="pills-home-<?php echo $imgCount; ?>-tab"> 
                       <div class="row m-card-wrp__container">
                      <?php
                      foreach ( $image['crb_ma_image_loop'] as $img ) { ?>
                      
                        <a class="col-6 col-md-4 m-card-wrp__card js-modal-popup" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?php echo $imgCount; ?>">
                          <div class="m-card-wrp__img-wrp"> 
                            <img class="card-img" src="<?php echo $img['crb_mai_image'] ?>" alt="">
                          </div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp"><?php echo $img['crb_mai_title'] ?></h4>
                            <p class="info"><?php echo $img['crb_mai_sub_text'] ?></p>
                          </div>
                        </a>

                    <?php   }?>
                  </div>  
                </div>

                 <?php $imgCount++;}?>
                  </div>
                </div>
                <?php $imgCount = 0; foreach ( $media_assets['crb_ma_image_complex'] as $image ) { 
                  foreach ( $image['crb_ma_image_loop'] as $img ) { ?>
                  <div class="modal fade c-model" id="staticBackdrop-<?php echo $imgCount; ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header d-block">
                          <div class="main-head"> 
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="sub-head mt-2"> 
                            <h3 class="c-head"><?php echo $img['crb_mai_title'] ?></h3>
                            <p class="c-desc"><?php echo $img['crb_mai_sub_text'] ?></p>
                          </div>
                        </div>
                        <div class="modal-body p-0"> 
                          <div class="c-img">
                            <img src="<?php echo $img['crb_mai_image'] ?>" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php $imgCount++; }} ?>
                <?php
                break;
                ?>
                <?php }} ?>


                
              </div>

              <!--model-->



              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>



<?php
get_footer();?>
