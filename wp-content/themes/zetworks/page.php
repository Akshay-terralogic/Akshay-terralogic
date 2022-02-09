<?php
/**
 * The template for displaying all pages
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
          <h1 class="h1 zw-banner__heading text-uppercase">Maximize Manufacturing</h1>
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

<?php
get_footer();
