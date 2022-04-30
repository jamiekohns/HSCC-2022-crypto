<?php

namespace Crypto\ResultSet;

class ResultSet implements \ArrayAccess, \Iterator
{
    /** array $items */
    private $items = [];

    private $position = 0;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /* ArrayAccess interface methods */
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->items[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->items[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }

    /* Iterator interface methods */
    public function current()
    {
        return $this->items[$this->position];
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function valid()
    {
        return isset($this->items[$this->position]);
    }
}