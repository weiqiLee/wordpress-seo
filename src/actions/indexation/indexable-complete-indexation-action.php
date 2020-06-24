<?php
/**
 * Indexation action to call when the indexable indexation process is completed.
 *
 * @package Yoast\WP\SEO\Actions\Indexation
 */

namespace Yoast\WP\SEO\Actions\Indexation;

use Yoast\WP\SEO\Helpers\Options_Helper;

/**
 * Indexation action to call when the indexable indexation process is completed.
 */
class Indexable_Complete_Indexation_Action implements Indexation_Action_Interface {

	/**
	 * The options helper.
	 *
	 * @var Options_Helper
	 */
	private $options;

	/**
	 * Indexable_Complete_Indexation_Action constructor.
	 *
	 * @param Options_Helper $options The options helper.
	 */
	public function __construct( Options_Helper $options ) {
		$this->options = $options;
	}

	/**
	 * Not used, since this action does not index anything.
	 *
	 * @return int 0, since this action does not index anything.
	 */
	public function get_total_unindexed() {
		/*
		 * Nothing gets indexed using this action.
		 * It is used for wrapping things up.
		 */
		return 0;
	}

	/**
	 * Wraps up the indexation process.
	 *
	 * @return array An empty array.
	 */
	public function index() {
		$this->options->set( 'indexation_started', 0 );
		$this->options->set( 'indexables_indexation_reason', '' );
		$this->options->set( 'indexables_indexation_completed', true );

		return [];
	}

	/**
	 * Not used, since this action does not index anything.
	 *
	 * @return int 0
	 */
	public function get_limit() {
		return 0;
	}
}
