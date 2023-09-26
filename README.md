<p align="center">
</p>

![Logo Asdoria](doc/asdoria.jpg)

<h1 align="center">Asdoria Catalog Mode Plugin</h1>

<p align="center">Catalog mode added for sylius shop</p>

## Features

+ Disable checkout to switch sylius shop to catalog mode

## Installation

---
1. run `composer require asdoria/sylius-catalog-mode-plugin`


2. Add the bundle in `config/bundles.php`.

```PHP
Asdoria\SyliusCatalogModePlugin\AsdoriaSyliusCatalogModePlugin::class => ['all' => true],
```
3. Import config in `config/packages/_sylius.yaml`
```yaml
imports:
    - { resource: "@AsdoriaSyliusCatalogModePlugin/config/config.yaml"}
```

4In `src/Entity/Channel/Channel.php`. Import the following classes, traits and methods.

```diff
<?php

declare(strict_types=1);

namespace App\Entity\Channel;

+ use Asdoria\SyliusCatalogModePlugin\Model\Aware\CatalogModeAwareInterface;
+ use Asdoria\SyliusCatalogModePlugin\Traits\CatalogModeTrait;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Channel as BaseChannel;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_channel")
 */
class Channel 
extends BaseChannel 
+ implements CatalogModeAwareInterface
{
    + use CatalogModeTrait;
}
```

5. Override _addToCart.html.twig into `templates/bundles/SyliusShopBundle/Product/Show/_addToCart.html.twig`:
```diff
+ {% if sylius.channel.isCatalogMode() == false %}
    {% set product = order_item.variant.product %}
    
    {% form_theme form '@SyliusShop/Form/theme.html.twig' %}
    
    <div class="ui segment" id="sylius-product-selecting-variant" {{ sylius_test_html_attribute('product-selecting-variant') }}>
        {{ sylius_template_event('sylius.shop.product.show.before_add_to_cart', {'product': product, 'order_item': order_item}) }}
    
        {{ form_start(form, {'action': path('sylius_shop_ajax_cart_add_item', {'productId': product.id}), 'attr': {'id': 'sylius-product-adding-to-cart', 'class': 'ui loadable form', 'novalidate': 'novalidate', 'autocomplete': 'off', 'data-redirect': path(configuration.getRedirectRoute('summary'))}}) }}
        {{ form_errors(form) }}
        <div class="ui red label bottom pointing hidden sylius-validation-error" id="sylius-cart-validation-error" {{ sylius_test_html_attribute('cart-validation-error') }}></div>
        {% if not product.simple %}
            {% if product.variantSelectionMethodChoice %}
                {% include '@SyliusShop/Product/Show/_variants.html.twig' %}
            {% else %}
                {% include '@SyliusShop/Product/Show/_options.html.twig' %}
            {% endif %}
        {% endif %}
        {{ form_row(form.cartItem.quantity, sylius_test_form_attribute('quantity')) }}
    
        {{ sylius_template_event('sylius.shop.product.show.add_to_cart_form', {'product': product, 'order_item': order_item, 'form': form}) }}
    
        <button type="submit" class="ui huge primary icon labeled button" {{ sylius_test_html_attribute('add-to-cart-button') }}><i class="cart icon"></i> {{ 'sylius.ui.add_to_cart'|trans }}</button>
        {{ form_row(form._token) }}
        {{ form_end(form, {'render_rest': false}) }}
    </div>
+ {% endif %}
```

## Demo

You can try the CatalogMode plugin online by following this link: [here!](https://demo-sylius.asdoria.fr/admin/channels).

Note that we have developed several other open source plugins for Sylius, whose demos and documentation are listed on the [following page](https://asdoria.github.io/).




