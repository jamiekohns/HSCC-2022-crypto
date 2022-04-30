<?php

namespace Crypto\ResultSet;

use Crypto\Model\RequesUser;

class RequesUsersResultSet extends ResultSet
{
    private $class = RequesUser::class;

    private $page;

    private $per_page;

    private $total;

    private $total_pages;

    public function __construct(array $items = [], int $page = 1, int $per_page = 6, int $total = 0, int $total_pages = 1)
    {
        $this->page = $page;
        $this->per_page = $per_page;
        $this->total = $total;
        $this->total_pages = $total_pages;

        parent::__construct($items);
    }

    public function offsetSet($offset, $value) {
        if (!is_a($value, $this->class)) {
            throw new \Exception('Value is not an Reques (user) object!');
        }

        parent::offsetSet($offset, $value);
    }

    public function hasNextPage(): bool
    {
        return $this->total_pages > $this->page;
    }

    public function hasPreviousPage(): bool
    {
        return $this->page > 1;
    }

    public function nextPage(): int
    {
        return $this->hasNextPage() ? $this->page + 1 : $this->page;
    }

    public function previousPage(): int
    {
        return $this->hasPreviousPage() ? $this->page - 1 : 1;
    }
}