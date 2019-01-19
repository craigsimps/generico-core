<?php
/*
 * Theme loader.
 *
 * @package   Generico\Core
 * @author    Craig Simpson <craig@craigsimpson.scot>
 * @copyright Copyright (c) 2019, Craig Simpson
 * @license   GPL-2.0-or-later
 */

namespace Generico\Core;

final class Theme {
	public function setup() {

		// Set config path, but allow theme to override the location with `generico_config_path` filter.
		$config_path = apply_filters( 'generico_config_path', get_stylesheet_directory() . '/config/defaults.php' );

		if ( ! file_exists( $config_path ) ) {
			wp_die( __( 'The theme config file could not be found.', 'generico' ) );
		}

		$config = include_once $config_path;

		foreach ( $config as $class_name => $class_specific_config ) {
			if ( class_exists( $class_name ) ) {
				$class = new $class_name( $class_specific_config );
				$class->init();
			}
		}
	}
}
