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

namespace Asdoria\SyliusCatalogModePlugin\Model\Aware;

/**
 * Class CatalogModeAwareInterface.
 *
 * @author Philippe Vesin <pve.asdoria@gmail.com>
 */
interface CatalogModeAwareInterface
{
    /**
     * @return bool
     */
    public function isCatalogMode(): bool;

    /**
     * @param bool $catalogMode
     */
    public function setCatalogMode(bool $catalogMode): void;
}
