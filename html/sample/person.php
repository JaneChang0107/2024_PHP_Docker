<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
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

    //指定のメソッドを登録
    // public function __set(string $name,Closure $method):void
    // {
    //   $this->methods[$name] = $method->bindTo($this, self::class);
    // }
   //動的に登録されたメソッドを実行
    // public function __call(string $name,array $args)
    // {
    //methodsプロパティに未登録のメソッドはエラー
  //   if(!array_key_exists($name,$this->methods)){
  //     throw new Exception("$name method is not existd.");
  //   }
  //   return $this->methods[$name](...$args);
  //   } 
  // }
  // $p = new Person();
  // $p->lastName='YAMADA';
  // $p->firstName='TARO';

  
  // $p->bye = function() : void {
  //   echo "{$this->lastName}{$this->firstName}さん、さようなら！"."</br>";
  // };
  
  // $p->bye();

  ?>
  <?php
  //コンストラクター
  class Person2{
    public function __construct(
    string $firstName,
    string $lastName)
    {}
  }
  ?>
  <?php
  class Area{
    //静的プロパティ
    public static float $pi = 3.14;
    //静的メソッド
    public static function circle(float $radius):float{
      return pow($radius,2)*3.14;
    }
    public static function circle2(float $radius):float{
      return pow($radius,2)*self::$pi;
    }
  }
  // echo "円周率:".Area::$pi."</br>";
  // echo "円の面積:".Area::circle(10)."cm^2";
  ?>
</body>
</html>
