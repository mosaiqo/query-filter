<?php namespace Mosaiqo\QueryFilter\Parsers;

class Parser
{
	protected static $lookup = [
		'array' =>  ArrayParser::class,
		'string' => StringParser::class,
		'object' => ObjectParser::class,
	];


	public static function assign($filters)
	{
		$className = self::$lookup[gettype($filters)];
		return new $className($filters);
	}
}