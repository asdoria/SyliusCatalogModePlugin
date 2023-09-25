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

namespace Asdoria\SyliusCatalogModePlugin\Checkout;

use Sylius\Bundle\CoreBundle\Checkout\CheckoutStateUrlGeneratorInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\RequestContext;


/**
 * Class CheckoutStateUrlGenerator
 * @package Asdoria\SyliusCatalogModePlugin\Checkout
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class CheckoutStateUrlGenerator implements CheckoutStateUrlGeneratorInterface
{
    /**
     * @param CheckoutStateUrlGeneratorInterface $inner
     * @param ChannelContextInterface            $channelContext
     */
    public function __construct(
        protected CheckoutStateUrlGeneratorInterface $inner,
        protected ChannelContextInterface $channelContext,
        protected FlashBagInterface $flashBag
    ) {

    }

    public function generateForOrderCheckoutState(
        OrderInterface $order,
        array $parameters = [],
        int $referenceType = self::ABSOLUTE_PATH,
    ): string {
        $channel = $this->channelContext->getChannel();
        if (!$channel instanceof CatalogModeAwareInterface || !$channel->isCatalogMode()) {
            return $this->inner->generateForOrderCheckoutState($order, $parameters, $referenceType);
        }

        return $this->generateForCart($parameters, $referenceType);
    }

    public function generateForCart(array $parameters = [], int $referenceType = self::ABSOLUTE_PATH): string {
        return $this->inner->generateForCart($parameters, $referenceType);
    }

    public function setContext(RequestContext $context): void
    {
        $this->inner->setContext($context);
    }

    public function getContext(): RequestContext
    {
        return $this->inner->getContext();
    }

    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH): string
    {
        return $this->inner->generate($name, $parameters, $referenceType);
    }
}
