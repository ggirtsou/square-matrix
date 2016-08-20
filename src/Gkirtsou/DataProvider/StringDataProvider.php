<?php

namespace Gkirtsou\DataProvider;

use Gkirtsou\Interfaces\DataProvider;

/**
 * Class StringDataProvider expects to receive a string representing a square matrix.
 *
 * 1st line: <number> which is the size of our square matrix
 * number of lines = <number>
 * number of columns = <number>
 * n line contains whitespace-separated numbers
 *
 * Example:
 * 3 <- number that defines size of the square
 * 1 2 3
 * 4 5 6
 * 7 8 9
 */
class StringDataProvider implements DataProvider
{
    /** @var string */
    private $data;

    /** @var int */
    private $size;

    /** @var array */
    private $rows = [];

    /** @var array */
    private $columns = [];

    /**
     * StringDataProvider constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Extracts numbers grouped by row and column
     */
    public function calculateRowsAndColumns()
    {
        $lines = explode("\n", $this->data);
        $this->size = (int) $lines[0];

        for ($i = 1; $i <= $this->size; $i++) {
            $this->rows[] = explode(' ', $lines[$i]);
        }

        try {
            // to build columns loop through each line
            for ($columnPosition = 0; $columnPosition < $this->size; $columnPosition++) {
                $col = [];

                for ($lineNumber = 0; $lineNumber <= $this->size-1; $lineNumber++) {
                    $col[] = $this->rows[$lineNumber][$columnPosition];
                }

                $this->columns[] = $col;
            }
        } catch (\Exception $e) {};

        if (count($this->rows) !== $this->size || count($this->columns) !== $this->size) {
            throw new \BadMethodCallException(sprintf(
                'Your square must have %s rows and columns',
                $this->size
            ));
        }
    }

    /**
     * Returns size of our square matrix
     * @return int
     */
    public function getSize()
    {
        if (null === $this->size) {
            throw new \LogicException('Did you call calculateRowsAndColumns first?');
        }

        return (int) $this->size;
    }

    /**
     * Returns number array or rows
     * @return int[]
     */
    public function getRows()
    {
        if (0 === count($this->rows)) {
            throw new \LogicException('Did you call calculateRowsAndColumns first?');
        }

        return $this->rows;
    }

    /**
     * Returns number array of columns
     * @return int[]
     */
    public function getColumns()
    {
        if (0 === count($this->columns)) {
            throw new \LogicException('Did you call calculateRowsAndColumns first?');
        }

        return $this->columns;
    }
}
