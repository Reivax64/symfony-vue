<?php

<<<<<<< HEAD:var/cache/dev/ContainerJCBBj76/getForm_ServerParamsService.php
namespace ContainerJCBBj76;
=======
namespace ContainerGsjgqAv;

>>>>>>> 46ca464b0d52b612cb2c8c978a05b404bff82702:var/cache/dev/ContainerGsjgqAv/getForm_ServerParamsService.php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getForm_ServerParamsService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'form.server_params' shared service.
     *
     * @return \Symfony\Component\Form\Util\ServerParams
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'form'.\DIRECTORY_SEPARATOR.'Util'.\DIRECTORY_SEPARATOR.'ServerParams.php';

        return $container->privates['form.server_params'] = new \Symfony\Component\Form\Util\ServerParams(($container->services['request_stack'] ?? ($container->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }
}
