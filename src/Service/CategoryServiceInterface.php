<?php

namespace App\Service;

use App\Entity\Category;

interface CategoryServiceInterface
{
    public function fetchCategoryById(int $id): Category;
}