<?php
/*
Plugin Name: CON Suite
Plugin URI:  https://github.com/bchabot/consuite
Description: CON Suite is (intended to be) a comprehensive, free, open source, WordPress plugin for planning and managing 
              Conventions/Conferences/Convocations/etc... "Cons"
Version:     0.0.1
Author:      Brian Chabot
Author URI:  http://brianchabot.org
License:     GPL3
 
CON Suite is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
CON Suite is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with CON Suite. If not, see https://www.gnu.org/licenses/gpl-3.0.html.

License URI: https://www.gnu.org/licenses/gpl-3.0.html
Domain Path: /languages
Text Domain: consuite

@link              https://github.com/bchabot/consuite
@since             0.0.1
@package           consuite

@consuite

 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-consuite-activator.php
 */
function activate_consuite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-consuite-activator.php';
	consuite_Activator::activate();
}
/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-consuite-deactivator.php
 */
function deactivate_consuite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-consuite-deactivator.php';
	consuite_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activate_consuite' );
register_deactivation_hook( __FILE__, 'deactivate_consuite' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-consuite.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.0.1
 */
function run_consuite() {
	$plugin = new consuite();
	$plugin->run();
}
run_consuite();
register_activation_hook( __FILE__, 'consuite_function_to_run' );
register_deactivation_hook( __FILE__, 'consuite_function_to_run' );

function consuite_setup_post_type() {
 
    // Register our "book" custom post type
    register_post_type( 'book', array( 'public' => 'true' ) );
 
}
add_action( 'init', 'consuite_setup_post_type' );
 
function consuite_install() {
 
    // Trigger our function that registers the custom post type
    consuite_setup_post_types();
 
    // Clear the permalinks after the post type has been registered
    flush_rewrite_rules();
 
}
register_activation_hook( __FILE__, 'consuite_install' );

function consuite_deactivation() {
 
    // Our post type will be automatically removed, so no need to unregister it
 
    // Clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
 
}
register_deactivation_hook( __FILE__, 'consuite_deactivation' );




?>
