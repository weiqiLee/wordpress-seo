<?php
/**
 * WPSEO plugin file.
 *
 * @package Yoast\WP\SEO\Integrations\Blocks
 */
namespace Yoast\WP\SEO\Integrations\Blocks;

use Yoast\WP\SEO\Presenters\Siblings_Presenter;

/**
 * Siblings block class
 */
class Siblings_Block extends Dynamic_Block {
	protected $block_name = 'siblings';

	/**
	 * Siblings_Block constructor.
	 * @param Siblings_Presenter $presenter
	 */
	public function __construct() {
		parent::__construct( new Siblings_Presenter() );
	}
}
