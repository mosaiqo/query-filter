<?php namespace Mosaiqo\QueryFilter\Filters;

class FilterFactory
{
	/**
	 * 
	 */
	protected $lookup = [];

	protected $filter;

	/**
	 * 
	 */
	public function __construct($filterName, $params = [], $filter = null)
	{
		if($filter)
		{
			$this->setNewFilter($filterName, $filter);
		}	

		$className = $this->lookup[$filterName];
		$this->filter = new $className($params);	
	}

	public function create()
	{
		return $this->filter;
	}

	protected function  setNewFilter($filterName, $filter)
	{
		$this->lookup[$filterName] = $filter;
	} 
}