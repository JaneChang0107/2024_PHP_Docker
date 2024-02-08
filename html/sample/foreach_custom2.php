<?php
class PrimeIterator implements Iterator{
  private int $key;
  private int $current;
  private int $max;

  public function __construct(int $max)
  {
    $this->rewind();
    $this->max= $max;
  }

  public function next():void{
    $this->key +=1;
    while(true){
      $this->current++;
      if($this->isPrime($this->current)){
        return;
      }
    }
  }

  public function key(): mixed
  {
    return $this->key;
  }

  public function current()
  {
    return $this->current;
  }

  public function rewind():void{
    $this->key=0;
    $this->current=2;
  }

  public function valid(): bool
  {
    return $this->current()<=$this->max;
  }

  private function isPrime(int $value):bool {
    $count = 0;
    for($i=1;$i<=$value;$i++){
      if($value%$i==0){
        $count++;
    };
    }
    if($count==2){
      return true;
    }else{
      return false;
    }
  }
}  
$pr = new PrimeIterator(100);

foreach ($pr as $p){
  echo "{$p}<br/>";
}


?>
