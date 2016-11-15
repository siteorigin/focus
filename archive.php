<?php
/**
 * @package focus
 * @since focus 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<div class="container">

				<header class="page-header">
					<?php
					the_archive_title( '<h2 class="archive-title">', '</h1>' );
					the_archive_description( '<div class="category-description archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php get_template_part('loop') ?>

			</div>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

<?php get_footer(); ?>
