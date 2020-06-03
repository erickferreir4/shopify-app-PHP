<?php

require __DIR__ . '/../Config/config.php';

/**
 * autoload namespace
 */

function autoload( $className ) {

	$baseDir = __DIR__ . '/';

	$fornecedor = 'source';

	$lenFornecedor = strlen($fornecedor);

	if ( strncmp($fornecedor, $className, $lenFornecedor) !== 0 ) {
		return;
	}

	$replaceSlash = str_replace("\\", '/', $className);

	$relativeClass = '..' . substr($replaceSlash, $lenFornecedor) . '.php';

	$file = $baseDir . $relativeClass;

	if ( file_exists($file) ) {
		require $file;
	}
}

spl_autoload_register( 'autoload' );

