<?php

namespace App\Service;

use App\DTO\CategoryDto;
use App\Entity\Category;
use App\Repository\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function fetchAllCount(): int
    {
        return $this->categoryRepository->fetchAllCount();
    }

    public function fetchCategoryById(int $id): Category
    {
        return $this->categoryRepository->fetchById($id);
    }

    public function fetchAll(): array
    {
        return $this->categoryRepository->fetchAll();
    }

    public function store(CategoryDto $categoryDto): void
    {
        $categoryToStore = new Category(
            $categoryDto->getName(),
            $categoryDto->getSlug(),
        );

        $this->categoryRepository->store($categoryToStore);
    }

    public function update(int $id, CategoryDto $categoryDto): void
    {
        $this->categoryRepository->fetchById($id)->update(
            $categoryDto->getName(),
            $categoryDto->getSlug()
        );

        $this->categoryRepository->update();
    }

    public function remove(int $id): void
    {
        $categoryToRemove = $this->categoryRepository->fetchById($id);

        $this->categoryRepository->remove($categoryToRemove);
    }
}