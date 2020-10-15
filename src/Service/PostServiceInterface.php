<?php

namespace App\Service;

use App\DTO\PostDto;
use App\Entity\Post;
use Knp\Component\Pager\Pagination\PaginationInterface;

interface PostServiceInterface
{
    public function fetchById(int $id): Post;

    public function fetchAll(int $page): PaginationInterface;

    public function store(PostDto $postDto): void;

    public function update(int $id, PostDto $postDto): void;

    public function remove(int $id);
}