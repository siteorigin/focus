<div class="content-container loop-container">
	
	<?php if ( have_posts() ) : ?>
	
		<?php focus_content_nav( 'nav-above' ); ?>
		
		<div class="wrapper">
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
	
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<a href="<?php the_permalink() ?>"><h2 class="entry-title"><span><?php the_title() ?></span></h2></a>
					
					<a href="<?php the_permalink() ?>" class="thumbnail-wrapper">
						<div class="time">3:45</div>
						<?php if(has_post_thumbnail()) : ?>
							<?php the_post_thumbnail() ?>
						<?php endif; ?>
					</a>
				</article>
		
			<?php endwhile; ?>
			
		</div>
		
		<div class="clear"></div>
		
		<?php focus_content_nav( 'nav-below' ); ?>
	
	<?php else : ?>
	
		<?php get_template_part( 'no-results', 'index' ); ?>
	
	<?php endif; ?>
	
</div>