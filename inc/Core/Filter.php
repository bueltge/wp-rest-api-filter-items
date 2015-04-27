<?php # -*- coding: utf-8 -*-

namespace RestApiFilterItems\Core;

class Filter implements FilterInterface {

	/**
	 * Filter data to get attributes items
	 *
	 * @param $data
	 *
	 * @return array
	 */
	public function filter_data( $data ) {

		if ( empty( $_GET[ 'items' ] ) ) {
			return $data;
		}

		$items = explode( ',', $_GET[ 'items' ] );
		if ( empty( $items ) || 0 === count( $items ) ) {
			return $data;
		}

		$filtered_data = array();
		foreach ( $data as $key => $value ) {
			if ( in_array( $key, $items ) ) {
				$filtered_data[ $key ] = $value;
			}
		}

		return $filtered_data;
	}
} 