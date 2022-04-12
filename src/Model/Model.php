<?php

namespace Crypto\Model;

class Model
{
    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

    public function hydrate($data)
    {
        foreach ($data as $property => $value) {
            // assemble the "set" method for this property
            $method = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $property)));

            // check that the "set" method exists (is callable)
            if (is_callable([$this, $method])) {
                // call the method to set the value
                $this->$method($value);
            }
        }
    }
}