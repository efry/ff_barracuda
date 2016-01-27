<?php
	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
	$active_color = get_option('barracuda_active_color');
	$inactive_color = get_option('barracuda_inactive_color');
	$wp_welcome_panel = get_option('barracuda_wp_welcome_panel');
	$wp_news_widget = get_option('barracuda_wp_dashboard_primary');
	$wp_quick_draft = get_option('barracuda_wp_dashboard_quick_press');
	$wp_activity = get_option('barracuda_wp_dashboard_activity');
	$wp_at_a_glance = get_option('barracuda_wp_dashboard_right_now');
	$wp_secondary = get_option('barracuda_wp_dashboard_secondary');
	$wp_recent_comments = get_option('barracuda_wp_dashboard_recent_comments');
    $wp_incoming_links = get_option('barracuda_wp_dashboard_incoming_links');
    $wp_dash_plugins = get_option('barracuda_wp_dashboard_plugins');
    $wp_recent_drafts = get_option('barracuda_wp_dashboard_recent_drafts');
    $core_updates = get_option('barracuda_wp_pre_site_transient_update_core');
    $plugin_updates = get_option('barracuda_wp_pre_site_transient_update_plugins');
    $theme_updates = get_option('barracuda_wp_pre_site_transient_update_themes');
    $wp_yoast_seo = get_option('barracuda_wp_wpseo-dashboard-overview');
    $barracuda_header_image = get_option('barracuda_header_image');
    $lcs = get_option('barracuda_lcs');

?>
<div class="wrap">
	<div id="barracuda-settings-page-title">
		<h2>Barracuda Settings</h2>
	</div>
		<form method="post" action="options.php">
		<?php 
			settings_fields('barracuda-plugin-settings-group');
			do_settings_sections('barracuda-plugin-settings-group');
			//wp_nonce_field('update-options'); 
		?>
			<div class="barracuda-options-wrapper">
				<input type="hidden" name="action" value="update" />
			    <div>
			    	<div class="barracuda-section-title">
			    		<h3>Admin Header Image</h3>
			    	</div>
			    	<div class="barracuda-option-wrapper">
			    		<input id="barracuda_header_image" name="barracuda_header_image" type="text" size="36" value="<?php echo $barracuda_header_image; ?>" />
			    		<input id="upload_image_button" type="submit" value="Upload Image" />
			    		<div class="barracuda-desc-text">
			    			Enter an URL or upload an image for the header image in the Wordpress Admin pages.  Ideal image size is 100px x 15px.
			    		</div>
			    	</div>
			    </div>
			    <div class="barracuda-section-title">
			    	<h3>Admin Colors</h3>
			    </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Primary Color: </div>
				        <div class="option-select-wrapper">
				        	<input type="text" name="barracuda_active_color" id="barracuda_active_color" class="barracuda-color-picker" value="<?php echo $active_color; ?>" data-default-color="#ea2529"/>
				        </div>
				        <div class="barracuda-clear"></div>
				        <div class="barracuda-desc-text">
				        	Primary Color is used for the link, button background, checkbox check, and radio button colors.
				        </div>
			        </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Secondary Color: </div>
			        	<div class="option-select-wrapper">
			        		<input type="text" name="barracuda_inactive_color" id="barracuda_inactive_color" class="barracuda-color-picker" value="<?php echo $inactive_color; ?>" data-default-color="#3a3a3a"/>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">
			        		Secondary Color is used for the link hover state, button border, and the Wordpress login/form background colors.
			        	</div>
			        </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Light Color Scheme: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_lcs" id="barracuda_lcs" value="1" <?php if ($lcs == 1){ echo 'checked';  } ?> /><span class="radio-label">Yes</span>
			        		<input type="radio" name="barracuda_lcs" id="barracuda_lcs" value="0" <?php if ($lcs == 0){ echo 'checked';  } ?> /><span class="radio-label">No</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">
			        		The Light Color scheme is used for client sites that have a darker color logo, so it does not get lost in the black admin bar.
			        	</div>
			        </div>
			    <div class="barracuda-section-title">
			    	<h3>Show/Hide Dashboard Widgets</h3>
			    </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Wordpress Welcome Panel: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_wp_welcome_panel" class="barracuda-radio" value="1" <?php if ($wp_welcome_panel == 1){ echo 'checked';  } ?> /><span class="radio-label">Show</span>
			        		<input type="radio" name="barracuda_wp_welcome_panel" class="barracuda-radio" value="0" <?php if ($wp_welcome_panel == 0){ echo 'checked';  } ?> /><span class="radio-label">Hide</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">

			        	</div>
			        </div>    
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Wordpress News: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_wp_dashboard_primary" class="barracuda-radio" value="1" <?php if ($wp_news_widget == 1){ echo 'checked';  } ?> /><span class="radio-label">Show</span>
			        		<input type="radio" name="barracuda_wp_dashboard_primary" class="barracuda-radio" value="0" <?php if ($wp_news_widget == 0){ echo 'checked';  } ?> /><span class="radio-label">Hide</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">

			        	</div>
			        </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Wordpress Secondary Widgets: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_wp_dashboard_secondary" class="barracuda-radio" value="1" <?php if ($wp_secondary == 1){ echo 'checked';  } ?> /><span class="radio-label">Show</span>
			        		<input type="radio" name="barracuda_wp_dashboard_secondary" class="barracuda-radio" value="0" <?php if ($wp_secondary == 0){ echo 'checked';  } ?> /><span class="radio-label">Hide</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">

			        	</div>
			        </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Wordpress At A Glance: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_wp_dashboard_right_now" class="barracuda-radio" value="1" <?php if ($wp_at_a_glance == 1){ echo 'checked';  } ?> /><span class="radio-label">Show</span>
			        		<input type="radio" name="barracuda_wp_dashboard_right_now" class="barracuda-radio" value="0" <?php if ($wp_at_a_glance == 0){ echo 'checked';  } ?> /><span class="radio-label">Hide</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">

			        	</div>
			        </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Wordpress Activity: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_wp_dashboard_activity" class="barracuda-radio" value="1" <?php if ($wp_activity == 1){ echo 'checked';  } ?> /><span class="radio-label">Show</span>
			        		<input type="radio" name="barracuda_wp_dashboard_activity" class="barracuda-radio" value="0" <?php if ($wp_activity == 0){ echo 'checked';  } ?> /><span class="radio-label">Hide</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">

			        	</div>
			        </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Wordpress Quick Draft: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_wp_dashboard_quick_press" class="barracuda-radio" value="1" <?php if ($wp_quick_draft == 1){ echo 'checked';  } ?> /><span class="radio-label">Show</span>
			        		<input type="radio" name="barracuda_wp_dashboard_quick_press" class="barracuda-radio" value="0" <?php if ($wp_quick_draft == 0){ echo 'checked';  } ?> /><span class="radio-label">Hide</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">

			        	</div>
			        </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Wordpress Recent Comments: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_wp_dashboard_recent_comments" class="barracuda-radio" value="1" <?php if ($wp_recent_comments == 1){ echo 'checked';  } ?> /><span class="radio-label">Show</span>
			        		<input type="radio" name="barracuda_wp_dashboard_recent_comments" class="barracuda-radio" value="0" <?php if ($wp_recent_comments == 0){ echo 'checked';  } ?> /><span class="radio-label">Hide</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">

			        	</div>
			        </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Wordpress Incomming Links: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_wp_dashboard_incoming_links" class="barracuda-radio" value="1" <?php if ($wp_incoming_links == 1){ echo 'checked';  } ?> /><span class="radio-label">Show</span>
			        		<input type="radio" name="barracuda_wp_dashboard_incoming_links" class="barracuda-radio" value="0" <?php if ($wp_incoming_links == 0){ echo 'checked';  } ?> /><span class="radio-label">Hide</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">

			        	</div>
			        </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Wordpress Dashboard Plugins: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_wp_dashboard_plugins" class="barracuda-radio" value="1" <?php if ($wp_dash_plugins == 1){ echo 'checked';  } ?> /><span class="radio-label">Show</span>
			        		<input type="radio" name="barracuda_wp_dashboard_plugins" class="barracuda-radio" value="0" <?php if ($wp_dash_plugins == 0){ echo 'checked';  } ?> /><span class="radio-label">Hide</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">

			        	</div>
			        </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Wordpress Recent Drafts: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_wp_dashboard_recent_drafts" class="barracuda-radio" value="1" <?php if ($wp_recent_drafts == 1){ echo 'checked';  } ?> /><span class="radio-label">Show</span>
			        		<input type="radio" name="barracuda_wp_dashboard_recent_drafts" class="barracuda-radio" value="0" <?php if ($wp_recent_drafts == 0){ echo 'checked';  } ?> /><span class="radio-label">Hide</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">

			        	</div>
			        </div>
			        <div class="barracuda-option-wrapper">
			        	<div class="option-select-title">Yoast SEO Posts Overview: </div>
			        	<div class="option-select-wrapper">
			        		<input type="radio" name="barracuda_wp_wpseo-dashboard-overview" class="barracuda-radio" value="1" <?php if ($wp_yoast_seo == 1){ echo 'checked';  } ?> /><span class="radio-label">Show</span>
			        		<input type="radio" name="barracuda_wp_wpseo-dashboard-overview" class="barracuda-radio" value="0" <?php if ($wp_yoast_seo == 0){ echo 'checked';  } ?> /><span class="radio-label">Hide</span>
			        	</div>
			        	<div class="barracuda-clear"></div>
			        	<div class="barracuda-desc-text">

			        	</div>
			        </div>

			</div>
			<?php submit_button(); ?>
		</form>
	<?php
		
	?>
</div>
<script language="JavaScript">
jQuery(document).ready(function() {
	jQuery('#upload_image_button').click(function() {
		formfield = jQuery('#barracuda_header_image').attr('name');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		return false;
	});

	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#barracuda_header_image').val(imgurl);
		tb_remove();
	}
});
</script>
