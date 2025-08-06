<?php
function cpm_client_projects_shortcode() {
    $args = array(
        'post_type' => 'client_project',
        'posts_per_page' => -1,
    );
    $projects = new WP_Query($args);

    ob_start();

    if ($projects->have_posts()) {
        echo '<table class="cpm-table">';
        echo '<thead><tr><th>Title</th><th>Client</th><th>Status</th><th>Deadline</th></tr></thead><tbody>';
        while ($projects->have_posts()) {
            $projects->the_post();
            $client_name = get_post_meta(get_the_ID(), '_client_name', true);
            $status = get_post_meta(get_the_ID(), '_status', true);
            $deadline = get_post_meta(get_the_ID(), '_deadline', true);

            echo '<tr>';
            echo '<td>' . get_the_title() . '</td>';
            echo '<td>' . esc_html($client_name) . '</td>';
            echo '<td>' . esc_html(ucwords(str_replace('_', ' ', $status))) . '</td>';
            echo '<td>' . esc_html($deadline) . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
        wp_reset_postdata();
    } else {
        echo '<p>No client projects found.</p>';
    }

    return ob_get_clean();
}
add_shortcode('client_projects', 'cpm_client_projects_shortcode');