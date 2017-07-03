<?php declare(strict_types=1);

namespace PHPStan\Type\Magento\Mage;

use PhpParser\Node\Expr\StaticCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\Type;
use PHPStan\Type\ObjectType;

class GetResourceModelDynamicStaticReturnTypeExtension extends AbstractDynamicStaticReturnTypeExtension
{
    public function getTypeFromStaticMethodCall(
        MethodReflection $methodReflection,
        StaticCall $methodCall,
        Scope $scope
    ): Type {
        if(empty($methodCall->args[0]->value->value)) {
            throw new \Exception('Could not fetch resource model name from method call');
        }

        $config = $this->getMagentoConfig();

        $modelName = $methodCall->args[0]->value->value;
        $resourceModel = $config->getResourceModelInstance($modelName);

        $resourceModelClassName = get_class($resourceModel);

        return new ObjectType($resourceModelClassName);
    }

    protected function getMethodName(): string
    {
        return 'getResourceModel';
    }
}