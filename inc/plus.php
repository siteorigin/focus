<?php

function focus_plus_filter_video_embed_code($code){
	if( siteorigin_setting('video_autoplay') || siteorigin_setting('video_hide_related') || siteorigin_setting('video_default_hd') ) {
		$code = preg_replace_callback('/src="([^"]*)"/', 'focus_plus_video_change_autoplay_callback', $code);
	}
	echo $code;
}
add_filter('focus_video_embed_code', 'focus_plus_filter_video_embed_code');

function focus_plus_video_change_autoplay_callback($matches){
	$url = $matches[1];
	if(siteorigin_setting('video_autoplay')){
		$url = add_query_arg('autoplay', 1, $url);
	}
	if(siteorigin_setting('video_hide_related')){
		$url = add_query_arg('rel', 0, $url);
	}
	if( siteorigin_setting('video_default_hd') ){
		$url = add_query_arg('vq', 'hd1080', $url);
		$url = add_query_arg('hd', '1', $url);
	}

	return 'src="' .$url. '"';
}

function focus_plus_set_video_type($type, $video, $id){
	$cap = siteorigin_setting('video_premium_access');

	if(empty($video['premium'])) return $type;

	if(!empty($cap) && current_user_can($cap) && !empty($video['premium'][$video['premium']['type']])){
		$type = 'premium';
	}

	return $type;
}
add_filter('focus_video_type', 'focus_plus_set_video_type', 10, 3);

function focus_plus_video_selfhosted_attrs(){
	if(siteorigin_setting('video_autoplay')) echo "data-autoplay='1'";
}
add_action('focus_video_selfhosted_attrs', 'focus_plus_video_selfhosted_attrs');

if(!function_exists('focus_video_action_play_button')):
function focus_video_action_play_button(){
	$attachment = siteorigin_setting('video_play_button');
	if(!empty($attachment)){
		$src = wp_get_attachment_image_src($attachment, 'full');

		?>
		<div class="jp-play" style="width: <?php echo $src[1] ?>px; height: <?php echo $src[2] ?>px; margin-left: <?php echo -($src[1]/2) ?>px; margin-top: <?php echo -($src[2]/2) ?>px; ">
			<?php echo wp_get_attachment_image($attachment, 'full') ?>
		</div>
		<?php
	}
	else{
		?>
		<div class="jp-play jp-play-default">
			<img src="<?php echo get_template_directory_uri() ?>/images/play.png" width="97" height="97" />
		</div>
		<?php
	}
}
endif;

function focus_plus_filter_slider_posts_query($args){
	$args = wp_parse_args(array(
		'cat' => siteorigin_setting('slider_post_cat'),
		'orderby' => siteorigin_setting('slider_post_orderby'),
	), $args);
	if(empty($args['cat'])) unset($args['cat']);

	return $args;
}
add_filter('focus_slider_posts_query', 'focus_plus_filter_slider_posts_query');

function focus_plus_before_menu(){
	if( siteorigin_setting( 'menu_search' ) ) {
		get_search_form();
		focus_display_icon( 'search' );
	}
}
add_action('before_menu', 'focus_plus_before_menu');

/**
 * Enqueue premium scripts
 */
function focus_plus_enqueue_scripts(){
	if( siteorigin_setting('layout_responsive') ){
		wp_enqueue_script('fitvids', get_template_directory_uri().'/js/jquery.fitvids' . SITEORIGIN_THEME_JS_PREFIX . '.js', array('jquery'), '1.0');
		wp_enqueue_script('fittext', get_template_directory_uri().'/js/jquery.fittext' . SITEORIGIN_THEME_JS_PREFIX . '.js', array('jquery'), '1.1');
		wp_enqueue_style('siteorigin-responsive', get_template_directory_uri().'/css/responsive.css', array(), SITEORIGIN_THEME_VERSION);
	}
}
add_action('wp_enqueue_scripts', 'focus_plus_enqueue_scripts', 12);

function focus_plus_filter_cta_args($args){
	if(siteorigin_setting('cta_hide')){
		$caps = explode( ',', siteorigin_setting('cta_hide') );
		$caps = array_map('trim', $caps);

		// If the user has any of these capabilities, clear the cta args
		foreach($caps as $cap) if ( current_user_can($cap) ) return array();
	}

	return $args;
}
add_filter('focus_cta_args', 'focus_plus_filter_cta_args');
