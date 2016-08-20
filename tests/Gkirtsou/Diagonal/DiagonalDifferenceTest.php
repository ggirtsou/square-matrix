<?php

namespace tests\Gkirtsou\Diagonal;

use Gkirtsou\DataProvider\StringDataProvider;
use Gkirtsou\SquareMatrix;
use src\Gkirtsou\Diagonal\DiagonalDifference;

/**
 * Class DiagonalDifferenceTest
 * @package tests\Gkirtsou\Diagonal
 */
class DiagonalDifferenceTest extends \PHPUnit_Framework_TestCase
{
    /** @var DiagonalDifference */
    private $class;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $provider = new StringDataProvider(file_get_contents(__DIR__.'/../../fixtures/input.txt'));
        $provider->calculateRowsAndColumns();

        $squareMatrix = new SquareMatrix($provider);
        $this->class = new DiagonalDifference($squareMatrix);
    }

    public function testGetRightDiagonalNumbers()
    {
        $expected = [11, 5, -12];
        $this->assertEquals($expected, $this->class->findDiagonal(DiagonalDifference::PRIMARY_TYPE));
    }

    public function testGetLeftDiagonalNumbers()
    {
        $expected = [4, 5, 10];
        $this->assertEquals($expected, $this->class->findDiagonal(DiagonalDifference::SECONDARY_TYPE));
    }

    public function testGetDiagonalDifference()
    {
        $this->assertEquals(15, $this->class->findDiagonalDifference());
    }
}
