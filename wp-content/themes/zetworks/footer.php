<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme_name
 */
$t_options = get_option('tp_opt');
?>
  <footer class="zw-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-5 col-xl-6">
          <div class="zw-footer__left-wrap">
            <img class="img-fit" src="<?php echo $t_options['logo_footer']['url']; ?>" alt="Emaar logo">
            <p class="zw-footer__des zm-clr-gre4 mt-3 mt-md-4"><?php echo $t_options['footer-about']; ?></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-6 col-xxl-5 offset-xxl-1 zw-footer-blocklist">
          <div class="zw-footer-blocklist__item">
            <h6 class="zw-footer__nav-heading">Reach Us</h6>
            <ul class="zw-nav-list mb-0">
              <li class="zm-nav-list__item">
                <a class="zm-nav-link" href="mailto:<?php echo $t_options['footer-email']; ?>">
                  <img class="me-2" src="<?php echo get_template_directory_uri(); ?>/dist/img/icons/mail-icon.svg" alt="Mail icon"><?php echo $t_options['footer-email']; ?>
                </a>
              </li>
              <li class="zm-nav-list__item">
                <a class="zm-nav-link" href="tel:<?php echo $t_options['footer-phone']; ?>">
                  <img class="me-2" src="<?php echo get_template_directory_uri(); ?>/dist/img/icons/phone-icon.svg" alt="Mail icon"><?php echo $t_options['footer-phone']; ?>
                </a>
              </li>
            </ul>
          </div>
          <div class="zw-footer-blocklist__item">
            <h6 class="zw-footer__nav-heading">Legal</h6>
            <?php 
              wp_nav_menu( array( 
              'theme_location' => 'footer_menu',
              'container' => 'ul',
              'menu_class' => 'zw-nav-list mb-0',
              'add_a_class' => 'zm-nav-link',
              )); 
            ?>
          </div>
          <div class="zw-footer-blocklist__item">
            <h6 class="zw-footer__nav-heading">Connect with us</h6>
            <div class="zw-social-list d-flex">
             <a class="zw-social-link flex-center" href="<?php echo $t_options['footer_instagram']; ?>" target="_blank">
                <i class="icon icon-insta"></i>
              </a>
              <a class="zw-social-link flex-center" href="<?php echo $t_options['footer_twitter']; ?>" target="_blank">
                <i class="icon icon-twitter"></i>
              </a>
              <a class="zw-social-link flex-center" href="<?php echo $t_options['footer_yt']; ?>" target="_blank">
                <i class="icon icon-youtube"></i>
              </a>
              <a class="zw-social-link flex-center" href="<?php echo $t_options['footer_facebook']; ?>" target="_blank">
                <i class="icon icon-facebook"></i>
              </a>
              <a class="zw-social-link flex-center" href="<?php echo $t_options['footer_linked']; ?>" target="_blank">
                <svg class="linkfill" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.399902 1.33561C0.399902 1.08745 0.498486 0.849446 0.673965 0.673966C0.849445 0.498487 1.08745 0.399904 1.33561 0.399904H10.6632C10.7862 0.399703 10.908 0.423761 11.0216 0.470701C11.1353 0.517641 11.2386 0.586541 11.3256 0.673456C11.4126 0.760372 11.4817 0.863595 11.5287 0.977217C11.5758 1.09084 11.6 1.21263 11.5999 1.33561V10.6632C11.6 10.7862 11.5759 10.908 11.5289 11.0217C11.4819 11.1354 11.413 11.2387 11.326 11.3257C11.2391 11.4127 11.1358 11.4817 11.0222 11.5287C10.9085 11.5758 10.7867 11.6 10.6637 11.5999H1.33561C1.21269 11.5999 1.09097 11.5757 0.977414 11.5286C0.863855 11.4816 0.760681 11.4126 0.673785 11.3257C0.58689 11.2387 0.517977 11.1355 0.470983 11.0219C0.423989 10.9083 0.399836 10.7866 0.399902 10.6637V1.33561ZM4.83307 4.67016H6.34965V5.43176C6.56856 4.99394 7.12856 4.5999 7.97008 4.5999C9.58339 4.5999 9.96572 5.47197 9.96572 7.07205V10.036H8.33307V7.43655C8.33307 6.52528 8.11416 6.0111 7.55823 6.0111C6.78696 6.0111 6.46623 6.5655 6.46623 7.43655V10.036H4.83307V4.67016ZM2.03307 9.96623H3.66623V4.5999H2.03307V9.96572V9.96623ZM3.8999 2.84965C3.90298 2.98948 3.8781 3.12852 3.82672 3.25861C3.77533 3.38869 3.69848 3.50721 3.60067 3.60719C3.50287 3.70718 3.38608 3.78662 3.25715 3.84085C3.12823 3.89509 2.98977 3.92302 2.8499 3.92302C2.71004 3.92302 2.57158 3.89509 2.44265 3.84085C2.31373 3.78662 2.19694 3.70718 2.09913 3.60719C2.00132 3.50721 1.92447 3.38869 1.87309 3.25861C1.82171 3.12852 1.79682 2.98948 1.7999 2.84965C1.80595 2.57517 1.91923 2.31398 2.11548 2.122C2.31174 1.93002 2.57536 1.82252 2.8499 1.82252C3.12444 1.82252 3.38807 1.93002 3.58432 2.122C3.78058 2.31398 3.89386 2.57517 3.8999 2.84965Z" fill="#FAF3E7"/></svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <p class="zm-copyrgt fnt-14"><?php echo $t_options['footer-copy']; ?></p>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
  </body>
</html>

