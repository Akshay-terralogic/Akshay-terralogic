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
global $gdir;
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
                <a class="nav-link active" href="<?php echo get_site_url(); ?>/case-studies/">Case studies</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?php echo get_site_url(); ?>/blog/">Blogs</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?php echo get_site_url(); ?>/media-assets/">Media Assets</a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <!-- banner -->
              <div class="zw-res-studies-bnr"> 
                <div class="bnr-heading"> 
                  <h2 class="h1 zw-clr-fa text-uppercase mb-4 mb-md-0"> Our stories </h2>
                  <img src="<?php echo $gdir; ?>/img/resources/case-studies/bnr.png" alt="blog1">
                </div>
              </div>
              <!-- banner Ends-->
              <!-- case studies -->
              <div class="section-press-release zw-section-paddingb60"> 
                <div class="row"> 
                  <div class="col-md-12"> 
                    <div class="d-flex justify-content-between mb-4 pb-md-3 align-items-center">
                      <h2 class="h4 text-uppercase fnt-gow">Case studies </h2>
                    </div>
                  </div>
                  <div class="col-md-7"> 
                    <div class="content">
                    <?php
                      $args = array(
                        'post_type' => 'case-studies',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                            'taxonomy' => 'case-study-type',
                            'terms'    =>  array('featured-post'),
                            'field'    => 'slug',
                            'operator' => 'IN',
                          ),
                        )
                      );
                      $team = new WP_Query($args);
                      
                    ?>
                    <?php if($team->have_posts()) : ?>
                      <?php while($team->have_posts()) : $team->the_post(); ?>
                        <?php if (!empty(carbon_get_the_post_meta( 'crb_cs_video_link' ))) { ?>
                          <a class="text-decoration-none blog-post" id="resource-caseStudy" href="<?php echo carbon_get_the_post_meta( 'crb_cs_video_link' ); ?>" target="_blank"> 
                          <?php }elseif(!empty(carbon_get_the_post_meta( 'crb_cs_pdf' ))){ ?>                          
                          <a class="text-decoration-none blog-post" id="resource-caseStudy" href="<?php echo carbon_get_the_post_meta( 'crb_cs_pdf' ); ?>" target="_blank"> 
                          <?php }elseif(empty(carbon_get_the_post_meta( 'crb_cs_pdf' ) && carbon_get_the_post_meta( 'crb_pr_video_link' ))){ ?>
                          <a class="text-decoration-none blog-post" id="resource-caseStudy" href="<?php the_permalink(); ?>" target="_blank"> 
                          <?php } ?>
                        <div class="img">
                          <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="info"> 
                          <div class="blog-post">
                            <h4 class="zw-clr-fa fnt-gow-bold h3 fnt-14-resp"><?php the_title(); ?></h4>
                          </div>
                        </div>
                      </a>
                      <?php endwhile; wp_reset_query(); ?>
                    <?php endif ?>

                    </div>
                  </div>
                  <div class="col-md-5"> 
                    <ul class="mb-md-0">
                    <?php
                      $args = array(
                        'post_type' => 'case-studies',
                        'posts_per_page' => 4,
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                            'taxonomy' => 'case-study-type',
                            'terms'    =>  array('featured-list'),
                            'field'    => 'slug',
                            'operator' => 'IN',
                          ),
                        )
                      );
                      $team = new WP_Query($args);
                    ?>
                    <?php if($team->have_posts()) : ?>
                      <?php while($team->have_posts()) : $team->the_post();?>
                      <li> 
                        <?php if (!empty(carbon_get_the_post_meta( 'crb_cs_video_link' ))) { ?>
                          <a class="text-decoration-none row" id="resource-caseStudy" href="<?php echo carbon_get_the_post_meta( 'crb_cs_video_link' ); ?>" target="_blank"> 
                          <?php }elseif(!empty(carbon_get_the_post_meta( 'crb_cs_pdf' ))){ ?>                          
                          <a class="text-decoration-none row" id="resource-caseStudy" href="<?php echo carbon_get_the_post_meta( 'crb_cs_pdf' ); ?>" target="_blank"> 
                          <?php }elseif(empty(carbon_get_the_post_meta( 'crb_cs_pdf' ) && carbon_get_the_post_meta( 'crb_pr_video_link' ))){ ?>
                          <a class="text-decoration-none row" id="resource-caseStudy" href="<?php the_permalink(); ?>" target="_blank"> 
                          <?php } ?>
                          <div class="col-4 col-md-3"> 
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                          </div>
                          <div class="col-8 col-md-9">
                            <div class="blog-post">
                              <h4 class="fnt-gow-bold zw-clr-pri-opa h3 fnt-16-resp"><?php the_title(); ?></h4>
                              <p><?php echo wp_trim_words(get_the_content(), 6)."..."; ?></p>
                            </div>
                          </div>
                        </a>
                      </li>
                      <?php endwhile; wp_reset_query(); ?>
                    <?php endif ?>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- case studies videos-->
              <div class="section-latest-blog zw-section-paddingb90"> 
                <div class="row"> 
                  <div class="col-md-12"> 
                    <div class="d-flex justify-content-between align-items-center">
                      <h2 class="h4 text-uppercase fnt-gow mb-4 pb-md-3">Case study video</h2>
                    </div>
                    <div class="js-resources-cards swiper-container"> 
                      <div class="row swiper-wrapper">
                      <?php
                        $args = array(
                          'post_type' => 'case-studies',
                          'posts_per_page' => -1,
                          'order' => 'ASC',
                          'tax_query' => array(
                              array(
                              'taxonomy' => 'case-study-type',
                              'terms'    =>  array('featured-list','featured-post'),
                              'field'    => 'slug',
                              'operator' => 'NOT IN',
                            ),
                          )
                        );
                        $team = new WP_Query($args);
                        $count = 0;
                      ?>
                      <?php if($team->have_posts()) : ?>
                        <?php while($team->have_posts()) : $team->the_post();?>
                        <div class="col-md-3 swiper-slide">
                          <a class="text-decoration-none" href="javascript:void(0);" type="button" data-bs-toggle="modal" data-bs-target="#staticvideo<?php echo $count;?>"> 
                            <div class="mb-md-4 position-relative">
                              <img class="img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="blog1">
                              <div class="vedio-play">
                                <img src="<?php echo $gdir; ?>/img/resources/media-assets/vedio-play.svg" alt="">
                              </div>
                            </div>
                            <div class="info">
                              <h4 class="fnt-gow-bold h3 fnt-14-resp mb-md-0 mb-4 zw-clr-pri-opa">
                                <?php the_title(); ?>
                              </h4>
                            </div>
                          </a>
                        </div>
                        <?php $count++; endwhile; wp_reset_query(); ?>
                      <?php endif ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--model-->
              <?php
                $args = array(
                  'post_type' => 'case-studies',
                  'posts_per_page' => -1,
                  'order' => 'ASC',
                  'tax_query' => array(
                      array(
                      'taxonomy' => 'case-study-type',
                      'terms'    =>  array('featured-list','featured-post'),
                      'field'    => 'slug',
                      'operator' => 'NOT IN',
                    ),
                  )
                );
                $team = new WP_Query($args);
                $count = 0;
              ?>
              <?php if($team->have_posts()) : ?>
                <?php while($team->have_posts()) : $team->the_post();?>
                  <div class="modal fade c-model" id="staticvideo<?php echo $count; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticvideoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header d-block">
                          <div class="main-head"> 
                            <p class="c-date fnt-16"><?php echo get_the_date('F j, Y'); ?></p>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="sub-head mt-2"> 
                            <h3 class="c-head"><?php the_title(); ?></h3>
                          </div>
                        </div>
                        <div class="modal-body p-0"> 
                          <div class="c-img">
                            <iframe class="iframe-video-popup" src="<?php echo carbon_get_the_post_meta( 'crb_cs_video_link' ) ?>" allowfullscreen=""></iframe>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php $count++; endwhile; wp_reset_query(); ?>
              <?php endif ?>
              <section class="zw-explore-solution">
                <div class="row"> 
                  <div class="col-md-12"> 
                    <h2 class="h2 text-uppercase me-5 me-md-0">Explore our Solutions</h2>
                    <div class="zw-heading-container pb-md-5 pt-4 pb-4">
                      <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-process-tab" data-bs-toggle="pill" data-bs-target="#pills-process" type="button" role="tab" aria-controls="pills-process" aria-selected="true">Manufacturing processes</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-industries-tab" data-bs-toggle="pill" data-bs-target="#pills-industries" type="button" role="tab" aria-controls="pills-industries" aria-selected="false">Manufacturing For industries</button>
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
                      <div class="tab-pane fade show active" id="pills-process" role="tabpanel" aria-labelledby="pills-process-tab"> 
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
                                    'terms'    =>  array('manufacturing-processes'),
                                    'field'    => 'slug',
                                    'operator' => 'IN',
                                  ),
                                )
                              );
                              $team = new WP_Query($args);
                            ?>
                            <?php if($team->have_posts()) : ?>
                              <?php while($team->have_posts()) : $team->the_post();?>
                                <li class="swiper-slide">
                                  <div class="zw-hero-bg">
                                    <figure><img class="img-fit" src="<?php echo $gdir; ?>/img/die-casting/die-casting.png" alt="die-casting">
                                      <div class="zw-overlay zw-overlay--info"></div>
                                    </figure>
                                  </div>
                                  <div class="card-heading">
                                    <h4 class="fnt-28 text-white mb-md-0 text-uppercase fnt-gow fnt-18-resp">Die Casting</h4>
                                  </div>
                                </li>
                              <?php endwhile; wp_reset_query(); ?>
                            <?php endif ?>
                          </ul>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="pills-industries" role="tabpanel" aria-labelledby="pills-industries-tab">
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
                                    'terms'    =>  array('manufacturing-for-industries'),
                                    'field'    => 'slug',
                                    'operator' => 'IN',
                                  ),
                                )
                              );
                              $team = new WP_Query($args);
                            ?>
                            <?php if($team->have_posts()) : ?>
                              <?php while($team->have_posts()) : $team->the_post();?>
                              <li class="swiper-slide">
                                <div class="zw-hero-bg">
                                  <figure>
                                    <img class="img-fit" src="<?php echo get_template_directory_uri(); ?>" alt="die-casting">
                                    <div class="zw-overlay zw-overlay--info"></div>
                                  </figure>
                                </div>
                                <div class="card-heading">
                                  <h4 class="fnt-28 text-white mb-md-0 text-uppercase fnt-gow fnt-18-resp"><?php the_title(); ?></h4>
                                </div>
                              </li>
                              <?php endwhile; wp_reset_query(); ?>
                            <?php endif ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
