<?php

declare(strict_types=1);

namespace Asdoria\SyliusCatalogModePlugin\Traits;

/**
 * Class RoutesToCheckTrait.
 * @package Asdoria\SyliusCatalogModePlugin\Traits
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
trait RoutesToCheckTrait
{
    /**
     * @var array
     */
    protected array $routesToCheck = [];

    /**
     * @return array
     */
    public function getRoutesToCheck(): array
    {
        return $this->routesToCheck;
    }

    /**
     * @param array $routesToCheck
     */
    public function setRoutesToCheck(array $routesToCheck): void
    {
        $this->routesToCheck = $routesToCheck;
    }

}
