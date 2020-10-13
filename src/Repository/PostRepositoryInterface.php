<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\ORM\Query;

interface PostRepositoryInterface
{
    public function fetchById(int $id): Post;

    public function fetchAllByCreatedAt(): array;

    public function getFetchAllQuery(): Query;

    public function store(Post $post): void;

    public function update(): void;

    public function remove(Post $post): void;
}