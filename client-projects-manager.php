<?php
/*
Plugin Name: Client Projects Manager
Description: Manages client projects with custom post type and shortcode display.
Version: 1.0
Author: Michael Obarewon
*/

if (!defined('ABSPATH')) exit;

define('CPM_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once CPM_PLUGIN_DIR . 'includes/cpt-register.php';
require_once CPM_PLUGIN_DIR . 'includes/meta-boxes.php';
require_once CPM_PLUGIN_DIR . 'includes/shortcode-display.php';

function cpm_enqueue_assets() {
    wp_enqueue_style('cpm-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('cpm-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'cpm_enqueue_assets');