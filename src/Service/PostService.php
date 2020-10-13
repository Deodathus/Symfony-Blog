<?php

namespace App\Service;

use App\Entity\Post;
use App\Repository\PostRepositoryInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

class PostService implements PostServiceInterface
{
    private PostRepositoryInterface $postRepository;
    private PaginatorInterface $paginator;

    public function __construct(PostRepositoryInterface $postRepository, PaginatorInterface $paginator)
    {
        $this->postRepository = $postRepository;
        $this->paginator = $paginator;
    }

    public function fetchById(int $id): Post
    {
        return $this->postRepository->fetchById($id);
    }

    public function fetchAll(int $page): PaginationInterface
    {
        return $this->paginator->paginate($this->postRepository->getFetchAllQuery(), $page);
    }
}