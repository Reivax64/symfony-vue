<?php

<<<<<<< HEAD:var/cache/dev/ContainerPsj1wGM/get_ServiceLocator_E1La3asService.php
namespace ContainerPsj1wGM;
=======
namespace ContainerGsjgqAv;

>>>>>>> 46ca464b0d52b612cb2c8c978a05b404bff82702:var/cache/dev/ContainerGsjgqAv/get_ServiceLocator_E1La3asService.php

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
