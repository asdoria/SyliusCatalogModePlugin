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
use Asdoria\SyliusCatalogModePlugin\Traits\CatalogModeCheckerTrait;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Webmozart\Assert\Assert;

/**
 * Class CatalogModeOrderItemValidator.
 * @package Asdoria\SyliusCatalogModePlugin\Constraints
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class CatalogModeOrderItemValidator extends ConstraintValidator
{
    use CatalogModeCheckerTrait;

    /**
     * @param mixed      $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {

        /** @var CatalogModeOrderItem $constraint */
        Assert::isInstanceOf($constraint, CatalogModeOrderItem::class);
        
        if (!$this->getCatalogModeChecker()->checker()) return;

        $this->context->buildViolation($constraint->message)
            ->addViolation();
    }
}
