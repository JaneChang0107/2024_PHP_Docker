<?php
class FriendList implements IteratorAggregate{
  public string $version = '1.0.0';
  public string $name ='FriendList';
  private array $list =[];

  public function getIterator(): Traversable
  {
    return new ArrayIterator($this->list);
  }

 public function add(Person $p):void
  {
    $this->list[] = $p;
  }
}
?>
