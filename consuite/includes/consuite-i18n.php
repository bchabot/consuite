<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/bchabot/consuite
 * @since      0.0.1
 *
 * @package    consuite
 * @subpackage consuite/includes
 */
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.0.1
 * @package    consuite
 * @subpackage consuite/includes
 * @author     Brian Chabot <brian@brianchabot.org>
 */
class Plugin_Name_i18n {
	private $domain;
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			$this->domain,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
	public function set_domain( $domain ) {
		$this->domain = $domain;
	}
}
?>
