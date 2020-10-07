<?php

namespace App\Service;

use App\Repository\PostRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

class PostService implements PostServiceInterface
{
    private PostRepository $postRepository;
    private PaginatorInterface $paginator;

    public function __construct(PostRepository $postRepository, PaginatorInterface $paginator)
    {
        $this->postRepository = $postRepository;
        $this->paginator = $paginator;
    }

    public function fetchAll(int $page): PaginationInterface
    {
        return $this->paginator->paginate($this->postRepository->getFetchAllQuery(), $page);
    }
}