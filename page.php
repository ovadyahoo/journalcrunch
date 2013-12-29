<?php get_header(); ?>

<!-- Begin #colleft -->
			<section>
			<h1><?php the_title(); ?></h1>	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php the_content(); ?>
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', "site5framework"); ?></p>
		<?php endif; ?>
			
			</section>
			<!-- End section -->
			

<?php get_sidebar(); ?>	
<?php get_footer(); ?>