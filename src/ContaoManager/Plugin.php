<?php

/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

/*
 * This file is part of fiedsch/remote-listing-bundle.
 *
 * (c) 2021 Andreas Fieger
 *
 * @package Remote Listing Bundle
 * @link https://github.com/fiedsch/remote-listing-bundle/
 * @license https://opensource.org/licenses/MIT
 */

namespace Fiedsch\RemoteListingBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Fiedsch\RemoteListingBundle\FiedschRemoteListingBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(FiedschRemoteListingBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
