<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/bchabot/consuite
 * @since      0.0.1
 *
 * @package    consuite
 * @subpackage consuite/public
 * @author     Brian Chabot <brian@brianchabot.org>
 */
class consuite_Public {
	private $plugin_name;
	private $version;
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}
	public function enqueue_styles() {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/consuite-public.css', array(), $this->version, 'all' );
	}
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/consuite-public.js', array( 'jquery' ), $this->version, false );
	}
}
?>
