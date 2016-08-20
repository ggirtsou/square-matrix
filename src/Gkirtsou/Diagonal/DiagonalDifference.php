<?php

namespace Gkirtsou\Diagonal;

use Gkirtsou\Interfaces\SquareMatrixInterface;

/**
 * Class DiagonalDifference
 * @package Gkirtsou\Diagonal
 */
class DiagonalDifference
{
    // diagonal types
    const PRIMARY_TYPE = 'primary';
    const SECONDARY_TYPE = 'secondary';

    /** @var SquareMatrixInterface */
    private $squareMatrix;

    /**
     * DiagonalDifference constructor.
     * @param SquareMatrixInterface $squareMatrix
     */
    public function __construct(SquareMatrixInterface $squareMatrix)
    {
        $this->squareMatrix = $squareMatrix;
    }

    /**
     * Returns diagonal difference for square matrix
     *
     * @return int
     */
    public function findDiagonalDifference()
    {
        $primaryDiagonal = array_sum($this->findDiagonal(self::PRIMARY_TYPE));
        $secondaryDiagonal = array_sum($this->findDiagonal(self::SECONDARY_TYPE));

        return (int) ($primaryDiagonal > $secondaryDiagonal)
            ? ($primaryDiagonal - $secondaryDiagonal)
            : ($secondaryDiagonal - $primaryDiagonal)
        ;
    }

    /**
     * Finds diagonal numbers of square matrix
     *
     * @param string $type can be 'primary' or 'secondary' (use class constants)
     * @return int[]
     */
    public function findDiagonal($type = self::PRIMARY_TYPE)
    {
        $numbers = [];
        $size = $this->squareMatrix->getSize();

        if ($type == self::PRIMARY_TYPE) {
            for ($i = 0; $i < $size; $i++) {
                $numbers[] = $this->squareMatrix->getNumbersByRow($i)[$i];
            }
        } else {
            $rowNumbers = range(0, $size-1);
            $positionNumbers = array_reverse($rowNumbers);

            // loop through lines
            for ($i = 0; $i < $size; $i++) {
                $numbers[] = $this->squareMatrix->getNumbersByRow($rowNumbers[$i])[$positionNumbers[$i]];
            }
        }

        return $numbers;
    }
}
