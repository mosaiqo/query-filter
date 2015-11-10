<?php namespace Mosaiqo\Queryfilter\Tests;
use \Mockery as m;
use Mosaiqo\QueryFilter\Filters\FilterCollection;
use Mosaiqo\QueryFilter\Parsers\Parser;
use Symfony\Component\HttpFoundation\Request;

class ParserTest extends \PHPUnit_Framework_TestCase
{
	public function tearDown()
  {
      m::close();
  }

  public function test_in_development ()
  {
  		
  }

	// /**
	//  * @test
	//  * @group parser
	//  */
	// public function it_receives_an_array_of_filters_on_constructor()
	// {
	// 	$arrayParser = m::mock("overload:Mosaiqo\QueryFilter\Parsers\ArrayParser");
	// 	$arrayParser->shouldReceive('parse')->once()->andReturn(new FilterCollection(['one']));
		
	// 	$parser = Parser::assign(["one"]);
	// 	$filterCollection = $parser->parse();
		
	// 	$this->assertEquals($filterCollection->count(), 1);
	// }

	// /**
	//  * @test
	//  * @group parser
	//  */
	// public function it_parses_an_array_to_a_filter_collection()
	// {
	// 	$arrayParser = m::mock("overload:Mosaiqo\QueryFilter\Parsers\ArrayParser");
	// 	$arrayParser->shouldReceive('parse')->once()->andReturn(new FilterCollection(['one', 'two' => 'param']));

	// 	$parser = Parser::assign(["one", "two:param"]);
	// 	$filterCollection = $parser->parse();

	// 	$this->assertEquals($filterCollection->count(), 2);
	// 	$this->assertEquals($filterCollection['two'], 'param');
	// }

	// /**
	//  * @test
	//  * @group parser
	//  */
	// public function it_parses_a_filter_with_multiple_values()
	// {
	// 	$arrayParser = m::mock("overload:Mosaiqo\QueryFilter\Parsers\StringParser");
	// 	$arrayParser->shouldReceive('parse')->once()->andReturn(new FilterCollection(['filter1' => ['param1', 'param2']]));

	// 	$parser = Parser::assign("filter1:param1,param2");
	// 	$filterCollection = $parser->parse();
		
	// 	$this->assertEquals($filterCollection->count(), 1);
	// 	$this->assertEquals($filterCollection['filter1'], ['param1', 'param2']);
	// }

	// /**
	//  * @test
	//  * @group parser
	//  */
	// public function it_parses_a_symfony_request_to_a_filter_collection()
	// {
	// 	$arrayParser = m::mock("overload:Mosaiqo\QueryFilter\Parsers\ObjectParser");
	// 	$arrayParser->shouldReceive('parse')->once()->andReturn(new FilterCollection(['filter1' => ['param1', 'param2']]));
		
	// 	$request = Request::create("http://example.com?filter=filter1:param1,param2");
	// 	$parser = Parser::assign($request);
	// 	$filterCollection = $parser->parse();

	// 	$this->assertEquals($filterCollection->count(), 1);
	// 	$this->assertEquals($filterCollection['filter1'], ['param1', 'param2']);
	// }
	// /**
	//  * @test
	//  * @group parser
	//  */
	// public function it_parses_a_symfony_request_with_an_array_of_query_filters_to_a_filter_collection()
	// {
	// 	$arrayParser = m::mock("overload:Mosaiqo\QueryFilter\Parsers\ObjectParser");
	// 	$arrayParser->shouldReceive('parse')->once()->andReturn(new FilterCollection(
	// 		['filter1' => ['param1', 'param2'], 'filter2' => true]
	// 	));

	// 	$request = Request::create("http://example.com?filter[]=filter1:param1,param2&filter[]=filter2");
		
	// 	$parser = Parser::assign($request);
	// 	$filterCollection = $parser->parse();
		
	// 	$this->assertEquals($filterCollection->count(), 2);
	// 	$this->assertEquals($filterCollection['filter1'], ['param1', 'param2']);
	// 	$this->assertEquals($filterCollection['filter2'], true);
	// }

}