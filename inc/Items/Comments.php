<?php # -*- coding: utf-8 -*-

namespace RestApiFilterItems\Items;

class Comments implements TypeInterface {

	/**
	 * Constructor
	 * Run in WordPress context
	 *
	 */
	public function __construct() {

		add_filter( 'json_prepare_comment', [ $this, 'filter_data' ], 10, 1 );
	}

	/**
	 * Filter data to get attributes items
	 *
	 * @param $data
	 *
	 * @return array
	 */
	public function filter_data( $data ) {

		$filtered_data = new \RestApiFilterItems\Core\Filter( $data );

		return $filtered_data->filter_data( $data );
	}
} 