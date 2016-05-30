<?php

function focus_theme_settings(){
	$settings = SiteOrigin_Settings::single();

	$settings->add_section('general', __('General', 'focus'));
	$settings->add_section('slider', __('Slider', 'focus'));
	$settings->add_section('video', __('Video', 'focus'));
	$settings->add_section('layout', __('Layout', 'focus'));
	$settings->add_section('text', __('Text', 'focus'));
	$settings->add_section('menu', __('Main Menu', 'focus'));
	$settings->add_section('cta', __('Call To Action', 'focus'));
	$settings->add_section('comments', __('Comments', 'focus'));

	/**
	 * General Settings
	 */

	$settings->add_field('general', 'logo', 'media',__('Logo', 'focus'), array(
		'choose' => __('Choose Logo Image', 'focus'),
		'update' => __('Set Logo', 'focus'),
	));
	$settings->add_field('general', 'logo_scale', 'checkbox',__('Scale Logo', 'focus'), array(
		'description' => __('If used, scale the logo to fit the menu bar', 'focus'),
	));
	
	$settings->add_field('general', 'display_author', 'checkbox',__('Display Post Author', 'focus'), array(
		'description' => __('Displays post author information on a post page.', 'focus')
	));

	$settings->add_field('general', 'posts_nav', 'checkbox',__('Display Post Navigation', 'focus'), array(
		'description' => __('Display next and previous post links on post single pages.', 'focus')
	));
	
//	$settings->add_teaser('general', 'ajax_comments', 'checkbox', __('Ajax Comments', 'focus'), array(
//		'description' => __('Lets your users post comments without interrupting video play.', 'focus')
//	));
//
//	$settings->add_teaser('general', 'siteorigin_credits', 'checkbox', __('Display Credit Link', 'focus'), array(
//		'description' => __('Display "Theme by SiteOrigin" in your footer.', 'focus')
//	));

	/**
	 * Home Page Slider
	 */

	$settings->add_field('slider', 'post_count', 'number', __('Post Count', 'focus'), array(
		'description' => __('The number of posts to display.', 'focus')
	));

	$category_options = array(
		0 => __('All', 'focus'),
	);
	$cats = get_categories();
	if(!empty($cats)){
		foreach(get_categories() as $cat){
			$category_options[$cat->term_id] = $cat->name;
		}
	}

	$settings->add_field('slider', 'post_cat', 'select', __('Post Category', 'focus'), array(
		'description' => __('Which category to fetch the video posts from.', 'focus'),
		'options' => $category_options,
	));

	$settings->add_field('slider', 'post_orderby', 'select', __('Posts Order', 'focus'), array(
		'description' => __('The order in which to display the posts.', 'focus'),
		'options' => array(
			'date' => __('Date', 'focus'),
			'title' => __('Title', 'focus'),
			'rand' => __('Random', 'focus'),
			'comment_count' => __('Comment Count', 'focus'),
		),
	));

	/**
	 * Video Player
	 */

	$settings->add_field('video', 'by_text', 'text', __('Video By Text', 'focus'), array(
		'description' => __('Change the text "video by" on single post pages.', 'focus')
	));
	
	$settings->add_field('video', 'autoplay', 'checkbox', __('Autoplay Videos', 'focus'), array(
		'description' => __('Videos start playing as soon as the video page is loaded.', 'focus')
	));

	$settings->add_field('video', 'hide_related', 'checkbox', __('Hide Related Videos', 'focus'), array(
		'description' => __('Hides related videos after a YouTube or Vimeo Plus video finishes.', 'focus')
	));

	$settings->add_field('video', 'play_button', 'media', __('Play Button', 'focus'), array(
		'description' => __('Add a custom play button to self hosted video.', 'focus')
	));

	$settings->add_field('video', 'premium_access', 'text', __('Premium Access Rights', 'focus'), array(
		'description' => __('The access rights required to view the premium version of a video. Can be used to integrate with plugins like <a href="http://www.s2member.com/3000.html">S2Member</a>', 'focus'),
		'options' => array(
			's2member_level4' => __('S2Member - Level 4 Members', 'focus'),
			's2member_level3' => __('S2Member - Level 3 Members', 'focus'),
			's2member_level2' => __('S2Member - Level 2 Members', 'focus'),
			's2member_level1' => __('S2Member - Level 1 Members', 'focus'),
			's2member_level0' => __('S2Member - Free Subscribers', 'focus'),
		)
	));

	/**
	 * Page Layout
	 */

	$settings->add_field('layout', 'responsive', 'true', __('Responsive Layout', 'focus'), array(
		'description' => __('Make your site responsive.', 'focus')
	));

	/**
	 * Site Text
	 */

	$settings->add_field('text', 'no_results', 'text', __('No Search Results', 'focus'), array(
		'description' => __('Text displayed on your no search results pages.', 'focus')
	));

	$settings->add_field('text', 'not_found', 'text', __('Page Not Found', 'focus'), array(
		'description' => __('Text displayed on your 404 pages.', 'focus')
	));

	$settings->add_field('text', 'footer_copyright', 'text', __('Footer Copyright', 'focus'), array(
		'description' => __('Text in your site footer.', 'focus')
	));

	$settings->add_field('text', 'latest_posts', 'text', __('Latest Posts Headline', 'focus'));
	
	/**
	 * Main Menu
	 */

	$settings->add_field('menu', 'home', 'checkbox', __('Home Link', 'focus'), array(
		'description' => __('Add a home link to your menu bar.', 'focus')
	));

	$settings->add_teaser('menu', 'search', __('Search', 'focus'), array(
		'description' => __('Adds a small search box in your menu bar.', 'focus'),
		'teaser-image' => get_template_directory_uri().'/upgrade/features/search-bar.jpg'
	));
	
	/**
	 * Footer CTA
	 */

	$settings->add_field('cta', 'text', 'text', __('CTA Text', 'focus'));
	$settings->add_field('cta', 'button_text', 'text', __('CTA Button Text', 'focus'));
	$settings->add_field('cta', 'button_url', 'text', __('CTA Button URL', 'focus'));

	$settings->add_teaser('cta', 'hide', __('Hide CTA', 'focus'), array(
		'description' => __('Comma separated list of capabilities from which to hide the CTA.', 'focus')
	));
	
	/**
	 * Comments
	 */

	$settings->add_field('comments', 'page_hide', 'checkbox',__('Hide Page Comments', 'focus'), array(
		'description' => __('Automatically hides the comments and comment form on pages.', 'focus'),
		'label' => __('Hide', 'focus'),
	));

	$settings->add_field('comments', 'hide_allowed_tags', 'checkbox',__('Hide Allowed Tags', 'focus'), array(
		'description' => __('Hides allowed tags from the comment form.', 'focus'),
		'label' => __('Hide', 'focus'),
	));
}
add_action('siteorigin_settings_init', 'focus_theme_settings');

function focus_theme_setting_defaults($defaults){
	$defaults['general_logo'] = '';
	$defaults['general_logo_scale'] = true;
	$defaults['general_ajax_comments'] = false;
	$defaults['general_display_author'] = true;
	$defaults['general_posts_nav'] = true;
	$defaults['general_siteorigin_credits'] = true;

	$defaults['menu_home'] = true;
	$defaults['menu_search'] = false;
	
	$defaults['text_not_found'] = false;
	$defaults['text_no_results'] = false;
	$defaults['text_latest_posts'] = false;
	$defaults['text_footer_copyright'] = false;
	
	$defaults['cta_text'] = '';
	$defaults['cta_button_url'] = '';
	$defaults['cta_button_text'] = '';
	$defaults['cta_hide'] = '';

	// The slider
	$defaults['slider_post_count'] = 5;
	$defaults['slider_post_cat'] = '';
	$defaults['slider_post_orderby'] = 'date';
	
	// The Video
	$defaults['video_by_text'] = '';
	$defaults['video_premium_access'] = '';
	$defaults['video_play_button'] = false;
	$defaults['video_default_hd'] = false;
	$defaults['video_autoplay'] = false;
	$defaults['video_hide_related'] = false;
	
	// Comments
	$defaults['comments_page_hide'] = false;
	$defaults['comments_hide_allowed_tags'] = false;

	// Layoyt
	$defaults['layout_responsive'] = true;
	
	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'focus_theme_setting_defaults');