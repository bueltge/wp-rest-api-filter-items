<?php # -*- coding: utf-8 -*-

namespace RestApiFilterItems;

class FilterRestApiItems {

	/**
	 * Run on WordPress
	 *
	 * @wp-hook wp_loaded
	 */
	public function run() {

		$this->set_filter();
	}

	public function set_filter() {

		new Items\Post();
		new Items\Taxonomy();
		new Items\Comments();
	}

} 