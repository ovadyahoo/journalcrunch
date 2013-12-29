<?php
/*********************************************************************************************

Register Global Sidebars

*********************************************************************************************/
function site5framework_widgets_init() {
	register_sidebar( array (
    'name' => __( 'Sidebar', 'site5framework' ),
    'id' => 'sidebar',
	'before_widget' => '<div class="rightBox"><div class="rightBoxInner">	',
	'after_widget' => '</div></div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>'
	) );

	register_sidebar( array(
    'name' => __( 'Footer', 'site5framework' ),
    'id' => 'footer_jc',
	'before_widget' => '<div class="boxFooter">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="footerTitle">',
	'after_title' => '</h2>'
    ) );
}

add_action( 'init', 'site5framework_widgets_init' );


/*********************************************************************************************

Register Twitter Widget

*********************************************************************************************/
class site5framework_twitter_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Journal Crunch Twitter Widget', array( 'description' => 'Journal Crunch Twitter profile widget for your site.' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
    	$widget_title = esc_attr( $instance['widget_title'] );
        $screen_name = esc_attr( $instance['screen_name'] );
        $num_tweets = esc_attr( $instance['num_tweets'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'screen_name' ); ?>"><?php _e('Screen name:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'screen_name' ); ?>" name="<?php echo $this->get_field_name( 'screen_name' ); ?>" type="text" value="<?php echo $screen_name; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num_tweets' ); ?>"><?php _e('Number of Tweets:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num_tweets' ); ?>" name="<?php echo $this->get_field_name( 'num_tweets' ); ?>" type="text" value="<?php echo $num_tweets; ?>" />
        </p>

<?php
    }
/*
 * Renders the widget in the sidebar
 */
function widget( $args, $instance ) {
echo $args['before_widget'];
?>


        <!-- start twitter widget -->
        <h2 class="widget-title twitter-widget"><?php echo $instance['widget_title']; ?></h2>

        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/js/tweets/jquery.jtweets-1.2.1.css" />
	    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tweets/jquery.jtweets-1.2.1.js"></script>

        <div id="jTweets"> </div>
        <script type="text/javascript">
        jQuery(document).ready(function($){
	        $('#jTweets').jTweetsAnywhere({
	        username: '<?php echo $instance['screen_name']; ?>',
	        count: <?php echo $instance['num_tweets']; ?>,
	        showTweetFeed: {
            showInReplyTo: false,
	        paging: { mode: 'none' }
	        }
	        });
	        });
        </script>
        <!-- end twitter widget -->
        <a class="twitter-action" href="http://twitter.com/<?php echo $instance['screen_name']; ?>">Follow Us on Twitter! &raquo;</a>


        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "site5framework_twitter_widget" );' ) );




/*********************************************************************************************

Register Contact Widget

*********************************************************************************************/
class site5framework_contact_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Journal Crunch Contact Widget', array( 'description' => 'Journal Crunch contact widget for your site.' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
    	$widget_title = esc_attr( $instance['widget_title'] );
        $gmap = esc_attr( $instance['gmap'] );
        $cphone = esc_attr( $instance['cphone'] );
        $cfax = esc_attr( $instance['cfax'] );
        $cemail = esc_attr( $instance['cemail'] );
        $caddress = esc_attr( $instance['caddress'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'gmap' ); ?>"><?php _e('Map URL:', 'site5framework') ?></label>
            <textarea style="height:100px;" class="widefat" id="<?php echo $this->get_field_id( 'gmap' ); ?>" name="<?php echo $this->get_field_name( 'gmap' ); ?>"><?php echo $gmap; ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'caddress' ); ?>"><?php _e('Contact Address:', 'site5framework') ?></label>
            <textarea style="height:100px;" class="widefat" id="<?php echo $this->get_field_id( 'caddress' ); ?>" name="<?php echo $this->get_field_name( 'caddress' ); ?>"><?php echo $caddress; ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'cphone' ); ?>"><?php _e('Contact Phone:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'cphone' ); ?>" name="<?php echo $this->get_field_name( 'cphone' ); ?>" type="text" value="<?php echo $cphone; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'cfax' ); ?>"><?php _e('Contact Fax:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'cfax' ); ?>" name="<?php echo $this->get_field_name( 'cfax' ); ?>" type="text" value="<?php echo $cfax; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'cemail' ); ?>"><?php _e('Contact Email:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'cemail' ); ?>" name="<?php echo $this->get_field_name( 'cemail' ); ?>" type="text" value="<?php echo $cemail; ?>" />
        </p>

<?php
    }
/*
 * Renders the widget in the sidebar
 */
function widget( $args, $instance ) {
echo $args['before_widget'];
?>

        <!-- start contact widget -->
        <h2 class="widget-title"><?php echo $instance['widget_title']; ?></h2>


	        <div class="footer_contact">
	                <div class="caddress"><strong><?php _e('Address:', 'site5framework') ?></strong> <?php echo $instance['caddress']; ?></div>
	                <div class="cphone"><strong><?php _e('Phone:', 'site5framework') ?></strong> <?php echo $instance['cphone']; ?></div>
	                <div class="cphone"><strong><?php _e('Fax:', 'site5framework') ?></strong> <?php echo $instance['cfax']; ?></div>
	                <div class="cemail"><strong><?php _e('E-mail:', 'site5framework') ?></strong> <?php echo $instance['cemail']; ?></div>
	        </div>

	        <div class="footer_map">
	            <div class="cmap"><?php echo $instance['gmap']; ?></div>
	        </div>

        <!-- end contact widget -->


        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "site5framework_contact_widget" );' ) );



/*********************************************************************************************

Register Video Widget

*********************************************************************************************/
class site5framework_video_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Journal Crunch Video Widget', array( 'description' => 'Journal Crunch video widget for your site.' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
    	$widget_title = esc_attr( $instance['widget_title'] );
        $video_code = esc_attr( $instance['video_code'] );
        $video_desc = esc_attr( $instance['video_desc'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'video_code' ); ?>"><?php _e('Video Code:', 'site5framework') ?></label>
            <textarea style="height:100px;" class="widefat" id="<?php echo $this->get_field_id( 'video_code' ); ?>" name="<?php echo $this->get_field_name( 'video_code' ); ?>"><?php echo $video_code; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'video_desc' ); ?>"><?php _e('Video Description:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'video_desc' ); ?>" name="<?php echo $this->get_field_name( 'video_desc' ); ?>" type="text" value="<?php echo $video_desc; ?>" />
        </p>

        <?php
    }

    /*
     * Renders the widget in the sidebar
     */
    function widget( $args, $instance ) {
        echo $args['before_widget'];
        ?>
        <!-- start video widget -->
        <h2 class="widget-title"><?php echo $instance['widget_title']; ?></h2>
		<p class="video-desc"><?php echo $instance['video_desc']; ?></p>
        <p class="video-widget"><?php echo $instance['video_code']; ?></p>
        <!-- end video widget -->

        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "site5framework_video_widget" );' ) );

?>