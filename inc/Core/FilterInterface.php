<?php # -*- coding: utf-8 -*-
namespace RestApiFilterItems\Core;

interface FilterInterface {

	/**
	 * @param $data
	 *
	 * @return mixed
	 */
	public function filter_data( $data );
}