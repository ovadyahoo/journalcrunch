<?php get_header(); ?>
	
		<!-- Begin #colLeft -->
		<section>
		<?php if(get_option('journal_box_model')!="normal"){?>
			<h1><?php _e("Search results for", "site5framework"); ?> "<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('"'); echo $key; _e('"'); wp_reset_query(); ?>"</h1>
		<?php }else{?>
			<div id="archive-title">
			<?php _e("Search results for", "site5framework"); ?> <strong>"<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('"'); echo $key; _e('"'); wp_reset_query(); ?>"</strong>
			</div>
		<?php }?>
		<?php $postindex = 1; ?>		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php if(get_option('journal_box_model')!="normal"){?>
			<article class="postBox <?php if(($postindex % 2) == 0){ echo 'lastBox';}?>">
				<div class="postBoxInner">
					<?php
					if ( has_post_thumbnail()) {
						//the_post_thumbnail();?> 
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_url(); ?>&amp;h=90&amp;w=255&amp;zc=1" alt="<?php the_title(); ?>" />
					<?php } else {?>
						<img src="<?php bloginfo('template_directory'); ?>/images/nothumb.jpg" alt="No Thumbnail"  />
					<?php } ?>
					<h2><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h2>
					<div class="excerpt"><?php  theme_excerpt(20) ?></div>
					<div class="meta"> <?php the_time('M j, Y') ?> &nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_post_comments.png" alt="" /> <?php comments_popup_link(__("No Comments", "site5framework"),__("1 Comment", "site5framework"),__("% Comments", "site5framework") ); ?></div>
				</div>
				<a href="<?php the_permalink() ?>" class="readMore"><?php _e("Read More", "site5framework"); ?></a>
			</article>
			<?php ++$postindex; ?>
			<?php }else{?>
				<article>
						<h1><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h1>
						<div class="meta">
						 <?php the_time('M j, Y') ?> by <?php the_author_posts_link()?>&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_post_comments.png" alt="" /> <?php comments_popup_link(__("No Comments", "site5framework"),__("1 Comment", "site5framework"),__("% Comments", "site5framework") ); ?>&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_post_date.png" alt="" /> <?php _e("Posted under", "site5framework"); ?>:  <?php the_category(', ') ?> 
						</div>
						<?php the_excerpt(__('Read more &raquo;', "site5framework")); ?>
					</article>
			<?php }?>
		<?php endwhile; ?>

	<?php else : ?>
		<p><?php _e("Sorry, but you are looking for something that isn't here.", "site5framework"); ?></p>
	<?php endif; ?>
	<div style="clear:both;"></div>
			<?php if (function_exists("wpthemess_paginate")) {
				wpthemess_paginate();
			} ?>
		</section>
		<!-- End section -->

<?php get_sidebar(); ?>	

<?php get_footer(); ?>
