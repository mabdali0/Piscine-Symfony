<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerYDxhAz6\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerYDxhAz6/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerYDxhAz6.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerYDxhAz6\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerYDxhAz6\App_KernelDevDebugContainer([
    'container.build_hash' => 'YDxhAz6',
    'container.build_id' => '4a939626',
    'container.build_time' => 1738060308,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerYDxhAz6');
