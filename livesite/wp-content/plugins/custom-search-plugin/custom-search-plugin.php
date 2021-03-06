<?php
/*
Plugin Name: Custom Search
Plugin URI: http://bestwebsoft.com/plugin/
Description: Custom Search Plugin designed to search for site custom types.
Author: BestWebSoft
Version: 1.22
Author URI: http://bestwebsoft.com/
License: GPLv2 or later
*/
 
/*  © Copyright 2014  BestWebSoft  ( http://support.bestwebsoft.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Function are using to add on admin-panel Wordpress page 'bws_plugins' and sub-page of this plugin */
if ( ! function_exists( 'add_cstmsrch_admin_menu' ) ) {
	function add_cstmsrch_admin_menu() {
		global $bstwbsftwppdtplgns_options, $wpmu, $bstwbsftwppdtplgns_added_menu;
		$bws_menu_info = get_plugin_data( plugin_dir_path( __FILE__ ) . "bws_menu/bws_menu.php" );
		$bws_menu_version = $bws_menu_info["Version"];
		$base = plugin_basename( __FILE__ );

		if ( ! isset( $bstwbsftwppdtplgns_options ) ) {
			if ( 1 == $wpmu ) {
				if ( ! get_site_option( 'bstwbsftwppdtplgns_options' ) )
					add_site_option( 'bstwbsftwppdtplgns_options', array(), '', 'yes' );
				$bstwbsftwppdtplgns_options = get_site_option( 'bstwbsftwppdtplgns_options' );
			} else {
				if ( ! get_option( 'bstwbsftwppdtplgns_options' ) )
					add_option( 'bstwbsftwppdtplgns_options', array(), '', 'yes' );
				$bstwbsftwppdtplgns_options = get_option( 'bstwbsftwppdtplgns_options' );
			}
		}

		if ( isset( $bstwbsftwppdtplgns_options['bws_menu_version'] ) ) {
			$bstwbsftwppdtplgns_options['bws_menu']['version'][ $base ] = $bws_menu_version;
			unset( $bstwbsftwppdtplgns_options['bws_menu_version'] );
			update_option( 'bstwbsftwppdtplgns_options', $bstwbsftwppdtplgns_options, '', 'yes' );
			require_once( dirname( __FILE__ ) . '/bws_menu/bws_menu.php' );
		} else if ( ! isset( $bstwbsftwppdtplgns_options['bws_menu']['version'][ $base ] ) || $bstwbsftwppdtplgns_options['bws_menu']['version'][ $base ] < $bws_menu_version ) {
			$bstwbsftwppdtplgns_options['bws_menu']['version'][ $base ] = $bws_menu_version;
			update_option( 'bstwbsftwppdtplgns_options', $bstwbsftwppdtplgns_options, '', 'yes' );
			require_once( dirname( __FILE__ ) . '/bws_menu/bws_menu.php' );
		} else if ( ! isset( $bstwbsftwppdtplgns_added_menu ) ) {
			$plugin_with_newer_menu = $base;
			foreach ( $bstwbsftwppdtplgns_options['bws_menu']['version'] as $key => $value ) {
				if ( $bws_menu_version < $value && is_plugin_active( $base ) ) {
					$plugin_with_newer_menu = $key;
				}
			}
			$plugin_with_newer_menu = explode( '/', $plugin_with_newer_menu );
			$wp_content_dir = defined( 'WP_CONTENT_DIR' ) ? basename( WP_CONTENT_DIR ) : 'wp-content';
			if ( file_exists( ABSPATH . $wp_content_dir . '/plugins/' . $plugin_with_newer_menu[0] . '/bws_menu/bws_menu.php' ) )
				require_once( ABSPATH . $wp_content_dir . '/plugins/' . $plugin_with_newer_menu[0] . '/bws_menu/bws_menu.php' );
			else
				require_once( dirname( __FILE__ ) . '/bws_menu/bws_menu.php' );
			$bstwbsftwppdtplgns_added_menu = true;
		}

		add_menu_page( 'BWS Plugins', 'BWS Plugins', 'manage_options', 'bws_plugins', 'bws_add_menu_render', plugins_url("images/px.png", __FILE__ ), 1001 );
		add_submenu_page( 'bws_plugins', __( 'Custom Search Settings', 'custom-search' ), __( 'Custom search', 'custom-search' ), 'manage_options', "custom_search.php", 'cstmsrch_settings_page' );
	}
}

if ( ! function_exists ( 'cstmsrch_init' ) ) {
	function cstmsrch_init() {
		global $wpmu, $cstmsrch_options, $cstmsrch_plugin_info;

		/* Function adds translations in this plugin */
		load_plugin_textdomain( 'custom-search', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
}

if ( ! function_exists( 'cstmsrch_admin_init' ) ) {
	function cstmsrch_admin_init() {
		global $bws_plugin_info, $cstmsrch_plugin_info, $cstmsrch_result, $cstmsrch_options,  $cstmsrch_result;

		if ( ! $cstmsrch_plugin_info )
			$cstmsrch_plugin_info = get_plugin_data( __FILE__ );

		if ( ! isset( $bws_plugin_info ) || empty( $bws_plugin_info ) )			
			$bws_plugin_info = array( 'id' => '81', 'version' => $cstmsrch_plugin_info["Version"] );

		/* Check version on WordPress */
		cstmsrch_version_check();

		$args = array( '_builtin' => false );
		$cstmsrch_result = get_post_types( $args );
		if ( empty( $cstmsrch_result ) ) {
			$cstmsrch_options = array(
				'plugin_option_version'	=>	$cstmsrch_plugin_info["Version"]
			);
			update_option( 'cstmsrch_options', $cstmsrch_options );
		}
		
		/* Call register settings function */
		if ( isset( $_GET['page'] ) && "custom_search.php" == $_GET['page'] )
			register_cstmsrch_settings();	
	}
}

/* Function create column in table wp_options for option of this plugin. If this column exists - save value in variable. */
if ( ! function_exists( 'register_cstmsrch_settings' ) ) {
	function register_cstmsrch_settings() {
		global $wpmu, $cstmsrch_options, $bws_plugin_info, $cstmsrch_plugin_info, $cstmsrch_options_default;

		$cstmsrch_options_default = array(
			'plugin_option_version'	=>	$cstmsrch_plugin_info["Version"]
		);

		/* Install the option defaults */
		if ( 1 == $wpmu ) {
			if ( ! get_site_option( 'cstmsrch_options' ) ) {
				if ( false !== get_site_option( 'bws_custom_search' ) ) {
					$cstmsrch_options_default = get_site_option( 'bws_custom_search' );
					delete_site_option( 'bws_custom_search' );				
				}
				add_site_option( 'cstmsrch_options', $cstmsrch_options_default );
			}
		} else {
			if ( false !== get_option( 'bws_custom_search' ) ) {
				$cstmsrch_options_default = get_option( 'bws_custom_search' );
				delete_option( 'bws_custom_search' );
			}
			if ( ! get_option( 'cstmsrch_options' ) )
				add_option( 'cstmsrch_options', $cstmsrch_options_default );
		}

		cstmsrch_options();

		/* Array merge incase this version has added new options */
		if ( ! isset( $cstmsrch_options['plugin_option_version'] ) || $cstmsrch_options['plugin_option_version'] != $cstmsrch_plugin_info["Version"] ) {
			$cstmsrch_options = array_merge( $cstmsrch_options_default, $cstmsrch_options );
			$cstmsrch_options['plugin_option_version'] = $cstmsrch_plugin_info["Version"];
			update_option( 'cstmsrch_options', $cstmsrch_options );
		}
	}
}

/* Getting options */
if ( ! function_exists( 'cstmsrch_options' ) ) {
	function cstmsrch_options() {
		global $wpmu, $cstmsrch_options;
		$cstmsrch_options = ( 1 == $wpmu ) ? get_site_option( 'cstmsrch_options' ) : get_option( 'cstmsrch_options' );
	}
}

/* Function check if plugin is compatible with current WP version  */
if ( ! function_exists ( 'cstmsrch_version_check' ) ) {
	function cstmsrch_version_check() {
		global $wp_version, $cstmsrch_plugin_info;
		$require_wp		=	"3.0"; /* Wordpress at least requires version */
		$plugin			=	plugin_basename( __FILE__ );
	 	if ( version_compare( $wp_version, $require_wp, "<" ) ) {
			if ( is_plugin_active( $plugin ) ) {
				deactivate_plugins( $plugin );
				wp_die( "<strong>" . $cstmsrch_plugin_info['Name'] . " </strong> " . __( 'requires', 'custom-search' ) . " <strong>WordPress" . $require_wp . " </strong> " . __( 'or higher, that is why it has been deactivated! Please upgrade WordPress and try again.', 'custom-search') . "<br /><br />" . __( 'Back to the WordPress', 'custom-search') . " <a href='" . get_admin_url( null, 'plugins.php' ) . "'>" . __( 'Plugins page', 'custom-search') . "</a>." );
			}
		}
	}
}

if ( ! function_exists( 'cstmsrch_searchfilter' ) ) {
	function cstmsrch_searchfilter( $query ) {
		global $cstmsrch_options;
		cstmsrch_options();
		if ( $query->is_search && ! is_admin() ) {
			$cstmsrch_post_standart_types	=	array( 'post', 'page', 'attachment' );
			$cstmsrch_result_merge			=	array_merge( $cstmsrch_post_standart_types, $cstmsrch_options );
			$query->set( 'post_type', $cstmsrch_result_merge );
		}
		return $query;
	}
}

/* Function is forming page of the settings of this plugin */
if ( ! function_exists( 'cstmsrch_settings_page' ) ) {
	function  cstmsrch_settings_page() {
		global $wpdb, $cstmsrch_options, $cstmsrch_plugin_info, $cstmsrch_result;
		if ( isset( $_REQUEST['cstmsrch_submit'] ) && check_admin_referer( plugin_basename( __FILE__ ), 'cstmsrch_nonce_name' ) ) {
			$cstmsrch_options = isset( $_REQUEST['cstmsrch_options'] ) ? $_REQUEST['cstmsrch_options'] : array();
			$cstmsrch_options['plugin_option_version'] = $cstmsrch_plugin_info["Version"];
			update_option( 'cstmsrch_options', $cstmsrch_options );
			$message = __( "Settings saved" , 'custom-search' );
		} ?>
		<div class="wrap">
			<div class="icon32 icon32-bws" id="icon-options-general"></div>
			<h2><?php _e( 'Custom Search Settings', 'custom-search' ); ?></h2>
			<h2 class="nav-tab-wrapper">
				<a class="nav-tab nav-tab-active" href="admin.php?page=custom_search.php"><?php _e( 'Settings', 'custom-search' ); ?></a>
				<a class="nav-tab" href="http://bestwebsoft.com/plugin/custom-search-plugin/#faq" target="_blank"><?php _e( 'FAQ', 'custom-search' ); ?></a>
			</h2>
			<div class="updated fade" <?php if ( ! isset( $_REQUEST['cstmsrch_submit'] ) ) echo "style=\"display:none\""; ?>><p><strong><?php echo $message; ?></strong></p></div>
			<div id="cstmsrch_settings_notice" class="updated fade" style="display:none"><p><strong><?php _e( "Notice:", 'custom-search' ); ?></strong> <?php _e( "The plugin's settings have been changed. In order to save them please don't forget to click the 'Save Changes' button.", 'custom-search' ); ?></p></div>
			<?php if ( 0 < count( $cstmsrch_result ) ) { ?>
				<form method="post" action="" style="margin-top: 10px;" id="cstmsrch_settings_form">
					<table class="form-table">
						<tr valign="top">
							<th scope="row"><?php _e( 'Enable Custom search for:', 'custom-search' ); ?> </th>
							<td>
								<?php foreach ( $cstmsrch_result as $value ) { ?>
									<label><input type="checkbox" <?php echo ( in_array( $value, $cstmsrch_options ) ?  'checked="checked"' : "" ); ?> name="cstmsrch_options[]" value="<?php echo $value; ?>"/><span style="text-transform: capitalize; padding-left: 5px;"><?php echo $value; ?></span></label><br />
								<?php } ?>
							</td>
						</tr>
					</table>
					<input type="hidden" name="cstmsrch_submit" value="submit" />
					<p class="submit">
						<input type="submit" class="button-primary" value="<?php _e( 'Save Changes' , 'custom-search' ) ?>" />
					</p>
					<?php wp_nonce_field( plugin_basename( __FILE__ ), 'cstmsrch_nonce_name' ); ?>
				</form>
			<?php } else { ?>
				<p><?php _e( 'No custom post type found.', 'custom-search' ); ?></p>
			<?php } ?>
			<div class="bws-plugin-reviews">
				<div class="bws-plugin-reviews-rate">
					<?php _e( 'If you enjoy our plugin, please give it 5 stars on WordPress', 'custom-search' ); ?>: 
					<a href="http://wordpress.org/support/view/plugin-reviews/custom-search-plugin" target="_blank" title="Custom Search reviews"><?php _e( 'Rate the plugin', 'custom-search' ); ?></a><br/>
				</div>
				<div class="bws-plugin-reviews-support">
					<?php _e( 'If there is something wrong about it, please contact us', 'custom-search' ); ?>: 
					<a href="http://support.bestwebsoft.com">http://support.bestwebsoft.com</a>
				</div>
			</div>
		</div>
	<?php }
}

/* Positioning in the page. End. */
if ( !function_exists( 'cstmsrch_action_links' ) ) {
	function cstmsrch_action_links( $links, $file ) {
		/* Static so we don't call plugin_basename on every plugin row. */
		static $this_plugin;
		if ( ! $this_plugin ) $this_plugin = plugin_basename( __FILE__ );

		if ( $file == $this_plugin ) {
			$settings_link = '<a href="admin.php?page=custom_search.php">' . __( 'Settings', 'custom-search' ) . '</a>';
			array_unshift( $links, $settings_link );
		}
		return $links;
	}
} /* End function cstmsrch_action_links */

/* Function are using to create link 'settings' on admin page. */
if ( !function_exists( 'cstmsrch_links' ) ) {
	function cstmsrch_links( $links, $file ) {
		$base = plugin_basename( __FILE__ );
		if ( $file == $base ) {
			$links[]	=	'<a href="admin.php?page=custom_search.php">' . __( 'Settings','custom-search' ) . '</a>';
			$links[]	=	'<a href="http://wordpress.org/plugins/custom-search-plugin/faq/" target="_blank">' . __( 'FAQ','custom-search' ) . '</a>';
			$links[]	=	'<a href="http://support.bestwebsoft.com">' . __( 'Support','custom-search' ) . '</a>';
		}
		return $links;
	}
}

if ( ! function_exists('cstmsrch_admin_js') ) {
	function cstmsrch_admin_js() {
		if ( isset( $_REQUEST['page'] ) && 'custom_search.php' == $_REQUEST['page'] )
			wp_enqueue_style( 'cstmsrch_script', plugins_url( 'js/script.js', __FILE__ ) );
	}
}

/* Function for delete options from table `wp_options` */
if ( ! function_exists( 'delete_cstmsrch_settings' ) ) {
	function delete_cstmsrch_settings() {
		delete_option( 'cstmsrch_options' );
		delete_site_option( 'cstmsrch_options' );
	}
}

register_activation_hook( __FILE__, 'register_cstmsrch_settings');

add_action( 'admin_menu', 'add_cstmsrch_admin_menu' );
add_action( 'init', 'cstmsrch_init' );
add_action( 'admin_init', 'cstmsrch_admin_init' );
add_action( 'admin_enqueue_scripts', 'cstmsrch_admin_js' );

add_filter( 'pre_get_posts', 'cstmsrch_searchfilter' );
/* Adds "Settings" link to the plugin action page */
add_filter( 'plugin_action_links', 'cstmsrch_action_links', 10, 2 );
/* Additional links on the plugin page */
add_filter( 'plugin_row_meta', 'cstmsrch_links', 10, 2 );

register_uninstall_hook( __FILE__, 'delete_cstmsrch_settings');
?>