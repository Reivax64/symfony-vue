<?php

<<<<<<< HEAD:var/cache/dev/ContainerJCBBj76/get_ServiceLocator_88DCWcyService.php
namespace ContainerJCBBj76;
=======
namespace ContainerGsjgqAv;

>>>>>>> 46ca464b0d52b612cb2c8c978a05b404bff82702:var/cache/dev/ContainerGsjgqAv/get_ServiceLocator_88DCWcyService.php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_88DCWcyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.88DCWcy' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.88DCWcy'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'classe' => ['privates', '.errored..service_locator.88DCWcy.App\\Entity\\Classe', NULL, 'Cannot autowire service ".service_locator.88DCWcy": it references class "App\\Entity\\Classe" but no such service exists.'],
            'repository' => ['privates', 'App\\Repository\\CoursRepository', 'getCoursRepositoryService', true],
        ], [
            'classe' => 'App\\Entity\\Classe',
            'repository' => 'App\\Repository\\CoursRepository',
        ]);
    }
}
