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
  class MySingleton{
    private static self $instance;
    private function __construct(){}
    //インスタンスの有無をチェックし、存在しない場合にだけインスタンス化
    public static function getInstance():self{
      if(!isset(self::$instance)){
        self::$instance = new MySingleton();
      }
      return self::$instance;
    }

  }

  $c1 = MySingleton::getInstance();
  $c2 = MySingleton::getInstance();
  var_dump($c1===$c2);

  ?>
</body>
</html>
