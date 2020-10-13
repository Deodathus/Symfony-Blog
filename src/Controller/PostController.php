<?php

namespace App\Controller;

use App\Service\PostServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PostController extends AbstractController
{
    private PostServiceInterface $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function show(int $id): Response
    {
        $post = $this->postService->fetchById($id);

        return $this->render('post/post.html.twig', [
            'post' => $post,
        ]);
    }
}