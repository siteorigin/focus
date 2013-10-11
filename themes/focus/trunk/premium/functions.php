<?php 

define('SITEORIGIN_IS_PREMIUM', true);

include get_template_directory().'/premium/settings.php';

include get_template_directory().'/premium/extras/css/css.php';
include get_template_directory().'/premium/extras/ajax-comments/ajax-comments.php';

function focus_premium_theme_init(){
	if(siteorigin_setting('layout_responsive')) {
		// Add the movile navigation menu if responsive layout is enabled.
		include get_template_directory().'/premium/extras/mobilenav/mobilenav.php';
	}
	if(siteorigin_setting('general_ajax_comments')) siteorigin_ajax_comments_activate();
}
add_action('after_setup_theme', 'focus_premium_theme_init', 11);


function focus_premium_filter_video_embed_code($code){
	if(siteorigin_setting('video_autoplay') || siteorigin_setting('video_hide_related') || siteorigin_setting('video_default_hd')) {
		$code = preg_replace_callback('/src="([^"]*)"/', 'focus_premium_video_change_autoplay_callback', $code);
	}
	echo $code;
}
add_filter('focus_video_embed_code', 'focus_premium_filter_video_embed_code');

function focus_premium_video_change_autoplay_callback($matches){
	$url = $matches[1];
	if(siteorigin_setting('video_autoplay')){
		$url = add_query_arg('autoplay', 1, $url);
	}
	if(siteorigin_setting('video_hide_related')){
		$url = add_query_arg('rel', 0, $url);
	}
	if(siteorigin_setting('video_default_hd')){
		$url = add_query_arg('vq', 'hd1080', $url);
	}
	
	return 'src="' .$url. '"';
}

function focus_premium_set_video_type($type, $video, $id){
	$cap = siteorigin_setting('video_premium_access');
	
	if(empty($video['premium'])) return $type;
	
	if(!empty($cap) && current_user_can($cap) && !empty($video['premium'][$video['premium']['type']])){
		$type = 'premium';
	}
	
	return $type;
}
add_filter('focus_video_type', 'focus_premium_set_video_type', 10, 3);

function focus_premium_video_selfhosted_attrs(){
	if(siteorigin_setting('video_autoplay')) echo "data-autoplay='1'";
}
add_action('focus_video_selfhosted_attrs', 'focus_premium_video_selfhosted_attrs');

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

function focus_premium_filter_slider_posts_query($args){
	$args = wp_parse_args(array(
		'cat' => siteorigin_setting('slider_post_cat'),
		'orderby' => siteorigin_setting('slider_post_orderby'),
	), $args);
	if(empty($args['cat'])) unset($args['cat']);
	
	return $args;
}
add_filter('focus_slider_posts_query', 'focus_premium_filter_slider_posts_query');

function focus_premium_before_menu(){
	if(siteorigin_setting('menu_search')){
		get_search_form();
	}
}
add_action('before_menu', 'focus_premium_before_menu');

/**
 * Enqueue premium scripts
 */
function focus_premium_enqueue_scripts(){
	if(siteorigin_setting('layout_responsive')){
		wp_enqueue_script('fitvids', get_template_directory_uri().'/premium/js/jquery.fitvids.js', array('jquery'), '1.0');
		wp_enqueue_script('fittext', get_template_directory_uri().'/premium/js/jquery.fittext.js', array('jquery'), '1.1');
		wp_enqueue_style('siteorigin-responsive', get_template_directory_uri().'/premium/responsive.css', array(), SITEORIGIN_THEME_VERSION);
	}
}
add_action('wp_enqueue_scripts', 'focus_premium_enqueue_scripts', 12);

function focus_premium_filter_cta_args($args){
	if(siteorigin_setting('cta_hide')){
		$caps = explode(',', siteorigin_setting('cta_hide'));
		$caps = array_map('trim', $caps);
		
		// If the user has any of these capabilities, clear the cta args
		foreach($caps as $cap) if (current_user_can($cap)) return array();
	}
	
	return $args;
}
add_filter('focus_cta_args', 'focus_premium_filter_cta_args');

function focus_premium_responsive_head(){
	if(siteorigin_setting('layout_responsive')){
		?><meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale = 1.0, user-scalable=0' /><?php
	}
}
add_action('wp_head', 'focus_premium_responsive_head');