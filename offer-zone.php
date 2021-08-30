<?php
/**
 * @package MakeWebBetter
 * @version 1.0.0
 */
/*
Plugin Name: Offer Zone Plugin
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is normal plugin for the wordpress testing
Author: MakeWebBetter
Version: 1.0.0
Author URI: http://ma.tt/
*/

if ( ! post_type_exists('offer_zone') ) {
    require plugin_dir_path(__FILE__).'registred-custom-post-type.php';
} 


require plugin_dir_path(__FILE__).'inc/first-plugin-offer.php';

require plugin_dir_path(__FILE__).'inc/bogo-offer-code.php';