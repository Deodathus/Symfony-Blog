<?php

namespace App\Factory;

use App\Entity\Category;
use Zenstruck\Foundry\ModelFactory;

class CategoryFactory extends ModelFactory
{
    protected static function getClass(): string
    {
        return Category::class;
    }

    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->jobTitle
        ];
    }
}