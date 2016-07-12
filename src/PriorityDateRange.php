<?php

declare(strict_types = 1);

namespace PurpleBooth\PrioritisedDateRanges;

use DateTime;

/**
 * Represents a single range
 *
 * @package PurpleBooth\PrioritisedDateRanges
 */
class PriorityDateRange
{
    /**
     * @var int The compared date range exists entirely inside this range
     */
    const COMPARISON_CONAINED = 1;

    /**
     * @var int The compared date range entirely contains this range
     */
    const COMPARISON_OVERLAPS_BOTH = 2;

    /**
     * @var int The compared date range entirely contains this range
     */
    const COMPARISON_EQUAL = 3;

    /**
     * @var mixed
     */
    private $key;

    /**
     * @var DateTime
     */
    private $end = null;

    /**
     * @var DateTime
     */
    private $start = null;

    /**
     * Does this range have a specific start date
     *
     * If it does not have a specific start date it will have been considered to always have been
     *
     * @return bool
     */
    public function hasStart() : bool
    {
        return !is_null($this->start);
    }

    /**
     * Does this range have a specific end date
     *
     * If it does not have a specific end date it will have been considered to always continue to exist into the future
     *
     * @return bool
     */
    public function hasEnd() : bool
    {
        return !is_null($this->end);
    }

    /**
     * Set an arbitrary value into this class, in order to identify it after doing processing on it.
     *
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * Get the arbitrary identifying value from this class
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set a start time for this date range
     *
     * @param DateTime $start
     */
    public function setStart(DateTime $start)
    {
        $this->start = $start;
    }

    /**
     * Set a end time for this date range
     *
     * @param DateTime $end
     */
    public function setEnd(DateTime $end)
    {
        $this->end = $end;
    }

    /**
     * Compares range to another
     *
     * See COMPARISON_* constants
     *
     * @param PriorityDateRange $compareTo
     * @return int
     */
    public function contains(self $compareTo) : int
    {
        if (!$this->hasStart() && !$compareTo->hasStart() && !$this->hasEnd() && !$compareTo->hasEnd()) {
            return self::COMPARISON_EQUAL;
        }

        if (!$this->hasStart() && $compareTo->hasStart() && !$this->hasEnd() && $compareTo->hasEnd()) {
            return self::COMPARISON_CONAINED;
        }

        if ($this->hasStart() && !$compareTo->hasStart() && $this->hasEnd() && !$compareTo->hasEnd()) {
            return self::COMPARISON_OVERLAPS_BOTH;
        }

    }
}
