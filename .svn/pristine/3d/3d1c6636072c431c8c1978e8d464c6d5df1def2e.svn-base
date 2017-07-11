<?php

//Function to run upon ajax request
function wp_gotowebinar_clear_cache_callback() {
	global $wpdb; 
    $sql = "DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_gtw%' or option_name like '_transient_timeout_gtw%'";
    $wpdb->query($sql);
    	wp_die();     
}
add_action( 'wp_ajax_clear_cache', 'wp_gotowebinar_clear_cache_callback' );


//function that runs on deactivation
function wp_gotowebinar_clear_cache_deactivation() {
    if ( ! current_user_can( 'activate_plugins' ) )
        return;
    $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
    check_admin_referer( "deactivate-plugin_{$plugin}" );
    global $wpdb; 
    $sql = "DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_gtw%' or option_name like '_transient_timeout_gtw%'";
    $wpdb->query($sql);
}
register_deactivation_hook( __FILE__, 'wp_gotowebinar_clear_cache_deactivation' );

?>