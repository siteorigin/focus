<?php
/**
 * The template for displaying full width pages without the title section.
 *
 * @package focus
 * @since focus 1.3.3
 */

/*
Template Name: Full Width - No Title
*/

get_header(); the_post(); ?>

	<div id="primary" class="content-area">

		<?php
		$page_header = get_post_meta( get_the_ID(), 'focus-page-header', true );
		$panels_data = get_post_meta( get_the_ID(), 'panels_data', true );
		
		if ( isset( $page_header ) && $page_header == 'yes' && !empty( $panels_data ) ) {
			$top_area_widgets = array();

			for ( $i = 0; $i < count( $panels_data['widgets'] ); $i++ ) {
				if ( $panels_data['widgets'][$i]['panels_info']['grid'] == 0 ) {
					$top_area_widgets[] = $panels_data['widgets'][$i];
				}
			}

			// Now, we're going to render these widgets
			ob_start();
			foreach ( $top_area_widgets as $top_widget ) {
				the_widget( $top_widget['panels_info']['class'], $top_widget );
			}
			echo '<div id="single-header">' . ob_get_clean() . '</div>';
		} ?>

		<div class="container">
			<div class="container-decoration"></div>

			<div class="content-container">
				<div id="content" class="site-content" role="main">

					<div class="entry-content">
						<?php the_content() ?>
					</div>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) comments_template( '', true );
					?>
				</div><!-- #content .site-content.content-container -->

				<div class="clear"></div>
			</div>

		</div>
	</div><!-- #primary .content-area -->

<?php get_footer(); ?>
