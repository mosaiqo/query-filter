<?php namespace Mosaiqo\QueryFilter\Parsers;

class ObjectParser extends AbstractParser
{

	protected function normalizeFilters($filters)
	{
		$filters = $filters->get('filter');
		return is_array($filters) ? $filters : [$filters];
	}
}