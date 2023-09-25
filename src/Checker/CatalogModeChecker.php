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

use Asdoria\SyliusCatalogModePlugin\Model\Aware\CatalogModeAwareInterface;
use Asdoria\SyliusCatalogModePlugin\Traits\ChannelContextTrait;

/**
 * Class CatalogModeChecker.
 *
 * @author Philippe Vesin <pve.asdoria@gmail.com>
 */
final class CatalogModeChecker implements CatalogModeCheckerInterface
{
    use ChannelContextTrait;

    /**
     * @return bool
     */
    public function checker(): bool
    {
        $channel = $this->channelContext->getChannel();
        if (!$channel instanceof CatalogModeAwareInterface) return false;

        return $channel->isCatalogMode();
    }
}
