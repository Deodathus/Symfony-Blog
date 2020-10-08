<?php

namespace App\Controller;

use App\Service\CategoryServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    private CategoryServiceInterface $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): Response
    {
        return $this->render('admin/home/index.html.twig', [
            'categories' => $this->categoryService->fetchAll(),
        ]);
    }
}