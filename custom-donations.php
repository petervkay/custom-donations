<?php

/*
Plugin Name: Custom Donations
Description: A plugin for organizations to accept both one-time and recurring donations through Paypal
*/

function donations() {  
	$options = get_option( 'cd_settings' );
	ob_start();
    include('templates/single-form.php');
    include('templates/recurring-form.php');
    return ob_get_clean();
}
   
add_shortcode('custom-donations', 'donations');




function register_my_styles() {

    wp_enqueue_style('custom-donations-styles', plugin_dir_url( __FILE__ ) . 'css/style.css' );

}


$options = get_option( 'cd_settings' );

if(!isset($options['cd_disable_css'])) {
	add_action('wp_enqueue_scripts','register_my_styles');
}


include('cd-admin.php');
include('cd-admin-styles.php');


?>
