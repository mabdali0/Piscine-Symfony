<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerU8l583h\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerU8l583h/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerU8l583h.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerU8l583h\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerU8l583h\App_KernelDevDebugContainer([
    'container.build_hash' => 'U8l583h',
    'container.build_id' => '696384f4',
    'container.build_time' => 1738074257,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerU8l583h');
