<?php namespace Mosaiqo\QueryFilter\Parsers;

class StringParser extends AbstractParser
{

	protected function normalizeFilters($filters)
	{
		return [$filters];
	}
}