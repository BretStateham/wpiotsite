<?php
/**
* Plugin Name: Basic Plugin
* Plugin URI: http://bretstateham.com 
* Description: Basic plug created using the Develop With WP tutorial videos
* Author: Bret Stateham
* Author URI: http://bretstateham.com 
* Version: 0.0.1
* License: GPLv2
*/

function dwwp_remove_dashboard_widget() {
    //do something
    remove_meta_box('dashboard_primary', 'dashboard','side');
}

//add_action($hook,$function_to_add,$priority,$accepted_args);
//add_filter();

add_action('wp_dashboard_setup','dwwp_remove_dashboard_widget');
