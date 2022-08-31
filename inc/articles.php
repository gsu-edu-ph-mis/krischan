<?php
/**
 * Custom post
 */
function custom_post_type_article() {

	$labels = array(
		'name'                  => _x( 'Articles', 'Post Type General Name', 'krischan' ),
		'singular_name'         => _x( 'Article', 'Post Type Singular Name', 'krischan' ),
		'menu_name'             => __( 'Articles', 'krischan' ),
		'name_admin_bar'        => __( 'Article', 'krischan' ),
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
		'label'                 => __( 'Article', 'krischan' ),
		'description'           => __( 'Journal articles', 'krischan' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
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
		'capability_type'       => 'page',
	);
	register_post_type( 'article', $args );

}
add_action( 'init', 'custom_post_type_article', 0 );

/**
 * Metaboxes
 */
function krischan_render_article_metabox( $post ){
        
	$vars = array();
	$vars['post'] = $post;
	
	if(empty($post->post_name)){
		$vars['journal_id'] = '';
		$vars['volume'] = '';
		$vars['number'] = '';
	} else {
		$custom_fields = krischan_get_post_meta($post->ID, '_krischan_settings_journal');
		$vars['journal_id'] = $custom_fields['journal_id'];
		$vars['volume'] = $custom_fields['volume'];
		$vars['number'] = $custom_fields['number'];
	}
	
	// print_r($vars);
	krischan_view_render('article-settings.php', $vars);
}
function krischan_add_article_metabox(){
	add_meta_box(
		'krischan-article-metabox',
		__('Article Settings', 'krischan'),
		'krischan_render_article_metabox',
		'article' ,
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'krischan_add_article_metabox');

/**
 * Save post hook
 */
function krischan_save_post_hook_article( $post_id ){
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
	remove_action( "save_post_article", 'krischan_save_post_hook_article' );
	// Update info
	
	$_krischan_settings_issue['journal_id'] = isset($post['krischan_issue_journal_id']) ? $post['krischan_issue_journal_id'] : "";
	$_krischan_settings_issue['volume'] = isset($post['krischan_issue_volume']) ? $post['krischan_issue_volume'] : "";
	$_krischan_settings_issue['number'] = isset($post['krischan_issue_number']) ? $post['krischan_issue_number'] : "";

	update_post_meta($post_id, '_krischan_settings_issue', $_krischan_settings_issue);
	
	// Add save hook
	add_action( "save_post_article", 'krischan_save_post_hook_article' );
}
add_action( "save_post_article", 'krischan_save_post_hook_article' );