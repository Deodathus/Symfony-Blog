<?php

namespace App\Controller;

use App\DTO\CategoryDto;
use App\Service\CategoryServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCategoryController extends AbstractController
{
    private string $routePrefix;
    private CategoryServiceInterface $categoryService;

    public function __construct(CategoryServiceInterface $categoryService, string $adminRoutePrefix)
    {
        $this->categoryService = $categoryService;
        $this->routePrefix = $adminRoutePrefix;
    }

    public function create(): Response
    {
        return $this->render('admin/category/create.html.twig');
    }

    public function store(Request $request): RedirectResponse
    {
        $categoryData = [
            'name' => $request->get('category-name'),
            'slug' => $request->get('category-slug'),
        ];

        $this->categoryService->store(CategoryDto::createFromArray($categoryData));

        return $this->redirectToRoute($this->routePrefix . 'index');
    }

    public function show(int $id): Response
    {
        $category = $this->categoryService->fetchCategoryById($id);

        return $this->render('admin/category/update.html.twig', [
            'category' => $category,
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $categoryData = [
            'name' => $request->get('category-name'),
            'slug' => $request->get('category-slug'),
        ];

        $this->categoryService->update($id, CategoryDto::createFromArray($categoryData));

        return $this->redirectToRoute($this->routePrefix . 'index');
    }

    public function delete(int $id): RedirectResponse
    {
        $this->categoryService->remove($id);

        return $this->redirectToRoute($this->routePrefix . 'index');
    }
}