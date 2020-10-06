<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    public function index(Category $category): Response
    {
        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }
}
