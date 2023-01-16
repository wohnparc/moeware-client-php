<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

test('all getters & setters', function () {

  /** @var TestCase $test */
  $test = $this;
  $className = substr(get_class($this), 0, -4);
  if (!class_exists($className)) {
    throw new RuntimeException(sprintf('Class %s not found, cannot test getters/setters', $className));
  }

  $testedObject = $test
    ->getMockBuilder($className)
    ->disableOriginalConstructor()
    ->setMethods(null)
    ->getMock();

  $refClass = new ReflectionClass($className);

  $testableMethods = [];
  foreach ($refClass->getProperties() as $refProperty) {
    $propertyName = $refProperty->getName();
    $getterName = 'get'.ucfirst($propertyName);
    $setterName = 'set'.ucfirst($propertyName);
    if ($refClass->hasMethod($getterName) && $refClass->hasMethod($setterName)) {
      $testableMethods[] = [$getterName, $setterName];
    }
  }

  foreach ($testableMethods as list($getterName, $setterName)) {
    $refSetter = new ReflectionMethod($className, $setterName);
    $refParams = $refSetter->getParameters();
    if (1 === count($refParams)) {
      $refParam = $refParams[0];
      $expectedValues = [];
      $expectedValues[] = $this->getParamMock($refParam->getType());
      if ($refParam->allowsNull() && null !== $refParam->getType()) {
        $expectedValues[] = null;
      }
      foreach ($expectedValues as $expectedValue) {
        $testedObject->{$setterName}($expectedValue);
        $actualValue = $testedObject->{$getterName}();

        $message = sprintf(
          'Expected %s() value to equal %s (set using %s), got %s',
          $getterName,
          print_r($expectedValue, 1),
          $setterName,
          print_r($actualValue, 1)
        );

        $test->assertEquals($expectedValue, $actualValue, $message);
      }
    }
  }

//  expect($result->toRaw())->toBe($output);

});

private function getParamMock(ReflectionType $refType)
{
  /** @var TestCase $test */
  $test = $this;

  $type = $refType->getName();
  if (interface_exists($type)) {
    return $test->getMockBuilder($type)->getMockForAbstractClass();
  }

  switch ($type) {
    case 'NULL':
      return 'null';
    case 'boolean':
      return (bool)rand(0, 1);
    case 'integer':
      return random_int(1, 100);
    case 'string':
      return str_shuffle('abcdefghijklmnopqrstuvxyz0123456789');
    case 'array':
      return [];
    default:
      return $test->getMockBuilder($refType)->disableOriginalConstructor()->getMock();
  }
}
