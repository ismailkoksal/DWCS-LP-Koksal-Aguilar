<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXMgLqJV\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXMgLqJV/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXMgLqJV.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXMgLqJV\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerXMgLqJV\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'XMgLqJV',
    'container.build_id' => 'cc343071',
    'container.build_time' => 1578928719,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXMgLqJV');
