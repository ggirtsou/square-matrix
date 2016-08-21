<?php

namespace Gkirtsou;

use Gkirtsou\Interfaces\DataProviderInterface;
use Gkirtsou\Interfaces\SquareMatrixInterface;

/**
 * Class SquareMatrix
 * @package Gkirtsou
 */
class SquareMatrix implements SquareMatrixInterface
{
    /** @var int */
    private $size = 0;

    /** @var int[] */
    private $rows = [];

    /** @var int[] */
    private $columns = [];

    /**
     * SquareMatrix constructor.
     * @param DataProviderInterface $data
     */
    public function __construct(DataProviderInterface $data)
    {
        $this->size = $data->getSize();
        $this->rows = $data->getRows();
        $this->columns = $data->getColumns();
    }

    /**
     * Returns numbers found in column
     *
     * @param int $number
     * @return int[]
     */
    public function getNumbersByColumn($number) : array
    {
        return $this->columns[$number];
    }

    /**
     * Returns numbers found in row
     *
     * @param int $number
     * @return int[]
     */
    public function getNumbersByRow($number) : array
    {
        return $this->rows[$number];
    }

    /**
     * Returns square size
     *
     * @return int
     */
    public function getSize() : int
    {
        return (int) $this->size;
    }
}
