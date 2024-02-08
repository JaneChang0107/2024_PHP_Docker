<?php
//MachineTraitトレイトを定義
trait MachineTrait{
  private string $starting = "Starting...Run!"."<br>";

  //機器を起動
  public function run():void{
    echo nl2br($this->starting);
  }
}
?>
