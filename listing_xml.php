<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              ahmed.live
 * @since             1.0.0
 * @package           Listing_xml
 *
 * @wordpress-plugin
 * Plugin Name:       XML Listing Save 
 * Plugin URI:        listing_xml
 * Description:       This plugin will accept an XML file and save data to Database.
 * Version:           1.0.0
 * Author:            Hafiz Ahmed
 * Author URI:        ahmed.test
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       listing_xml
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('LISTING_XML_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-listing_xml-activator.php
 */
function activate_listing_xml()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-listing_xml-activator.php';
	Listing_xml_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-listing_xml-deactivator.php
 */
function deactivate_listing_xml()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-listing_xml-deactivator.php';
	Listing_xml_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_listing_xml');
register_deactivation_hook(__FILE__, 'deactivate_listing_xml');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-listing_xml.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_listing_xml()
{

	$plugin = new Listing_xml();
	$plugin->run();
}
run_listing_xml();

//Register Admin menu
function register_xml_listing_menu()
{
	add_menu_page(
		'XML Saver',
		'XML Listing',
		'manage_options',
		'xml_saver',
		'xml_listing_table',
		'dashicons-editor-ul',
		3
	);
}
add_action('admin_menu', 'register_xml_listing_menu', 1);

function xml_listing_table()
{
	if (!class_exists('WP_List_Table')) {
		require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
	}
	
	require_once plugin_dir_path(__FILE__) . 'includes/parts/listing_table.php';
	$table = new Listing_Table();
	$table->prepare_items();

?>
	<div class="wrap">

		<div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
		<h2><?php _e('Listings', 'cltd_example') ?> </h2>
		<?php echo $message; ?>

		<form id="listing-table" method="GET">
			<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
			<?php $table->display() ?>
		</form>

	</div>

<?php
}
