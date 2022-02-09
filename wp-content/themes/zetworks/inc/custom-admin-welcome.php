<?php
add_action( 'admin_footer', 'rv_custom_dashboard_widget' );
function rv_custom_dashboard_widget() {
	if ( get_current_screen()->base !== 'dashboard' ) {
		return;
	}
	?>

	<div id="custom-id" class="welcome-panel" style="height: 200px !important;">
		<div class="welcome-panel-content">
			<h2>Welcome! to Admin Panel</h2>
			<p class="about-description"></p>
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column"></div>
				<div class="welcome-panel-column"></div>
				<div class="welcome-panel-column welcome-panel-last"></div>
			</div>
		</div>
	</div>

	<script>
		jQuery(document).ready(function($) {
			$('#welcome-panel').after($('#custom-id').show());
		});
	</script>
<?php }