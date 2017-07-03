<?php declare(strict_types=1);

namespace PHPStan\Type\Magento\Mage;

use PhpParser\Node\Expr\StaticCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\Type;
use PHPStan\Type\ObjectType;

class HelperDynamicStaticReturnTypeExtension extends AbstractDynamicStaticReturnTypeExtension
{
    public function getTypeFromStaticMethodCall(
        MethodReflection $methodReflection,
        StaticCall $methodCall,
        Scope $scope
    ): Type {
        if(empty($methodCall->args[0]->value->value)) {
            throw new \Exception('Could not fetch helper name from method call');
        }

        $config = $this->getMagentoConfig();

        $helperName = $methodCall->args[0]->value->value;
        $helperClassName = $config->getHelperClassName($helperName);

        return new ObjectType($helperClassName);
    }

    protected function getMethodName(): string
    {
        return 'helper';
    }
}
