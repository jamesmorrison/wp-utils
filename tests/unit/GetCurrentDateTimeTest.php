<?php

namespace Zeek\WP_Util;

class GetCurrentDateTimeTest extends \Codeception\Test\Unit {
	/**
	 * @var \UnitTester
	 */
	protected $tester;

	protected function _before() {
		\WP_Mock::setUp();
	}

	protected function _after() {
		\WP_Mock::tearDown();
	}

	public function testGetCurrentDateTime() {
		\WP_Mock::userFunction( 'get_option', [
			'times'  => 1,
			'return' => 'America/Chicago',
		] );

		$this->assertNotEmpty( get_current_datetime()->getTimestamp() );
		;
	}
}