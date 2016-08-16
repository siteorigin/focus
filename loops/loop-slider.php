<?php
/**
 * Loop Name: Posts Slider
 */
?>
<?php $i = 0; ?>

<?php if ( have_posts() ) : ?>

	<div id="home-slider" class="slider slider-container">
		<ul class="slides">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php if(has_post_thumbnail()) : if( $i == siteorigin_setting('slider_post_count') ) break; $i++; ?>
					<li class="slide" id="slide-post-<?php the_ID() ?>">
						<?php the_post_thumbnail('slider') ?>
						<div class="overlay"></div>
						<div class="slide-text">
							<h1><?php the_title() ?></h1>
							<?php if(has_excerpt()) : ?><p><?php the_excerpt() ?></p><?php endif; ?>
						</div>
						<a href="<?php the_permalink() ?>" class="play"><?php esc_html_e('Play', 'focus') ?></a>
					</li>
				<?php endif; ?>

			<?php endwhile; ?>

		</ul>

		<div class="slider-decoration"></div>
	</div>

<?php endif; ?>
