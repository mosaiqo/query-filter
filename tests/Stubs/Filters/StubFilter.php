<?php namespace Mosaiqo\QueryFilter\Stubs\Filters;


class StubFilter
{
	
	protected $params = [];

	public function __construct($params)
	{	
			$this->params = $params;
	}

	public function getParams()
	{
		return $this->params;
	}

	public function setParams($params = [])
	{
		$this->params = $params;
		return $this;
	}

}