<?php

namespace Asu\MenuBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class MenuPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $ids = $container->findTaggedServiceIds('asu_menu');
        $collection = $container->getDefinition('asu.menu.collection');
        foreach ($ids as $id => $tag) {
            $alias = $tag[0]['alias'];
            $collection->addMethodCall('addService', [$alias, $id]);
        }
    }
}
