<?php

namespace App\Service;

use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;

class PostService
{
    private $postRepository;
    private $paginator;

    public function __construct(PostRepository $postRepository, PaginatorInterface $paginator)
    {
        $this->postRepository = $postRepository;
        $this->paginator = $paginator;
    }

    public function fetchAll(int $page): \Knp\Component\Pager\Pagination\PaginationInterface
    {
        return $this->paginator->paginate($this->postRepository->getFetchAllQuery(), $page);
    }
}