<?php

namespace App\Controller;

use App\Service\CategoryServiceInterface;
use App\Service\PostServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    private PostServiceInterface $postService;
    private CategoryServiceInterface $categoryService;

    public function __construct(PostServiceInterface $postService, CategoryServiceInterface $categoryService)
    {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
    }

    public function index(Request $request): Response
    {
        return $this->render('home/index.html.twig', [
            'categories' => $this->categoryService->fetchAll(),
            'posts' => $this->postService->fetchAll($request->query->getInt('page', 1)),
        ]);
    }
}
