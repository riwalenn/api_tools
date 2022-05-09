<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;

final class randomCategory
{
    public function __construct(private CategoriesRepository $categoriesRepository)
    {
    }

    public function __invoke()
    {
        return $this->categoriesRepository->getRandomCategory();
    }
}