<?php

namespace Zeek\WP_Util;

use function A7\autoload;

function bootstrap( $dir ) {
	/**
	 * Load .env file and set up constants
	 */
	Constants::init( $dir );

	/**
	 * Add Sentry Error Logging
	 */
	ErrorHandling::init();

	/**
	 * Enable WP Util Behaviors
	 */
	new Behaviors();

	/**
	 * Kick off third party integrations as dictated by our .env variables
	 */
	new ThirdParty\Init();

	/**
	 * Autoload all php files in /src/
	 */
	autoload( $dir . '/src' );

	/**
	 * Load /bin folder for any wp cli commands safely
	 */
	bootstrap_wp_cli_commands( $dir );
}
