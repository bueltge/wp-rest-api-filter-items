<?php # -*- coding: utf-8 -*-

namespace RestApiFilterItems\Items;

use RestApiFilterItems\Core\Filter;

class Comments implements TypeInterface {

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
			return;
		}

		$this->request = $_GET[ 'items' ];

		add_filter( 'rest_prepare_comment', [ $this, 'filter_data' ], 10, 1 );
	}

	/**
	 * Filter data to get attributes items
	 *
	 * @param $data
	 *
	 * @return array
	 */
	public function filter_data( $data ) {

		$_data = $data->data;
		$filtered_data = new Filter( $this->request, $_data );

		return $filtered_data->filter_data();
	}
}
