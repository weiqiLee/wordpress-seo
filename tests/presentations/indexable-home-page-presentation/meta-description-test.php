<?php

namespace Yoast\WP\Free\Tests\Presentations\Indexable_Home_Page_Presentation;

use Yoast\WP\Free\Tests\TestCase;

/**
 * Class Meta_Description_Test
 *
 * @coversDefaultClass \Yoast\WP\Free\Presentations\Indexable_Home_Page_Presentation
 *
 * @group presentations
 * @group meta-description
 */
class Meta_Description_Test extends TestCase {
	use Presentation_Instance_Builder;

	/**
	 * Does the setup for testing.
	 */
	public function setUp() {
		$this->set_instance();

		return parent::setUp();
	}

	/**
	 * Tests the situation where the meta description is set.
	 *
	 * @covers ::generate_meta_description
	 */
	public function test_with_meta_description() {
		$this->indexable->description = 'This is the meta description';

		$this->assertEquals( 'This is the meta description', $this->instance->generate_meta_description() );
	}


	/**
	 * Tests the situation where the meta description is not set.
	 *
	 * @covers ::generate_meta_description
	 */
	public function test_without_meta_description() {
		$this->indexable->description = null;
		$this->options_helper
			->expects( 'get' )
			->once()
			->with( 'metadesc-home-wpseo' )
			->andReturn( 'This is the home meta description' );

		$this->assertEquals( 'This is the home meta description', $this->instance->generate_meta_description() );
	}
}