<?php

<<<<<<< HEAD:var/cache/dev/ContainerPsj1wGM/getCoursValidatorService.php
namespace ContainerPsj1wGM;
=======
namespace ContainerGsjgqAv;

>>>>>>> 46ca464b0d52b612cb2c8c978a05b404bff82702:var/cache/dev/ContainerGsjgqAv/getCoursValidatorService.php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCoursValidatorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Validator\CoursValidator' shared autowired service.
     *
     * @return \App\Validator\CoursValidator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'validator'.\DIRECTORY_SEPARATOR.'ConstraintValidatorInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'validator'.\DIRECTORY_SEPARATOR.'ConstraintValidator.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Validator'.\DIRECTORY_SEPARATOR.'CoursValidator.php';

        return $container->privates['App\\Validator\\CoursValidator'] = new \App\Validator\CoursValidator(($container->privates['App\\Repository\\CoursRepository'] ?? $container->load('getCoursRepositoryService')));
    }
}
