<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\CodeQuality\Rector\If_\CompleteMissingIfElseBracketRector;
use Rector\CodeQuality\Rector\If_\ShortenElseIfRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\PHPUnit\AnnotationsToAttributes\Rector\ClassMethod\TestWithAnnotationToAttributeRector;



use Rector\TypeDeclaration\Rector\ArrowFunction\AddArrowFunctionReturnTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . "/src",
        __DIR__ . "/tests"
    ]);

    $rectorConfig->rules([
        TestWithAnnotationToAttributeRector::class,
    ]);

    $rectorConfig->sets([
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        LevelSetList::UP_TO_PHP_82,
        SetList::TYPE_DECLARATION,
        SetList::INSTANCEOF,
        PHPUnitSetList::PHPUNIT_110
    ]);

    $rectorConfig->skip([
        RemoveUselessParamTagRector::class,
        ShortenElseIfRector::class,
        DisallowedEmptyRuleFixerRector::class,
        ClosureToArrowFunctionRector::class,
        AddArrowFunctionReturnTypeRector::class,
        NullToStrictStringFuncCallArgRector::class,
        ClassPropertyAssignToConstructorPromotionRector::class // to avoid declaring parameters as readonly in the constructor
    ]);
};
