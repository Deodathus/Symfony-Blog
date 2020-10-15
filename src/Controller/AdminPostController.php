<?php

namespace App\Controller;

use App\DTO\PostDto;
use App\Service\CategoryServiceInterface;
use App\Service\PostServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPostController extends AbstractController
{
    private string $routePrefix;
    private PostServiceInterface $postService;
    private CategoryServiceInterface $categoryService;

    public function __construct(
        PostServiceInterface $postService,
        CategoryServiceInterface $categoryService,
        string $adminRoutePrefix
    )
    {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->routePrefix = $adminRoutePrefix;
    }

    public function create(): Response
    {
        return $this->render('admin/post/create.html.twig', [
            'categories' => $this->categoryService->fetchAll(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $postDto = new PostDto(
            $request->request->get('category-id'),
            $request->request->get('title'),
            $request->request->get('short-description'),
            $request->request->get('content')
        );

        $this->postService->store($postDto);

        return $this->redirectToRoute($this->routePrefix . 'index');
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $postDto = new PostDto(
            $request->request->get('category-id'),
            $request->request->get('title'),
            $request->request->get('short-description'),
            $request->request->get('content')
        );

        $this->postService->update($id, $postDto);

        return $this->redirectToRoute($this->routePrefix . 'index');
    }

    public function show(int $id): Response
    {
        $post = $this->postService->fetchById($id);
        $categories = $this->categoryService->fetchAll();

        return $this->render('admin/post/show.html.twig', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function delete(int $id): RedirectResponse
    {
        $this->postService->remove($id);

        return $this->redirectToRoute($this->routePrefix . 'index');
    }
}