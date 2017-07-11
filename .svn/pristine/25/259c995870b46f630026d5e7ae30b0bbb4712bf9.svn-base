<?php global $time_zone_list; ?>
    <p>
        <label>Title</label>
        <input class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php if(isset($title)) { echo esc_attr($title); } ?>" />
    </p>
    <p>
        <label>Maximum number of webinars to display</label>
        <input size="4" name="<?php echo esc_attr($this->get_field_name('max_webinars')); ?>" type="text" value="<?php if(isset($max_webinars)) {echo esc_attr($max_webinars); } ?>" />
    </p>
    <p>
        <label>Include webinars that contain:</label>
        <input class="widefat" name="<?php echo esc_attr($this->get_field_name('include_webinars')); ?>" type="text" value="<?php if(isset($include_webinars)) { echo esc_attr($include_webinars); } ?>" />
    </p>
    <p>
        <label>Exclude webinars that contain:</label>
        <input class="widefat" name="<?php echo esc_attr($this->get_field_name('exclude_webinars')); ?>" type="text" value="<?php if(isset($exclude_webinars)) { echo esc_attr($exclude_webinars); } ?>" />
    </p>
    <p>
        <label>Hide this word from the title:</label>
        <input class="widefat" name="<?php echo esc_attr($this->get_field_name('hide_title_webinars')); ?>" type="text" value="<?php if(isset($hide_title_webinars)){ echo esc_attr($hide_title_webinars); } ?>" />
    </p>
    <p>
        <label>Only show webinars from this timezone:</label>
        <select class="widefat" name="<?php echo esc_attr($this->get_field_name('webinar_timezone')); ?>">
            <option value="Show All">Show All Timezones</option>
            <?php foreach($time_zone_list as $key => $value) {
    echo '<option value="'.$key.'" '.(($key==$webinar_timezone)?'selected="selected"':"").'>'.$key.'</option>';
}
?>
        </select>
    </p>