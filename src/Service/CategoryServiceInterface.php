<?php

namespace App\Service;

use App\DTO\CategoryDto;
use App\Entity\Category;

interface CategoryServiceInterface
{
    public function fetchAllCount(): int;

    public function fetchCategoryById(int $id): Category;

    public function fetchAll(): array;

    public function store(CategoryDto $categoryDto): void;

    public function update(int $id, CategoryDto $categoryDto): void;

    public function remove(int $id): void;
}