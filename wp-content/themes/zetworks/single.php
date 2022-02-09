<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package theme_name
 */

get_header();
$t_options = get_option('tp_opt');
global $gdir;

$socialMedia_url = urlencode(get_permalink());
$socialMedia_Title = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
$socialMedia_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id());

// Construct sharing URL without using any script
$twitterURL = 'https://twitter.com/intent/tweet?text='.$socialMedia_Title.'&amp;url='.$socialMedia_url;
$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$socialMedia_url;
$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$socialMedia_url.'&amp;title='.$socialMedia_Title;
?>

<main class="zw-topspace7">
  <section>
    <div class="container"> 
      <div class="row"> 
        <div class="col-md-2 col-4"> 
          <a class="zw-backpage mb-4 text-decoration-none" href="<?php echo get_site_url() ?>/blog/">
            <i class="icon icon-arrow zw-backpage__icon-black me-2"></i>
            <p class="fnt-gow-bold zw-backpage__text-black">Blogs</p>
          </a>
        </div>
        <div class="col-12"> 
          <h2 class="h2 zm-clr-pri text-uppercase txtWid400"><?php the_title(); ?></h2>
        </div>
        <div class="col-md-7">
          <div class="mt-md-5 mt-4 pt-md-3">
            <img class="w-100 mb-4" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <div class="mb-4 justify-content-between d-flex align-items-start"> 
              <p class="fnt-gow-bold zm-clr-gr4c"><?php echo get_the_date('F j, Y'); ?></p>
              <div class="d-flex align-items-center">
                <p class="fnt-gow-bold zm-clr-gr4c me-3">Share</p>
                <a class="me-md-3 me-2" href="">
                  <img src="<?php echo $gdir; ?>/img/resources/instagram.svg" alt="insta">
                </a>
                <a class="me-md-3 me-2" href="<?php echo $twitterURL; ?>" target="_blank">
                  <img src="<?php echo $gdir; ?>/img/resources/twitter.svg" alt="twitter">
                </a>
                <a href="">
                  <img src="<?php echo $gdir; ?>/img/resources/youtube.svg" alt="youtube">
                </a>
              </div>
            </div>
            <div class="pb-md-2 pb-4"> 
              <?php
                $blogBlocks = carbon_get_the_post_meta( 'crb_post_section' );
                foreach ( $blogBlocks as $blog ) {
                switch ( $blog['_type'] ) { 
                case 'paragraph':
              ?>
                <p class="zm-clr-gr4c fnt-21 fnt-bitter mb-3"><?php echo $blog['crb_blog_paragraph']; ?></p>
              <?php
                break;
              ?>
              <?php
                case 'heading':
              ?>
                <h4 class="zm-clr-gr4c fnt-21 fnt-bitter mb-3 fnt-700"><?php echo $blog['crb_blog_heading']; ?></h4>
              <?php
                break;
              ?>
              <?php
                case 'image':
              ?>
                <img class="w-100 mb-3" src="<?php echo $blog['crb_blog_img']; ?>">
              <?php
                break;
              ?>

              <?php
                case 'video': 
              ?>
              <p class="zm-clr-gr4c fnt-21 fnt-bitter mb-3 fnt-500">Video: <a class="txt-drkblue" href="<?php echo $blog['crb_blog_tiny_url']; ?>" target="_blank"><?php echo $blog['crb_blog_tiny_url']; ?></a></p>
              <?php if ($blog['crb_blog_video']): ?>
                <iframe class="iframe-video" src="<?php echo $blog['crb_blog_video']; ?>" allowfullscreen=""></iframe>
              <?php endif ?>
              <?
              break;

              default:
              ?>
              <p class="zm-clr-gr4c fnt-21 fnt-bitter mb-3"><?php echo $blog['crb_blog_paragraph']; ?></p>
              <?php
                }}
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <h3 class="fnt-gow-bold h3 text-uppercase fnt-24-resp">Related </h3>
          <ul class="mb-md-0 section-press-release mt-4 pt-md-2 pt-xxlg-1"> 
            <?php
              $postId = get_the_ID();
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'order' => 'ASC',
                'order_by' => 'rand',
                'post__not_in' => array($postId),
              );
              $postQuery = new WP_Query($args);
            ?>
            <?php if($postQuery->have_posts()) : ?>
              <?php while($postQuery->have_posts()) : $postQuery->the_post();?>
                <li>
                  <a class="text-decoration-none row" href="" target="_blank">
                    <div class="col-4 col-md-3"> 
                      <div class="singleBlogListThumb">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                      </div>
                    </div>
                    <div class="col-8 col-md-9">
                      <div class="blog-post">
                        <p class="fnt-gow-bold mb-2 zw-clr-pri-opa fnt-16"><?php echo get_the_date('F j, Y'); ?></p>
                        <h4 class="fnt-gow-bold zw-clr-pri-opa h3 fnt-16-resp"><?php the_title(); ?></h4>
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
  </section>
  <!--Free quote  -->
  <section class="bg-blue zw-hero-panel">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1 col-xxl-8 offset-xxl-2 d-flex align-items-md-center flex-colum-mb">
          <div class="zw-hero-panel__cnt-info pe-4 pe-md-0">
            <h3 class="h2">Do you want a free quote in 24 hours?</h3>
            <p class="fnt-16 zm-clr-gre4">Sign up for a free trial and find out how Zetwerk makes Manufacturing simple.</p>
            <a class="zw-btn zw-btn--default mt-4 mt-md-5" href="<?php echo get_site_url(); ?>/contact-us/">
              <span>Get in touch</span>
              <img class="ms-3" src="<?php echo $gdir; ?>/img/icons/arrow-white.svg" alt="Arrow image">
            </a>
          </div>
          <div class="zw-hero-panel__figwrap mb-3 mb-md-0">
            <img class="img-fit" src="<?php echo $gdir; ?>/img/home/free-quote.svg" alt="illustartion">
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
?>