<?php

namespace App\DTO;

class PostDto
{
    private int $categoryId;
    private string $title;
    private string $shortDescription;
    private string $content;

    public function __construct(int $categoryId, string $title, string $shortDescription, string $content)
    {
        $this->categoryId = $categoryId;
        $this->title = $title;
        $this->shortDescription = $shortDescription;
        $this->content = $content;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}