<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\PostFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = CategoryFactory::new()->createMany(8);

        foreach ($categories as $category) {
            PostFactory::new()->createMany(6, ['category' => $category]);
        }
    }
}
