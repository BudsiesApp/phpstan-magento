<?php declare(strict_types=1);

namespace PHPStan\Type\Magento\Mage;

use PhpParser\Node\Expr\StaticCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\Type;
use PHPStan\Type\ObjectType;

class GetModel extends StaticMethodReturnTypeDetector
{
    public function getTypeFromStaticMethodCall(
        MethodReflection $methodReflection,
        StaticCall $methodCall,
        Scope $scope
    ): Type {
        if(empty($methodCall->args[0]->value->value)) {
            return new ObjectType(\Mage_Core_Model_Abstract::class);
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
