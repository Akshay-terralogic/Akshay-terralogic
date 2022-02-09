<?php
/**
 * The template for displaying archive-press-release pages
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
                <a class="nav-link active" href="<?php echo get_site_url(); ?>/press-release/"> Press release</a>
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
                <a class="nav-link" href="<?php echo get_site_url(); ?>/media-assets/">Media Assets</a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"> 
              <!-- blogs-->
              <div class="section-press-release"> 
                <div class="row"> 
                  <div class="col-md-7"> 
                    <div class="content">
                      <?php
                        $args = array(
                          'post_type' => 'press-release',
                          'posts_per_page' => -1,
                          'order' => 'ASC',
                          'tax_query' => array(
                              array(
                              'taxonomy' => 'press-release-type',
                              'terms'    => 'featured-post',
                              'field'    => 'slug',
                              'operator' => 'IN',
                            ),
                          )
                        );
                        $team = new WP_Query($args);
                      ?>
                      <?php if($team->have_posts()) : ?>
                        <?php while($team->have_posts()) : $team->the_post();?>
                          <?php if (!empty(carbon_get_the_post_meta( 'crb_pr_video_link' ))) { ?>
                          <a class="text-decoration-none" href="<?php echo carbon_get_the_post_meta( 'crb_pr_video_link' ); ?>" target="_blank"> 
                          <?php }elseif(!empty(carbon_get_the_post_meta( 'crb_pr_pdf' ))){ ?>                          
                          <a class="text-decoration-none" href="<?php echo carbon_get_the_post_meta( 'crb_pr_pdf' ); ?>" target="_blank"> 
                          <?php }elseif(empty(carbon_get_the_post_meta( 'crb_pr_pdf' ) && carbon_get_the_post_meta( 'crb_pr_video_link' ))){ ?>
                          <a class="text-decoration-none" href="<?php the_permalink(); ?>" target="_blank"> 
                          <?php } ?>
                            <div class="img"> 
                              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <div class="info"> 
                              <p class="fnt-gow-bold zw-clr-fa mb-2 fnt-16"><?php echo get_the_date('F j, Y'); ?></p>
                              <h4 class="zw-clr-fa fnt-gow-bold h3 fnt-14-resp"><?php the_title(); ?></h4>
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
                          'post_type' => 'press-release',
                          'posts_per_page' => 3,
                          'order' => 'DESC',
                          'tax_query' => array(
                              array(
                              'taxonomy' => 'press-release-type',
                              'terms'    => 'featured-list',
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
                            <?php if (!empty(carbon_get_the_post_meta( 'crb_pr_video_link' ))) { ?>
                            <a class="text-decoration-none row" href="<?php echo carbon_get_the_post_meta( 'crb_pr_video_link' ); ?>" target="_blank"> 
                            <?php }elseif(!empty(carbon_get_the_post_meta( 'crb_pr_pdf' ))){ ?>                          
                            <a class="text-decoration-none row" href="<?php echo carbon_get_the_post_meta( 'crb_pr_pdf' ); ?>" target="_blank"> 
                            <?php }elseif(empty(carbon_get_the_post_meta( 'crb_pr_pdf' ) && carbon_get_the_post_meta( 'crb_pr_video_link' ))){ ?>
                            <a class="text-decoration-none row" href="<?php the_permalink(); ?>" target="_blank"> 
                            <?php } ?>
                              <div class="col-4 col-md-3"> 
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                              </div>
                              <div class="col-8 col-md-9">
                                <div class="blog-post">
                                  <p class="fnt-gow-bold mb-2 zw-clr-pri-opa fnt-16"><?php echo get_the_date('F j, Y'); ?></p>
                                  <h4 class="fnt-gow-bold zm-clr-pri h3 fnt-16-resp"><?php the_title(); ?></h4>
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
              <!-- cards-->
              <div class="section-press-cards section-padding80"> 
                <div class="row">
                  <div class="col-md-12">
                    <?php
                      $args = array(
                        'post_type' => 'press-release',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                            'taxonomy' => 'press-release-type',
                            'terms'    =>  array('featured-list','featured-post'),
                            'field'    => 'slug',
                            'operator' => 'NOT IN',
                          ),
                        )
                      );
                      $team = new WP_Query($args);
                    ?>
                    <?php if($team->have_posts()) : ?>
                      <?php while($team->have_posts()) : $team->the_post();?>

                      <?php endwhile; wp_reset_query(); ?>
                    <?php endif ?>
                  </div>
                </div>
              </div>
              <!-- explre solution-->
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
                                    <div class="zw-hero-bg">
                                      <figure>
                                        <img class="img-fit" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
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
                                    <div class="zw-hero-bg">
                                      <figure>
                                        <img class="img-fit" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
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
