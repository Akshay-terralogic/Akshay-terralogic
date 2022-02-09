<?php
  /**
   * Template Name: Search
   *
   * This is the most generic template file in a WordPress theme
   * and one of the two required files for a theme (the other being style.css).
   * It is used to display a page when nothing more specific matches a query.
   * E.g., it puts together the home page when no home.php file exists.
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package theme_name
  */
  get_header();
  $t_options = get_option('tp_opt');
  global $gdir;
?>

<main class="zw-topspace7">
  <!--Banner-->
  <section class="search-results-wrap">
    <div class="container">
      <div class="row">
      	<form class="ui form segment" method="get" action="<?php print site_url(); ?>">
          <div class="field position-relative">
            <input class="searchinput" placeholder="Search Here" name="s" value="<?php if(isset($_GET['s'])){print $_GET['s'];} ?>">
            <div class="search-icon"><svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 19a8 8 0 100-16 8 8 0 000 16zm9.998 2l-4.35-4.35" stroke="#FAF3E7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          </div>
          <select id="dynamic_select">
            <option class="<?php echo (!isset($_GET['post_type']) ? 'current' : false); ?>" value="<?php echo home_url(); ?>?s=<?php echo get_search_query(); ?>">All</option>
            <option class="<?php search_filter_get_post_type('press-release'); ?>" value="<?php echo home_url(); ?>?s=<?php echo get_search_query(); ?>&post_type=press-release">Press Release</option>
            <option class="<?php search_filter_get_post_type('media-coverage'); ?>" value="<?php echo home_url(); ?>?s=<?php echo get_search_query(); ?>&post_type=media-coverage">Media Coverage</option>
            <option class="<?php search_filter_get_post_type('case-studies'); ?>" value="<?php echo home_url(); ?>?s=<?php echo get_search_query(); ?>&post_type=case-studies">Case Studies</option>
            <option class="<?php search_filter_get_post_type('post'); ?>" value="<?php echo home_url(); ?>?s=<?php echo get_search_query(); ?>&post_type=post">Blog</option>
            <option class="<?php search_filter_get_post_type('manufacturing'); ?>" value="<?php echo home_url(); ?>?s=<?php echo get_search_query(); ?>&post_type=manufacturing">Manufacturing</option>
          </select>
        </form>
      </div>
    </div>
  </section>
  <!-- Search box-->
  <section class="zw-results-cnt">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
					<?php if (have_posts()) : while ( have_posts() ) : the_post();?>
					  <div class="zw-results-card">
					    <div class="zw-results-card__figwrap">
                <?php if (!empty(get_the_post_thumbnail_url())) { ?>
                  <img class="zw-148x148" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                <?php
                }else{?>
					    	  <img src="<?php echo $gdir; ?>/img/results.png" class="zw-148x148" alt="">
                <?php } ?>
					    </div>
					    <div class="zw-results-card__cnt">
					      <h6 class="zw-results-card__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
					      <p class="zw-results-card__des"><?php the_content(); ?></p>
					    </div>
					  </div>
						<?php endwhile; else : ?>
						<p>Sorry no posts matched your criteria.</p>
					<?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <!--Free quote	-->
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
?>
<script>
jQuery(document).ready(function () {
  jQuery(function(){
    // bind change event to select
    jQuery('#dynamic_select').on('change', function () {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
          window.location = url; // redirect
        }
        return false;
    });
  });
  //Select based on Class
  if ($("#dynamic_select option").hasClass("current")) {
    $(".current").attr('selected','selected');
  }
});
</script>