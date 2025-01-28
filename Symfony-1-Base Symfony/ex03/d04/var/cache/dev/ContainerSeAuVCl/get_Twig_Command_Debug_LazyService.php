<?php

namespace ContainerSeAuVCl;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Twig_Command_Debug_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.twig.command.debug.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.twig.command.debug.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('debug:twig', [], 'Show a list of twig functions, filters, globals and tests', false, #[\Closure(name: 'twig.command.debug', class: 'Symfony\\Bridge\\Twig\\Command\\DebugCommand')] fn (): \Symfony\Bridge\Twig\Command\DebugCommand => ($container->privates['twig.command.debug'] ?? $container->load('getTwig_Command_DebugService')));
    }
}
