<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Tools;
use App\Repository\ToolsRepository;

final class ToolsProvider implements RestrictedDataProviderInterface, ContextAwareCollectionDataProviderInterface
{
    public function __construct(private ToolsRepository $toolsRepository)
    {

    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): array
    {
        $page = isset($context['filters']) ? ($context['filters']['page'] ?? 1) : 1;
        return $this->toolsRepository->getTools((int) $page);
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass == Tools::class;
    }
}