<?php # -*- coding: utf-8 -*-

namespace RestApiFilterItems\Test\Unit;

use RestApiFilterItems\Core\Filter;
use PHPUnit\Framework\TestCase;

class FilterTest extends TestCase {

	/**
	 * @dataProvider    filter_data_provider
	 *
	 * @param array $data
	 * @param array $request
	 * @param array $expected_data
	 */
	public function test_filter_data( array $data, array $request, array $expected_data ) {

		// this can be removed when Core\Filter is refactored
		// $request would then just passed to the constructor of Core\Filter
		$request = $request[ 'items' ];

		$testee = new Filter( $request, $data );

		$filtered_data = $testee->filter_data();

		$this->assertEquals(
			$expected_data,
			$filtered_data
		);
	}

	/**
	 * @see test_filter_data()
	 * @return array
	 */
	public function filter_data_provider() {

		/**
		 * a data provider returns an multi-dimensional
		 * array. each element in this array represents
		 * the parameters for one call of the associated
		 * test function.
		 */

		$data = [ ];

		#0:
		$data[ ] = [
			#1. Parameter $data
			[
				'ID'           => '42',
				'title'        => 'Lorem Ipsum',
				'status'       => 'publish',
				'author'       => [
					'name' => 'Jon Doe',
					'url'  => 'http://foo.bar/author/jd'
				],
				'date-gmt'     => '2015-04-12 15:34:44',
				'modified-gmt' => '2015-04-12 15:34:44',
				'content'      => 'Lorem Ipsum dolor sit amet …',
			],
			#2. Parameter $request
			[
				'items' => 'ID,status,content'
			],
			#3. Parameter $expected_data
			[
				'ID'      => '42',
				'status'  => 'publish',
				'content' => 'Lorem Ipsum dolor sit amet …',
			]
		];

		#1:
		$data[ ] = [
			#1. Parameter $data
			[
				'ID'           => '42',
				'title'        => 'Lorem Ipsum',
				'status'       => 'publish',
				'author'       => [
					'name' => 'Jon Doe',
					'url'  => 'http://foo.bar/author/jd'
				],
				'date-gmt'     => '2015-04-12 15:34:44',
				'modified-gmt' => '2015-04-12 15:34:44',
				'content'      => 'Lorem Ipsum dolor sit amet …',
			],
			#2. Parameter $request
			[
				'items' => 'Fields,that,actually,not,exist'
			],
			#3. Parameter $expected_data
			[ ]
		];

		/**
		 * more test cases can be defined here …
		 */

		return $data;
	}
}
