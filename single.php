<?php get_header(); ?>

<!-- Begin #colleft -->
			<section>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
				<article>
                    <header>
    					<h1><?php the_title(); ?></h1>
    					<div class="meta">
    					 <?php the_time('M j, Y') ?> by <?php the_author_posts_link()?>&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_post_comments.png" alt="" /> <?php comments_popup_link(__("No Comments", "site5framework"),__("1 Comment", "site5framework"),__("% Comments", "site5framework") ); ?>&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_post_date.png" alt="" /> <?php _e("Posted under", "site5framework"); ?>:  <?php the_category(', ') ?> 
    					</div>
                    </header>
					<?php the_content(); ?>
					 <div class="postTags"><?php the_tags(); ?></div>
				</article>
				<?php comments_template(); ?>
		<?php endwhile; else: ?>

		<p><?php _e("Sorry, but you are looking for something that isn't here.", "site5framework"); ?></p>

	<?php endif; ?>
			
			</section>
			<!-- End section -->
			

<?php get_sidebar(); ?>	
<?php get_footer(); ?>