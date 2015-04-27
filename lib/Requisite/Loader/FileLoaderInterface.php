<?php

namespace Requisite\Loader;


interface FileLoaderInterface {

	/**
	 * @param string $file
	 * @return bool
	 */
	public function loadFile( $file );
}