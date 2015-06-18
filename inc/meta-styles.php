<?php defined( 'ABSPATH' ) or die( 'Well hello there!' );
	
function wdseg_admin_meta_styles() { 
	
	$background_color = get_option('wdseg_background_color');
	$text_color = get_option('wdseg_text_color');
	
?>
	
	<!-- Simple Editorial Guidelines Plugin Styles -->
	<style>
		
		#wdseg-options ul {
			list-style: disc;
			margin-left: 2em;
		}
		
		<?php if (!empty($background_color) || !empty($text_color)) : ?>
		#wdseg-options h3 {
			<?php if (!empty($background_color)) : echo 'background-color: ' . $background_color . ';'; endif; ?>
			<?php if (!empty($text_color)) : echo 'color: ' . $text_color . ';'; endif; ?>
		}
		<?php endif; ?>
		<?php if (!empty($text_color)) : ?>
		#wdseg-options .handlediv {
			color: <?php echo $text_color; ?>;
		}
		<?php endif; ?>
		
	</style>
	
<?php }
add_action('admin_head', 'wdseg_admin_meta_styles');