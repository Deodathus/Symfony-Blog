<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\ORM\Query;

interface PostRepositoryInterface
{
    public function fetchById(int $id): Post;

    public function fetchAllByCreatedAt(): array;

    public function getFetchAllQuery(): Query;
}