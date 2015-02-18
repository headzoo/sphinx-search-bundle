<?php
namespace Headzoo\SphinxSearchBundle\Services\Search;

use Symfony\Component\EventDispatcher\Event;

class SearchEvent
    extends Event
{
    /**
     * string
     */
    private $query;

    /**
     * @var array
     */
    private $indexes;

    /**
     * @var float
     */
    private $time;

    /**
     * Constructor
     * 
     * @param string $query    The query
     * @param array  $indexes  The indexes that were searched
     * @param float  $time     The time it took in milliseconds to perform the search
     */
    public function __construct($query, $indexes, $time)
    {
        $this->query   = $query;
        $this->indexes = $indexes;
        $this->time    = $time;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return array
     */
    public function getIndexes()
    {
        return $this->indexes;
    }

    /**
     * @param array $indexes
     */
    public function setIndexes($indexes)
    {
        $this->indexes = $indexes;
    }

    /**
     * @return float
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param float $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }
}
