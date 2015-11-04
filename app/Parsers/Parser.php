<?php namespace Mosaiqo\QueryFilter\Parsers;



class Parser
{
	protected $lookup = [
		'array' =>  ArrayParser::class,
		'string' => StringParser::class,
		'object' => ObjectParser::class,
	];

	protected $parser;

	public function __construct($filters)
	{
		$className = $this->lookup[gettype($filters)];
		$this->parser = new $className($filters);
	}

	public function parse()
	{
		return $this->parser->parse();
	}
}