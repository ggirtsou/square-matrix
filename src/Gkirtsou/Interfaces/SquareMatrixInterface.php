<?php

namespace Gkirtsou\Interfaces;

/**
 * Interface SquareMatrixInterface
 * @package Gkirtsou\Interfaces
 */
interface SquareMatrixInterface
{
    /**
     * @param int $number
     * @return int[]
     */
    public function getNumbersByColumn($number);

    /**
     * @param int $number
     * @return int[]
     */
    public function getNumbersByRow($number);

    /** @return int */
    public function getSize();
}
