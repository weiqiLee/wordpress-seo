<?php
/**
 * WPSEO plugin file.
 *
 * @package Yoast\WP\SEO\Integrations\Blocks
 */
namespace Yoast\WP\SEO\Integrations\Blocks;

use Yoast\WP\SEO\Presenters\Subpages_Presenter;

/**
 * Subpages block class
 */
class Subpages_Block extends Dynamic_Block {
	protected $block_name = 'subpages';

	/**
	 * Subpages_Block constructor.
	 * @param Subpages_Presenter $presenter
	 */
	public function __construct() {
		parent::__construct( new Subpages_Presenter() );
	}
}
