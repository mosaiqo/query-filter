<?php namespace Mosaiqo\Queryfilter\Tests;

use Mosaiqo\QueryFilter\Parsers\Parser;
use Symfony\Component\HttpFoundation\Request;

class QueryFilterTest extends \PHPUnit_Framework_TestCase{

	/**
	 * @test
	 * @group queryFilter
	 */
	public function it_receives_an_array_of_filters_on_constructor()
	{
		$parser = new Parser(["one"]);
		$filterCollection = $parser->parse();
		$this->assertEquals($filterCollection->count(), 1);
	}

	/**
	 * @test
	 * @group queryFilter
	 */
	public function it_parses_an_array_to_a_filter_collection()
	{
		$parser = new Parser(["one", "two:param"]);
		$filterCollection = $parser->parse();

		$this->assertEquals($filterCollection->count(), 2);
		$this->assertEquals($filterCollection['two'], 'param');
	}

	/**
	 * @test
	 * @group queryFilter
	 */
	public function it_parses_a_filter_with_multiple_values()
	{

		$parser = new Parser("filter1:param1,param2");
		$filterCollection = $parser->parse();
		
		$this->assertEquals($filterCollection->count(), 1);
		$this->assertEquals($filterCollection['filter1'], ['param1', 'param2']);
	}

	/**
	 * @test
	 * @group queryFilter
	 */
	public function it_parses_a_symfony_request_to_a_filter_collection()
	{
		$request = Request::create("http://example.com?filter=filter1:param1,param2");
		
		$parser = new Parser($request);
		$filterCollection = $parser->parse();

		$this->assertEquals($filterCollection->count(), 1);
		$this->assertEquals($filterCollection['filter1'], ['param1', 'param2']);
	}
	/**
	 * @test
	 * @group queryFilter
	 */
	public function it_parses_a_symfony_request_with_an_array_of_query_filters_to_a_filter_collection()
	{
		$request = Request::create("http://example.com?filter[]=filter1:param1,param2&filter[]=filter2");
		
		$parser = new Parser($request);
		$filterCollection = $parser->parse();
		var_dump($filterCollection);die;
		$this->assertEquals($filterCollection->count(), 2);
		$this->assertEquals($filterCollection['filter1'], ['param1', 'param2']);
		$this->assertEquals($filterCollection['filter2'], true);
	}

}