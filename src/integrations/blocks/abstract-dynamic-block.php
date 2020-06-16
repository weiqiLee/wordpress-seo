<?php
/**
 * WPSEO plugin file.
 *
 * @package Yoast\WP\SEO\Integrations\Blocks
 */
namespace Yoast\WP\SEO\Integrations\Blocks;

use Yoast\WP\SEO\Integrations\Integration_Interface;
use Yoast\WP\SEO\Presenters\Abstract_Presenter;

/**
 * Breadcrumbs block class
 */
abstract class Dynamic_Block implements Integration_Interface {
	/**
	 * @var string the name of the block.
	 */
	protected $block_name;

	/**
	 * @var Abstract_Presenter A presenter to render the block.
	 */
	private $presenter;

	/**
	 * @inheritDoc
	 */
	public static function get_conditionals() {
		return [];
	}

	/**
	 * Block constructor.
	 * @param Abstract_Presenter $presenter A presenter to render the block.
	 */
	public function __construct( Abstract_Presenter $presenter ) {
		$this->presenter = $presenter;
	}

	/**
	 * @inheritDoc
	 */
	public function register_hooks() {
		add_action( 'init', [ $this, 'register_block' ] );
		add_action( 'rest_api_init', [ $this, 'register_block' ] );
	}

	/**
	 * Registers the block.
	 */
	public function register_block() {
		register_block_type( 'yoast-seo/' . $this->block_name, array(
			'editor_script' => \WPSEO_Admin_Asset_Manager::PREFIX . 'dynamic-blocks',
			'render_callback' => [ $this->presenter, 'present' ],
		) );
	}
}
