<?php namespace Mosaiqo\QueryFilter\Tests\Filters;

use \Mockery as m;
use Mosaiqo\QueryFilter\Filters\FilterCollection;
use Mosaiqo\QueryFilter\Stubs\Filters\StubFilter;

class FilterCollectionTest extends \PHPUnit_Framework_TestCase{

	public function tearDown()
  {
      m::close();
  }

	/**
	 * @test
	 * @group filterCollection
	 */
	public function it_instantiates_a_collection_with_the_given_filters()
	{
		$filter =  m::mock('filter');
		$collection1 = new FilterCollection(['filter' => $filter]);
		$collection2 = new FilterCollection($filter);

		$this->assertEquals($collection1->count() , 1);
		$this->assertEquals($collection1['filter'] , $filter);
	}

	/**
	 * @test
	 * @group filterCollection
	 */
	public function it_add_filters()
	{
		$filter =  m::mock('filter');

		$collection = new FilterCollection();
		$collection->add($filter, 'filter');

		$this->assertEquals($collection->count() , 1);
		$this->assertEquals($collection['filter'] , $filter);
	}

	/**
	 * @test
	 * @group filterCollection
	 */
	public function it_add_filters_and_assing_classname_as_index()
	{
		$filter =  m::mock('filter');

		$collection = new FilterCollection();
		$collection->add($filter);
		
		$this->assertEquals($collection->count() , 1);
		$this->assertEquals($collection['mockery_0__filter'] , $filter);
	}

	/**
	 * @test
	 * @group filterCollection
	 */
	public function it_add_filters_by_passing_an_array_of_filters()
	{
		$filters =  [m::mock('filter1'), "filter2" => m::mock('filter2'),  m::mock('filter3')];
		
		$collection = new FilterCollection();
		$collection->add($filters);
		
		$this->assertEquals($collection->count() , 3);
		$this->assertEquals($collection->get('mockery_1__filter1') , $filters[0]);
		$this->assertEquals($collection->get('filter2') , $filters["filter2"]);
		$this->assertEquals($collection->get('mockery_3__filter3') , $filters[1]);
	}

	/**
	 * @test
	 * @group filterCollection
	 * @expectedException Exception
	 */
	public function it_gets_a_filter()
	{
		$filter =  m::mock('filter');

		$collection = new FilterCollection();
		$collection->add($filter);
		
		$this->assertEquals(1, $collection->count());
		$this->assertEquals($filter, $collection->get('mockery_0__filter'));
		$collection->get('not_existing');
	}
}