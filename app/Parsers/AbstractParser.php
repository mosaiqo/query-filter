<?php namespace Mosaiqo\Parsers;

use Exception;
use Mosaiqo\QueryFilter\Filters\FilterCollection;
use Mosaiqo\QueryFilter\Filters\FilterFactory;

class AbstractParser
{
	/**
	 * 
	 */
	protected $filters;
	protected $collection;

	protected $delimiter = ":";

	protected $parameterSeparator = ",";

	/**
	 * 
	 */
	public function __construct($filters, FilterCollection $collection)
	{
		$this->filters = $filters;
		$this->collection = $collection;
	}

	/**
	 * 
	 */
	public function parse()
	{
		$filters = $this->extractParameters(
				$this->normalizeFilters($this->filters)
		);
		
		foreach ($filters as $filter => $params) 
		{
			$this->collections->add( new FilterFactory($filter, $params), $filter );
		}
	
		return $this->collection;	
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