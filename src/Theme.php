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

/**
 * Theme Class
 *
 * @package Generico\Core
 */
final class Theme {

	/**
	 * @var array Runtime configuration.
	 */
	protected $config;

	/**
	 * Theme constructor.
	 *
	 * @since 0.2.0
	 *
	 * @param array $config Runtime configuration.
	 */
	public function __construct( array $config ) {
		$this->config = $config;
	}

	/**
	 * Setup method.
	 *
	 * Iterates over the runtime configuration and load each related class.
	 *
	 * @since 0.1.0
	 */
	public function setup() {
		foreach ( $this->config as $class_name => $class_specific_config ) {
			if ( class_exists( $class_name ) ) {
				$class = new $class_name( $class_specific_config );
				$class->init();
			}
		}
	}
}
