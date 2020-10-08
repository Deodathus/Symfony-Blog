<?php

namespace App\Repository;

use App\Entity\Category;

interface CategoryRepositoryInterface
{
    public function fetchById(int $id): Category;

    public function fetchAll(): array;

    public function fetchAllCount(): int;

    public function store(Category $category): void;

    public function update(): void;

    public function remove(Category $category): void;
}