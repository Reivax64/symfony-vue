<?php

namespace ContainerYqjXRPS;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_LYmC_FcService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.lYmC.Fc' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.lYmC.Fc'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'em' => ['privates', 'App\\Repository\\AvisRepository', 'getAvisRepositoryService', true],
        ], [
            'em' => 'App\\Repository\\AvisRepository',
        ]);
    }
}
