<?php
require_once 'MyClass.php';

$cls = new MyClass();

//MyClassオブジェクトのプロパティをリスト表示
foreach ($cls as $key => $value){
  echo "{$key}:{$value}<br/>";
}
echo '<hr/>';
$cls -> showProperty();
?>
