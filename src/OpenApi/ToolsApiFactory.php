<?php

namespace App\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;

class ToolsApiFactory implements OpenApiFactoryInterface
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

        $randomItem = $openApi->getPaths()->getPath('/api/tools/random');
        $getItem = $openApi->getPaths()->getPath('/api/tools/{id}');

        $randomOperation = $randomItem->getGet();
        $getOperation = $getItem->getGet();

        $randomOperation->addResponse($getOperation->getResponses()[200], 200);
        $randomOperation = $randomOperation
            ->withDescription('Retrieve random Tools resource.')
            ->withSummary('Retrieve random Tools resource.');

        $randomItem = $randomItem->withGet($randomOperation);

        $openApi->getPaths()->addPath('/api/tools/random', $randomItem);

        return $openApi;
    }
}