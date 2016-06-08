<?php

function focus_add_legacy_settings_page(){
	add_theme_page(
		__( 'Theme Settings', 'focus' ),
		__( 'Theme Settings', 'focus' ),
		'manage_options',
		'focus-legacy-settings',
		'focus_legacy_settings_page'
	);
}
add_action( 'admin_menu', 'focus_add_legacy_settings_page' );

function focus_legacy_settings_page(){
	?>
	<div class="wrap">
		<h2><?php _e( 'Focus Settings Have Moved', 'focus' ) ?></h2>
		<p>
			<?php _e( 'Our theme settings now take advantage of the WordPress customizer.', 'focus' ); ?>
			<?php _e( 'Navigate to <strong>Appearance > Customize > Theme Settings</strong> to access theme settings.', 'focus' ); ?>
		</p>
	</div>
	<?php
}