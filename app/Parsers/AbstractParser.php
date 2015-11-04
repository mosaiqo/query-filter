<?php namespace Mosaiqo\QueryFilter\Parsers;

use Exception;
use Mosaiqo\QueryFilter\Filters\FilterCollection;
use Mosaiqo\QueryFilter\Filters\FilterFactory;

class AbstractParser
{
	/**
	 * 
	 */
	protected $filters;

	protected $delimiter = ":";

	protected $parameterSeparator = ",";

	/**
	 * 
	 */
	public function __construct($filters)
	{
		$this->filters = $filters;
	}

	/**
	 * 
	 */
	public function parse()
	{
		$filters = $this->extractParameters(
				$this->normalizeFilters($this->filters)
		);
		
		$parsedFilters = [];
		foreach ($filters as $filter => $params) 
		{
			$parsedFilters[$filter] = new FilterFactory($filter, $params);
		}
	var_dump(new FilterCollection($parsedFilters));die;	
		return new FilterCollection($parsedFilters);
		
	}
	
	/**
	 * 
	 */	
	protected function extractParameters($filters)
	{
		$cleanedFilters = [];

		foreach ($filters as $filter) 
		{
			$param = true;

			if(strpos($filter, $this->delimiter))
			{
				list($filter, $param) = explode($this->delimiter, $filter);

				if(strpos($param, $this->parameterSeparator))
				{
					$param = explode($this->parameterSeparator, $param);
				}
			}

			$cleanedFilters[$filter] = $param;
		}

		return $cleanedFilters;
	}
}