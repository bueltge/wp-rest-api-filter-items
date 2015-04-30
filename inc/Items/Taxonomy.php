<?php # -*- coding: utf-8 -*-

namespace RestApiFilterItems\Items;

use RestApiFilterItems\Core\Filter;

class Taxonomy implements TypeInterface {

	/**
	 * Constructor
	 * Run in WordPress context
	 *
	 */
	public function __construct() {

		if ( ! isset( $_GET[ 'items' ] ) ) {
			return NULL;
		}
		add_filter( 'json_prepare_taxonomy', [ $this, 'filter_data' ], 10, 1 );
	}

	/**
	 * Filter data to get attributes items
	 *
	 * @param $data
	 *
	 * @return array
	 */
	public function filter_data( $data ) {

		$filtered_data = new Filter( $_GET[ 'items' ], $data );

		return $filtered_data->filter_data();
	}
}
