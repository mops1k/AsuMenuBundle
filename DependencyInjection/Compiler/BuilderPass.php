<?php

namespace Asu\MenuBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class BuilderPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $ids = $container->findTaggedServiceIds('asu_menu.builder');
        $collection = $container->getDefinition('asu.builder.collection');
        foreach ($ids as $id => $tag) {
            $alias = $tag[0]['alias'];
            $collection->addMethodCall('addService', [$alias, $id]);
        }
    }
}
