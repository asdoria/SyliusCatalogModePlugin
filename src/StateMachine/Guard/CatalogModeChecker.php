<?php

declare(strict_types=1);

/*
 * This file is part of the Asdoria Package.
 *
 * (c) Asdoria .
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Asdoria\SyliusCatalogModePlugin\StateMachine\Guard;

use Asdoria\SyliusCatalogModePlugin\Checkout\CatalogModeAwareInterface;
use Asdoria\SyliusCatalogModePlugin\Traits\CatalogModeCheckerTrait;
use Sylius\Component\Core\Model\OrderInterface;

/**
 * Class CatalogModeChecker.
 *
 * @author Philippe Vesin <pve.asdoria@gmail.com>
 */
class CatalogModeChecker
{
    use CatalogModeCheckerTrait;

    /**
     * @return bool
     */
    public function disabledCatalogMode(): bool
    {
        return !$this->getCatalogModeChecker()->checker();
    }
}
