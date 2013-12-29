<?php
/*********************************************************************************************

Costom Fields

*********************************************************************************************/
if ( !class_exists('myCustomFields') ) {

        class myCustomFields {
                /**
                * @var  string  $prefix  The prefix for storing custom fields in the postmeta table
                */
                var $prefix = '';
                /**
                * @var  array  $customFields  Defines the custom fields available
                */
                var $customFields =
                array(
        array(
                    "name" => "slideshow",
                    "title" => "Enable Slideshow in this content",
                    "description"=> "If you want to use slidedeshow in this content you can check this checkbox and enter the slide images URL bellow.",
                    "type" => "checkbox",
                    "scope" => array( "post", "page" ),
                    "capability" => "manage_options"
            ),
            array(
                    "name"                        => "slide1",
                    "title"                        => "Slide #1 Image URL",
                    "description"        => "",
                    "type"                        =>        "upload",
                    "scope"                        =>        array( "post", "page" ),
                    "capability"        => "edit_posts"
            ),

            array(
                    "name"                        => "slide2",
                    "title"                        => "Slide #2 Image URL",
                    "description"        => "",
                    "type"                        =>        "upload",
                    "scope"                        =>        array( "post", "page" ),
                    "capability"        => "edit_posts"
),
array(
                    "name"                        => "slide3",
                    "title"                        => "Slide #3 Image URL",
                    "description"        => "",
                    "type"                        =>        "upload",
                    "scope"                        =>        array( "post", "page" ),
                    "capability"        => "edit_posts"
),

array(
                    "name"                        => "slide4",
                    "title"                        => "Slide #4 Image URL",
                    "description"        => "",
                    "type"                        =>        "upload",
                    "scope"                        =>        array( "post", "page" ),
                    "capability"        => "edit_posts"
),

array(
                    "name"                        => "slide5",
                    "title"                        => "Slide #5 Image URL",
                    "description"        => "",
                    "type"                        =>        "upload",
                    "scope"                        =>        array( "post", "page" ),
                    "capability"        => "edit_posts"
),
array(
                    "name"                        => "slide6",
                    "title"                        => "Slide #6 Image URL",
                    "description"        => "",
                    "type"                        =>        "upload",
                    "scope"                        =>        array( "post", "page" ),
                    "capability"        => "edit_posts"
),
array(
                    "name"                        => "slide7",
                    "title"                        => "Slide #7 Image URL",
                    "description"        => "",
                    "type"                        =>        "upload",
                    "scope"                        =>        array( "post", "page" ),
                    "capability"        => "edit_posts"
),
array(
                    "name"                        => "slide8",
                    "title"                        => "Slide #8 Image URL",
                    "description"        => "",
                    "type"                        =>        "upload",
                    "scope"                        =>        array( "post", "page" ),
                    "capability"        => "edit_posts"
),
array(
                    "name"                        => "slide9",
                    "title"                        => "Slide #9 Image URL",
                    "description"        => "",
                    "type"                        =>        "upload",
                    "scope"                        =>        array( "post", "page" ),
                    "capability"        => "edit_posts"
),

 array(
                    "name"                        => "firmname",
                    "title"                        => "Sponsored Company Name",
                    "description"        => "Enter the sponsored company name above",
                    "type"                        =>        "text",
                    "scope"                        =>        array( "post"),
                    "capability"        => "edit_posts"
),

array(
                    "name"                        => "firmimg",
                    "title"                        => "Sponsored Company Image URL",
                    "description"        => "Enter the sponsored company logo image URL above, this image will be resized automatically via timthumb.php",
                    "type"                        =>        "upload",
                    "scope"                        =>        array( "post"),
                    "capability"        => "edit_posts"
),

                    array(
                    "name"                        => "firmlink",
                    "title"                        => "Sponsored Company Website URL",
                    "description"        => "Enter the sponsored company logo link URL above.",
                    "type"                        =>        "upload",
                    "scope"                        =>        array( "post"),
                    "capability"        => "edit_posts"
),
);

                /*
                * PHP 4 Compatible Constructor
                */
                function myCustomFields() { $this->__construct(); }
                /**
                * PHP 5 Constructor
                */
                function __construct() {
                        add_action( 'admin_menu', array( &$this, 'createCustomFields' ) );
                        add_action( 'save_post', array( &$this, 'saveCustomFields' ), 1, 2 );
                        // Comment this line out if you want to keep default custom fields meta box
                   //        add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
                }
                /**
                * Remove the default Custom Fields meta box

                function removeDefaultCustomFields( $type, $context, $post ) {
                        foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
                                remove_meta_box( 'postcustom', 'post', $context );
                                remove_meta_box( 'postcustom', 'page', $context );
                                //Use the line below instead of the line above for WP versions older than 2.9.1
                                //remove_meta_box( 'pagecustomdiv', 'page', $context );
                        }
                }
        */
                /**
                * Create the new Custom Fields meta box
                */
                function createCustomFields() {
                        if ( function_exists( 'add_meta_box' ) ) {
                                add_meta_box( 'my-custom-fields', 'BAYPress Content Slideshow & Sponsored Firms Settings', array( &$this, 'displayCustomFields' ), 'page', 'normal', 'high' );
                                add_meta_box( 'my-custom-fields', 'BAYPress Content  Slideshow & Sponsored Firms Settings', array( &$this, 'displayCustomFields' ), 'post', 'normal', 'high' );
                        }
                }
                /**
                * Display the new Custom Fields meta box
                */
                function displayCustomFields() {
            $upload = get_post_meta( $pID, $id, true);
                        global $post;
                        ?>
                        <div class="form-wrap">
                                <?php
                                wp_nonce_field( 'my-custom-fields', 'my-custom-fields_wpnonce', false, true );
                                foreach ( $this->customFields as $customField ) {
                                        // Check scope
                                        $scope = $customField[ 'scope' ];
                                        $output = false;
                                        foreach ( $scope as $scopeItem ) {
                                                switch ( $scopeItem ) {
                                                        case "post": {
                                                                // Output on any post screen
                                                                if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" || $post->post_type=="post" )
                                                                        $output = true;
                                                                break;
                                                        }
                                                        case "page": {
                                                                // Output on any page screen
                                                                if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="page-new.php" || $post->post_type=="page" )
                                                                        $output = true;
                                                                break;
                                                        }
                                                }
                                                if ( $output ) break;
                                        }
                                        // Check capability
                                        if ( !current_user_can( $customField['capability'], $post->ID ) )
                                                $output = false;
                                        // Output if allowed
                                        if ( $output ) { ?>
                                                <div class="form-field form-required">
                                                        <?php
                                                        switch ( $customField[ 'type' ] ) {
                                                                case "checkbox": {
                                                                        // Checkbox
                                                                        echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
                                                                        echo '<input type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
                                                                        if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
                                                                                echo ' checked="checked"';
                                                                        echo '" style="width: auto;" />';
                                                                        break;
                                                                }
                                                                case "textarea": {
                                                                        // Text area
                                                                        echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
                                                                        echo '<textarea name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea>';
                                                                        break;
                                                                }
//Thanks for uploading functions php guru Ercüment Þahin//
                                case "upload":

                                echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';

                                 echo '<div class="upload_button_div"> <input id="' . $this->prefix . $customField[ 'name' ] . '" type="text" style="width:300px" name="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" /> <span id="'.$id.'"><a href="#" id="set-post-thumbnail" onclick="jQuery(\'#add_image\').click();return true;" class="button-primary">Add Image</a></b></span></div>';


                                break;


                                default: {
	                                        // Plain text field
	                                        echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
	                                        echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
	                                        break;
	                                }
	                        }
                                                        ?>
                                                        <?php if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>'; ?>
                                                </div>
                                        <?php
                                        }
                                } ?>
                        </div>
                        <?php
                }
                /**
                * Save the new Custom Fields values
                */
                function saveCustomFields( $post_id, $post ) {
                        if ( !wp_verify_nonce( $_POST[ 'my-custom-fields_wpnonce' ], 'my-custom-fields' ) )
                                return;
                        if ( !current_user_can( 'edit_post', $post_id ) )
                                return;
                        if ( $post->post_type != 'page' && $post->post_type != 'post' )
                                return;
                        foreach ( $this->customFields as $customField ) {
                                if ( current_user_can( $customField['capability'], $post_id ) ) {
                                        if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] ) ) {
                                                update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $_POST[ $this->prefix . $customField['name'] ] );
                                        } else {
                                                delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
                                        }
                                }
                        }
                }

        } // End Class

} // End if class exists statement

// Instantiate the class
if ( class_exists('myCustomFields') ) {
        $myCustomFields_var = new myCustomFields();
}


/*********************************************************************************************

Custom Fields 2

*********************************************************************************************/
if ( !class_exists('myCustomFields1') ) {

        class myCustomFields1 {
                /**
                * @var  string  $prefix  The prefix for storing custom fields in the postmeta table
                */
                var $prefix = '';
                /**
                * @var  array  $customFields  Defines the custom fields available
                */
                var $customFields1 =        array(

                array(
                                "name"                        => "page-description",
                                "title"                        => "Page Description",
                                "description"        => "You can use a little page descriptions for the main navigation.",
                                "type"                        => "text",
                                "scope"                        =>        array( "page" ),
                                "capability"        => "edit_posts"
                        ),
            array(
                                "name"                        => "portfoliocat",
                                "title"                        => "Portfolio Category ID",
                                "description"        => "If you want to use this page for portfolio section, please write portfolio category ID above",
                                "type"                        => "text",
                                "scope"                        =>        array( "page" ),
                                "capability"        => "edit_posts"
                        ),

                        array(
                                "name"                        => "testimonialscat",
                                "title"                        => "Testimonials Category ID",
                                "description"        => "If you want to use this page for testimonials section, please write testimonials category ID above",
                                "type"                        => "text",
                                "scope"                        =>        array( "page" ),
                                "capability"        => "edit_posts"
                        ),

                        array(
                                "name"                        => "testimonialsimg",
                                "title"                        => "Testimonials Item Big Image URL",
                                "description"        => "This image will be convert automatically via timthumb",
                                "type"                        =>        "upload",
                                "scope"                        =>        array( "post"),
                                "capability"        => "edit_posts"
                        ),

                        array(
                                "name"                        => "testimonialsdesc",
                                "title"                        => "Testimonials Item Descriptions",
                                "description"        => "Enter testimonials item short description",
                                "type"                        =>        "textarea",
                                "scope"                        =>        array("post"),
                                "capability"        => "edit_posts"
            ),

                        array(
                                "name"                        => "portfolioimg",
                                "title"                        => "Portfolio Item Big Image URL",
                                "description"        => "This image will be convert automatically via timthumb",
                                "type"                        =>        "upload",
                                "scope"                        =>        array( "post"),
                                "capability"        => "edit_posts"
                        ),

                        array(
                                "name"                        => "portfoliothumb",
                                "title"                        => "Portfolio Item Thumbnail Image URL",
                                "description"        => "This image will be convert automatically via timthumb",
                                "type"                        =>        "upload",
                                "scope"                        =>        array("post"),
                                "capability"        => "edit_posts"
            ),
            array(
                                "name"                        => "portfoliodesc",
                                "title"                        => "Portfolio Item Descriptions",
                                "description"        => "Enter portfolio item short description",
                                "type"                        =>        "textarea",
                                "scope"                        =>        array("post"),
                                "capability"        => "edit_posts"
            ),

            array(
                                "name"                        => "productscat",
                                "title"                        => "Product Category ID",
                                "description"        => "If you want to use this page for product section, please write portfolio category ID above",
                                "type"                        => "text",
                                "scope"                        =>        array( "page" ),
                                "capability"        => "edit_posts"
                        ),

            array(
                                "name"                        => "homesliderimg",
                                "title"                        => "Homepage Slider Item Image URL",
                                "description"        => "This image will be convert automatically via timthumb. You must write only image name here example: slide1.jpg. (All slider types call images from the uploads folder, therefore slider images must be in wp-content/uploads folder. Please make sure this image in the uploads folder.)",
                                "type"                        =>        "upload",
                                "scope"                        =>        array("post"),
                                "capability"        => "edit_posts"
            ),

	        array(
	                            "name"                        => "homeslidercontent",
	                            "title"                        => "Homepage Slider Content",
	                            "description"        => "",
	                            "type"                        =>        "textarea",
	                            "scope"                        =>        array( "post"),
	                            "capability"        => "edit_posts"
	                            ),


            array(
                                "name"                        => "leftcontent",
                                "title"                        => "Left Content",
                                "description"        => "This field using multicolumn page templates if you selected 1,2,3,4,5 colum page templates you must write this area your contents.",
                                "type"                        =>        "textarea",
                                "scope"                        =>        array( "page" ),
                                "capability"        => "edit_posts"
            ),

            array(
                                "name"                        => "centercontent",
                                "title"                        => "Center Content",
                                "description"        => "This field using multicolumn page templates if you selected 1,2,3,4,5 colum page templates you must write this area your contents.",
                                "type"                        =>        "textarea",
                                "scope"                        =>        array( "page" ),
                                "capability"        => "edit_posts"
            ),


            array(
                                "name"                        => "rightcontent",
                                "title"                        => "Right Content",
                                "description"        => "This field using multicolumn page templates if you selected 1,2,3,4,5 colum page templates you must write this area your contents.",
                                "type"                        =>        "textarea",
                                "scope"                        =>        array( "page" ),
                                "capability"        => "edit_posts"
            ),


            array(
                                "name"                        => "bottomcontent",
                                "title"                        => "Bottom Content",
                                "description"        => "This field using multicolumn page templates if you selected 1,2,3,4,5 colum page templates you must write this area your contents.",
                                "type"                        =>        "textarea",
                                "scope"                        =>        array( "page" ),
                                "capability"        => "edit_posts"
            ),


           );

                /*
                * PHP 4 Compatible Constructor
                */
                function myCustomFields1() { $this->__construct(); }
                /**
                * PHP 5 Constructor
                */
                function __construct() {
                        add_action( 'admin_menu', array( &$this, 'createCustomFields1' ) );
                        add_action( 'save_post', array( &$this, 'saveCustomFields1' ), 1, 2 );
                        // Comment this line out if you want to keep default custom fields meta box
                   //        add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
                }
                /**
                * Remove the default Custom Fields meta box

                function removeDefaultCustomFields( $type, $context, $post ) {
                        foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
                                remove_meta_box( 'postcustom', 'post', $context );
                                remove_meta_box( 'postcustom', 'page', $context );
                                //Use the line below instead of the line above for WP versions older than 2.9.1
                                //remove_meta_box( 'pagecustomdiv', 'page', $context );
                        }
                }
        */
                /**
                * Create the new Custom Fields meta box
                */
                function createCustomFields1() {
                        if ( function_exists( 'add_meta_box' ) ) {
                                add_meta_box( 'my-custom-fields1', 'BAYPress Portfolio & Slider & Multicolumn Pages Settings', array( &$this, 'displayCustomFields1' ), 'page', 'normal', 'high' );
                                add_meta_box( 'my-custom-fields1', 'BAYPress Portfolio & Slider & Multicolumn Pages Settings', array( &$this, 'displayCustomFields1' ), 'post', 'normal', 'high' );
                        }
                }
                /**
                * Display the new Custom Fields meta box
                */
                function displayCustomFields1() {
            $upload = get_post_meta( $pID, $id, true);
                        global $post;
                        ?>
                        <div class="form-wrap">
                                <?php
                                wp_nonce_field( 'my-custom-fields1', 'my-custom-fields1_wpnonce', false, true );
                                foreach ( $this->customFields1 as $customField1 ) {
                                        // Check scope
                                        $scope = $customField1[ 'scope' ];
                                        $output = false;
                                        foreach ( $scope as $scopeItem ) {
                                                switch ( $scopeItem ) {
                                                        case "post": {
                                                                // Output on any post screen
                                                                if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" || $post->post_type=="post" )
                                                                        $output = true;
                                                                break;
                                                        }
                                                        case "page": {
                                                                // Output on any page screen
                                                                if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="page-new.php" || $post->post_type=="page" )
                                                                        $output = true;
                                                                break;
                                                        }
                                                }
                                                if ( $output ) break;
                                        }
                                        // Check capability
                                        if ( !current_user_can( $customField1['capability'], $post->ID ) )
                                                $output = false;
                                        // Output if allowed
                                        if ( $output ) { ?>
                                                <div class="form-field form-required">
                                                        <?php

                        switch ( $customField1[ 'type' ] ) {
                                case "checkbox": {
                               // Checkbox
                                        echo '<label for="' . $this->prefix . $customField1[ 'name' ] .'" style="display:inline;"><b>' . $customField1[ 'title' ] . '</b></label>&nbsp;&nbsp;';
                                        echo '<input type="checkbox" name="' . $this->prefix . $customField1['name'] . '" id="' . $this->prefix . $customField1['name'] . '" value="yes"';
                                        if ( get_post_meta( $post->ID, $this->prefix . $customField1['name'], true ) == "yes" )
                                                echo ' checked="checked"';
                                        echo '" style="width: auto;" />';
                                        break;
                                }
                                case "textarea": {
                                        // Text area
                                        echo '<label for="' . $this->prefix . $customField1[ 'name' ] .'"><b>' . $customField1[ 'title' ] . '</b></label>';
                                        echo '<textarea name="' . $this->prefix . $customField1[ 'name' ] . '" id="' . $this->prefix . $customField1[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField1[ 'name' ], true ) ) . '</textarea>';
                                        break;
                                }
                               // Upload
                              //Thanks for uploading functions php guru Ercüment Þahin//
                                case "upload":

                                echo '<label for="' . $this->prefix . $customField1[ 'name' ] .'"><b>' . $customField1[ 'title' ] . '</b></label>';

                                echo '<div class="upload_button_div"> <input id="' . $this->prefix . $customField1[ 'name' ] . '" type="text" style="width:300px" name="' . $this->prefix . $customField1[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField1[ 'name' ], true ) ) . '" /> <span id="'.$id.'"><a href="#" id="set-post-thumbnail" onclick="jQuery(\'#add_image\').click();return true;" class="button-primary">Add Image</a></b></span></div>';

                                break;

                              default: {
                        // Plain text field
                        echo '<label for="' . $this->prefix . $customField1[ 'name' ] .'"><b>' . $customField1[ 'title' ] . '</b></label>';
                        echo '<input type="text" name="' . $this->prefix . $customField1[ 'name' ] . '" id="' . $this->prefix . $customField1[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField1[ 'name' ], true ) ) . '" />';
                        break;
                }
        }
        ?>
        <?php if ( $customField1[ 'description' ] ) echo '<p>' . $customField1[ 'description' ] . '</p>'; ?>
</div>
<?php
}
} ?>
                        <?php
                }
                /**
                * Save the new Custom Fields values
                */
                function saveCustomFields1( $post_id, $post ) {
                        if ( !wp_verify_nonce( $_POST[ 'my-custom-fields1_wpnonce' ], 'my-custom-fields1' ) )
                                return;
                        if ( !current_user_can( 'edit_post', $post_id ) )
                                return;
                        if ( $post->post_type != 'page' && $post->post_type != 'post' )
                                return;
                        foreach ( $this->customFields1 as $customField1 ) {
                                if ( current_user_can( $customField1['capability'], $post_id ) ) {
                                        if ( isset( $_POST[ $this->prefix . $customField1['name'] ] ) && trim( $_POST[ $this->prefix . $customField1['name'] ] ) ) {
                                                update_post_meta( $post_id, $this->prefix . $customField1[ 'name' ], $_POST[ $this->prefix . $customField1['name'] ] );
                                        } else {
                                                delete_post_meta( $post_id, $this->prefix . $customField1[ 'name' ] );
                                        }
                                }
                        }
                }

        } // End Class

} // End if class exists statement

// Instantiate the class
if ( class_exists('myCustomFields1') ) {
        $myCustomFields_var1 = new myCustomFields1();
}



/*********************************************************************************************

Custom Fields 3

*********************************************************************************************/
if ( !class_exists('myCustomFields2') ) {

        class myCustomFields2 {
                /**
                * @var  string  $prefix  The prefix for storing custom fields in the postmeta table
                */
                var $prefix = '';
                /**
                * @var  array  $customFields  Defines the custom fields available
                */
                var $customFields2 =        array(
            array(
                                "name"                        => "featuredsummary",
                                "title"                        => "Homepage Featured Item Summary",
                                "description"        => "If you want to use this page for featured section, please write featured item summary above",
                                "type"                        => "textarea",
                                "scope"                        =>        array( "post" ),
                                "capability"        => "edit_posts"
                        ),
                        array(
                                "name"                        => "featuredcontent",
                                "title"                        => "Homepage Featured Item Content",
                                "description"        => "If you want to use this page for featured section, please write featured item content above",
                                "type"                        =>        "textarea",
                                "scope"                        =>        array( "post" ),
                                "capability"        => "edit_posts"
                        ),

                        array(
                                "name"                        => "featuredthumb",
                                "title"                        => "Homepage Featured Item Thumbnail Image URL",
                                "description"        => "This image will be convert automatically via timthumb",
                                "type"                        =>        "upload",
                                "scope"                        =>        array( "post" ),
                                "capability"        => "edit_posts"
            ),
            array(
                                "name"                        => "featuredthumbtitle",
                                "title"                        => "Homepage Featured Item Thumbnail Title",
                                "description"        => "This field will be using thumbnail image title",
                                "type"                        =>        "text",
                                "scope"                        =>        array( "post" ),
                                "capability"        => "edit_posts"
            ),
            array(
                                "name"                        => "featuredimg",
                                "title"                        => "Homepage Featured Item Big Image URL",
                                "description"        => "This image will be convert automatically via timthumb",
                                "type"                        =>        "upload",
                                "scope"                        =>        array( "post" ),
                                "capability"        => "edit_pages"
            ),


            array(
                                "name"                        => "productssummary",
                                "title"                        => "Product Featured Item Summary",
                                "description"        => "If you want to use this page for product featured section, please write featured item summary above",
                                "type"                        => "textarea",
                                  "scope"                        =>        array( "post" ),
                                "capability"        => "edit_posts"
                        ),
                        array(
                                "name"                        => "productscontent",
                                "title"                        => "Product Featured Item Content",
                                "description"        => "If you want to use this page for product featured section, please write featured item content above",
                                "type"                        =>        "textarea",
                                "scope"                        =>        array( "post" ),
                                "capability"        => "edit_posts"
                        ),

            array(
                "name"          => "productsdesc",
                "title"         => "Product Featured Item Description",
                "description"   => "Enter product item short description",
                "type"          =>  "textarea",
                "scope"         =>  array("post"),
                "capability"    => "edit_pages"
            ),

                        array(
                                "name"                        => "productsthumb",
                                "title"                        => "Product Featured Item Thumbnail Image URL",
                                "description"        => "This image will be convert automatically via timthumb",
                                "type"                        =>        "upload",
                                "scope"                        =>        array( "post" ),
                                "capability"        => "edit_posts"
            ),
            array(
                                "name"                        => "productsthumbtitle",
                                "title"                        => "Product Featured Item Thumbnail Title",
                                "description"        => "This field will be using thumbnail image title",
                                "type"                        =>        "text",
                                "scope"                        =>        array( "post" ),
                                "capability"        => "edit_posts"
            ),
            array(
                                "name"                        => "productsimg",
                                "title"                        => "Product Featured Item Big Image URL",
                                "description"        => "This image will be convert automatically via timthumb",
                                "type"                        =>        "upload",
                                "scope"                        =>        array( "post" ),
                                "capability"        => "edit_pages"
            ),

           );

                /**
                * PHP 4 Compatible Constructor
                */
                function myCustomFields2() { $this->__construct(); }
                /**
                * PHP 5 Constructor
                */
                function __construct() {
                        add_action( 'admin_menu', array( &$this, 'createCustomFields2' ) );
                        add_action( 'save_post', array( &$this, 'saveCustomFields2' ), 1, 2 );
                        // Comment this line out if you want to keep default custom fields meta box
                   //        add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields2' ), 10, 3 );
                }
                /**
                * Remove the default Custom Fields meta box

                function removeDefaultCustomFields2( $type, $context, $post ) {
                        foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
                                remove_meta_box( 'postcustom', 'post', $context );
                                remove_meta_box( 'postcustom', 'page', $context );
                                //Use the line below instead of the line above for WP versions older than 2.9.1
                                //remove_meta_box( 'pagecustomdiv', 'page', $context );
                        }
                }
           */
                /**
                * Create the new Custom Fields meta box
                */
                function createCustomFields2() {
                        if ( function_exists( 'add_meta_box' ) ) {
                                //add_meta_box( 'my-custom-fields2', 'BAYPress Featured & Product Settings', array( &$this, 'displayCustomFields2' ), 'page', 'normal', 'high' );
                                add_meta_box( 'my-custom-fields2', 'BAYPress Featured Item & Product Settings', array( &$this, 'displayCustomFields2' ), 'post', 'normal', 'high' );
                        }
                }
                /**
                * Display the new Custom Fields meta box
                */
                function displayCustomFields2() {
            $upload = get_post_meta( $pID, $id, true);
                        global $post;
                        ?>
                        <div class="form-wrap">
                                <?php
                                wp_nonce_field( 'my-custom-fields2', 'my-custom-fields2_wpnonce', false, true );
                                foreach ( $this->customFields2 as $customField2 ) {
                                        // Check scope
                                        $scope = $customField2[ 'scope' ];
                                        $output = false;
                                        foreach ( $scope as $scopeItem ) {
                                                switch ( $scopeItem ) {
                                                        case "post": {
                                                                // Output on any post screen
                                                                if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" || $post->post_type=="post" )
                                                                        $output = true;
                                                                break;
                                                        }
                                                        case "page": {
                                                                // Output on any page screen
                                                                if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="page-new.php" || $post->post_type=="page" )
                                                                        $output = true;
                                                                break;
                                                        }
                                                }
                                                if ( $output ) break;
                                        }
                                        // Check capability
                                        if ( !current_user_can( $customField2['capability'], $post->ID ) )
                                                $output = false;
                                        // Output if allowed
                                        if ( $output ) { ?>
                                                <div class="form-field form-required">
                                                        <?php

                        switch ( $customField2[ 'type' ] ) {
                                case "checkbox": {
                                        // Checkbox
                                        echo '<label for="' . $this->prefix . $customField2[ 'name' ] .'" style="display:inline;"><b>' . $customField2[ 'title' ] . '</b></label>&nbsp;&nbsp;';
                                        echo '<input type="checkbox" name="' . $this->prefix . $customField2['name'] . '" id="' . $this->prefix . $customField2['name'] . '" value="yes"';
                                        if ( get_post_meta( $post->ID, $this->prefix . $customField2['name'], true ) == "yes" )
                                                echo ' checked="checked"';
                                        echo '" style="width: auto;" />';
                                        break;
                                }
								case "textarea": {
                                        // Text area
                                        echo '<label for="' . $this->prefix . $customField2[ 'name' ] .'"><b>' . $customField2[ 'title' ] . '</b></label>';
                                        echo '<textarea name="' . $this->prefix . $customField2[ 'name' ] . '" id="' . $this->prefix . $customField2[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField2[ 'name' ], true ) ) . '</textarea>';
                                        break;
                                }


                                  //Thanks for uploading functions php guru Ercüment Þahin//
                                case "upload":

                                echo '<label for="' . $this->prefix . $customField2[ 'name' ] .'"><b>' . $customField2[ 'title' ] . '</b></label>';

                                 echo '<div class="upload_button_div"> <input id="' . $this->prefix . $customField2[ 'name' ] . '" type="text" style="width:300px" name="' . $this->prefix . $customField2[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField2[ 'name' ], true ) ) . '" /> <span id="'.$id.'"><a href="#" id="set-post-thumbnail" onclick="jQuery(\'#add_image\').click();return true;" class="button-primary">Add Image</a></b></span></div>';


                                break;



                           default: {
                        // Plain text field
                        echo '<label for="' . $this->prefix . $customField2[ 'name' ] .'"><b>' . $customField2[ 'title' ] . '</b></label>';
                        echo '<input type="text" name="' . $this->prefix . $customField2[ 'name' ] . '" id="' . $this->prefix . $customField2[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField2[ 'name' ], true ) ) . '" />';
                        break;
                }
        }
        ?>
        <?php if ( $customField2[ 'description' ] ) echo '<p>' . $customField2[ 'description' ] . '</p>'; ?>
</div>
<?php
}
} ?>
                        </div>
                        <?php
                }
                /**
                * Save the new Custom Fields values
                */
                function saveCustomFields2( $post_id, $post ) {
                        if ( !wp_verify_nonce( $_POST[ 'my-custom-fields2_wpnonce' ], 'my-custom-fields2' ) )
                                return;
                        if ( !current_user_can( 'edit_post', $post_id ) )
                                return;
                        if ( $post->post_type != 'page' && $post->post_type != 'post' )
                                return;
                        foreach ( $this->customFields2 as $customField2 ) {
                                if ( current_user_can( $customField2['capability'], $post_id ) ) {
                                        if ( isset( $_POST[ $this->prefix . $customField2['name'] ] ) && trim( $_POST[ $this->prefix . $customField2['name'] ] ) ) {
                                                update_post_meta( $post_id, $this->prefix . $customField2[ 'name' ], $_POST[ $this->prefix . $customField2['name'] ] );
                                        } else {
                                                delete_post_meta( $post_id, $this->prefix . $customField2[ 'name' ] );
                                        }
                                }
                        }
                }

        } // End Class

} // End if class exists statement

// Instantiate the class
if ( class_exists('myCustomFields2') ) {
        $myCustomFields_var2 = new myCustomFields2();
}
?>