<?php

namespace Gkirtsou;

use Gkirtsou\Interfaces\DataProvider;

/**
 * Class SquareMatrix
 * @package Gkirtsou
 */
class SquareMatrix
{
    /** @var int */
    private $size = 0;

    /** @var int[] */
    private $rows = [];

    /** @var int[] */
    private $columns = [];

    /**
     * SquareMatrix constructor.
     * @param DataProvider $data
     */
    public function __construct(DataProvider $data)
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
    public function getNumbersByColumn($number)
    {
        return $this->columns[$number];
    }

    /**
     * Returns numbers found in row
     *
     * @param int $number
     * @return int[]
     */
    public function getNumbersByRow($number)
    {
        return $this->rows[$number];
    }
}
