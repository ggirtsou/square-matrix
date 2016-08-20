<?php

namespace Gkirtsou\Interfaces;

/**
 * Interface DataProviderInterface
 */
interface DataProviderInterface
{
    /** @return int */
    public function getSize();

    /** @return array */
    public function getRows();

    /** @return array */
    public function getColumns();
}
