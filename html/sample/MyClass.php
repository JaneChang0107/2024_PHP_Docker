<?php
class MyClass{
  //それぞれのアクセス権限でプロパティを定義
  public string $pub = 'public';
  protected string $pro = 'protected';
  private string $pri = 'private';

  //プロパティをリスト表示するためのshowPropertyメソッド
  public function showProperty():void{
    foreach ($this as $key => $value){
      echo "{$key}:{$value}<br/>";
    }
  }
}
?>
