<?php
/**
 * Core component.
 *
 * @package   Generico\Core
 * @author    Craig Simpson <craig@craigsimpson.scot>
 * @copyright Copyright (c) 2019, Craig Simpson
 * @license   GPL-2.0-or-later
 */

namespace Generico\Core;

abstract class Component {

	/**
	 * @var array Array of config specific to this component.
	 */
	protected $config;

	/**
	 * Component constructor.
	 *
	 * @param array $config Array of config specific to this component.
	 */
	public function __construct( array $config ) {
		$this->config = $config;
	}

	/**
	 * Called on instantiation load each theme component.
	 *
	 * @return void
	 */
	abstract public function init();
}
