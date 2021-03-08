<?php

namespace ContainerN3QbxIr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_E1La3asService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.e1La3as' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.e1La3as'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'repository' => ['privates', 'App\\Repository\\CoursRepository', 'getCoursRepositoryService', true],
        ], [
            'repository' => 'App\\Repository\\CoursRepository',
        ]);
    }
}
