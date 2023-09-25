<?php

declare(strict_types=1);

namespace Asdoria\SyliusCatalogModePlugin\Traits;

use Asdoria\SyliusCatalogModePlugin\Checker\CatalogModeCheckerInterface;

/**
 * Class CatalogModeCheckerTrait.
 * @package Asdoria\SyliusCatalogModePlugin\Traits
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
trait CatalogModeCheckerTrait
{
    /**
     * @var CatalogModeCheckerInterface|null 
     */
    protected ?CatalogModeCheckerInterface $catalogModeChecker = null;

    /**
     * @return CatalogModeCheckerInterface|null
     */
    public function getCatalogModeChecker(): ?CatalogModeCheckerInterface
    {
        return $this->catalogModeChecker;
    }

    /**
     * @param CatalogModeCheckerInterface|null $catalogModeChecker
     */
    public function setCatalogModeChecker(?CatalogModeCheckerInterface $catalogModeChecker): void
    {
        $this->catalogModeChecker = $catalogModeChecker;
    }   
    
}
