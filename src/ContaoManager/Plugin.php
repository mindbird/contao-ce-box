<?php

/*
 * This file is part of [mindbird/contao-ttn].
 *
 * (c) mindbird
 *
 * @license LGPL-3.0-or-later
 */

namespace Mindbird\Contao\TheThingsNetwork\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Mindbird\Contao\TheThingsNetwork\ContaoCeBoxBundle;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\RouteCollection;

class Plugin implements BundlePluginInterface, RoutingPluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoCeBoxBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }

    /**
     * Returns a collection of routes for this bundle.
     *
     * @return RouteCollection|null
     * @throws \Exception
     */
    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
    {
        $file = __DIR__ . '/../Resources/config/routing.yml';

        return $resolver->resolve($file)->load($file);
    }
}
