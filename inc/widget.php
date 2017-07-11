<?php
class GoToWebinar_Widget extends WP_Widget {
	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'GoToWebinar' );
	}
	function widget( $args, $instance ) {
		// Widget output
        extract ($args);
        $title = apply_filters('widget_title', $instance['title']);
        $max_webinars = $instance['max_webinars'];
        $include_webinars = $instance['include_webinars'];
        $exclude_webinars = $instance['exclude_webinars'];
        $hide_title_webinars = $instance['hide_title_webinars'];
        $webinar_timezone = $instance['webinar_timezone'];
        $options = get_option('gotowebinar_settings');
        echo $before_widget;
        echo $before_title . $title . $after_title; 
        
        if(file_exists(get_stylesheet_directory().'/wp-gotowebinar/widget-output.php')) {
        require(get_stylesheet_directory().'/wp-gotowebinar/widget-output.php');      
        } else {
        require('widget-output.php');   
        }
        
        
        
        
        echo $after_widget;
        
	}
	function update( $new_instance, $old_instance ) {
		// Save widget options
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['max_webinars'] = strip_tags($new_instance['max_webinars']);
        $instance['include_webinars'] = strip_tags($new_instance['include_webinars']);
        $instance['exclude_webinars'] = strip_tags($new_instance['exclude_webinars']);
        $instance['hide_title_webinars'] = strip_tags($new_instance['hide_title_webinars']);
        $instance['webinar_timezone'] = strip_tags($new_instance['webinar_timezone']);
        return $instance;
	}
	function form( $instance ) {
		// Output admin widget options form
        if (! empty( $instance['title'] )) { $title = esc_attr($instance['title']); }
        if (! empty( $instance['max_webinars'] )) { $max_webinars = esc_attr($instance['max_webinars']); }
        if (! empty( $instance['include_webinars'] )) { $include_webinars = esc_attr($instance['include_webinars']); }
        if (! empty( $instance['exclude_webinars'] )) { $exclude_webinars = esc_attr($instance['exclude_webinars']); }
        if (! empty( $instance['hide_title_webinars'] )) { $hide_title_webinars = esc_attr($instance['hide_title_webinars']); }
        if (! empty( $instance['webinar_timezone'] )) { $webinar_timezone = esc_attr($instance['webinar_timezone']); }
        require ('widget-options.php');
	}
}
function gotowebinar_register_widgets() {
	register_widget( 'GoToWebinar_Widget' );
}
add_action( 'widgets_init', 'gotowebinar_register_widgets' );
?>