<?php # -*- coding: utf-8 -*-

namespace RestApiFilterItems\Core;

class Filter implements FilterInterface {

	/**
	 * @type string
	 */
	private $request;

	/**
	 * @type array
	 */
	private $data;

	/**
	 * Set var
	 *
	 * @param array $request
	 * @param array $data
	 */
	public function __construct( $request, array $data ) {

		$this->request = $request;
		$this->data    = $data;
	}

	/**
	 * Filter data to get attributes items
	 * 
	 * @return array
	 */
	public function filter_data() {

		if ( empty( $this->request ) ) {
			return $this->data;
		}

		$items = explode( ',', $this->request );
		if ( empty( $items ) || 0 === count( $items ) ) {
			return $this->data;
		}

		$filtered_data = array();
		foreach ( $this->data as $key => $value ) {

			if ( in_array( $key, $items ) ) {
				$filtered_data[ $key ] = $value;
			}
		}

		return $filtered_data;
	}
}
