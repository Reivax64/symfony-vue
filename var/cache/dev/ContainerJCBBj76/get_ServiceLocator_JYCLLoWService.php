<?php

<<<<<<< HEAD:var/cache/dev/ContainerJCBBj76/get_ServiceLocator_JYCLLoWService.php
namespace ContainerJCBBj76;
=======
namespace ContainerGsjgqAv;

>>>>>>> 46ca464b0d52b612cb2c8c978a05b404bff82702:var/cache/dev/ContainerGsjgqAv/get_ServiceLocator_JYCLLoWService.php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_JYCLLoWService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.JYCLLoW' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.JYCLLoW'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'repository' => ['privates', 'App\\Repository\\ProfesseurRepository', 'getProfesseurRepositoryService', true],
        ], [
            'repository' => 'App\\Repository\\ProfesseurRepository',
        ]);
    }
}
