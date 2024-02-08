<?php
require_once 'person.php';
require_once 'FriendList.php';

$list = new FriendList();
$list->add(new Person('APPLE','WANG'));
$list->add(new Person('BANANA','LIN'));
$list->add(new Person('Candy','Chang'));

foreach($list as $value){
  echo $value->show();
}
?>
