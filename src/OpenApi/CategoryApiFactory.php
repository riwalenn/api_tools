<?php

namespace App\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;

class CategoryApiFactory implements OpenApiFactoryInterface
{
    public function __construct(private OpenApiFactoryInterface $decorated)
    {
    }

    /**
     * @inheritDoc
     */
    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context);

        $randomItem = $openApi->getPaths()->getPath('/api/categories/random');
        $getItem = $openApi->getPaths()->getPath('/api/categories/{id}');

        $randomOperation = $randomItem->getGet();
        $getOperation = $getItem->getGet();

        $randomOperation->addResponse($getOperation->getResponses()[200], 200);
        $randomOperation = $randomOperation
            ->withDescription('Retrieve random Categories resource.')
            ->withSummary('Retrieve random Categories resource.');

        $randomItem = $randomItem->withGet($randomOperation);

        $openApi->getPaths()->addPath('/api/categories/random', $randomItem);

        return $openApi;
    }
}