# Magento 1 extensions for PHPStan

* [PHPStan](https://github.com/phpstan/phpstan)
* [Doctrine](https://magento.com)

This extension provides following features:

* Provides correct return type for `Mage::helper()`, `Mage::getModel()`, `Mage::getResourceModel()`, `Mage::getSingleton()` methods

## Usage

To use this extension, require it in [Composer](https://getcomposer.org/):

```
composer require elluminatte/phpstan-magento
```

And include extension.neon in your project's PHPStan config:

```
includes:
	- vendor/elluminatte/phpstan-magento/extension.neon
```
