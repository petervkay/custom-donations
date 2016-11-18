<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
Plugin Name: Custom Donations
Description: A plugin for organizations to accept both one-time and recurring donations through Paypal
*/



function cstdnt_donations() {  
	$options = get_option( 'cstdnt_settings' );
	ob_start();
    include('templates/single-form.php');
    include('templates/recurring-form.php');
    return ob_get_clean();
}
   
add_shortcode('custom-donations', 'cstdnt_donations');




function cstdnt_register_styles() {

    wp_enqueue_style('custom-donations-styles', plugin_dir_url( __FILE__ ) . 'css/style.css' );

}


$options = get_option( 'cstdnt_settings' );

if(!isset($options['cstdnt_disable_css'])) {
	add_action('wp_enqueue_scripts','cstdnt_register_styles');
}


include('cstdnt-admin.php');
include('cstdnt-admin-styles.php');


?>
