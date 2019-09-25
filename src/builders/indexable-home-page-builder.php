<?php
/**
 * Homepage Builder for the indexables.
 *
 * @package Yoast\YoastSEO\Builders
 */

namespace Yoast\WP\Free\Builders;

use WPSEO_Options;
use WPSEO_Utils;

/**
 * Formats the homepage meta to indexable format.
 */
class Indexable_Home_Page_Builder {

	/**
	 * @var Indexable_Post_Builder
	 */
	protected $post_builder;

	/**
	 * Indexable_Homepage_Builder constructor.
	 *
	 * @param Indexable_Post_Builder $post_builder The post builder.
	 */
	public function __construct(
		Indexable_Post_Builder $post_builder
	) {
		$this->post_builder = $post_builder;
	}

	/**
	 * Formats the data.
	 *
	 * @param \Yoast\WP\Free\Models\Indexable $indexable The indexable to format.
	 *
	 * @return \Yoast\WP\Free\Models\Indexable The extended indexable.
	 */
	public function build( $indexable ) {
		$indexable->object_type      = 'home-page';
		$indexable->title            = WPSEO_Options::get( 'title-home-wpseo' );
		$indexable->breadcrumb_title = WPSEO_Options::get( 'breadcrumbs-home' );
		$indexable->canonical        = WPSEO_Utils::home_url();
		$indexable->description      = WPSEO_Options::get( 'metadesc-home-wpseo' );
		if ( empty( $indexable->description ) ) {
			$indexable->description = \get_bloginfo( 'description' );
		}

		$indexable->is_robots_noindex = (string) \get_option( 'blog_public' ) === '0';

		$indexable->og_title       = WPSEO_Options::get( 'og_frontpage_title' );
		$indexable->og_image       = WPSEO_Options::get( 'og_frontpage_image' );
		$indexable->og_description = WPSEO_Options::get( 'og_frontpage_desc' );

		return $indexable;
	}
}