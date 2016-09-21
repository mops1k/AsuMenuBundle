<?php

namespace Asu\MenuBundle;

use Asu\MenuBundle\DependencyInjection\Compiler\BuilderPass;
use Asu\MenuBundle\DependencyInjection\Compiler\MenuPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AsuMenuBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new MenuPass());
        $container->addCompilerPass(new BuilderPass());
    }
}
