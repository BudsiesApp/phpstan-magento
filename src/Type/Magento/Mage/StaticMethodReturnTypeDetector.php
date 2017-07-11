<?php declare(strict_types=1);

namespace PHPStan\Type\Magento\Mage;

use PhpParser\Node\Expr\StaticCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\Type;

abstract class StaticMethodReturnTypeDetector implements \PHPStan\Type\DynamicStaticMethodReturnTypeExtension
{

    public static function getClass(): string
    {
        return \Mage::class;
    }

    public function isStaticMethodSupported(
        MethodReflection $methodReflection
    ): bool {
        return $methodReflection->getName() === $this->getMethodName();
    }

    abstract public function getTypeFromStaticMethodCall(
        MethodReflection $methodReflection,
        StaticCall $methodCall,
        Scope $scope
    ): Type;

    abstract protected function getMethodName(): string;

    protected function getMagentoConfig(): \Mage_Core_Model_Config
    {
        return \Mage::app()->getConfig();
    }
}
