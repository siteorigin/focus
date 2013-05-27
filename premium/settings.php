<?php

function focus_premium_init_settings(){
	// Activate all the teaser settings
	siteorigin_settings_add_field('general', 'ajax_comments', 'checkbox');
	siteorigin_settings_add_field('general', 'siteorigin_credits', 'checkbox');

	siteorigin_settings_add_field('video', 'autoplay', 'checkbox');
	siteorigin_settings_add_field('video', 'hide_related', 'checkbox');
	siteorigin_settings_add_field('video', 'default_hd', 'checkbox');
	siteorigin_settings_add_field('video', 'play_button', 'media');
	siteorigin_settings_add_field('video', 'premium_access', 'text', null, array(
		'options' => array(
			's2member_level4' => __('S2Member - Level 4 Members', 'focus'),
			's2member_level3' => __('S2Member - Level 3 Members', 'focus'),
			's2member_level2' => __('S2Member - Level 2 Members', 'focus'),
			's2member_level1' => __('S2Member - Level 1 Members', 'focus'),
			's2member_level0' => __('S2Member - Free Subscribers', 'focus'),
		)
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
	siteorigin_settings_add_field('slider', 'post_cat', 'select', null, array(
		'options' => $category_options,
	));

	siteorigin_settings_add_field('slider', 'post_orderby', 'select', null, array(
		'options' => array(
			'date' => __('Date', 'focus'),
			'title' => __('Title', 'focus'),
			'rand' => __('Random', 'focus'),
			'comment_count' => __('Comment Count', 'focus'),
		),
	));
	

	siteorigin_settings_add_field('cta', 'hide', 'text', null, array(
		'options' => array(
			's2member_level4' => __('S2Member - Level 4 Members', 'focus'),
			's2member_level3' => __('S2Member - Level 3 Members', 'focus'),
			's2member_level2' => __('S2Member - Level 2 Members', 'focus'),
			's2member_level1' => __('S2Member - Level 1 Members', 'focus'),
			's2member_level0' => __('S2Member - Free Subscribers', 'focus'),
		)
	));

	siteorigin_settings_add_field('menu', 'search', 'checkbox', null, array(
		'label' => __('Enabled', 'focus')
	));

	siteorigin_settings_add_field('layout', 'responsive', 'checkbox');
}
add_action('admin_init', 'focus_premium_init_settings', 11);