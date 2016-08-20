<?php

namespace Tests\Gkirtsou;

use Gkirtsou\DataProvider\StringDataProvider;
use Gkirtsou\SquareMatrix;

/**
 * Class SquareMatrixTest
 * @package Tests\Gkirtsou
 */
class SquareMatrixTest extends \PHPUnit_Framework_TestCase
{
    /** @var StringDataProvider */
    private $data;

    /**
     * @return array
     */
    public function columnDataProvider()
    {
        return [
            [0, [11, 4, 10]],
            [1, [2, 5, 8]],
            [2, [4, 6, -12]]
        ];
    }

    /**
     * @return array
     */
    public function rowDataProvider()
    {
        return [
            [0, [11, 2, 4]],
            [1, [4, 5, 6]],
            [2, [10, 8, -12]]
        ];
    }

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $class = new StringDataProvider(file_get_contents(__DIR__.'/../fixtures/input.txt'));;
        $class->calculateRowsAndColumns();
        $this->data = $class;
    }

    /**
     * @param int $columnNumber
     * @param array $expected
     * @dataProvider columnDataProvider
     */
    public function testGetNumbersByColumn($columnNumber, $expected)
    {
        $class = new SquareMatrix($this->data);
        $this->assertEquals($expected, $class->getNumbersByColumn($columnNumber));
        $this->assertEquals(3, $class->getSize());
    }

    /**
     * @param int $rowNumber
     * @param array $expected
     * @dataProvider rowDataProvider
     */
    public function testGetNumbersByRow($rowNumber, $expected)
    {
        $class = new SquareMatrix($this->data);
        $this->assertEquals($expected, $class->getNumbersByRow($rowNumber));
    }
}
