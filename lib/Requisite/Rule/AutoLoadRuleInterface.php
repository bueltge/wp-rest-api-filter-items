<?php

namespace Requisite\Rule;


interface AutoLoadRuleInterface {

	/**
	 * @param string $class
	 * @return bool
	 */
	public function loadClass( $class );
} 