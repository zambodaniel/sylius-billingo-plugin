<?php

declare(strict_types=1);

namespace ZamboDaniel\SyliusBillingoPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * @psalm-suppress UnusedVariable
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('sylius_billingo_plugin');
        $rootNode = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
}
