<?php

namespace Tests\Gkirtsou\DataProvider;

use Gkirtsou\DataProvider\StringDataProvider;

/**
 * Class StringDataProviderTest
 * @package Tests\Gkirtsou\DataProvider
 */
class StringDataProviderTest extends \PHPUnit_Framework_TestCase
{
    /** @var string */
    private $data;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $this->data = file_get_contents(__DIR__.'/../../fixtures/input.txt');
    }

    public function testStringProvider()
    {
        $class = new StringDataProvider($this->data);
        $class->calculateRowsAndColumns();

        $expectedColumns = [
            [11, 4, 10],
            [2, 5, 8],
            [4, 6, -12]
        ];

        $expectedRows = [
            [11, 2, 4],
            [4, 5, 6],
            [10, 8, -12]
        ];

        $this->assertEquals($expectedColumns, $class->getColumns());
        $this->assertEquals($expectedRows, $class->getRows());
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Did you call calculateRowsAndColumns first?
     */
    public function testGetRowsWithoutCalculate()
    {
        $class = new StringDataProvider($this->data);
        $class->getRows();
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Did you call calculateRowsAndColumns first?
     */
    public function testGetColumnsWithoutCalculate()
    {
        $class = new StringDataProvider($this->data);
        $class->getColumns();
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Did you call calculateRowsAndColumns first?
     */
    public function testGetSizeWithoutCalculate()
    {
        $class = new StringDataProvider($this->data);
        $class->getSize();
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage Your square must have 3 rows and columns
     */
    public function testBadSquare()
    {
        $badData = file_get_contents(__DIR__.'/../../fixtures/badSquare.txt');
        $class = new StringDataProvider($badData);
        $class->calculateRowsAndColumns();
    }
}
