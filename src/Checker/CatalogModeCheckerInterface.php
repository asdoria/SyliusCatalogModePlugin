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
namespace Asdoria\SyliusCatalogModePlugin\Checker;

/**
 * Class CatalogModeCheckerInterface.
 *
 * @author Philippe Vesin <pve.asdoria@gmail.com>
 */
interface CatalogModeCheckerInterface
{
    /**
     * @return bool
     */
    public function checker(): bool;
}
