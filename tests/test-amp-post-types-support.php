<?php
/**
 * Tests for Post Types Support.
 *
 * @package AMP
 * @since 0.6
 */

/**
 * Tests for Post Types Support.
 */
class Test_AMP_Post_Types_Support extends WP_UnitTestCase {

	/**
	 * Test amp_core_post_types_support.
	 *
	 * @see amp_core_post_types_support()
	 */
	public function test_init() {
		amp_core_post_types_support();
		$this->assertTrue( post_type_supports( 'post', AMP_QUERY_VAR ) );
		remove_post_type_support( 'post', AMP_QUERY_VAR );
	}

	/**
	 * Test amp_custom_post_types_support.
	 *
	 * @see amp_custom_post_types_support()
	 */
	public function test_amp_custom_post_types_support() {
		update_option( AMP_Settings::SETTINGS_KEY, array(
			'post_types_support' => array(
				'foo' => true,
				'bar' => true,
			),
		) );
		amp_custom_post_types_support();
		$this->assertTrue( post_type_supports( 'foo', AMP_QUERY_VAR ) );
		$this->assertTrue( post_type_supports( 'bar', AMP_QUERY_VAR ) );
		delete_option( AMP_Settings::SETTINGS_KEY );
		remove_post_type_support( 'foo', AMP_QUERY_VAR );
		remove_post_type_support( 'bar', AMP_QUERY_VAR );
	}

}