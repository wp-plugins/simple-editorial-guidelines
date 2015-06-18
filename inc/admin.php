<?php defined( 'ABSPATH' ) or die( 'Well hello there!' );
	
function wdseg_admin_pages() {
	
	add_submenu_page('options-general.php', 'Editorial Guidelines Settings', 'Editorial Guidelines', 'manage_options', 'wd_editorial_guidelines', 'wdseg_options');
	
}
add_action('admin_menu', 'wdseg_admin_pages');

function wdseg_options() {
	
	require 'admin-structure.php';
	
}

function wdseg_register_settings() {
	
	register_setting( 'wdseg-main-group', 'wdseg_guidelines_text' );
	register_setting( 'wdseg-main-group', 'wdseg_background_color' );
	register_setting( 'wdseg-main-group', 'wdseg_text_color' );
	
	$post_type_labels = wdseg_get_post_type_labels();
	
	foreach ($post_type_labels as $key => $post_type_label) {
		
		register_setting( 'wdseg-main-group', 'wdseg_post_type_' . $key );
		
	}
	
	$roles = get_editable_roles();
	
	foreach ($roles as $key => $roles) {
		
		register_setting( 'wdseg-main-group', 'wdseg_user_role_' . $key );
		
	}
	
}
add_action('admin_init', 'wdseg_register_settings');

function wdseg_get_post_type_labels() {
	
	$args = array(
		
		'public'		=>	true
		
	);
	
	$post_types = get_post_types($args);
	
	$post_type_labels = array();
	
	foreach ($post_types as $post_type) {
		
		$post_type_info = get_post_type_object($post_type);
		
		$post_type_labels[$post_type] = $post_type_info->labels->name;
				
	}
	
	return $post_type_labels;
	
}

function wdseg_post_type_options() {
	
	$post_type_labels = wdseg_get_post_type_labels();
	
	if (!empty($post_type_labels)) : ?>
	
		<ul class="wdseg-sidebar-options">
	
			<?php foreach ($post_type_labels as $key => $post_type_label) { 
				
				if (get_option('wdseg_post_type_' . $key, 'on') == 'on') {
					
					$checked = 'checked';
					
				} else {
					
					$checked = '';
					
				} ?>
				
				<li>
					<input type="checkbox" name="wdseg_post_type_<?php echo $key; ?>" id="wdseg_post_type_<?php echo $key; ?>" <?php echo $checked; ?> />
					<label for="wdseg_post_type_<?php echo $key; ?>"><?php echo $post_type_label; ?></label>
				</li>
				
			<?php } ?>
			
		</ul>
			
	<?php endif;
	
}

function wdseg_get_selected_post_types() {
	
	$post_type_labels = wdseg_get_post_type_labels();
	
	$selected_post_types = array();
	
	if (!empty($post_type_labels)) :
	
			foreach ($post_type_labels as $key => $post_type_label) { 
				
				if (get_option('wdseg_post_type_' . $key, 'on') == 'on') :
					
					$selected_post_types[$key] = $post_type_label;
					
				endif;
				
			}
			
	endif;
	
	return $selected_post_types;
	
}

function wdseg_user_role_options() {
	
	$roles = get_editable_roles();
	
	if (!empty($roles)) : ?>
	
		<ul class="wdseg-sidebar-options">
	
			<?php foreach ($roles as $key => $role) { 
				
				if (get_option('wdseg_user_role_' . $key, 'on') == 'on') {
					
					$checked = 'checked';
					
				} else {
					
					$checked = '';
					
				} ?>
				
				<li>
					<input type="checkbox" name="wdseg_user_role_<?php echo $key; ?>" id="wdseg_user_role_<?php echo $key; ?>" <?php echo $checked; ?> />
					<label for="wdseg_user_role_<?php echo $key; ?>"><?php echo $role['name']; ?></label>
				</li>
				
			<?php } ?>
			
		</ul>
			
	<?php endif;
	
}

function wdseg_get_selected_user_roles() {
	
	$roles = get_editable_roles();
	
	$selected_roles = array();
	
	if (!empty($roles)) :
	
			foreach ($roles as $key => $role) { 
				
				if (get_option('wdseg_user_role_' . $key, 'on') == 'on') :
				
					$selected_roles[] = $key;
				
				endif;

			}
			
	endif;
	
	return $selected_roles;
	
}

