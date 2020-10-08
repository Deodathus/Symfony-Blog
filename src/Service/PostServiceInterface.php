<?php

namespace App\Service;

use Knp\Component\Pager\Pagination\PaginationInterface;

interface PostServiceInterface
{
    public function fetchAll(int $page): PaginationInterface;
}