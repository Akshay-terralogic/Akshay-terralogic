<?php
  use Carbon_Fields\Container;
  use Carbon_Fields\Field;
  add_action( 'after_setup_theme', 'crb_load' );
  function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
/**
**********************
*
  =Theme Support
*
**********************
*/
function them_support(){
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails', array('post', 'page','press-release','media-coverage','case-studies','manufacturing'));
  add_theme_support('html5');
  add_theme_support('search-form');
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'them_support');

/**
**********************
*
  =Upload Size
*
**********************
*/
@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');

/**
**********************
*
  =JQuery In Footer
*
**********************
*/
function starter_scripts(){
  wp_deregister_script( 'jquery'); //Removes the Script
  wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, true ); //Include Jquery
  wp_enqueue_script( 'jquery' ); //Adds the Scripts
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );
/**
********************************************
*
  =Tweaks, Enqueue Script & Styles
*
********************************************
*/
require_once 'inc/enqueue.php';
require_once 'inc/junk_remove.php';
require_once 'inc/bfi_thumb.php';
require_once 'inc/post-type.php';
require_once 'inc/custom-admin-welcome.php';
require_once 'inc/admin/codestar-framework.php';
require_once 'inc/admin-options.php';
require_once 'inc/metaboxs.php';



/**
***********************************
*
  =Menu / Nav Walkers
*
***********************************
*/
require_once 'inc/menu.php';

/**
********************************************
*
  =Add post thumbnails into RSS feed
*
********************************************
*/
function add_feed_post_thumbnail($content){
  global $post;
  if (has_post_thumbnail($post->ID)) {
    $content = get_the_post_thumbnail($post->ID, 'thumbnail') . $content;
  }
  return $content;
}
add_filter('the_excerpt_rss', 'add_feed_post_thumbnail');
add_filter('the_content_feed', 'add_feed_post_thumbnail');

/**
********************************************************
*
  =Remove width/height HTML attributes from images
*
********************************************************
*/
function remove_image_size_atts($html){
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}
add_filter('post_thumbnail_html', 'remove_image_size_atts', 10);
add_filter('image_send_to_editor', 'remove_image_size_atts', 10);

/**
********************************************
*
  =Custom admin footer text
*
********************************************
*/
function custom_admin_footer(){}
add_filter('admin_footer_text', 'custom_admin_footer');

/**
*****************************************************************************
*
  =Add support for uploading SVG inside Wordpress Media Uploader
*
*****************************************************************************
*/
function svg_mime_types($mimes){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'svg_mime_types');

/**
********************************************
*
  =Slice Crazy Long div Outputs
*
********************************************
*/
function category_id_class($classes){
  global $post;
  foreach ((get_the_category($post->ID)) as $category) {
    $classes[] = $category->category_nicename;
  }
  return array_slice($classes, 0, 5);
}
add_filter('post_class', 'category_id_class');

/**
********************************************
*
	=Remove unwated br tag
*
********************************************
*/
remove_filter( 'the_content', 'wpautop' );
$br = false;
add_filter( 'the_content', function( $content ) use ( $br ) { return wpautop( $content, $br ); }, 10 );

/**
*********************************
*
	=Remove unwated p tag
*
*********************************
*/
remove_filter('term_description','wpautop');
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
add_filter('the_content', 'remove_empty_p', 11);
function remove_empty_p($content){
  $content = force_balance_tags($content);
  return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
  return preg_replace('#<p></p>#i', '', $content);
}

/**
*********************************
*
  =Async or Defer
*
*********************************
*/
if(!is_admin()) {
  function add_asyncdefer_attribute($tag, $handle) {
    if (strpos($handle, 'async') !== false) {
      return str_replace( '<script ', '<script async ', $tag );
    }
    else if (strpos($handle, 'defer') !== false) {
      return str_replace( '<script ', '<script defer ', $tag );
    }
    else {
      return $tag;
    }
  }
  add_filter('script_loader_tag', 'add_asyncdefer_attribute', 10, 2);
}

/**
*********************************
*
	=Custom Body Class
*
*********************************
*/
function pine_add_page_slug_body_class( $classes ){
  global $post;
  if ( isset( $post ) ) {
    $classes[] = 'page-' . $post->post_name;
  }
  return $classes;
}
add_filter( 'body_class', 'pine_add_page_slug_body_class' );

/**
*********************************
*
  =Global template dir vars 
*
*********************************
*/

function gdir(){
  global $gdir;
  $gdir = get_template_directory_uri()."/dist";
}

// Define it immediately after `init` in a high priority.
add_action('init', 'gdir', 1, 1);

/**
*********************************
*
  =Filter
*
*********************************
*/
function filter_function(){
  $order = explode( '-', $_POST['order_by'] );
  $args = array(
    'posts_per_page' => -1,
    'orderby' => $order[0],
    'order' => $order[1],
    'post_status' => 'publish',
    'tax_query' => array(
      array(
      'taxonomy' => 'category',
      'terms'    => array('featured-list','featured-post'),
      'field'    => 'slug',
      'operator' => 'NOT IN',
    ),
  ) 
  );
  query_posts( $args );
  global $wp_query;
  if( have_posts() ) : ob_start();
    while( have_posts() ): the_post();
  ?>
  <div class="col-md-3 swiper-slide"> 
    <a class="text-decoration-none" href="navigating-second-wave.html">
      <img class="mb-md-4 img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
      <div class="info">
        <p class="fnt-gow-bold mb-2 fnt-16 zw-clr-pri-opa"><?php echo get_the_date('F j, Y'); ?></p>
        <h4 class="fnt-gow-bold h3 fnt-14-resp mb-md-0 mb-4"><?php the_title(); ?></h4>
        <p class="fnt-bitter fnt-21 fnt-14-resp zm-clr-gr4c fnt-500"><?php echo wp_trim_words(get_the_content(), 26)."..."; ?></p>
      </div>
    </a>
  </div>
  <?php endwhile; $content = ob_get_contents(); ob_end_clean(); endif; // no wp_reset_query() required
  
  echo json_encode( array(
    'posts' => serialize( $wp_query->query_vars ),
    'max_page' => $wp_query->max_num_pages,
    'found_posts' => $wp_query->found_posts,
    'content' => $content
  ));
  die();
}

add_action('wp_ajax_filter', 'filter_function');
add_action('wp_ajax_nopriv_filter', 'filter_function');
/**
*********************************
*
  =CAREERS cURL
*
*********************************
*/

  function careers_curl_fun () {
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://zetwerk.skillate.com/api/postings?title=&department&offset=0&limit=100&location&minExp=1&maxExp=4'",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_SSL_VERIFYPEER => 0,
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    echo "cURL Error #:" . $err;
  }else {
    $queries = json_decode($response,true); 
    return $queries;
  }
}


/**
*********************************
*
  =Search Filter
*
*********************************
*/

function search_filter($query) {
  if ( $query->is_search ) {
    $query->set('post_type', array('post','press-release','media-coverage','case-studies','manufacturing'));
  }
  return $query;
}
add_filter('pre_get_posts','search_filter');

function search_filter_get_post_type($passed_string = false) {
  $post_type = (isset($_GET['post_type']) ? $_GET['post_type'] : false);
  if($passed_string == $post_type) {
    echo 'current';
  }
}

function main_search_filter($query) {
  if(!is_admin()) {
    if($query->is_main_query() && $query->is_search()) {
      if(isset($_GET['post_type']) && $_GET['post_type'] != '') {
        $post_type = sanitize_text_field($_GET['post_type']);
        $query->set('post_type', $post_type);
      }
    }
  }
  return $query;
}
add_filter('pre_get_posts', 'main_search_filter');


/**
*********************************
*
  =Carbon Fields
*
*********************************
*/
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  // Container::make( 'post_meta', 'Banner' )
  // ->where( 'post_id', '=', get_option( 'page_on_front' ) )
  // ->add_fields( array(
  //   Field::make( 'file', 'crb_home_banner_video', 'Banner Video' )
  //   ->set_value_type( 'url' ),
  //   //end of video
  // ));
  Container::make( 'post_meta', 'Slider' )
  ->where( 'post_id', '=', get_option( 'page_on_front' ) )
  ->add_fields( array(
    Field::make( 'complex', 'crb_slides', 'Slides' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
      Field::make( 'text', 'crb_slider_title', 'Title' ),
      Field::make( 'textarea', 'crb_slider_center', 'Slider Sub text' )
      ->set_rows( 4 ),
      Field::make( 'file', 'crb_slider_img', 'Image' )
      ->set_value_type( 'url' ),      
      Field::make( 'text', 'crb_slider_btn_url', 'Button URL' ),
    )),
    //end of Slider Repeater
  ));  

  Container::make( 'post_meta', 'Manufacturing Expertise' )
  ->where( 'post_id', '=', get_option( 'page_on_front' ) )
  ->add_fields( array(
    Field::make( 'text', 'crb_manuf_title', 'Title' ),
    Field::make( 'text', 'crb_manuf_sub_text', 'Sub Text' ),
    Field::make( 'text', 'crb_manuf_column_one_title', 'Column One Title' ),
    Field::make( 'text', 'crb_manuf_column_one_sub_text', 'Column Two Sub Text' ),
    Field::make( 'text', 'crb_manuf_column_two_title', 'Column Two Title' ),
    Field::make( 'text', 'crb_manuf_column_two_sub_text', 'Column Two Sub Text' ),
  ));

  Container::make( 'post_meta', 'Status Block' )
  ->where( 'post_id', '=', get_option( 'page_on_front' ) )
  ->add_fields( array(
    Field::make( 'complex', 'crb_hero_card', 'Status Blocks' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_hero_subtext', 'Slider Sub text' )
      ->set_rows( 4 ),
      Field::make( 'text', 'crb_hero_title', 'Title' ),
      Field::make( 'file', 'crb_hero_img', 'Image' )
      ->set_value_type( 'url' ), 
    )),
  ));

  Container::make( 'post_meta', 'How Zet Werks' )
  ->where( 'post_id', '=', get_option( 'page_on_front' ) )
  ->add_fields( array(
    Field::make( 'text', 'crb_hzw_title', 'Title' ),
    Field::make( 'textarea', 'crb_hzw_subtext', 'Title' ),
    Field::make( 'complex', 'crb_hzw_cards', 'Status Blocks' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
        Field::make( 'text', 'crb_hzw_title', 'Title' ),
        Field::make( 'text', 'crb_hzw_subtext', 'Sub Text' ),
        Field::make( 'text', 'crb_hzw_btnurl', 'Link' ),
      )),
  ));

  Container::make( 'post_meta', 'Hero Background' )
  ->where( 'post_id', '=', get_option( 'page_on_front' ) )
  ->add_fields( array(
    Field::make( 'file', 'crb_img_herobg', 'Image' )
    ->set_value_type( 'url' ), 
  ));  

  Container::make( 'post_meta', 'Partners and Customers' )
  ->where( 'post_id', '=', get_option( 'page_on_front' ))
  ->add_fields( array(
    Field::make( 'text', 'crb_pac_title', 'Title' ),
    Field::make( 'text', 'crb_pac_subtext', 'Sub Text' ),
    Field::make( 'text', 'crb_pac_btnlink', 'Button Link' ),
    Field::make( 'complex', 'crb_pac_logos', 'Logos' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
        Field::make( 'file', 'crb_pac_logo_img', 'Logo Image' )
        ->set_value_type( 'url' ), 
     )),
  ));

  Container::make( 'post_meta', 'Global Manufacturing Network' )
  ->where( 'post_id', '=', get_option( 'page_on_front' ))
  ->add_fields( array(
    Field::make( 'text', 'crb_gmn_title', 'Title' ),
    Field::make( 'text', 'crb_gmn_subtext', 'Sub Text' ),
    Field::make( 'text', 'crb_gmn_btnlink', 'Button Link' ),
    Field::make( 'text', 'crb_gmn_vidlink', 'Video Link' ),
  ));

  Container::make( 'post_meta', 'Quality Certifications' )
  ->where( 'post_id', '=', get_option( 'page_on_front' ))
  ->add_fields( array(
    Field::make( 'text', 'crb_qc_title', 'Title' ),
    Field::make( 'text', 'crb_qc_subtext', 'Sub Text' ),
    Field::make( 'text', 'crb_qc_btnlink', 'Button Link' ),
    Field::make( 'complex', 'crb_qc_logos', 'Logos' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
        Field::make( 'file', 'crb_qc_logo_img', 'Logo Image' )
        ->set_value_type( 'url' ), 
    )),
  ));

  Container::make( 'post_meta', 'CTA Call To Action' )
  ->where( 'post_id', '=', get_option( 'page_on_front' ))
  ->add_fields( array(
    Field::make( 'text', 'crb_cta_title', 'Title' ),
    Field::make( 'text', 'crb_cta_subtext', 'Sub Text' ),
    Field::make( 'text', 'crb_cta_btnlink', 'Button Link' ),
    Field::make( 'file', 'crb_cta_logo_img', 'Logo Image' )
    ->set_value_type( 'url' ),   
  ));
}// end of home

add_action( 'carbon_fields_register_fields', 'crb_page_why_zetworks' );
function crb_page_why_zetworks() {
  Container::make( 'post_meta', 'Why Zetwerk Banner' )
  ->where( 'post_template', '=', 'page-why-zetworks.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_wzb_banner', 'Banner Title' ),
    Field::make( 'file', 'crb_wzb_banner_img', 'Banner Image' )
    ->set_value_type( 'url' ), 
    Field::make( 'textarea', 'crb_wzb_text_one', 'Text Column One' ),
    Field::make( 'textarea', 'crb_wzb_text_two', 'Text Column Two' ),
  ));

  Container::make( 'post_meta', 'The Zetwerk Effect' )
  ->where( 'post_template', '=', 'page-why-zetworks.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_tze_banner', 'Title Text' ),
    Field::make( 'file', 'crb_tze_banner_img', 'Background Image' )
    ->set_value_type( 'url' ), 
    Field::make( 'complex', 'crb_tze_blocks', 'Blocks' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
      Field::make( 'text', 'crb_tze_block_title', 'Title' ),
      Field::make( 'text', 'crb_tze_block_subtext', 'Sub text' ),
      Field::make( 'textarea', 'crb_tze_block_svg', 'Icon Code' ),
    )),
  ));  

  Container::make( 'post_meta', 'Project Managment' )
  ->where( 'post_template', '=', 'page-why-zetworks.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_pm_title', 'Title Text' ),
    Field::make( 'text', 'crb_pm_sub_text', 'Sub Text' ),
    Field::make( 'text', 'crb_pm_btn_top_text', 'Button top Text' ),
    Field::make( 'text', 'crb_pm_btn_link', 'Button Link' ),
  ));

  Container::make( 'post_meta', 'Hero Cards' )
  ->where( 'post_template', '=', 'page-why-zetworks.php' )
  ->add_fields( array(
    Field::make( 'complex', 'crb_hc_blocks', 'Blocks' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
      Field::make( 'text', 'crb_hc_title', 'Title Text' ),
      Field::make( 'text', 'crb_hc_sub_text', 'Sub Text' ),
      Field::make( 'file', 'crb_hc_icon_img', 'Icon' )
      ->set_value_type( 'url' ),     
      Field::make( 'file', 'crb_hc_bg_img', 'Background' )
      ->set_value_type( 'url' ), 
    )),
  ));  

  Container::make( 'post_meta', 'Make in India' )
  ->where( 'post_template', '=', 'page-why-zetworks.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_mii_title', 'Title Text' ),
    Field::make( 'text', 'crb_mii_email', 'Email' ),
    Field::make( 'text', 'crb_mii_phonenumber', 'Phone Number' ),
    Field::make( 'file', 'crb_mii_bg_img', 'Background' )
    ->set_value_type( 'url' ), 
    Field::make( 'textarea', 'crb_mii_textblock', 'Text Block' ),
  ));  

  Container::make( 'post_meta', 'The Zetwerk Netwerk' )
  ->where( 'post_template', '=', 'page-why-zetworks.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_tznet_sectitle', 'Section Title' ),
    Field::make( 'text', 'crb_tznet_secstitle', 'Section Sub Title' ),
    Field::make( 'complex', 'crb_tznet_blocks', 'Blocks' )
      ->set_layout( 'tabbed-vertical' )
      ->add_fields( array(
        Field::make( 'text', 'crb_tznet_title', 'Count' ),
        Field::make( 'text', 'crb_tznet_sub_title', 'Sub text' ),
        Field::make( 'text', 'crb_tznet_sub_details', 'Detail' ),
      )),
    
  ));

  Container::make( 'post_meta', 'Quality certifications' )
  ->where( 'post_template', '=', 'page-why-zetworks.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_qcert_sectitle', 'Section Title' ),
    Field::make( 'text', 'crb_qcert_secstitle', 'Section Sub Title' ),
    Field::make( 'text', 'crb_qcert_btn_link', 'Section Button Link' ),
    Field::make( 'complex', 'crb_qcert_logos', 'Logos' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
      Field::make( 'file', 'crb_qcert_logo_img', 'certifications logo' )
      ->set_value_type( 'url' ), 
      )),
    
  ));

  Container::make( 'post_meta', 'Why ZetWerk CTA' )
  ->where( 'post_template', '=', 'page-why-zetworks.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_wzcta_title', 'Section Title' ),
    Field::make( 'text', 'crb_wzcta_subtitle', 'Section Sub text' ),
    Field::make( 'text', 'crb_wzcta_btn', 'Button Link' ),
    Field::make( 'file', 'crb_wzcta_img', 'Cta logo' )
    ->set_value_type( 'url' ), 
  ));
}



add_action( 'carbon_fields_register_fields', 'crb_page_how_zetworks' );
function crb_page_how_zetworks() {
  Container::make( 'post_meta', 'How Zetwerk Banner' )
  ->where( 'post_template', '=', 'page-how-zetwerk.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_hz_banner_title', 'Banner Title' ),
    Field::make( 'text', 'crb_hz_banner_sub_text', 'Banner Sub text' ),
    Field::make( 'file', 'crb_wzcta_img', 'Cta logo' )
    ->set_value_type( 'url' ), 
  ));

  Container::make( 'post_meta', 'Manufacturing Tabs' )
  ->where( 'post_template', '=', 'page-how-zetwerk.php' )
  ->add_fields( array(
    Field::make( 'complex', 'crb_hwmt_main_tabs', 'Main Tabs' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
      Field::make( 'text', 'crb_hwmt_main_tab_titles', 'Tab Names' ),
      Field::make( 'text', 'crb_hwmt_main_tab_title_text', 'Titles' ),
      Field::make( 'text', 'crb_hwmt_main_tab_title_details', 'Sub Text' ),
      Field::make( 'complex', 'crb_hwmt_subtabs_tab', 'Sub Tabs' )
        ->set_layout( 'tabbed-vertical' )
        ->add_fields( array(
            Field::make( 'text', 'crb_hwmt_main_sub_tab_title', 'Sub tab text' ),
            Field::make( 'file', 'crb_hwmt_tab_img', 'Tab Images' )
            ->set_value_type( 'url' ), 
          )
        ),   
        Field::make( 'complex', 'crb_hwmt_testimonals', 'Testimonials' )
        ->set_layout( 'tabbed-vertical' )
        ->add_fields( array(
            Field::make( 'text', 'crb_hwtesti_quotes', 'Quotes' ),
            Field::make( 'text', 'crb_hwtesti_quotes_sub_text', 'Quotes Sub Text' ),
            Field::make( 'text', 'crb_hwtesti_quotes_auto_company', 'Name of the Client' ),
            Field::make( 'file', 'crb_hwtesti_quotes_logo', 'Quotes Logo' )
            ->set_value_type( 'url' ), 
          )),
        

      )),//ends
    

  ));

  Container::make( 'post_meta', 'Key Metrics' )
  ->where( 'post_template', '=', 'page-how-zetwerk.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_keymet_section_title', 'Key Metrics Section title' ),
    Field::make( 'complex', 'crb_keymet_reps', 'Key Metrics box' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
        Field::make( 'text', 'crb_keymet_count', 'Key Metrics Count' ),
        Field::make( 'text', 'crb_keymet_subtext', 'Key Metrics Sub Text' ), 
      )),
    
  ));

  Container::make( 'post_meta', 'How Zetwerk Cta' )
  ->where( 'post_template', '=', 'page-how-zetwerk.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_hzcta_title', 'Section Title' ),
    Field::make( 'text', 'crb_hzcta_subtitle', 'Section Sub text' ),
    Field::make( 'text', 'crb_hzcta_btn', 'Button Link' ),
    Field::make( 'file', 'crb_hzcta_img', 'Cta logo' )
    ->set_value_type( 'url' ), 
  ));
}

add_action( 'carbon_fields_register_fields', 'crb_press_release' );
  function crb_press_release() {
  Container::make( 'post_meta', 'Press Release' )
  ->where( 'post_type', '=', 'press-release' )
  ->add_fields( array(
    Field::make( 'text', 'crb_pr_video_link', 'Video Link' ),
    Field::make( 'file', 'crb_pr_pdf', 'PDF' )
    ->set_value_type( 'url' ),
  ));
}

add_action( 'carbon_fields_register_fields', 'crb_media_coverage' );
  function crb_media_coverage() {
  Container::make( 'post_meta', 'Media Coverage' )
  ->where( 'post_type', '=', 'media-coverage' )
  ->add_fields( array(
    Field::make( 'text', 'crb_mc_video_link', 'Video Link' ),
    Field::make( 'file', 'crb_mc_pdf', 'PDF' )
    ->set_value_type( 'url' ),
  ));
}

add_action( 'carbon_fields_register_fields', 'crb_case_study' );
  function crb_case_study() {
  Container::make( 'post_meta', 'Case Study' )
  ->where( 'post_type', '=', 'case-studies' )
  ->add_fields( array(
    Field::make( 'text', 'crb_cs_video_link', 'Video Link' ),
    Field::make( 'file', 'crb_cs_pdf', 'PDF' )
    ->set_value_type( 'url' ),
  ));
}

//blogs

add_action( 'carbon_fields_register_fields', 'crb_attach_post_options' );
  function crb_attach_post_options() {
  Container::make( 'post_meta', __( 'Section Options', 'crb' ) )
  ->where( 'post_type', '=', 'post' )
  ->add_fields( array(
    Field::make( 'complex', 'crb_post_section', 'Sections' )
    ->add_fields( 'paragraph', 'Paragraph', array(
      Field::make( 'rich_text', 'crb_blog_paragraph', 'Text' ),
    ))
    ->add_fields( 'heading', 'Heading', array(
      Field::make( 'text', 'crb_blog_heading', 'Text' ),
    ))    
    ->add_fields( 'image', 'Image', array(
      Field::make( 'file', 'crb_blog_img', 'Image' )
      ->set_value_type( 'url' ),
    ))    
    ->add_fields( 'video', 'Video', array(
      Field::make( 'text', 'crb_blog_video', 'Video' ),
      Field::make( 'text', 'crb_blog_tiny_url', 'Video Title' )
    ))
  ));
}

add_action( 'carbon_fields_register_fields', 'crb_page_careers' );
function crb_page_careers() {
  Container::make( 'post_meta', 'Why Zetwerk Banner' )
  ->where( 'post_template', '=', 'careers.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_careers_banner_text', 'Banner Text' ),
    Field::make( 'file', 'crb_careers_banner_img', 'Banner Image' )
    ->set_value_type( 'url' ),
    Field::make( 'text', 'crb_careers_banner_heading', 'Banner Heading' ),
    Field::make( 'text', 'crb_careers_banner_subtxt', 'Banner Sub text' ),
  ))
  ->add_fields( array(
    Field::make( 'file', 'crb_careers_gimg', 'About Copany Image' )
    ->set_value_type( 'url' ),
    Field::make( 'text', 'crb_careers_gtitle', 'About Copany Heading' ),
    Field::make( 'rich_text', 'crb_careers_gsubtxt', 'About Copany Sub text' ),
    Field::make( 'complex', 'crb_career_logos', 'Logo' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
      Field::make( 'file', 'crb_careers_logo', 'Careers Logo' )
      ->set_value_type( 'url' ),
    ))
  ));  

  Container::make( 'post_meta', 'How Zetwerk Recruits' )
  ->where( 'post_template', '=', 'careers.php' )
  ->add_fields( array(
    Field::make( 'text', 'crb_chzr_title', 'Title' ),
    Field::make( 'rich_text', 'crb_chzr_stext', 'Sub Text' ),
    Field::make( 'file', 'crb_chzr_img', 'Image' )
    ->set_value_type( 'url' ),
  ));

  Container::make( 'post_meta', 'Zetwerk leadership' )
  ->where( 'post_template', '=', 'careers.php' )
  ->add_fields( array(
    Field::make( 'complex', 'crb_leaders', 'Logo' )
    ->set_layout( 'tabbed-vertical' )
    ->add_fields( array(
      Field::make( 'file', 'crb_leaders_image', 'Leader Image' )
      ->set_value_type( 'url' ),
      Field::make( 'text', 'crb_leaders_names', 'Name' ),
      Field::make( 'text', 'crb_leaders_linked', 'Linked In' ),
    ))
  ));

  Container::make( 'post_meta', 'Contact us' )
  ->where( 'post_template', '=', 'careers.php' )
  ->add_fields( array(
    Field::make( 'complex', 'crb_careers_contact_section', 'Sections' )
    ->add_fields( 'manufac_hero', 'Section List Hero', array(
      Field::make( 'text', 'crb_careers_contact_section_heading', 'Office Heading' ),
      Field::make( 'text', 'crb_careers_contact_section_officename', 'Name' ),
      Field::make( 'text', 'crb_careers_contact_address', 'Office Address' ),
    )), 
  ));

  Container::make( 'post_meta', 'Need Help Block' )
  ->where( 'post_template', '=', 'contact-us.php' )
  ->add_fields( array(
    Field::make( 'complex', 'crb_contact_section', 'Sections' )
    ->add_fields( 'manufac_hero', 'Section List Hero', array(
      Field::make( 'html', 'crb_office_text' )
      ->set_html( '<h3>Office</h3>' ),
      Field::make( 'text', 'crb_contact_section_heading', 'Location' ),
      Field::make( 'text', 'crb_contact_section_officename', 'Name' ),
      Field::make( 'text', 'crb_contact_address', 'Address' ),
    )), 
  ));
}


//Manufacturing CPT
add_action( 'carbon_fields_register_fields', 'crb_attach_manufac_banner' );
function crb_attach_manufac_banner() {
  Container::make( 'post_meta', 'Banner' )
  ->where( 'post_type', '=', 'manufacturing' )
  ->add_fields( array(
    Field::make( 'text', 'crb_manufac_banner_title', 'Banner Text' ),
    Field::make( 'text', 'crb_manufac_banner_sub_text', 'Detail Text' ),
    Field::make( 'radio', 'crb_manufac_banner_padding', 'Banner Bottom Padding' )
    ->set_options( array( '1'  => 'Need Padding', '2' => 'Padding No needed' )),
    Field::make( 'file', 'crb_manufac_image', 'Banner Image' )
    ->set_value_type( 'url' ),
  ));
} //Banner Field Ends

add_action( 'carbon_fields_register_fields', 'crb_attach_manufac' );
  function crb_attach_manufac() {

  Container::make( 'post_meta', __( 'Section Options', 'crb' ) )
  ->where( 'post_type', '=', 'manufacturing' )
  ->add_fields( array(
    Field::make( 'complex', 'crb_manufact_section', 'Sections' )

    ->add_fields( 'manufac_hero', 'Section List Hero', array(
      Field::make( 'text', 'crb_manufac_section_heading', 'Section Heading' ),
      Field::make( 'file', 'crb_manufac_section_bg_img', 'Section Background Image' )
      ->set_value_type('url'),
      Field::make( 'complex', 'crb_post_menufac_sec_list', 'List Hero' )
      ->add_fields( array(
        Field::make( 'text', 'crb_manufac_hero_list', 'List Heading' ),
        Field::make( 'rich_text', 'crb_manufac_hero_list_items', 'List Heading' ),
      )),
    ))    

    ->add_fields( 'manufac_client_logos', 'Clients Logos', array(
      Field::make( 'text', 'crb_manufac_client_logo_heading', 'Section Heading' ),
      Field::make( 'rich_text', 'crb_manufac_client_logo_sub_text', 'Sub text' ),
      Field::make( 'text', 'crb_manufac_client_logo_btn_link', 'Button Link' ),
      Field::make( 'complex', 'crb_post_menufac_sec_list', 'List Hero' )
      ->add_fields( array(
        Field::make( 'file', 'crb_manufac_client_logo_file', 'Client Logo file' )
        ->set_value_type( 'url' ),
        Field::make( 'text', 'crb_manufac_client_logo_name', 'Client Name' ),
      )),
    ))

    ->add_fields( 'manufac_client_bltspnts_with_right_img', 'Bullet points and right img', array(
      Field::make( 'text', 'crb_manufac_bltspnts_heading', 'Section Heading' ),
      Field::make( 'file', 'crb_manufac_bltspnts_right_img', 'Right Image' )
      ->set_value_type('url'),
      Field::make( 'complex', 'crb_manufac_bltspnts_rep', 'Columns Content' )
      ->add_fields( array(
        Field::make( 'rich_text', 'crb_manufac_bltspnts_item', 'List Conent' ),
      )),
    ))    

    ->add_fields( 'manufac_client_bltspnts_with_right_img_four_rows', 'Bullet points Four Rows and right img ', array(
      Field::make( 'text', 'crb_manufac_bltspnts_heading_four_rows', 'Section Heading' ),
      Field::make( 'file', 'crb_manufac_bltspnts_right_img_four_rows', 'Right Image' )
      ->set_value_type('url'),
      Field::make( 'complex', 'crb_manufac_bltspnts_rep_four_rows', 'Columns Content' )
      ->add_fields( array(
        Field::make( 'text', 'crb_manufac_bltspnts_item_four_rows', 'List Conent' ),
      )),
    ))

    ->add_fields( 'manufac_text_right_img', 'Text & image Content', array(
      Field::make( 'text', 'manufac_tri_sec_heading', 'Section Heading' ),
      Field::make( 'text', 'manufac_tri_sec_sub_text', 'Sub text' ),
      Field::make( 'radio', 'manufac_section_bg', 'Section Color' )
      ->set_options( array( '1'  => 'Ivory', '2' => 'White' )),      
      Field::make( 'file', 'manufac_tri_sec_img', 'Section Image' )
      ->set_value_type('url'),
      Field::make( 'radio', 'manufac_section_img_overlay', 'Overlay Color' )
      ->set_options( array( '1'  => 'Blue', '2' => 'Red' )),       
    ))

    ->add_fields( 'manufac_info_hero', 'Info Hero', array(
      Field::make( 'text', 'manufac_ih_heading', 'Section Heading' ),
      Field::make( 'text', 'manufac_ih_part_size_heading', 'Info Heading' ),
      Field::make( 'text', 'manufac_ih_part_size_sub_text', 'Info text' ),      
      Field::make( 'text', 'manufac_ih_part_size_heading2', 'Info Heading' ),
      Field::make( 'text', 'manufac_ih_part_size_sub_text2', 'Info text' ),
      Field::make( 'text', 'manufac_ih_part_size_bottom_text', 'Sub Text' ),
      Field::make( 'file', 'manufac_ih_sec_img', 'Section Image' )
      ->set_value_type('url'),      
    ))

    ->add_fields( 'manufac_indust_slider', 'Industries Slider', array(
      Field::make( 'text', 'crb_manufac_indust_slider_heading', 'Section Heading' ),
      Field::make( 'complex', 'crb_manufac_indust_slider', 'Industries Slider' )
      ->add_fields( array(
        Field::make( 'text', 'crb_manufac_indust_slider_img_text', 'Slider Title' ),
        Field::make( 'file', 'crb_manufac_indust_slider_image', 'Slider Image' )
        ->set_value_type('url'),
      )),
    ))    

    ->add_fields( 'manufac_top_text_btm_img', 'Top Text Bottom Image', array(
      Field::make( 'text', 'manufac_top_text_btm_heading', 'Heading' ),
      Field::make( 'text', 'manufac_top_text_btm_subtext', 'Sub Text' ),
      Field::make( 'file', 'manufac_top_btm_imgs', 'Bottom Image' )
      ->set_value_type('url'),       
    ))

    ->add_fields( 'manufac_tobi_section', 'Background Image With text', array(
      Field::make( 'text', 'manufac_tobi_section_heading_main', 'Main Heading' ),
      Field::make( 'complex', 'crb_manufac_indust_slider', 'Background Image With text' )
      ->add_fields( array(      
      Field::make( 'text', 'manufac_tobi_section_heading', 'Heading' ),
      Field::make( 'text', 'manufac_tobi_section_sub_text', 'Sub text' ),
      Field::make( 'file', 'manufac_tobi_section_img', 'Background Image' )
      ->set_value_type('url'), 
      )),     
    ))    

    ->add_fields( 'manufac_service_section', 'Background Image With text Slider', array(
      Field::make( 'text', 'manufac_service_heading', 'Section Heading' ),
      Field::make( 'complex', 'crb_manufac_indust_slider', 'Background Image With text Slider' )
      ->add_fields( array(      
      Field::make( 'text', 'manufac_service_section_heading', 'Heading' ),
      Field::make( 'rich_text', 'manufac_service_section_sub_text', 'Sub text' ),
      Field::make( 'file', 'manufac_service_section_img', 'Background Image' )
      ->set_value_type('url'), 
      )),     
    ))

    ->add_fields( 'manufac_hero_horz_list', 'Hero With Horzintal list', array(
      Field::make( 'text', 'manufac_hero_horz_list_heading', 'Section Heading' ),
      Field::make( 'complex', 'manufac_hero_horz_list_comp', 'Industries Slider' )
      ->add_fields( array(
        Field::make( 'text', 'manufac_hero_horz_list_item', 'List Item' ),
      )),      
    ))    

    ->add_fields( 'manufac_hero_horz_list_black_bg', 'full width With Horzintal list', array(
      Field::make( 'text', 'manufac_hero_horz_list_heading_black_bg', 'Section Heading' ),
      Field::make( 'complex', 'manufac_hero_horz_list_comp_black_bg', 'Industries Slider' )
      ->add_fields( array(
        Field::make( 'text', 'manufac_hero_horz_list_item_black_bg', 'List Item' ),
      )),      
    ))

    ->add_fields( 'manufac_tabs', 'Tab Content', array(
      Field::make( 'complex', 'manufac_tabs_main', 'Tab' )
      ->add_fields( array(
        Field::make( 'text', 'manufac_tabs_title', 'Tab Name' ),
        Field::make( 'complex', 'manufac_tabs_content', '' )
        ->add_fields( array(
          Field::make( 'text', 'manufac_tabs_txt', 'Tab Content' ),
        )),
      )),   
    ))

    ->add_fields( 'manufac_hero_bg_with_horzintal_list', 'Hero Background with horzintal list', array(
      Field::make( 'file', 'manufac_hero_bg_img', 'Section Image' )
      ->set_value_type('url'),
      Field::make( 'complex', 'manufac_hero_bg_with_horzintal_main_list', 'List' )
      ->add_fields( array(
      Field::make( 'text', 'manufac_tabs_title', 'Tab Name' ),
      Field::make( 'radio', 'manufac_hero_bg_with_horzintal_section_bg', 'Section Color' )
      ->set_options( array( '1'  => 'Blue', '2' => 'Black' )),
      Field::make( 'complex', 'manufac_hero_bg_with_horzintal_main_item', 'List item' )
      ->add_fields( array(        
        Field::make( 'text', 'manufac_hero_bg_with_horzintal_txt', 'List Text' ),
        )), 
      )),      
    ))

    ->add_fields( 'manufac_status', 'Hero Stauts', array(
      Field::make( 'file', 'manufac_status_img', 'Section Background' )
      ->set_value_type('url'), 
      Field::make( 'text', 'manufac_status_stitle', 'Title' ),
      Field::make( 'complex', 'manufac_status_rep', 'Status' )
      ->add_fields( array(        
        Field::make( 'text', 'manufac_status_txt', 'Heading' ),
        Field::make( 'text', 'manufac_status_stxt', 'Sub text' ),
      )),        
    ))
  ));

Container::make( 'post_meta', __('Explore our solutions') )
  ->where( 'post_type', '=', 'manufacturing' )
  ->add_tab( __('Manufacturing processes'), array(
    Field::make( 'complex', 'manufac_proces_rep_tone', 'Status' )
    ->add_fields(array(
      Field::make( 'text', 'crb_manufa_proc_text', 'Title' ),
      Field::make( 'file', 'crb_manufa_proc_img', 'Background Image' )
      ->set_value_type('url'),
    ))
  ))
  ->add_tab( __('Manufacturing for industries'), array(
    Field::make( 'complex', 'manufac_proces_rep_ttwo', 'Status' )
    ->add_fields(array(
      Field::make( 'text', 'crb_manufa_proc_text', 'Title' ),
      Field::make( 'file', 'crb_manufa_proc_img', 'Background Image' )
      ->set_value_type('url'),
    ))
  ));
}

add_action( 'carbon_fields_register_fields', 'crb_manufac_archive' );
function crb_manufac_archive() {
  Container::make( 'post_meta', __( 'Section Options', 'crb' ) )
  ->where( 'post_type', '=', 'page' )
  ->where( 'post_template', '=', 'page-manufactring.php' )
  ->add_tab( __('Manufacturing processes'), array(
    Field::make( 'complex', 'manufac_main_tabs_proce', 'Manufacturing processes Tab' )
    ->add_fields(array(
      Field::make( 'text', 'manufac_main_tabs_proce_title', 'Title' ),
      Field::make( 'complex', 'manufac_main_tab', 'Sub Tab' )
      ->add_fields(array(
        Field::make( 'text', 'manufac_sub_tabs_list', 'Sub Tab Title' ),
        Field::make( 'file', 'manufac_sub_tabs_img', 'Background Image' )
        ->set_value_type('url'),
        Field::make( 'complex', 'manufac_item_list', 'Sub Tab' )
        ->add_fields(array(
          Field::make( 'text', 'manufac_sub_tabs_list', 'Title' ),
          Field::make( 'text', 'manufac_sub_tabs_url', 'Tab URL' ),
        ))

      ))        
    ))
  ))
  ->add_tab( __('Manufacturing for industries'), array(
    Field::make( 'complex', 'manufac_main_tabs_indust', 'Manufacturing for industries Tab' )
    ->add_fields(array(
      Field::make( 'text', 'manufac_main_tabs_indust_title', 'Title' ),
      Field::make( 'complex', 'manufac_main_tab', 'Sub Tab' )
      ->add_fields(array(
        Field::make( 'text', 'manufac_sub_tabs_list', 'Sub Tab Title' ),
        Field::make( 'file', 'manufac_sub_tabs_img', 'Background Image' )
        ->set_value_type('url'),
        Field::make( 'complex', 'manufac_item_list', 'Sub Tab' )
        ->add_fields(array(
          Field::make( 'text', 'manufac_sub_tabs_list', 'Title' ),
          Field::make( 'text', 'manufac_sub_tabs_url', 'Tab URL' ),
        ))

      ))        
    ))
  ));


}


add_action( 'carbon_fields_register_fields', 'crb_media_assets' );
function crb_media_assets() {
  Container::make( 'post_meta', __( 'Media Assets', 'crb' ) )
  ->where( 'post_type', '=', 'page' )
  ->where( 'post_template', '=', 'page-media-assets.php' )
  ->add_fields( array(
    Field::make( 'complex', 'crb_ma_section', 'Sections' )
      
    ->add_fields( 'crb_ma_video', 'Video', array(
      Field::make( 'complex', 'crb_ma_video_complex', 'Videos' )
      ->add_fields( array(
        Field::make( 'text', 'crb_ma_title', 'Title' ),
        Field::make( 'date', 'crb_ma_date', 'Video Date' ),
        Field::make( 'text', 'crb_ma_vide_url', 'Video URL' ),
        Field::make( 'file', 'crb_ma_vide_thumbnail', 'Video Thumbnail' )
        ->set_value_type('url'),
      ))
    ))

    ->add_fields( 'crb_ma_image', 'Image', array(
      Field::make( 'complex', 'crb_ma_image_complex', 'Files' )
      ->add_fields( array(
        Field::make( 'text', 'crb_mai_tab_heading', 'Title' ),
        Field::make( 'complex', 'crb_ma_image_loop', 'Files' )
        ->add_fields( array(
          Field::make( 'text', 'crb_mai_title', 'Title' ),
          Field::make( 'rich_text', 'crb_mai_sub_text', 'Sub Text' ),
          Field::make( 'file', 'crb_mai_image', 'File' )
          ->set_value_type('url'),
        )),
      )),
    )),


  ));
}