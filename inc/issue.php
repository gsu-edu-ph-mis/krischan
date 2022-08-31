<?php
/**
 * Custom post
 */
function custom_post_type_issue() {

	$labels = array(
		'name'                  => _x( 'Issues', 'Post Type General Name', 'krischan' ),
		'singular_name'         => _x( 'Issue', 'Post Type Singular Name', 'krischan' ),
		'menu_name'             => __( 'Issues', 'krischan' ),
		'name_admin_bar'        => __( 'Issue', 'krischan' ),
		'archives'              => __( 'Issue Archives', 'krischan' ),
		'attributes'            => __( 'Issue Attributes', 'krischan' ),
		'parent_item_colon'     => __( 'Parent Issue:', 'krischan' ),
		'all_items'             => __( 'All Issues', 'krischan' ),
		'add_new_item'          => __( 'Add New Issue', 'krischan' ),
		'add_new'               => __( 'Add New', 'krischan' ),
		'new_item'              => __( 'New Issue', 'krischan' ),
		'edit_item'             => __( 'Edit Issue', 'krischan' ),
		'update_item'           => __( 'Update Issue', 'krischan' ),
		'view_item'             => __( 'View Issue', 'krischan' ),
		'view_items'            => __( 'View Issues', 'krischan' ),
		'search_items'          => __( 'Search Issue', 'krischan' ),
		'not_found'             => __( 'Not found', 'krischan' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'krischan' ),
		'featured_image'        => __( 'Featured Image', 'krischan' ),
		'set_featured_image'    => __( 'Set featured image', 'krischan' ),
		'remove_featured_image' => __( 'Remove featured image', 'krischan' ),
		'use_featured_image'    => __( 'Use as featured image', 'krischan' ),
		'insert_into_item'      => __( 'Insert into issue', 'krischan' ),
		'uploaded_to_this_item' => __( 'Uploaded to this issue', 'krischan' ),
		'items_list'            => __( 'Issues list', 'krischan' ),
		'items_list_navigation' => __( 'Issues list navigation', 'krischan' ),
		'filter_items_list'     => __( 'Filter issues list', 'krischan' ),
	);
	$args = array(
		'label'                 => __( 'Issue', 'krischan' ),
		'description'           => __( 'Journal issues', 'krischan' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page'
	);
	register_post_type( 'issue', $args );

}
add_action( 'init', 'custom_post_type_issue', 0 );

/**
 * Metaboxes
 */
function krischan_render_issue_metabox( $post ){
        
	$vars = array();
	$vars['post'] = $post;
	
	if(empty($post->post_name)){
		$vars['journal_id'] = '';
		$vars['volume'] = '';
		$vars['number'] = '';
	} else {
		$_krischan_settings_issue = krischan_get_post_meta($post->ID, '_krischan_settings_issue');
		$vars['journal_id'] = $_krischan_settings_issue['journal_id'];
		$vars['volume'] = $_krischan_settings_issue['volume'];
		$vars['number'] = $_krischan_settings_issue['number'];
	}
	
	// print_r($vars);
	krischan_view_render('issue-settings.php', $vars);
}
function krischan_add_issue_metabox(){
	add_meta_box(
		'krischan-issue-metabox',
		__('Issue Settings', 'krischan'),
		'krischan_render_issue_metabox',
		'issue' ,
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'krischan_add_issue_metabox');

/**
 * Save post hook
 */
function krischan_save_post_hook_issue( $post_id ){
	global $wp_version;

	// Use local variable
	$post = $_POST;
	
	// Verify nonce
	// $nonce_name = $this->nonce_name;
	// if (!empty($post[$nonce_name])) {
	// 	if (!wp_verify_nonce($post[$nonce_name], $this->nonce_action)) {
	// 		return $post_id;
	// 	}
	// } else {
	// 	return $post_id; // Make sure we cancel on missing nonce!
	// }
	
	// Check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// Remove temporarily to avoid infinite loop
	remove_action( "save_post_issue", 'krischan_save_post_hook_issue' );
	// Update info
	
	$_krischan_settings_issue['journal_id'] = isset($post['krischan_issue_journal_id']) ? $post['krischan_issue_journal_id'] : "";
	$_krischan_settings_issue['volume'] = isset($post['krischan_issue_volume']) ? $post['krischan_issue_volume'] : "";
	$_krischan_settings_issue['number'] = isset($post['krischan_issue_number']) ? $post['krischan_issue_number'] : "";

	update_post_meta($post_id, '_krischan_settings_issue', $_krischan_settings_issue);
	
	// Add save hook
	add_action( "save_post_issue", 'krischan_save_post_hook_issue' );
}
add_action( "save_post_issue", 'krischan_save_post_hook_issue' );



// add_action(    'admin_head-edit.php',    'wpse152971_edit_post_change_title_in_list');
function wpse152971_edit_post_change_title_in_list() {
    add_filter(
        'the_title',
        'wpse152971_construct_new_title',
        100,
        2
    );
}

function wpse152971_construct_new_title( $title, $id ) {
    //print_r( $title );
    $custom_fields = krischan_get_post_meta($id, '_krischan_settings_issue');
    return $title . ', Volume ' . $custom_fields['volume'] . ' Number ' . $custom_fields['number'];
}