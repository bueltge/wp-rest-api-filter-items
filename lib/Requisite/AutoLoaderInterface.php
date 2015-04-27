<?php

namespace Requisite;

interface AutoLoaderInterface {

	/**
	 * @param Rule\AutoLoadRuleInterface $rule
	 * @return void
	 */
	public function addRule( Rule\AutoLoadRuleInterface $rule );
}