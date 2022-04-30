<?php

namespace Crypto\ResultSet;

use Crypto\Model\ExchangeRate;

class ExchangeRateResultSet extends ResultSet
{
    private $class = ExchangeRate::class;

    public function offsetSet($offset, $value) {
        if (!is_a($value, $this->class)) {
            throw new \Exception('Value is not an ExchangeRate object!');
        }
    }
}