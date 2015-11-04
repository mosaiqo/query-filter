<?php namespace Mosaiqo\QueryFilter\Tests\Filters;

use Mosaiqo\QueryFilter\Filters\FilterFactory;
use Mosaiqo\QueryFilter\Stubs\Filters\StubFilter;
class FilterFactoryTest extends \PHPUnit_Framework_TestCase{

	/**
	 * @test
	 * @group filterFactory
	 */
	public function it_instantiates_a_class_on_a_given_filter()
	{
		$filter = (new FilterFactory('stubFilter', ['one', 'two']))->create();
		$this->assertTrue( $filter instanceof StubFilter);
		$this->assertEquals($filter->getParams() , ['one', 'two']);
	}
}