<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<!-- BEGIN SLIDER -->
<?php 
    
	 $slideshowloop = new WP_Query( array( 'post_type' => 'sliderpost', 'order' => 'ASC', 'showposts'=>'-1' ) ); 
     ?>
     
	<div id="slider">
	<?php 
			if($slideshowloop -> have_posts()){
			while ( $slideshowloop->have_posts() ) : $slideshowloop->the_post();
			$linkto = get_post_meta($post->ID,'journals_slidelink',TRUE);
			?>
			<a href="<?php echo $linkto;?>">
			<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo  get_image_url(get_post_meta($post->ID,'journals_slideimage_src',TRUE)); ?>&amp;h=370&amp;w=940&amp;zc=1" alt="<?php the_title(); ?>" title="<?php echo get_post_meta($post->ID,'journals_slidecaption',TRUE);?>" />
			</a>
			<?php             
			endwhile;
			}else{?>
				<div style="border:1px solid #ddd; background:#000; opacity:0.5;text-align:center; padding:150px 100px 0; height:219px; font-size:14px; ">				<span style="opacity:1;color:#fff;text-shadow:none;"><?php _e("This is the slider. In order to have items here you need to create them in Admin &gt; Slider section, on the left side menu. For proper display use images 940px x 370px.", "site5framework"); ?></span>
				</div>
			<?php }  ?>
			
	  </div>
	  <div style="width:940px; margin:0 auto 30px; background:url(<?php bloginfo('template_directory'); ?>/images/bk_shadow_slider.png) 0 -35px no-repeat; height:15px;"></div>
	   <!-- END SLIDER -->
	    <!-- SLIDER SETTINGS -->
	   <script type="text/javascript">
            $j = jQuery.noConflict();
			$j(window).load(function() {
				$j('#slider').nivoSlider({
					effect:'<?php if(of_get_option('journal_slidereffect')==''): echo 'random';
						  else: echo of_get_option('journal_slidereffect');
						  endif;?>',
					slices:<?php if(of_get_option('journal_showslide')==''): echo '15';
						  else: echo of_get_option('journal_showslide');
						  endif;?>,
					animSpeed:<?php if(of_get_option('journal_slideranimationspeed')==''): echo '500';
						  else: echo of_get_option('journal_slideranimationspeed');
						  endif;?>,
					pauseTime:<?php if(of_get_option('journal_sliderpausetime')==''): echo '3000';
						  else: echo of_get_option('journal_sliderpausetime');
						  endif;?>,
					startSlide:0, //Set starting Slide (0 index)
					directionNav:true, //Next &amp; Prev
					directionNavHide:true, //Only show on hover
					controlNav:true, //1,2,3...
					controlNavThumbs:false, //Use thumbnails for Control Nav
					controlNavThumbsFromRel:false, //Use image rel for thumbs
					controlNavThumbsSearch: '.jpg', //Replace this with...
					controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
					keyboardNav:true, //Use left &amp; right arrows
					pauseOnHover:true, //Stop animation while hovering
					manualAdvance:false, //Force manual transitions
					captionOpacity:<?php if(of_get_option('journal_slidercaptionopacity')==''): echo '0.8';
						  else: echo of_get_option('journal_slidercaptionopacity');
						  endif;?>, //Universal caption opacity
					beforeChange: function(){},
					afterChange: function(){},
					slideshowEnd: function(){} //Triggers after all slides have been shown
				});
			});
			</script>
	<div class="mission"><?php echo"<h1>Our Mission: To bring equal educational standards and equal growth opportunities for Beduin youth in Israel.</h1>"; ?></div>

	<div class="homepage_subtitle"><?php echo"<h1>We Invest in</h1>"; ?></div>
<!-- Begin #featuredPosts -->
	
		<!-- End #featuredPosts -->

		<?php $postindex = 1; 
		 	if(!query_posts('showposts='.of_get_option('journal_homeposts').'&tag=homepost')){
				if(of_get_option('journal_homeposts')!=''){
			 		query_posts('showposts='.of_get_option('journal_homeposts'));
				}else{
					query_posts('showposts=6');
				}
			}else{
				query_posts('showposts='.of_get_option('journal_homeposts').'&tag=homepost');
				if(of_get_option('journal_home_posts')!=''){
			 		query_posts('showposts='.of_get_option('journal_homeposts').'&tag=homepost');
				}else{
					query_posts('showposts=6&tag=homepost');
				}
			}
		
		 if (have_posts()) : while (have_posts()) : the_post(); ?>	
			<article class="postBox <?php if(($postindex % 3) == 0){ echo 'lastBox';}?>">
				
				
				<div class="postBoxInner">
				<a href="<?php the_permalink() ?>" >
					<?php
					if(has_post_thumbnail()) {
							//the_post_thumbnail();?>
							<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_url(); ?>&amp;h=90&amp;w=255&amp;zc=1" alt="<?php the_title(); ?>"/>
						<?php } else {
							echo '<img src="'.get_bloginfo("template_url").'/images/nothumb.jpg"  alt="No Thumbnail"/>';
						}?>
					
					<h2><?php the_title(); ?></h2>
					<div class="excerpt"><?php  theme_excerpt(20) ?></div>
					<div class="meta"> <?php the_time('M j, Y') ?> &nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_post_comments.png" alt="" /> <?php comments_popup_link(__("No Comments", "site5framework"),__("1 Comment", "site5framework"),__("% Comments", "site5framework") ); ?></div>
				</a>
				</div>
				<a href="<?php the_permalink() ?>" class="readMore"><?php _e("Read More", "site5framework"); ?></a>
			</article>
			<?php ++$postindex; ?>
			<?php endwhile; ?>

	<?php else : ?>

		<p><?php _e("Sorry, but you are looking for something that isn't here.", "site5framework"); ?></p>
	
	<?php endif; 
	wp_reset_query();?>


	
	<?php
	 if(of_get_option('journal_featuredhomeposts')!=''){
		 query_posts('tag=featured&showposts='.of_get_option('journal_featuredhomeposts'));
		 }else{
		 query_posts('tag=featured&showposts=2');
	}
	 $featuredindex = 1; 
	 if (have_posts()) : ?>	
		<div id="featuredPosts">
		<?php
			$button = 1;
			while (have_posts()) : the_post(); ?>
            
				<div class="item <?php if(($featuredindex % 2) == 0){ echo 'lastItem';}?>">
					<h1><?php the_title(); ?></h1>
					<?php
					if ( has_post_thumbnail() ) {?>
						<div class="featured_posts_image">
							<a href="<?php the_permalink() ?>">
							<?php //the_post_thumbnail('featured-post-thumbnail');?>
							<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_url(); ?>&amp;h=290&amp;w=430&amp;zc=1" alt="<?php the_title(); ?>" />
							</a>
						</div>
					<?php } else {?>
						<img src="<?php bloginfo('template_directory'); ?>/images/nothumb_featured.jpg" alt="No Thumb"  />
					<?php } ?>
					<?php theme_excerpt(40); ?>

					<p " class="readMore"><?php _e("Read More", "site5framework"); ?></p>
					<?php if ($button == 1) {
										echo '<a class="cta_button" href="join-our-internship-program">Become an intern</a>';
										$button++;}
								else if ($button == 2) {echo '<a class="cta_button" href="come-and-visit">Contact us</a>';
									} ?>				
				</div>
		<?php ++$featuredindex; ?>
		<?php endwhile; ?>
		</div>
		<?php endif;
			wp_reset_query();?>			
<?php get_footer(); ?>
