<?php

<<<<<<< HEAD:var/cache/dev/ContainerPsj1wGM/getEntityRepositoryService.php
namespace ContainerPsj1wGM;
=======
namespace ContainerGsjgqAv;

>>>>>>> 46ca464b0d52b612cb2c8c978a05b404bff82702:var/cache/dev/ContainerGsjgqAv/getEntityRepositoryService.php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getEntityRepositoryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository' shared service.
     *
     * @return \EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'easycorp'.\DIRECTORY_SEPARATOR.'easyadmin-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Contracts'.\DIRECTORY_SEPARATOR.'Orm'.\DIRECTORY_SEPARATOR.'EntityRepositoryInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'easycorp'.\DIRECTORY_SEPARATOR.'easyadmin-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Orm'.\DIRECTORY_SEPARATOR.'EntityRepository.php';

        return $container->privates['EasyCorp\\Bundle\\EasyAdminBundle\\Orm\\EntityRepository'] = new \EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository(($container->privates['EasyCorp\\Bundle\\EasyAdminBundle\\Provider\\AdminContextProvider'] ?? $container->getAdminContextProviderService()), ($container->services['doctrine'] ?? $container->getDoctrineService()), ($container->privates['EasyCorp\\Bundle\\EasyAdminBundle\\Factory\\EntityFactory'] ?? $container->getEntityFactoryService()), ($container->privates['EasyCorp\\Bundle\\EasyAdminBundle\\Factory\\FormFactory'] ?? $container->load('getFormFactoryService')));
    }
}
