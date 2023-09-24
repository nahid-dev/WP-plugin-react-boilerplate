<?php

/**
 * Plugin Name:       Job Place
 * Description:       A Job posting platform made by WordPress.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Nahid
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       jobplace
 */

add_action("admin_menu", "job_place_init_menu",);

//  Init Admin Menu
function job_place_init_menu()
{
    add_menu_page(__('Job Place', 'jobplace'), __('Job Place', 'jobplace'), 'manage_options', 'jobplace', 'jobplace_admin_page', 'dashicons-admin-post', '2.1');
}

// Init admin page
function jobplace_admin_page()
{
    require_once plugin_dir_path(__FILE__) . 'templates/app.php';
}

add_action('admin_enqueue_scrips', 'jobplace_admin_enqueue_scripts');

function jobplace_admin_enqueue_scripts()
{
    wp_enqueue_style('jobplace-style', plugin_dir_url(__FILE__) . 'build/index.css');
    wp_enqueue_script('jobplace-script', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-element'), '1.0.0', true);
}