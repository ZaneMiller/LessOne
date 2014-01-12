<?php
return array(
	/*
	|--------------------------------------------------------------------------
	| Import settings
	|--------------------------------------------------------------------------
	|
	|--------------------------------------------------------------------------
	| Directories to scan
	|--------------------------------------------------------------------------
	|
	| Any directories included in the array will be recursively scanned for .less files
	| Files found will be compiled into the single .css file at the path defined
	|
	| If the 'include_css' option is set to true .css files will also be included
	|
	*/
	'directories' => array
		(
			'app/less',
			'app/css',
		),
	/*
	|--------------------------------------------------------------------------
	| Files to add
	|--------------------------------------------------------------------------
	|
	| Any files included in the array will be included in the compiled .css file.
	|
	| NOTE: Files will be attempted to be included regardless of existence or
	| extention, it is up to lessphp if they will compile or not
	|
	*/
	'files' => array
		(
		),
	/*
	|--------------------------------------------------------------------------
	| Output Settings
	|--------------------------------------------------------------------------
	|
	|--------------------------------------------------------------------------
	| Output file
	|--------------------------------------------------------------------------
	|
	| The file name of the compiled .css file
	|
	*/
	'output_file' => 'main.css',

	/*
	|--------------------------------------------------------------------------
	| Output path
	|--------------------------------------------------------------------------
	|
	| The path where the final, compiled .css file should reside
	|
	*/
	'output_path' => 'public/css',

	/*
	|--------------------------------------------------------------------------
	| Link folder
	|--------------------------------------------------------------------------
	|
	| The base location that the generated link should point to
	| Uses the rest of the output settings to generate a valid url
	|
	*/
	'link_folder' => '/css',

	/*
	|--------------------------------------------------------------------------
	| Include CSS
	|--------------------------------------------------------------------------
	|
	| Tells the recursive scanner if it should include files with the .css extension
	| in addition to .less files
	|
	| Possilbe values:
	|	true:		.css files will be included in the final output
	|	false:		.css files will be ignored when scanning
	|
	| NOTE: This does not affect @import statments in .less files.
	|
	*/
	'include_css' => true,
	/*
	|--------------------------------------------------------------------------
	| lessphp Settings
	|--------------------------------------------------------------------------
	|
	|--------------------------------------------------------------------------
	| Import paths
	|--------------------------------------------------------------------------
	|
	| Paths that lessphp should use to search for files in import statements
	|
	*/
	'import_paths' => array
		(
		),
	/*
	|--------------------------------------------------------------------------
	| Formatter
	|--------------------------------------------------------------------------
	| Tells lessphp what formatter to use for its output.
	|
	| Possilbe values (from the lessphp documentation):
	|	lessjs (default) — Same style used in LESS for JavaScript
	|	compressed — Compresses all the unrequired whitespace
	|	classic — lessphp’s original formatter
	|
	*/
	'formatter' => 'lessjs',
);