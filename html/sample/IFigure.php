<?php
interface IFigure{
  function getArea() :float;
}
?>
<?php
class MyClass {
    const CONST_VALUE = 'A constant value';
}

$classname = 'MyClass';
echo nl2br($classname::CONST_VALUE."\n");
echo MyClass::CONST_VALUE;
?>
