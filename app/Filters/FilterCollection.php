<?php namespace Mosaiqo\QueryFilter\Filters;

use Countable, ArrayAccess;

class FilterCollection implements ArrayAccess,Countable
{

	protected $filters = [];

	public function __construct($filters = [])
	{
		$this->add($filters);
	}
	
	/**
	 * Adds a filter to the collection
	 *
	 * @param mixed  	$filter     The filter instance
	 * @param string 	$filterName The filter name
	 */
	public function add($filter, $filterName = null)
	{

		if(is_array($filter))
		{
			foreach ($filter as $key => $value) 
			{
				$name = is_string($key)?$key:null;
				$this->add($value, $name);
			}
			return;
		}

		if(!$filterName)
			$filterName = strtolower(get_class($filter));

		$this->offsetSet($filterName, $filter);
	}

	/**
	 * Get a given filter
	 *
	 * @param string $filter The filter asigned name
	 *
	 * @return Mosaiqo\QueryFilter\Filters\Filter  The filter instance
	 */
	public function get($filter)
	{
		if($this->offsetExists($filter))
		 return $this->offsetGet($filter);

		throw new \Exception("There is no filter with this name [{$filter}]");
	}

	/**
	 * 
	 */
	public function count()
	{
		return count($this->filters);
	}

 	/**
  * 
  */
	public function offsetExists($offset)
	{
		return isset($this->filters[$offset]);
	}
	
	/**
	 * 
	 */
	public function offsetGet($offset)
	{
		return $this->filters[$offset];
	}
	
	/**
	 * 
	 */
	public function offsetSet($offset, $value)
	{
		return $this->filters[$offset] = $value;
	}

	/**
	 * 
	 */
	public function offsetUnset($offset)
	{
		unset($this->filters[$offset]);
	}
}