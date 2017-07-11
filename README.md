# Magento 1 extension for PHPStan

* [PHPStan](https://github.com/phpstan/phpstan)
* [Magento](https://magento.com)

This extension provides following features:

* Provides correct return type for `Mage::helper()`, `Mage::getModel()`, `Mage::getResourceModel()`, `Mage::getSingleton()`, `Mage_Core_Model_Layout->helper()` methods

## Usage

To use this extension, require it in [Composer](https://getcomposer.org/):

```
composer require BudsiesApp/phpstan-magento
```

And include extension.neon in your project's PHPStan config:

```
includes:
	- vendor/BudsiesApp/phpstan-magento/extension.neon
```
