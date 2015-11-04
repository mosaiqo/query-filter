<?php namespace Mosaiqo\QueryFilter\Filters;

class FilterFactory
{
	/**
	 * 
	 */
	protected $lookup = [
		'stubFilter' => \Mosaiqo\QueryFilter\Stubs\Filters\StubFilter::class
	];

	protected $filter;

	/**
	 * 
	 */
	public function __construct($filterName, $params = [])
	{
		$className = $this->lookup[$filterName];
		$this->filter = new $className($params);
	}

	public function create()
	{
		return $this->filter;
	}
}