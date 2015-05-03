<?php # -*- coding: utf-8 -*-
namespace RestApiFilterItems\Items;

interface TypeInterface {

	/**
	 * @param $data
	 *
	 * @return mixed
	 */
	public function filter_data( $data );
}
