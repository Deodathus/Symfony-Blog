<?php

namespace App\Factory;

use App\Entity\Post;

class PostFactory extends \Zenstruck\Foundry\ModelFactory
{
    protected static function getClass(): string
    {
        return Post::class;
    }

    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->realText(25),
            'shortDescription' => self::faker()->sentence(3, true),
            'content' => self::faker()->text(300),
        ];
    }
}