<?php namespace Zanemiller\LessOne;

use lessc;
use Illuminate\Config\Repository as Config;
use Illuminate\Html\HtmlBuilder as Html;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RecursiveRegexIterator;
use RegexIterator;


class LessOne
{
	protected $config;
	protected $builder;
	protected $compiler;
	protected $basePath;

	public function __construct(Config $config, Html $builder)
	{
		$this->config = $config;
		$this->builder = $builder;
		$this->basePath = base_path();
	}

	/**
	* Creates an instance of lessc and applies the correct settings
	* @return lessc
	*/
	protected function makeCompiler ()
	{
		$c = new lessc;
		$c->setFormatter($this->config->get('less-one::formatter'));
		$c->setImportDir($this->config->get('less-one::import_paths'));
		return $c;
	}

	/**
	* Imports all files from folders and appends them all to one string
	* @return string
	*/
	protected function importFromFolders ()
	{
		$compileString = "";
		foreach($this->config->get('less-one::directories') as $baseDir)
		{
			$Dir = new RecursiveDirectoryIterator("$this->basePath/$baseDir");
			$Iter = new RecursiveIteratorIterator($Dir);
			$lessRegex = new RegexIterator($Iter, '/^.+\.less/i', RecursiveRegexIterator::GET_MATCH);
			foreach($lessRegex as $path)
			{
				//This may look strange but for some reason recycling the compiler causes import
				//statements for the same file (such as a centeral vars.less file) to not compile
				$compiler = $this->makeCompiler();
				$compileString .= $compiler->compileFile($path[0]);
			}
			if($this->config->get('less-one::include_css'))
			{
				$cssRegex = new RegexIterator($Iter, '/^.+\.css/i', RecursiveRegexIterator::GET_MATCH);
				foreach($cssRegex as $path)
					$compileString .= file_get_contents($path[0]);
			}
		}
		return $compileString;
	}

	protected function importFromFiles ()
	{
		$compileString = "";
		foreach($this->config->get('less-one::files') as $path)
			$compileString .= file_get_contents("$this->basePath/$path");
		return $compileString;
	}

	/**
	* Itterates over directories in the config file and creates a single .less file from
	* their contentes
	* @return string
	*/
	public function make($attributes = array())
	{
		$compileString = "";
		$compileString .= $this->importFromFolders();
		$compileString .= $this->importFromFiles();
		
		$fileName = $this->config->get('less-one::output_file');
		$outPath = $this->config->get('less-one::output_path');
		$linkPath =	$this->config->get('less-one::link_folder');
		file_put_contents("$this->basePath/$outPath/$fileName", $compileString);

		return $this->builder->style("$linkPath/$fileName", $attributes);
	}
}