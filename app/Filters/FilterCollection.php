<?php namespace Mosaiqo\QueryFilter\Filters;

use Countable, ArrayAccess;

class FilterCollection implements ArrayAccess,Countable
{

	protected $filters;

	public function __construct($filters)
	{
		$this->filters = $filters;
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