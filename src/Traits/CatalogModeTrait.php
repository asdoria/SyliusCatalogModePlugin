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

namespace Asdoria\SyliusCatalogModePlugin\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class CatalogModeTrait.
 *
 * @author Philippe Vesin <pve.asdoria@gmail.com>
 */
trait CatalogModeTrait
{
    /**
     * @ORM\Column(name="catalog_mode", type="boolean", nullable=false, options={"default" : false})
     */
    protected bool $catalogMode = false;

    /**
     * @return bool
     */
    public function isCatalogMode(): bool
    {
        return $this->catalogMode;
    }

    /**
     * @param bool $catalogMode
     *
     * @return void
     */
    public function setCatalogMode(bool $catalogMode): void
    {
        $this->catalogMode = $catalogMode;
    }
}
