<?php defined( 'ABSPATH' ) or die( 'Well hello there!' ); ?>

<div class="wrap">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">
			
			<form method="post" action="options.php"> 
				
				<?php settings_fields( 'wdseg-main-group' ); ?>
				<?php do_settings_sections( 'wdseg-main-group' ); ?>
				
				<!-- main content -->
				<div id="post-body-content">
	
					<?php wdseg_options_primary(); ?>
	
				</div>
				<!-- post-body-content -->
	
				<?php wdseg_options_sidebar(); ?>
				
			</form>
	
		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->

<?php 