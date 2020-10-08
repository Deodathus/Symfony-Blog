<?php

namespace App\Repository;

use Doctrine\ORM\Query;

interface PostRepositoryInterface
{
    public function fetchAllByCreatedAt(): array;

    public function getFetchAllQuery(): Query;
}