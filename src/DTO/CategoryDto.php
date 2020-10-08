<?php

namespace App\DTO;

class CategoryDto
{
    private string $name;
    private string $slug;

    public function __construct(string $name, string $slug)
    {
        $this->name = $name;
        $this->slug = $slug;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public static function createFromArray(array $data): self
    {
        return new self($data['name'], $data['slug']);
    }
}