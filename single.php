<?php
/**
 * The Template for displaying all single posts.
 *
 * @package focus
 * @since focus 1.0
 */

get_header(); the_post(); ?>

<a name="wrapper"></a>
<div id="primary" class="content-area">

	<div id="single-header">
		<?php if(has_post_thumbnail()) : ?>
			<?php the_post_thumbnail('slider') ?>
			<div class="overlay"></div>
		<?php endif; ?>

		<?php if( siteorigin_setting( 'icon_post_navigation' ) ) : ?>
			<?php previous_post_link( '<div class="nav-previous-post">%link</div>', '<i class="focus-icon-long-arrow-left"></i>' ); ?>
			<?php next_post_link( '<div class="nav-next-post">%link</div>', '<i class="focus-icon-long-arrow-right"></i>' ); ?>
		<?php endif; ?>

		<div class="container">
			<div class="post-heading">
				<h1><?php the_title() ?></h1>
				<?php if(has_excerpt()) : ?><p><?php the_excerpt() ?></p><?php endif; ?>
			</div>

			<?php if(focus_post_has_video()) : ?>
				<div class="video">
					<?php focus_post_video() ?>
				</div>
			<?php endif; ?>

			<?php if( siteorigin_setting( 'icon_post_navigation' ) ) : ?>
				<div class="nav-arrow-links">
					<?php previous_post_link( '<div class="nav-previous-post">%link</div>', '<i class="focus-icon-long-arrow-left"></i>' ); ?>
					<?php next_post_link( '<div class="nav-next-post">%link</div>', '<i class="focus-icon-long-arrow-right"></i>' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="container">
		<div class="container-decoration"></div>

		<div class="content-container">
			<div id="content" class="site-content" role="main">

				<div class="entry-content">
					<?php the_content() ?>
					<?php wp_link_pages(array('before' => '<div class="clear"></div>'.'<p>' . __('Pages:', 'focus'))) ?>
				</div>

				<div class="clear"></div>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) comments_template( '', true );
				?>
			</div><!-- #content .site-content.content-container -->

			<?php get_sidebar(); ?>

			<div class="clear"></div>
		</div>
		<?php if( siteorigin_setting('general_posts_nav') ) focus_content_nav('posts-nav') ?>
	</div>
</div><!-- #primary .content-area -->

<?php get_footer(); ?>
