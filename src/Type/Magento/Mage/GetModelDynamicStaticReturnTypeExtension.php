<?php declare(strict_types=1);

namespace PHPStan\Type\Magento\Mage;

use PhpParser\Node\Expr\StaticCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\Type;
use PHPStan\Type\ObjectType;

class GetModelDynamicStaticReturnTypeExtension extends AbstractDynamicStaticReturnTypeExtension
{
    public function getTypeFromStaticMethodCall(
        MethodReflection $methodReflection,
        StaticCall $methodCall,
        Scope $scope
    ): Type {
        if(empty($methodCall->args[0]->value->value)) {
            throw new \Exception('Could not fetch model name from method call');
        }

        $config = $this->getMagentoConfig();

        $modelName = $methodCall->args[0]->value->value;
        $modelClassName = $config->getModelClassName($modelName);

        return new ObjectType($modelClassName);
    }

    protected function getMethodName(): string
    {
        return 'getModel';
    }
}
