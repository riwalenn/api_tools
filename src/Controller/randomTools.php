<?php

namespace App\Controller;

use App\Repository\ToolsRepository;

class randomTools
{
    public function __construct(private ToolsRepository $toolsRepository)
    {
    }

    public function __invoke()
    {
        return $this->toolsRepository->getRandomTools();
    }
}