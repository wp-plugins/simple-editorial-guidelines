<?php defined( 'ABSPATH' ) or die( 'Well hello there!' );
	
// Meta Box Settings

add_action( 'load-post.php', 'wdseg_options_setup' );
add_action( 'load-post-new.php', 'wdseg_options_setup' );

/* Meta box setup function. */
function wdseg_options_setup() {
	
	$selected_roles = wdseg_get_selected_user_roles();
	
	$user = new WP_User( get_current_user_id() );
	
	$user_roles = array();

	if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
		
	    foreach ( $user->roles as $role ) {
	    	
	    	$user_roles[] = $role;
	    	
	    }
	    
	}
	
	$user_check = false;
	
	foreach ($user_roles as $user_role) {
		
		if (in_array($user_role, $selected_roles)) :
		
			$user_check = true;
		
		endif;
		
	}
	
	if ($user_check == true) :
	
		function add_wdseg_box() {
			
			$post_types = wdseg_get_selected_post_types();
			
			foreach ($post_types as $key => $post_type) {
				
				add_meta_box(
					'wdseg-options',      // Unique ID
					esc_html__( 'Editorial Guidelines', 'wdseg' ),    // Title
					'wdseg_options_meta_box',   // Callback function
					$key,         // Admin page (or post type)
					'side',         // Context
					'default'         // Priority
				);
				
			}
			
		}
	
		/* Add meta boxes on the 'add_meta_boxes' hook. */
		add_action( 'add_meta_boxes', 'add_wdseg_box' );
	
	endif;
}

/* Display the post meta box. */
function wdseg_options_meta_box( $object, $box ) {
	
	wp_nonce_field( basename( __FILE__ ), 'wdseg_options_nonce' );
	
	echo apply_filters('the_content', get_option('wdseg_guidelines_text'));
	
}