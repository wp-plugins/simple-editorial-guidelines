<?php defined( 'ABSPATH' ) or die( 'Well hello there!' );

function wdseg_options_sidebar() { ?>
	
	<!-- sidebar -->
	<div id="postbox-container-1" class="postbox-container">

		<div class="meta-box-sortables">

			<div class="postbox">
				
				<h3><span><?php esc_attr_e(
							'Post Types', 'simple-editorial-guidelines'
						); ?></span></h3>

				<div class="inside">
					<p><?php esc_attr_e(
							'Select the specific post types on which you would like the editorial guidelines panel to appear.',
							'simple-editorial-guidelines'
						); ?></p>
						
					<?php wdseg_post_type_options(); ?>
					
					<?php submit_button(); ?>
					
				</div>
				<!-- .inside -->

			</div>
			<!-- .postbox -->

		</div>
		<!-- .meta-box-sortables -->
		
		<div class="meta-box-sortables">

			<div class="postbox">
				
				<h3><span><?php esc_attr_e(
							'User Roles', 'simple-editorial-guidelines'
						); ?></span></h3>

				<div class="inside">
					<p><?php esc_attr_e(
							'Select the specific user roles for which you would like the editorial guidelines panel to appear.',
							'simple-editorial-guidelines'
						); ?></p>
						
					<?php wdseg_user_role_options(); ?>
					
					<?php submit_button(); ?>
				
				</div>
				<!-- .inside -->

			</div>
			<!-- .postbox -->

		</div>
		<!-- .meta-box-sortables -->

	</div>
	<!-- #postbox-container-1 .postbox-container -->
	
<?php }