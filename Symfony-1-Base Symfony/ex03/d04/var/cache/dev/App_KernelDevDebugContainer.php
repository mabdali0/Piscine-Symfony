<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerSeAuVCl\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerSeAuVCl/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerSeAuVCl.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerSeAuVCl\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerSeAuVCl\App_KernelDevDebugContainer([
    'container.build_hash' => 'SeAuVCl',
    'container.build_id' => '2d6a9fb9',
    'container.build_time' => 1738068180,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerSeAuVCl');
