<?php declare(strict_types=1);

namespace PHPStan\Type\Magento\Mage;

class GetSingleton extends GetModel
{
    protected function getMethodName(): string
    {
        return 'getSingleton';
    }
}