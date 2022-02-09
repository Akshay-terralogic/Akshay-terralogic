<?php
	/**
	* Template Name: Contact us
	*
	* @package WordPress
	*/
	get_header();
	$t_options = get_option('tp_opt');
?>
<main class="zw-topspace8">
	<section class="zw-section-margin50 my-0">
		<div class="container zw-bg-black">
			<div class="row">
				<div class="col-md-6 zw-block-column zw-block-column--left">
					<div class="zw-expertise-layer__fg-img-wr -layer">
						<img class="img-fit imgx700 h100" src="<?php echo $gdir; ?>/img/contact-us/banner.png" alt="Contact us">
						<div class="zw-overlay zw-overlay--info"></div>
					</div>
					<div class="zw-block-column__item zw-hv-center zw-py-5">
						<h1 class="h1Heading pb-3 mb-md-3 brd-btn">Contact us</h1>
						<p class="pDesc mt-3 mt-md-0">Send your quote by uploading a file from your computer.</p>
					</div>
				</div>
				<div class="col-md-6 zw-block-column zw-block-column--right">
					<div class="zWContactForm">
						<?php echo do_shortcode( '[contact-form-7 id="354" title="Contact us" html_class="ui form segment"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Need Help-->
	<section class="zw-metrics section-padding150">
		<div class="container">
			<div class="row">
				<h2 class="h2 mb-3 mb-md-4 text-uppercase">Offices</h2>
			</div>
			<div class="row zw-needHelp-blocklist">
				<?php 
					$contactCards = carbon_get_the_post_meta( 'crb_contact_section' );
					foreach ( $contactCards as $contactCard ) {
				?>
				<div class="zwPanel">
					<h3 class="fnt-24 fnt-700 mb-0 fnt-gow-bold"><?php echo $contactCard['crb_contact_section_heading']; ?></h3>
					<p class="zw-section-lead__des zm-clr-gr4c my-3"><?php echo $contactCard['crb_contact_section_officename']; ?></p>
					<p class="zw-section-lead__des zm-clr-gr4c my-3"><?php echo $contactCard['crb_contact_address']; ?></p>
				</div>
				<?php } ?>
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