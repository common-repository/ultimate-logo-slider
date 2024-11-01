<?php
if( !function_exists('ata_logo_carousel_post_type') ){
function ata_logo_carousel_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Logo Slider', 'ata_logo' ),
		'singular_name'       => _x( 'Logo Slider ', 'ata_logo' ),
		'menu_name'           => __( 'Logo Slider ', 'ata_logo' ),
		'parent_item_colon'   => __( 'Parent Slider', 'ata_logo' ),
		'all_items'           => __( 'All Slider', 'ata_logo' ),
		'view_item'           => __( 'View Slider', 'ata_logo' ),
		'add_new_item'        => __( 'Add New Slider', 'ata_logo' ),
		'add_new'             => __( 'Add New Slider', 'ata_logo' ),
		'edit_item'           => __( 'Edit Slider', 'ata_logo' ),
		'update_item'         => __( 'Update Slider', 'ata_logo' ),
		'search_items'        => __( 'Search Slider', 'ata_logo' ),
		'not_found'           => __( 'Not Found', 'ata_logo' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ata_logo' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title'),
		
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'menu_position'       => 50,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'ata_logo', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'ata_logo_carousel_post_type', 0 );

}


if( !function_exists('ata_logo_add_new_columns')){
	//Admin Dashobord Listing Portfolio Columns Title
	add_filter( 'manage_edit-ata_logo_columns', 'ata_logo_add_new_columns' ) ;
	function ata_logo_add_new_columns() {
		$columns['cb'] = '<input type="checkbox" />';
		$columns['title'] = __('Title', 'ata_logo');
		$columns['how_to_use'] = __('Usage', 'ata_logo' );
		$columns['author'] = __('Author', 'ata_logo' );
		$columns['date'] = __('Date', 'ata_logo');
		return $columns; 
	}
}

if( !function_exists('ata_logo_columns')){
	//Admin Dashobord Listing Portfolio Columns Manage
	add_action( 'manage_ata_logo_posts_custom_column', 'ata_logo_columns', 10, 2 );
	function ata_logo_columns($columns) {
		global $post;
		switch ($columns) {
		case 'how_to_use':
			echo '<input type="text" value="[ed-logo id='.'\''.$post->ID.'\''.']" readonly="readonly" style="text-align:center; width:50%;" size="40px;"  onfocus="this.select();" onmouseup="return false;" />';
		break;
	
		
		}
	}
}