<?php

function focus_theme_settings(){
	siteorigin_settings_add_section('general', __('General', 'focus'));
	siteorigin_settings_add_section('slider', __('Home Page Slider', 'focus'));
	siteorigin_settings_add_section('video', __('Video Player', 'focus'));
	siteorigin_settings_add_section('layout', __('Layout', 'focus'));
	siteorigin_settings_add_section('text', __('Site Text', 'focus'));
	siteorigin_settings_add_section('menu', __('Main Menu', 'focus'));
	siteorigin_settings_add_section('cta', __('Call To Action', 'focus'));

	/**
	 * General Settings
	 */

	siteorigin_settings_add_teaser('general', 'ajax_comments', __('Ajax Comments', 'focus'), array(
		'description' => __('Lets your users post comments without interrupting video play.', 'focus')
	));

	/**
	 * Home Page Slider
	 */

	siteorigin_settings_add_field('slider', 'post_count', 'number', __('Post Count', 'focus'), array(
		'description' => __('The number of posts to display.', 'focus')
	));

	siteorigin_settings_add_teaser('slider', 'post_cat', __('Post Category', 'focus'), array(
		'description' => __('Which category to fetch the video posts from.', 'focus')
	));

	siteorigin_settings_add_teaser('slider', 'post_orderby', __('Posts Order', 'focus'), array(
		'description' => __('The order in which to display the posts.', 'focus')
	));

	/**
	 * Video Player
	 */

	siteorigin_settings_add_teaser('video', 'autoplay', __('Autoplay Videos', 'focus'), array(
		'description' => __('Videos start playing as soon as the video page is loaded.', 'focus')
	));

	siteorigin_settings_add_teaser('video', 'hide_related', __('Hide Related Videos', 'focus'), array(
		'description' => __('Hides related videos after a YouTube or Vimeo Plus video finishes.', 'focus')
	));

	siteorigin_settings_add_teaser('video', 'default_hd', __('Play Videos in HD', 'focus'), array(
		'description' => __('Play YouTube oEmbed videos in HD. Vimeo HD playback is controlled on Vimeo itself.', 'focus')
	));

	siteorigin_settings_add_teaser('video', 'play_button', __('Play Button', 'focus'), array(
		'description' => __('Add a custom play button to self hosted video.', 'focus')
	));

	siteorigin_settings_add_teaser('video', 'premium_access', __('Premium Access Rights', 'focus'), array(
		'description' => __('The access rights required to view the premium version of a video. Can be used to integrate with plugins like <a href="http://www.s2member.com/3000.html">S2Member</a>', 'focus')
	));

	/**
	 * Page Layout
	 */

	siteorigin_settings_add_field('layout', 'page_width', 'select', __('Page Width', 'focus'), array(
		'description' => __('The overlay placed over the video background.', 'focus'),
		'options' => array(
			720 => '720px',
			960 => '960px',
		)
	));
	
	siteorigin_settings_add_teaser('layout', 'responsive', __('Responsive Layout', 'focus'), array(
		'description' => __('Make your video site responsive.', 'focus')
	));

	/**
	 * Site Text
	 */

	siteorigin_settings_add_field('text', 'no_results', 'text', __('No Search Results', 'focus'), array(
		'description' => __('Text displayed on your no search results pages.', 'focus')
	));

	siteorigin_settings_add_field('text', 'not_found', 'text', __('Page Not Found', 'focus'), array(
		'description' => __('Text displayed on your 404 pages.', 'focus')
	));

	siteorigin_settings_add_field('text', 'footer_copyright', 'text', __('Footer Copyright', 'focus'), array(
		'description' => __('Text in your site footer.', 'focus')
	));

	siteorigin_settings_add_field('text', 'latest_headline', 'text', __('Latest Posts Headline', 'focus'));
	
	/**
	 * Main Menu
	 */

	siteorigin_settings_add_field('menu', 'home', 'checkbox', __('Home Link', 'focus'), array(
		'description' => __('Add a home link to your menu bar.', 'focus')
	));

	siteorigin_settings_add_teaser('menu', 'search', __('Search', 'focus'), array(
		'description' => __('Adds a small search box in your menu bar.', 'focus'),
		'teaser-image' => get_template_directory_uri().'/upgrade/features/search-bar.jpg'
	));
	
	/**
	 * Footer CTA
	 */

	siteorigin_settings_add_field('cta', 'text', 'text', __('CTA Text', 'focus'));
	siteorigin_settings_add_field('cta', 'button_text', 'text', __('CTA Button Text', 'focus'));
	siteorigin_settings_add_field('cta', 'button_url', 'text', __('CTA Button URL', 'focus'));

	siteorigin_settings_add_teaser('cta', 'hide', __('Hide CTA', 'focus'), array(
		'description' => __('Comma separated list of capabilities from which to hide the CTA.', 'focus')
	));
}
add_action('admin_init', 'focus_theme_settings');

function focus_theme_setting_defaults($defaults){
	$defaults['menu_home'] = true;
	
	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'focus_theme_setting_defaults');