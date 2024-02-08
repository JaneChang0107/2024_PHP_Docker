<?php
  class Person2{
    public function __construct(
    string $firstName,
    string $lastName)
    {}
  }

$p1 = new Person2('りお','やまだ');
// == 同じクラスのインスタンスであること、同じプロパティと値を持つこと
// ===同じクラスの同じインスタンスを参照すること

//オブジェクト変数参照
$p2 = $p1;
var_dump($p2 == $p1);//true
var_dump($p2 ===  $p1);//true

//オブジェクト変数を値渡し（コピー）した場合
$p3 = clone $p1;
var_dump($p1 == $p3);//true
var_dump($p1=== $p3);//false
?>
