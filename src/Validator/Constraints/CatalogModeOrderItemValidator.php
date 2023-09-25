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

namespace Asdoria\SyliusCatalogModePlugin\Validator\Constraints;

use Asdoria\SyliusCatalogModePlugin\Checkout\CatalogModeAwareInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Core\Model\OrderItemInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class CatalogModeOrderItemValidator.
 * @package Asdoria\SyliusCatalogModePlugin\Constraints
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class CatalogModeOrderItemValidator extends ConstraintValidator
{
    /**
     * @param ChannelContextInterface $channelContext
     */
    public function __construct(protected ChannelContextInterface $channelContext)
    {
    }

    /**
     * @param mixed      $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$value instanceof OrderItemInterface) return;

        $channel = $this->channelContext->getChannel();
        if (!$channel instanceof CatalogModeAwareInterface) return;

        if (!$channel->isCatalogMode()) return;

        $this->context->buildViolation($constraint->message)
            ->addViolation();
    }
}
