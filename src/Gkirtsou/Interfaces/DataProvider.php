<?php

namespace Gkirtsou\Interfaces;

/**
 * Interface DataProvider
 */
interface DataProvider
{
    /** @return int */
    public function getSize();

    /** @return array */
    public function getRows();

    /** @return array */
    public function getColumns();
}
