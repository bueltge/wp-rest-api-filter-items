<?php # -*- coding: utf-8 -*-

namespace RestApiFilterItems\Items;

use RestApiFilterItems\Core\Filter;

/**
 * Class Post
 *
 * @package RestApiFilterItems\Items
 */
class Post implements TypeInterface {

	/**
	 * @type string
	 */
	private $request;

	/**
	 * Constructor
	 * Run in WordPress context
	 *
	 */
	public function __construct() {

		if ( ! isset( $_GET[ 'items' ] ) ) {
			return NULL;
		}

		$this->request = $_GET[ 'items' ];

		add_filter( 'json_prepare_post', [ $this, 'filter_data' ], 10, 1 );

		$items = explode( ',', $this->request );
		$hooks = array();

		if ( ! in_array( 'author', $items ) ) {
			$hooks[ ] = 'remove_post_author_data';
		}
		if ( ! in_array( 'terms', $items ) ) {
			$hooks[ ] = 'remove_term_data';
		}
		if ( ! in_array( 'featured_image', $items ) ) {
			$hooks[ ] = 'remove_thumbnail_data';
		}

		foreach ( $hooks as $hook ) {
			if ( ! empty( $hook ) ) {
				add_action( 'wp_json_server_before_serve', array( $this, $hook ), 10, 1 );
			}
		}

	}

	/**
	 * Filter data to get attributes items
	 *
	 * @param $data
	 *
	 * @return array
	 */
	public function filter_data(
		$data
	) {

		$filtered_data = new Filter( $_GET[ 'items' ], $data );

		return $filtered_data->filter_data();
	}

	/**
	 * Remove default hook for post author data
	 */
	public function remove_post_author_data() {

		remove_filter( 'json_prepare_post', array( 'WP_JSON_Users', 'add_post_author_data' ), 10 );
	}

	/**
	 * Remove default hook for featured image
	 */
	public function remove_thumbnail_data() {

		global $wp_json_media;

		remove_filter( 'json_prepare_post', array( $wp_json_media, 'add_thumbnail_data' ), 10 );
	}

	/**
	 * Remove default hook for terms
	 */
	public function remove_term_data() {

		global $wp_json_taxonomies;

		remove_filter( 'json_prepare_post', array( $wp_json_taxonomies, 'add_term_data' ), 10 );
	}
}
