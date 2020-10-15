<?php

namespace App\Service;

use App\DTO\PostDto;
use App\Entity\Post;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\PostRepositoryInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

class PostService implements PostServiceInterface
{
    private PostRepositoryInterface $postRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private PaginatorInterface $paginator;

    public function __construct(
        PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface $categoryRepository,
        PaginatorInterface $paginator
    )
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
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

    public function store(PostDto $postDto): void
    {
        /**
         * TODO: add builder
         */
        $category = $this->categoryRepository->fetchById($postDto->getCategoryId());

        $post = new Post(
            $postDto->getTitle(),
            $postDto->getShortDescription(),
            $postDto->getContent(),
            $category
        );

        $this->postRepository->store($post);
    }

    public function update(int $id, PostDto $postDto): void
    {
        /**
         * TODO: add builder
         */
        $category = $this->categoryRepository->fetchById($postDto->getCategoryId());

        $this->postRepository->fetchById($id)->update(
            $postDto->getTitle(),
            $postDto->getShortDescription(),
            $postDto->getContent(),
            $category
        );

        $this->postRepository->update();
    }

    public function remove(int $id): void
    {
        $this->postRepository->remove($this->postRepository->fetchById($id));
    }
}