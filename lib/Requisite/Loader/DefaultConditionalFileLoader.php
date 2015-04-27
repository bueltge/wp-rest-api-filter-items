<?php

namespace Requisite\Loader;


class DefaultConditionalFileLoader implements FileLoaderInterface {

	/**
	 * @param string $file
	 * @return bool
	 */
	public function loadFile( $file ) {

		if ( ! is_readable( $file ) )
			return FALSE;

		require_once $file;
		return TRUE;
	}

} 