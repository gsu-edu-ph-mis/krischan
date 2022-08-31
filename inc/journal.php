<?php
/**
 * Journal custom post
 */
function custom_post_type_journal() {

	$labels = array(
		'name'                  => _x( 'Journals', 'Post Type General Name', 'krischan' ),
		'singular_name'         => _x( 'Journal', 'Post Type Singular Name', 'krischan' ),
		'menu_name'             => __( 'Journals', 'krischan' ),
		'name_admin_bar'        => __( 'Journal', 'krischan' ),
		'archives'              => __( 'Item Archives', 'krischan' ),
		'attributes'            => __( 'Item Attributes', 'krischan' ),
		'parent_item_colon'     => __( 'Parent Item:', 'krischan' ),
		'all_items'             => __( 'All Items', 'krischan' ),
		'add_new_item'          => __( 'Add New Item', 'krischan' ),
		'add_new'               => __( 'Add New', 'krischan' ),
		'new_item'              => __( 'New Item', 'krischan' ),
		'edit_item'             => __( 'Edit Item', 'krischan' ),
		'update_item'           => __( 'Update Item', 'krischan' ),
		'view_item'             => __( 'View Item', 'krischan' ),
		'view_items'            => __( 'View Items', 'krischan' ),
		'search_items'          => __( 'Search Item', 'krischan' ),
		'not_found'             => __( 'Not found', 'krischan' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'krischan' ),
		'featured_image'        => __( 'Featured Image', 'krischan' ),
		'set_featured_image'    => __( 'Set featured image', 'krischan' ),
		'remove_featured_image' => __( 'Remove featured image', 'krischan' ),
		'use_featured_image'    => __( 'Use as featured image', 'krischan' ),
		'insert_into_item'      => __( 'Insert into item', 'krischan' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'krischan' ),
		'items_list'            => __( 'Items list', 'krischan' ),
		'items_list_navigation' => __( 'Items list navigation', 'krischan' ),
		'filter_items_list'     => __( 'Filter items list', 'krischan' ),
	);
	$args = array(
		'label'                 => __( 'Journal', 'krischan' ),
		'description'           => __( 'Research journal', 'krischan' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
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
	register_post_type( 'journal', $args );

}
add_action( 'init', 'custom_post_type_journal', 0 );

/**
 * Metaboxes
 */
function krischan_render_journal_metabox( $post ){
        
	$vars = array();
	$vars['post'] = $post;
	
	if(empty($post->post_name)){
		$vars['issn'] = '';
	} else {
		$_krischan_settings_journal = krischan_get_post_meta($post->ID, '_krischan_settings_journal');
		$vars['issn'] = $_krischan_settings_journal['issn'];
		$vars['eissn'] = $_krischan_settings_journal['eissn'];
		$vars['frequency'] = $_krischan_settings_journal['frequency'];
		$vars['editorial_policy'] = $_krischan_settings_journal['editorial_policy'];
		$vars['style_sheet'] = $_krischan_settings_journal['style_sheet'];
		$vars['access'] = $_krischan_settings_journal['access'];
		$vars['editorial_board'] = $_krischan_settings_journal['editorial_board'];
	}
	
	// print_r($vars);
	krischan_view_render('journal-settings.php', $vars);
}
function krischan_add_journal_metabox(){
	add_meta_box(
		'krischan-journal-metabox',
		__('Journal Settings', 'krischan'),
		'krischan_render_journal_metabox',
		'journal' ,
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'krischan_add_journal_metabox');

/**
 * Save post hook
 */
function krischan_save_post_hook_journal( $post_id ){
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
	remove_action( "save_post_journal", 'krischan_save_post_hook_journal' );
	// Update info
	
	$_krischan_settings_journal['issn'] = isset($post['krischan_journal_issn']) ? $post['krischan_journal_issn'] : "";
	$_krischan_settings_journal['eissn'] = isset($post['krischan_journal_eissn']) ? $post['krischan_journal_eissn'] : "";
	$_krischan_settings_journal['frequency'] = isset($post['krischan_journal_frequency']) ? $post['krischan_journal_frequency'] : "";
	$_krischan_settings_journal['editorial_policy'] = isset($post['krischan_journal_editorial_policy']) ? $post['krischan_journal_editorial_policy'] : "";
	$_krischan_settings_journal['style_sheet'] = isset($post['krischan_journal_style_sheet']) ? $post['krischan_journal_style_sheet'] : "";
	$_krischan_settings_journal['access'] = isset($post['krischan_journal_access']) ? $post['krischan_journal_access'] : "";
	$_krischan_settings_journal['editorial_board'] = isset($post['krischan_journal_editorial_board']) ? $post['krischan_journal_editorial_board'] : "";

	update_post_meta($post_id, '_krischan_settings_journal', $_krischan_settings_journal);
	
	// Add save hook
	add_action( "save_post_journal", 'krischan_save_post_hook_journal' );
}
add_action( "save_post_journal", 'krischan_save_post_hook_journal' );