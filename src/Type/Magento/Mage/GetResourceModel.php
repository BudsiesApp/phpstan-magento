<?php declare(strict_types=1);

namespace PHPStan\Type\Magento\Mage;

use PhpParser\Node\Expr\StaticCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\Type;
use PHPStan\Type\ObjectType;

class GetResourceModel extends StaticMethodReturnTypeDetector
{
    public function getTypeFromStaticMethodCall(
        MethodReflection $methodReflection,
        StaticCall $methodCall,
        Scope $scope
    ): Type {
        if(empty($methodCall->args[0]->value->value)) {
            return new ObjectType(\Mage_Core_Model_Resource::class);
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