<?php namespace Zanemiller\LessOne;

use Illuminate\Support\Facades\Facade;

class LessOneFacade extends Facade
{
	protected static function getFacadeAccessor() { return 'LessOne'; }
}