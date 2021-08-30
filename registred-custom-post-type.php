<?php
if ( !function_exists( 'register_custom_type_for_offer_zone' ) ) {
    /**
     * Register custom post type for the wordpress
     * 
     * @version 1.0.0
    */
    function register_custom_type_for_offer_zone() {
        $labels = array(
            'name'                  => esc_html__( 'Offer Zone','recipe' ),
            'singular_name'         => esc_html__( 'Offer Zone',  'recipe' ),
        );
        $args = array(
            'labels'             => $labels,
            'description'        => 'Offer Zone for the WordPress.',
            'public'             => false,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'offer_zone' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array( 'title' ),
            // 'show_in_rest'       => true
        );
        // print_r("expression");die;
        register_post_type( 'offer_zone', $args );
    }
}

add_action('init','register_custom_type_for_offer_zone');

if ( !function_exists('global_notice_meta_box_callback')) {
    function global_notice_meta_box_callback( $value='' ) {
        $all_events_listing = apply_filters( 'all_events_for_the_offerzone',array() );
        ?>
        <select id="event_selection">
            <?php
            foreach ($all_events_listing as $key => $value) {
                ?>
                <option value="<?php echo  $value['id']; ?>">
                    <?php echo $value['name']; ?>
                </option>                
                <?php
                }
            ?>
        </select>
        <?php
    }
}

if ( !function_exists('global_notice_meta_box') ) {
    function global_notice_meta_box( $value='' ) {
        add_meta_box(
            'global-notice',
            __( 'Global Notice', 'sitepoint' ),
            'global_notice_meta_box_callback',
            'offer_zone'
        );
        $all_events_listing = apply_filters( 'all_events_for_the_offerzone',array() );
        if( !empty(   $all_events_listing ) ) {
            foreach( $all_events_listing as $value ) {
                add_meta_box(
                    $value['id'],
                   $value['name'],
                    $value['callback_function'],
                    'offer_zone'
                );
            }
        }

    }
}
add_action( 'add_meta_boxes', 'global_notice_meta_box' );


if(!function_exists('enqueue_script_for_test')) {
    function enqueue_script_for_test() {
        wp_enqueue_script( 'storefront-test-script', plugin_dir_url(__FILE__) . 'assets/custom.js', array('jquery' ), '20130115', true );
        wp_localize_script( 'storefront-test-script', 'admin_end_object' , array(
            'meta_boxes_ids' => get_offer_zone_id() 
        ));
    }
}
add_action( 'admin_enqueue_scripts', 'enqueue_script_for_test' );


if(!function_exists('get_offer_zone_id')) {
    function get_offer_zone_id() {
        $all_events_listing = apply_filters( 'all_events_for_the_offerzone',array() );
        $all_ids = array();
        if( !empty( $all_events_listing ) ) {
            foreach( $all_events_listing as $value ) {
                $all_ids[] = $value['id'];
            }
        }
        return $all_ids;
    }
}

if(!function_exists('wpse_125800_row_actions') ) {
	function wpse_125800_row_actions( $actions, $post ) {
		if( 'offer_zone' == $post->post_type ) {
       		unset( $actions['inline hide-if-no-js'] );
        	unset( $actions['view'] );
    	}
    	return $actions;
	}
}
add_filter( 'post_row_actions', 'wpse_125800_row_actions', 10, 2 );
