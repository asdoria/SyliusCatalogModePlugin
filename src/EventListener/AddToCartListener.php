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
namespace Asdoria\SyliusCatalogModePlugin\EventListener;

use Asdoria\SyliusCatalogModePlugin\Traits\CatalogModeCheckerTrait;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Symfony\Component\Translation\Translator;

/**
 * Class AccessCheckListener.
 *
 * @author Philippe Vesin <pve.asdoria@gmail.com>
 */
class AddToCartListener
{
    use CatalogModeCheckerTrait;
    
    public function __construct(protected Translator $translator) {
    }
    
    /**
     * @param ResourceControllerEvent $event
     * @return void
     */
    public function onCheck(ResourceControllerEvent $event): void
    {
       if (!$this->getCatalogModeChecker()->checker()) return;

       $event->stop($this->translator->trans('asdoria_catalog_mode.channel.catalog_mode_error', 'flashs'));
    }
}
