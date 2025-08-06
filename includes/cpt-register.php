<?php
function cpm_register_client_project_post_type() {
    $labels = array(
        'name' => 'Client Projects',
        'singular_name' => 'Client Project',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Client Project',
        'edit_item' => 'Edit Client Project',
        'new_item' => 'New Client Project',
        'all_items' => 'All Client Projects',
        'menu_name' => 'Client Projects',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
    );

    register_post_type('client_project', $args);
}
add_action('init', 'cpm_register_client_project_post_type');