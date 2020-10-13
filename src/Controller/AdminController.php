<?php

namespace App\Controller;

use App\Service\CategoryServiceInterface;
use App\Service\PostServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    private CategoryServiceInterface $categoryService;
    private PostServiceInterface $postService;

    public function __construct(CategoryServiceInterface $categoryService, PostServiceInterface $postService)
    {
        $this->categoryService = $categoryService;
        $this->postService = $postService;
    }

    public function index(Request $request): Response
    {
        return $this->render('admin/home/index.html.twig', [
            'categories' => $this->categoryService->fetchAll(),
            'posts' => $this->postService->fetchAll($request->query->get('page', 1)),
        ]);
    }
}