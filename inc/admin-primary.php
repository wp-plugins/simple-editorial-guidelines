<?php defined( 'ABSPATH' ) or die( 'Well hello there!' );
	
function wdseg_options_primary() { ?>
	
	<div class="meta-box-sortables ui-sortable">

		<div class="postbox">

			<h3><span><?php esc_attr_e( 'Content', 'simple-editorial-guidelines' ); ?></span></h3>

			<div class="inside">
				<p><?php esc_attr_e(
						'Enter the editorial guidelines for your contributors in the editor below.',
						'simple-editorial-guidelines'
					); ?></p>
				
				<table class="form-table">
			        <tr valign="top">
			        <th scope="row">Editorial Guidelines</th>
			        	<td>
				        	<p>
					        	<?php wp_editor( get_option('wdseg_guidelines_text'), 'wdseg_guidelines_text'); ?>
				        	</p>
				        </td>
			        </tr>
				</table>
												
				<?php submit_button(); ?>
				
			</div>
			<!-- .inside -->

		</div>
		<!-- .postbox -->

	</div>
	<!-- .meta-box-sortables .ui-sortable -->
	
	<div class="meta-box-sortables ui-sortable">

		<div class="postbox">

			<h3><span><?php esc_attr_e( 'Color', 'simple-editorial-guidelines' ); ?></span></h3>

			<div class="inside">
				<p><?php esc_attr_e(
						'Select the coloring for the heading of your panel in the admin. Serves as a great way to customize to fit your site’s color palette, or to help it stand out so your contributors will notice it.',
						'simple-editorial-guidelines'
					); ?></p>
				
				<table class="form-table">
			        <tr valign="top">
			        <th scope="row">Panel Heading Text Color</th>
			        	<td>
				        	<p>
					        	<input type="text" name="wdseg_text_color" id="wdseg_text_color" class="color-picker" value="<?php echo get_option('wdseg_text_color'); ?>" />
				        	</p>
				        </td>
			        </tr>
				</table>
				
				<table class="form-table">
			        <tr valign="top">
			        <th scope="row">Panel Heading Background Color</th>
			        	<td>
				        	<p>
					        	<input type="text" name="wdseg_background_color" id="wdseg_background_color" class="color-picker" value="<?php echo get_option('wdseg_background_color'); ?>" />
				        	</p>
				        </td>
			        </tr>
				</table>
				
				<?php submit_button(); ?>
				
			</div>
			<!-- .inside -->

		</div>
		<!-- .postbox -->

	</div>
	<!-- .meta-box-sortables .ui-sortable -->
	
<?php }