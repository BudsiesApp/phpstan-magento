<?php declare(strict_types=1);

namespace PHPStan\Type\Magento\Mage;

class GetSingletonDynamicStaticReturnTypeExtension extends GetModelDynamicStaticReturnTypeExtension
{
    protected function getMethodName(): string
    {
        return 'getSingleton';
    }
}