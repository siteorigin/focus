<?php

function focus_premium_upgrade_content($content){
	$content['premium_title'] = __('Take Focus to The Next Level', 'focus');
	$content['premium_summary'] = __('Give your video site a professional polish with our set of premium features.', 'focus');

	$content['buy_url'] = 'http://google.com';
	$content['buy_price'] = '$14';
	$content['buy_message_1'] = 'This is a test message';
	$content['buy_message_2'] = 'This is a test message';


	$content['featured'] = array(
		get_template_directory_uri().'/upgrade/page.jpg',
		1400,1228
	);

	$content['features'] = array();
	$content['features'][] = array(
		'heading' => __('Email Support', 'origami'),
		'content' => __("Need help setting up Origami? Upgrading to Origami Premium gives you access to email support for answers to any questions you can't find in the theme documentation.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __('Remove Attribution Links', 'origami'),
		'content' => __('Origami premium gives you the option to easily remove the "Powered by WordPress, Theme by SiteOrigin" text from your footer. ', 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("Responsive Footer Widgets", 'origami'),
		'content' => __("The final puzzle piece in making Origami truly responsive. Origami Premium has footer widgets that collapse below each other on narrower resolution devices.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("Ajax Comments", 'origami'),
		'content' => __("Want to keep the conversation flowing? Ajax comments means your visitors can comment without reloading your page. So commenting wont interrupt a video or lose their position in one of your galleries.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("Social Sharing", 'origami'),
		'content' => __("Origami Premium includes social sharing for Facebook, Twitter and Google Plus. They fit right into the clean design of Origami.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("CSS Editor", 'origami'),
		'content' => __("A simple CSS editor that lets you easily add code that changes the look of Origami. You can count on our support staff to help you with CSS snippets to get the look you're after. Best of all, your changes will persist across updates.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("Continued Updates", 'origami'),
		'content' => __("You'll get continued updates, ensuring that your Origami powered site keeps on working with the latest version of WordPress for years to come.", 'origami'),
	);
	
	$content['testimonials'] = array(
		array(
			'name' => 'Voxhominem',
			'content' => 'This theme truly struck me right in my bloggtastical heart! I’ve been looking for a theme like this for months.',
			'gravatar' => '67dc8f173cdc3d0e267cb72e89283ba8'
		),
		array(
			'name' => 'Vanessa',
			'content' => 'This theme is exactly what I’ve been looking for.',
			'gravatar' => '728d8fea8ba62dddcbed9f2213bbfa8b'
		),
		array(
			'name' => 'Marko',
			'content' => 'Most certanly the best choice for my next project!',
			'gravatar' => '200570e0ce4666f87bd07df33144460f'
		),
	);

	return $content;
}
add_filter('siteorigin_premium_content', 'focus_premium_upgrade_content');