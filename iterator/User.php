<?php

namespace iterator;

class User implements \Iterator
{
    public function __construct(private array $users, private int $index = 0)
    {

    }

    public function current(): mixed
    {
        return $this->users[$this->index];
    }

    public function next(): void
    {
        $this->index++;
    }

    public function key(): mixed
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return array_key_exists($this->index, $this->users);
    }

    public function rewind(): void
    {
       $this->index = 0;
    }
}