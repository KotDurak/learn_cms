<?php

namespace iterator;

use Traversable;

class UserAggregator implements \IteratorAggregate
{
    public function __construct(private array $users)
    {

    }

    public function getIterator(): Traversable
    {
        return new User($this->users);
    }
}