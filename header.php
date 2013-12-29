<?php
/**
 * @package WordPress
 * @subpackage Site5 framework
 */
?><!DOCTYPE html>
    <!-- html -->
    <html <?php language_attributes(); ?>>

    <!-- head -->
	<head>

	<!-- title -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>

    <!-- meta -->
    <meta name ="viewport" content="width = 1020" />
    <meta name="generator" content="www.site5.com" />
    <?php if ( of_get_option('journal_enablemeta')== '1') { ?>
    <meta name="description" content="<?php echo of_get_option('journal_metadescription')  ?>" />
    <meta name="keywords" content="<?php wp_title(); ?>, <?php echo of_get_option('journal_metakeywords')  ?>" />
    <meta name="revisit-after" content="<?php echo of_get_option('journal_revisitafter')  ?> days" />
    <?php } ?>
    <?php if ( of_get_option('journal_enablerobot')== '1') { ?>
    <meta name="robots" content="<?php echo of_get_option('journal_metabots')  ?>" />
    <meta name="googlebot" content="<?php echo of_get_option('journal_metagooglebot')  ?>" />
    <?php } ?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

    <?php wp_head(); ?>

    <?php if(of_get_option('journal_css_code') != '') { ?>
        <?php load_template( get_template_directory() . '/custom.css.php' );?>
    <?php } ?>

    <?php if(of_get_option('journal_customtypography') == '1') { ?>
        <?php if(of_get_option('journal_heading_font_link') != '') { ?>
        <?php echo of_get_option('journal_heading_font_link');?>
        <?php } ?>

        <?php load_template( get_template_directory() . '/custom.typography.css.php' );?>
    <?php } ?>



</head>
<body>
<!-- Begin #mainWrapper -->
<div id="mainWrapper">
	<!-- Begin #wrapper -->
	<div id="wrapper">
		<!-- Begin #header -->
		<header>
			<!-- Begin #logo -->
			 <div id="logo"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <?php if ( !of_get_option('journal_clogo')== '') { ?>
					<img src="<?php echo of_get_option('journal_clogo'); ?>" alt="<?php echo bloginfo( 'name' ) ?>" />
				<?php } elseif( !of_get_option('journal_clogo_text')== '') {
				        echo of_get_option('journal_clogo_text');
                    } else {
					bloginfo( 'name' );
				    }?>
                </a>
				<h1> A New Dawn </h1>
				
                <span><?php bloginfo('description'); ?></span>
                </div>
			<!-- End #logo -->
			<!-- Begin #topMenu -->
            <nav id="topMenu" class="ddsmoothmenu">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container'=>'false', 'fallback_cb'=>'primarymenu') );?>
            </nav>
			<!-- End #topMenu -->
			<!-- Begin #topSearch -->
			<div id="topSearch">
				<form id="searchform" action="<?php echo home_url( '/' ); ?>" method="get">
					<input type="text" id="s" name="s" value="" />
				</form>
			</div>
			<!-- End #topSearch -->
			<!-- BEGIN TOP SOCIAL LINKS -->
			<div id="topSocial">
				<ul>
					<?php if(of_get_option('journal_twitter_user')!=""){ ?>
					<li><a href="http://www.twitter.com/<?php echo of_get_option('journal_twitter_user'); ?>" class="twitter <?php if(of_get_option('journal_latest_tweet')!="no"):?>tip<?php endif?>" title="<?php _e("Follow Us on Twitter!", "site5framework"); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="<?php _e("Follow Us on Twitter!", "site5framework"); ?>" /></a></li>
					<?php }?>
					<?php if(of_get_option('journal_facebook_link')!=""){ ?>
					<li><a href="<?php echo of_get_option('journal_facebook_link'); ?>" class="facebook" title="<?php _e("Join Us on Facebook!", "site5framework"); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="<?php _e("Join Us on Facebook!", "site5framework"); ?>" /></a></li>
					<?php }?>
					<li><a href="http://www.youtube.com/playlist?list=PL2mdk1jPcq27qJfSve1dOX5diETJHJwXe" title="<?php _e("Watch us on YouTube", "site5framework"); ?>" class="rss"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="<?php _e("Watch us on YouTube", "site5framework"); ?>" /></a></li>
				</ul>
			</div>

			<!-- END TOP SOCIAL LINKS -->

		</header>
		<!-- End #header -->
		<!-- Begin #content -->
		<div id="content">
