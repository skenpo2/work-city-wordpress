<?php
function cpm_add_custom_meta_boxes() {
    add_meta_box('cpm_project_details', 'Project Details', 'cpm_render_meta_box', 'client_project');
}
add_action('add_meta_boxes', 'cpm_add_custom_meta_boxes');

function cpm_render_meta_box($post) {
    $client_name = get_post_meta($post->ID, '_client_name', true);
    $description = get_post_meta($post->ID, '_description', true);
    $status = get_post_meta($post->ID, '_status', true);
    $deadline = get_post_meta($post->ID, '_deadline', true);
    ?>
    <p>
        <label>Client Name:</label><br />
        <input type="text" name="client_name" value="<?php echo esc_attr($client_name); ?>" style="width:100%;" />
    </p>
    <p>
        <label>Description:</label><br />
        <textarea name="description" style="width:100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>
    <p>
        <label>Status:</label><br />
        <select name="status">
            <option value="pending" <?php selected($status, 'pending'); ?>>Pending</option>
            <option value="in_progress" <?php selected($status, 'in_progress'); ?>>In Progress</option>
            <option value="completed" <?php selected($status, 'completed'); ?>>Completed</option>
        </select>
    </p>
    <p>
        <label>Deadline:</label><br />
        <input type="date" name="deadline" value="<?php echo esc_attr($deadline); ?>" />
    </p>
    <?php
}

function cpm_save_meta_boxes($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!isset($_POST['client_name'])) return;

    update_post_meta($post_id, '_client_name', sanitize_text_field($_POST['client_name']));
    update_post_meta($post_id, '_description', sanitize_textarea_field($_POST['description']));
    update_post_meta($post_id, '_status', sanitize_text_field($_POST['status']));
    update_post_meta($post_id, '_deadline', sanitize_text_field($_POST['deadline']));
}
add_action('save_post', 'cpm_save_meta_boxes');