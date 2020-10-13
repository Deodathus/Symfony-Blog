<?php

namespace App\Service;

use App\Entity\Post;
use Knp\Component\Pager\Pagination\PaginationInterface;

interface PostServiceInterface
{
    public function fetchById(int $id): Post;

    public function fetchAll(int $page): PaginationInterface;
}