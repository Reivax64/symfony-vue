<?php

<<<<<<< HEAD:var/cache/dev/ContainerPsj1wGM/get_ServiceLocator_Pq4kMEnService.php
namespace ContainerPsj1wGM;
=======
namespace ContainerGsjgqAv;

>>>>>>> 46ca464b0d52b612cb2c8c978a05b404bff82702:var/cache/dev/ContainerGsjgqAv/get_ServiceLocator_Pq4kMEnService.php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Pq4kMEnService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.pq4kMEn' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.pq4kMEn'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'em' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', true],
            'validator' => ['services', '.container.private.validator', 'get_Container_Private_ValidatorService', true],
        ], [
            'em' => '?',
            'validator' => '?',
        ]);
    }
}
