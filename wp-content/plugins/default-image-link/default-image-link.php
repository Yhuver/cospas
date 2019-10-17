<?php
/**
 * Plugin Name: Default Image Link
 * Plugin URI: http://wordpress.org/plugins/default-image-link/
 * Description: Change default image links when upload/insert in post or pages. Select default link for your images: 'None', 'Attachment Page', 'Media File'or 'Custom URL'.
 * Version: 1.1
 * Author: Jose A Ruiz
 * Author URI: http://twitter.com/jruizcantero
 * License: GPL2
 */

 
load_plugin_textdomain('jrc-default-image-link', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
 
/** Adding_Administration_Menus */
add_action( 'admin_menu', 'jrc_dil_menu' );

function jrc_dil_menu() {
	add_options_page( __('Default Image Link Options','jrc-default-image-link'), __('Default Image Link','jrc-default-image-link'), 'manage_options', 'jrc-default-image-link', 'jrc_dil_options' );
}

function jrc_dil_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You dont have sufficient permissions to access this page.' ) );
	}
	
	if(isset($_POST['preferred_img_link'])){
		// Save the posted value in the database
        $opt_val = $_POST['preferred_img_link'];
		
		if (($opt_val=='none')||($opt_val=='file')||($opt_val=='post')||($opt_val=='custom')){
			update_option( 'image_default_link_type', $opt_val );
			$msg=__('Updated','jrc-default-image-link');
		}else{
			$msg=__('Invalid value','jrc-default-image-link');
		}
		
		echo '<div class="updated"><p><strong>'.$msg.'</strong></p></div>';
	}
	
	$opt_val=get_option('image_default_link_type');
	
	?>
	<div id="wpbody">
		<div id="wpbody-content">
			<div class="wrap">
				<h2><?php _e('Default Image Link Settings','jrc-default-image-link'); ?></h2>
				<div id="poststuff" style="padding-top:10px; position:relative;">
				
					<div style="float:left; width:74%; padding-right:1%;">
						<div class="postbox">
							<h3><?php _e('Select default option','jrc-default-image-link') ?>;</h3>
							<div class="inside">
								<form method="post" action="options-general.php?page=jrc-default-image-link"> 
									<input type="radio" name="preferred_img_link" value="none" <?php if ($opt_val=='none') echo 'checked="checked"'; ?>/> <?php _e('None','jrc-default-image-link'); ?><br />
									<input type="radio" name="preferred_img_link" value="file" <?php if ($opt_val=='file') echo 'checked="checked"'; ?>/> <?php _e('Media File','jrc-default-image-link'); ?><br />
									<input type="radio" name="preferred_img_link" value="post" <?php if ($opt_val=='post') echo 'checked="checked"'; ?>/> <?php _e('Attachment Page','jrc-default-image-link'); ?><br />
									<input type="radio" name="preferred_img_link" value="custom" <?php if ($opt_val=='custom') echo 'checked="checked"'; ?>/> <?php _e('Custom URL (You must write custom URL for each image)','jrc-default-image-link'); ?><br />
									<?php submit_button(); ?>
								</form>
							</div>
						</div>
					</div>
					
					
					<div style="float:right; width:25%;">
						<div class="postbox">
							<h3><?php _e('Support This Plugin','jrc-default-image-link') ?></h3>
							<div class="inside">
								<table>
									<tbody>
									<tr><td align="center">
										<div class="star-rating widefat" title="<?php _e('Rate it Now!','jrc-default-image-link');?>"><a href="http://wordpress.org/support/view/plugin-reviews/default-image-link" target="_blank" rel="nofollow"><?php _e('Rate it Now!','jrc-default-image-link'); ?> <div class="star star-empty"></div><div class="star star-empty"></div><div class="star star-empty"></div><div class="star star-empty"></div><div class="star star-empty"></div></a></div>
									</td></tr>
									<tr><td align="justify">
										<p><?php _e('If you liked the plugin and was useful to you, then please consider rate it or donating. You can write me or follow me on','jrc-default-image-link');?> <a href="http://www.twitter.com/jruizcantero" title="@jruizcantero" target="_blank" rel="nofollow">Twitter (@jruizcantero)</a></p>
									</td></tr>

									<tr><td align="center">
										<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
										<input type="hidden" name="cmd" value="_donations">
										<input type="hidden" name="business" value="jruizcantero@gmail.com">
										<input type="hidden" name="lc" value="US">
										<input type="hidden" name="item_name" value="Jose Antonio Ruiz Cantero">
										<input type="hidden" name="item_number" value="Plugin Default Image Link">
										<input type="hidden" name="no_note" value="0">
										<input type="hidden" name="currency_code" value="EUR">
										<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
										<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
										<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
										</form>
									</td></tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<div class="clear"></div>
					
				</div>
				
			</div>
		</div>
	</div>
	<?php

}

// Adding WordPress plugin action links

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'jrc_dil_add_plugin_action_links' );

function jrc_dil_add_plugin_action_links( $links ) {
	$links[] = '<a href="options-general.php?page=jrc-default-image-link"><b>'.__('Settings').'</b></a>';
	return $links;
}

add_filter( 'plugin_row_meta', 'jrc_dil_plugin_meta_links', 10, 2 );

function jrc_dil_plugin_meta_links($links, $file) {
	$plugin = plugin_basename(__FILE__);

	// Create link
	if ( $file == $plugin ) {
		$links[] = '<a href="options-general.php?page=jrc-default-image-link"><b>'.__('Settings').'</b></a>';
	}
	return $links;

}

//error_log("This message is written to the log file if WP_DEBUG_LOG is enabled");

?>