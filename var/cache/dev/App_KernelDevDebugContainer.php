<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerRm4X7Xt\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerRm4X7Xt/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerRm4X7Xt.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerRm4X7Xt\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerRm4X7Xt\App_KernelDevDebugContainer([
    'container.build_hash' => 'Rm4X7Xt',
    'container.build_id' => 'b89fb4b1',
    'container.build_time' => 1615381655,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerRm4X7Xt');
