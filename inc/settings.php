<?php

function focus_theme_settings(){
	$settings = SiteOrigin_Settings::single();

	$settings->add_section( 'general', __( 'General', 'focus' ) );
	$settings->add_section( 'slider', __( 'Slider', 'focus' ) );
	$settings->add_section( 'video', __( 'Video', 'focus' ) );
	$settings->add_section( 'icons', __( 'Icons', 'focus' ) );
	$settings->add_section( 'layout', __( 'Layout', 'focus' ) );
	$settings->add_section( 'text', __( 'Text', 'focus' ) );
	$settings->add_section( 'menu', __( 'Main Menu', 'focus' ) );
	$settings->add_section( 'cta', __( 'Call To Action', 'focus' ) );
	$settings->add_section( 'comments', __( 'Comments', 'focus' ) );

	/**
	 * General Settings
	 */

	$settings->add_field( 'general', 'logo', 'media',__( 'Logo', 'focus' ), array(
		'choose' => __( 'Choose Logo Image', 'focus' ),
		'update' => __( 'Set Logo', 'focus' ),
		'description' => __( 'Logo displayed in your masthead.', 'focus' )
	) );

	$settings->add_field( 'general', 'retina_logo', 'media',__( 'Retina Logo', 'focus' ), array(
		'choose' => __( 'Choose Retina Logo Image', 'focus' ),
		'update' => __( 'Set Logo', 'focus' ),
		'description' => __( 'A double sized logo to use on retina devices.', 'focus' )
	) );

	$settings->add_field( 'general', 'logo_scale', 'checkbox',__( 'Scale Logo', 'focus' ), array(
		'description' => __( 'If used, scale the logo to fit the menu bar', 'focus' ),
	) );

	$settings->add_teaser( 'general', 'attribution', 'checkbox', __( 'SiteOrigin Attribution', 'focus' ), array(
		'description' => __( 'Add or remove a link to SiteOrigin in your footer.', 'focus' ),
		'featured' => 'theme/no-attribution',
	) );

	$settings->add_field( 'general', 'display_author', 'checkbox',__( 'Display Post Author', 'focus' ), array(
		'description' => __( 'Displays post author information on a post page.', 'focus' )
	) );

	$settings->add_field( 'general', 'posts_nav', 'checkbox',__( 'Display Post Navigation', 'focus' ), array(
		'description' => __( 'Display next and previous post links on at the bottom of post single pages.', 'focus' )
	) );

	/**
	 * Home Page Slider
	 */

	$settings->add_field( 'slider', 'homepage', 'checkbox', __( 'Home Page Slider', 'focus' ), array(
		 'description' => __( 'Display a posts slider on the home page.', 'focus' )
	 ) );

	$settings->add_field( 'slider', 'post_count', 'number', __( 'Post Count', 'focus' ), array(
		'description' => __( 'The number of posts to display.', 'focus' )
	) );

	$category_options = array(
		0 => __( 'All', 'focus' ),
	);
	$cats = get_categories();
	if( !empty( $cats ) ){
		foreach( get_categories() as $cat ){
			$category_options[$cat->term_id] = $cat->name;
		}
	}

	$settings->add_field( 'slider', 'post_cat', 'select', __( 'Post Category', 'focus' ), array(
		'description' => __( 'Which category to fetch the video posts from.', 'focus' ),
		'options' => $category_options,
	) );

	$settings->add_field( 'slider', 'post_orderby', 'select', __( 'Posts Order', 'focus' ), array(
		'description' => __( 'The order in which to display the posts.', 'focus' ),
		'options' => array(
			'date' => __( 'Date', 'focus' ),
			'title' => __( 'Title', 'focus' ),
			'rand' => __( 'Random', 'focus' ),
			'comment_count' => __( 'Comment Count', 'focus' ),
		),
	) );

	/**
	 * Video Player
	 */

	$settings->add_field( 'video', 'by_text', 'text', __( 'Video By Text', 'focus' ), array(
		'description' => __( 'Change the text "video by" on single post pages.', 'focus' )
	) );

	$settings->add_field( 'video', 'autoplay', 'checkbox', __( 'Autoplay Videos', 'focus' ), array(
		'description' => __( 'Videos start playing as soon as the video page is loaded.', 'focus' )
	) );

	$settings->add_field( 'video', 'hide_related', 'checkbox', __( 'Hide Related Videos', 'focus' ), array(
		'description' => __( 'Hides related videos after a YouTube or Vimeo Plus video finishes.', 'focus' )
	) );

	$settings->add_field( 'video', 'play_button', 'media', __( 'Play Button', 'focus' ), array(
		'description' => __( 'Add a custom play button to self hosted video.', 'focus' )
	) );

	$settings->add_field( 'video', 'premium_access', 'text', __( 'Premium Access Rights', 'focus' ), array(
		'description' => __( 'The access rights required to view the premium version of a video. Can be used to integrate with plugins like <a href="http://www.s2member.com/3000.html">S2Member</a>', 'focus' ),
		'options' => array(
			's2member_level4' => __( 'S2Member - Level 4 Members', 'focus' ),
			's2member_level3' => __( 'S2Member - Level 3 Members', 'focus' ),
			's2member_level2' => __( 'S2Member - Level 2 Members', 'focus' ),
			's2member_level1' => __( 'S2Member - Level 1 Members', 'focus' ),
			's2member_level0' => __( 'S2Member - Free Subscribers', 'focus' ),
		)
	) );

	/**
	 * Icons
	 */

	$settings->add_field( 'icons', 'post_navigation', 'checkbox', __( 'Post Navigation Arrows', 'focus' ), array(
		'description' => __( 'Display next and previous arrows in the post single header for easier navigation.', 'focus' )
	) );

	$settings->add_field( 'icons', 'search', 'media', __( 'Masthead Search Icon', 'focus' ), array(
		'description' => __( 'Replace the search icon with an image.', 'focus' )
	) );

	$settings->add_field( 'icons', 'post_previous', 'media', __( 'Previous Post Icon', 'focus' ), array(
		'description' => __( 'Replace the previous arrow icon with an image in single posts.', 'focus' )
	) );

	$settings->add_field( 'icons', 'post_next', 'media', __( 'Next Post Icon', 'focus' ), array(
		'description' => __( 'Replace the next arrow icon with an image in single posts.', 'focus' )
	) );

	/**
	 * Page Layout
	 */

	$settings->add_field( 'layout', 'responsive', 'checkbox', __( 'Responsive Layout', 'focus' ), array(
		'description' => __( 'Make your site responsive.', 'focus' )
	) );

	/**
	 * Site Text
	 */

	$settings->add_field( 'text', 'no_results', 'text', __( 'No Search Results', 'focus' ), array(
		'description' => __( 'Text displayed on your no search results pages.', 'focus' )
	) );

	$settings->add_field( 'text', 'not_found', 'text', __( 'Page Not Found', 'focus' ), array(
		'description' => __( 'Text displayed on your 404 pages.', 'focus' )
	) );

	$settings->add_field( 'text', 'latest_posts', 'text', __( 'Latest Posts Headline', 'focus' ) );

	$settings->add_field( 'text', 'footer_copyright', 'text', __( 'Footer Copyright', 'focus' ), array(
		'description' => __( 'Text in your site footer.', 'focus' )
	) );

	/**
	 * Main Menu
	 */

	$settings->add_field( 'menu', 'home', 'checkbox', __( 'Home Link', 'focus' ), array(
		'description' => __( 'Add a home link to your menu bar. Only applicable a custom menu hasn\'t been saved to the Primary Menu location.', 'focus' )
	) );

	$settings->add_field( 'menu', 'search', 'checkbox', __( 'Menu Search', 'focus' ), array(
		'description' => __( 'Add search box to menu bar.', 'focus' )
	) );

	/**
	 * Footer CTA
	 */

	$settings->add_field( 'cta', 'text', 'text', __( 'CTA Text', 'focus' ) );
	$settings->add_field( 'cta', 'button_text', 'text', __( 'CTA Button Text', 'focus' ) );
	$settings->add_field( 'cta', 'button_url', 'text', __( 'CTA Button URL', 'focus' ) );

	/**
	 * Comments
	 */

	$settings->add_teaser( 'comments', 'ajax_comments', 'checkbox', __( 'Ajax Comments', 'focus' ), array(
		'description' => __( 'Lets your users post comments without interrupting video play.', 'focus' ),
		'featured' => 'theme/ajax-comments',
	) );

	$settings->add_field( 'comments', 'page_hide', 'checkbox',__( 'Hide Page Comments', 'focus' ), array(
		'description' => __( 'Automatically hides the comments and comment form on pages.', 'focus' ),
		'label' => __( 'Hide', 'focus' ),
	) );

	$settings->add_field( 'comments', 'hide_allowed_tags', 'checkbox',__( 'Hide Allowed Tags', 'focus' ), array(
		'description' => __( 'Hides allowed tags from the comment form.', 'focus' ),
		'label' => __( 'Hide', 'focus' ),
	) );
}
add_action( 'siteorigin_settings_init', 'focus_theme_settings' );

function focus_theme_setting_defaults( $defaults ) {
	//General
	$defaults['general_logo']               = '';
	$defaults['general_retina_logo']        = '';
	$defaults['general_logo_scale']         = true;
	$defaults['general_attribution']        = true;
	$defaults['general_display_author']     = true;
	$defaults['general_posts_nav']          = true;

	// Main Menu
	$defaults['menu_home']   = true;
	$defaults['menu_search'] = false;

	// Site Text
	$defaults['text_not_found']        = __( 'We couldn\'t find the page you were looking for.', 'focus' );
	$defaults['text_no_results']       = __( 'We couldn\'t find any results for your query.', 'focus' );
	$defaults['text_latest_posts']     = __( 'Latest Videos', 'focus' );
	$defaults['text_footer_copyright'] = '';

	// Footer CTA
	$defaults['cta_text']        = '';
	$defaults['cta_button_url']  = '';
	$defaults['cta_button_text'] = '';
	$defaults['cta_hide']        = '';

	// The slider
	$defaults['slider_homepage']     = true;
	$defaults['slider_post_count']   = 5;
	$defaults['slider_post_cat']     = '';
	$defaults['slider_post_orderby'] = 'date';

	// The Video
	$defaults['video_by_text']        = '';
	$defaults['video_premium_access'] = '';
	$defaults['video_play_button']    = false;
	$defaults['video_default_hd']     = false;
	$defaults['video_autoplay']       = false;
	$defaults['video_hide_related']   = false;

	// Icons
	$defaults['icons_post_navigation'] = true;
	$defaults['icons_search']          = false;
	$defaults['icons_post_previous']   = false;
	$defaults['icons_post_next']       = false;

	// Comments
	$defaults['comments_ajax_comments']     = false;
	$defaults['comments_page_hide']         = false;
	$defaults['comments_hide_allowed_tags'] = false;

	// Layout
	$defaults['layout_responsive'] = true;

	return $defaults;
}
add_filter( 'siteorigin_settings_defaults', 'focus_theme_setting_defaults' );

function focus_about_page_setup( $about ){
	$about['description'] = __( 'Focus is a great theme for showing off your videos. It supports videos hosted on other sites like YouTube and Vimeo through oEmbed. You can even self host your videos.', 'focus' );

	$about['documentation_url'] = 'https://siteorigin.com/focus-documentation/';

	$about[ 'sections' ] = array(
		'free',
		'support',
		'page-builder',
		'github',
	);

	return $about;
}
add_filter( 'siteorigin_about_page', 'focus_about_page_setup' );

/**
 * Adds a meta box to the post editing screen
 */
function focus_add_page_meta_boxes() {
	add_meta_box( 'focus_page_header', __( 'Focus Page Header', 'focus' ), 'focus_display_page_header_meta_box', 'page', 'side' );
}
add_action( 'add_meta_boxes', 'focus_add_page_meta_boxes' );

/**
 * Outputs the content of the meta box
 */

function focus_display_page_header_meta_box( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'focus_page_header_nonce' );
	$page_header = get_post_meta( $post->ID );
	?>

	<p>
		<label>
			<input type="checkbox" name="focus-page-header" id="focus-page-header" value="no" <?php if ( isset ( $page_header['focus-page-header'] ) ) checked( $page_header['focus-page-header'][0], 'yes' ); ?> />
			<?php _e( 'Use First Page Builder Row', 'focus' ) ?>
		</label>
		<br/>
		<small class="description">
			<?php _e( 'Moves first row into the header. Page template must be set to Full Width - No Title.', 'focus' ) ?>
		</small>
	</p>

	<?php
}

/**
 * Saves the custom meta input
 */
function focus_page_header_save( $post_id ) {

	// Checks save status - overcome autosave, etc.
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'focus_page_header_nonce' ] ) && wp_verify_nonce( $_POST[ 'focus_page_header_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$current_user = !current_user_can( 'edit_post', $post_id );

	// Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce || $current_user ) {
		return;
	}

	// Checks for input and saves - save checked as yes and unchecked at no
	if( isset( $_POST[ 'focus-page-header' ] ) ) {
		update_post_meta( $post_id, 'focus-page-header', 'yes' );
	} else {
		update_post_meta( $post_id, 'focus-page-header', 'no' );
	}

}
add_action( 'save_post', 'focus_page_header_save' );
