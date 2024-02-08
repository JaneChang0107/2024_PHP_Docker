<?php
require_once 'MachineTrait.php';

class Fax{
  //MachineTraitトレイトをインポート
  use MachineTrait;
  //Faxを送信
  public function send():void{
    echo 'sending Fax...Sended!';
  }
}

$fx = new Fax();
$fx->run();
$fx->send();
?>
