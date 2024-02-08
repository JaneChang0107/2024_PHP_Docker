  <?php
  // error_reporting( E_ALL );
  // class Person{

  //   public string $firstName;
  //   public string $lastName;

  //   public function __construct(
  //     string $firstName,
  //     string $lastName)
  //     {}
    
  //   public function show(){
  //     echo "<p>僕の名前は {$this->firstName}{$this->lastName}<p>" ;
  //   }
  // }

  // class FriendList implements IteratorAggregate{
  //   public string $version = '1.0.0';
  //   public string $name ='FriendList';
  //   private array $list =[];
  
  //   public function getIterator(): Traversable
  //   {
  //     return new ArrayIterator($this->list);
  //   }
  
  //  public function add(Person $p):void
  //   {
  //     $this->list[] = $p;
  //   }
  // }

  // $list = new FriendList();
  // $list->add(new Person('APPLE','WANG'));
  // $list->add(new Person('BANANA','LIN'));
  // $list->add(new Person('Candy','Chang'));

  // foreach($list as $value){
  //   echo $value->show();
  // }
  error_reporting( E_ALL );
  class Person{

    public string $firstName;
    public string $lastName;

    public function __construct(
      string $firstName,
      string $lastName)
      {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
      }
    
    public function show(){
      echo "<p>僕の名前は {$this->firstName}{$this->lastName}<p>" ;
    }
  }

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

    public function getFriends():array
    {
      return $this->list;
    }
  }

  $list = new FriendList();
  $list->add(new Person('APPLE','WANG'));
  $list->add(new Person('BANANA','LIN'));
  $list->add(new Person('Candy','Chang'));

  foreach($list as $value){
    echo $value->show();
  }

  echo "<p>友達の名前は：<br>";
  foreach($list->getFriends() as $friend){
    echo $friend->firstName . " " . $friend->lastName . "<br>";
  }

  ?>
