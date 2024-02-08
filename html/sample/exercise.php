<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP</title>
</head>
<body>
<?php
echo 'helloworld'.'<br />';
//$1data;
$HOGE_FOO='HOGE_FOO'.'<br />';
echo $HOGE_FOO;
$文字列='文字列'.'<br />';
echo $文字列;
$if='if';
echo $if;
//$data-store='data-store';
?>
<p>================================</p>
<?php
$x='title';
$title='PHP: Hypertext Preprocessor';
echo $$x;
?>
<p>================================</p>
<?php
const TAX = 1.1;
$price = 1000;
$sum = $price * TAX;
echo $sum;
?>
<p>================================</p>
<?php
echo '__FILE__'.__FILE__.'<br />'; 
echo '__DIR__'.__DIR__.'<br />';
echo '__LINE__'.__LINE__.'<br />';
echo '__FUNCTION__'.__FUNCTION__.'<br />';
echo '__CLASS__'.__CLASS__.'<br />';
echo '__METHOD__'.__METHOD__.'<br />';
echo '__TRAIT__'.__TRAIT__.'<br />';
echo '__NAMESPACE__'.__NAMESPACE__.'<br />';
echo 'DIRECTORY_SEPARATOR='.DIRECTORY_SEPARATOR.'<br />';
echo 'PATH_SEPARATOR='.PATH_SEPARATOR.'<br />';
echo 'PHP_VERSION='.PHP_VERSION.'<br />';

//const $VALUE=0;
//const 1MORE=0;
//const STAR-X=0;
const data=0;
//const if=0;

//deta type
$bool1=true;
$bool2=false;//0,-0,0.0,-0.0,null
$int1=12345;
$int2=0x1234;
$int3=0644;
$int4=0xff;
$float1=1.14142e10;
$pi=3.141_592_653_59;
$float2=0.123_456e10;
$string1='He\'s a "GREAT" teacher!!';
$title='T8S';
$string2="サポートサイト\t[{$title}]へ</br>";
$string3='サポートサイト\t[{$title}]へ</br>';
echo $string2;
echo $string3;
?>
<p>================================</p>
<?php
$arr1=[
  'Amy'=>'Apple',
  'John'=>'Banana',
  'Mary'=>'Lemon',
  'Mark'=>'Orange'
];
echo $arr1['Mary'].'</br>';
$arr2=[
  [
    'name'=>'Yamada',
    'age'=>28,
    'sex'=>'男'
  ],
  [
    'name'=>'Suzuki',
    'age'=>30,
    'sex'=>'男'
  ],
  [
    'name'=>'Satou',
    'age'=>25,
    'sex'=>'女'
  ],
];
foreach ($arr2 as $key=>$value){
  echo "{$value['name']}".'</br>';
  echo "{$value['age']}".'</br>';
  echo "{$value['sex']}".'</br>';
}
foreach ($arr2 as ['name'=>$name,'age'=>$age,'sex'=>$sex]){
  echo "名前:$name,$age 才,$sex 性".'</br>'; 
}
$data1='Wings project'; 
$data2='ＷＩＮＧＳプロジェクト';
$data3='Fußball';
echo mb_strlen($data1).'</br>';
echo mb_convert_case($data1,CASE_UPPER).'</br>'; 
echo mb_convert_case($data1,MB_CASE_LOWER).'</br>';
echo mb_convert_case($data1,MB_CASE_TITLE).'</br>';
echo mb_convert_case($data2,MB_CASE_LOWER).'</br>';
echo mb_convert_case($data3,MB_CASE_UPPER).'</br>';
echo mb_convert_case($data3,MB_CASE_UPPER_SIMPLE).'</br>';

echo mb_substr($data2,5,2).'</br>';
echo mb_substr($data2,5).'</br>';
echo mb_substr($data2,5,-4).'</br>';
echo mb_substr($data2,-6,2).'</br>';

$data4='WINGSプロジェクト';
echo mb_strstr($data4,'S',true).'</br>';
echo mb_strstr($data4,'S').'</br>';
echo mb_strstr($data4,'M',false).'</br>';

$data5='にわにはにわにわとりがいる';
echo str_replace('にわ','ニワ',$data5,$cnt).'</br>';
//ニワにはニワニワとりがいる
echo "{$cnt}個の置き換えをしました。".'</br>';
//3個の置き換えをしました。\\\\
?>
<p>================================</p>
<?php
$str=['PHPは良い言語です。','PHPは良いサーバー実行環境です。'];
$src=['PHP','良い'];
$rep=['PHP 8','素晴らしい'];
print_r(str_replace($src,$rep,$str,$cnt));
echo '&lt;br&gt;';
//Array 
//( [0] => PHP 8は素晴らしい言語です。 
//  [1] => PHP 8は素晴らしいサーバー実行環境です。 )
echo  "{$cnt}個の置き換えをしました。";
//  4個の置き換えをしました。
echo '<br>'
?>
<p>================================</p>
<?php
$data='リオとニンザブロウとナミとリンリン';
echo '①-';
print_r(explode('と',$data));
//①-Array ( [0] => リオ [1] => ニンザブロウ [2] => ナミ [3] => リンリン )
echo '<br>';
echo '②-';
print_r(explode('や',$data));
//②-Array ( [0] => リオとニンザブロウとナミとリンリン )
echo '<br>';
echo '③-';
print_r(explode('と',$data,2));
//③-Array ( [0] => リオ [1] => ニンザブロウとナミとリンリン )
echo '<br>';
echo '④-';
print_r(explode('と',$data,-2));
//④-Array ( [0] => リオ [1] => ニンザブロウ )
?>
<p>================================</p>
<?php
$data=['山田','賀谷','柊','本田','矢吹'];
echo count($data);
//5
?>
<p>================================</p>
<?php
$data=['い','ろ','は','に','ほ','へ','と','い','ろ'];
print_r(array_count_values($data));
//Array ( [い] => 2 [ろ] => 2 [は] => 1 [に] => 1 [ほ] => 1 [へ] => 1 [と] => 1 )
?>
<p>================================</p>
<?php
$arr1=[1,3,5];
$arr2=[2,4,6];
$result=array_merge($arr1,$arr2);
print_r($result);
//Array ( [0] => 1 [1] => 3 [2] => 5 [3] => 2 [4] => 4 [5] => 6 )
echo '<p>================================</p>'
?>
<p>================================</p>
<?php
//キーが同じ「文字列」の場合に上書き
$assoc1=['Apple' => 'Red' , 'Orange' => 'Yellow' , 'Melon' => 'Green' ];
$assoc2=['Grape'=>'Purple','Apple'=>'Green','Strawberry'=>'Red'];
$result=array_merge($assoc1,$assoc2);
print_r($result);
//Array ( [Apple] => Green [Orange] => Yellow [Melon] => Green [Grape] => Purple [Strawberry] => Red )
?>
<p>================================</p>
<?php
//キーが同じ場合に上書き・多次元配列も処理
$result=array_merge_recursive($assoc1,$assoc2);
print_r($result);
//Array ( [Apple] => Array ( [0] => Red [1] => Green ) 
//        [Orange] => Yellow 
//        [Melon] => Green
//        [Grape] => Purple
//        [Strawberry] => Red )
?>
<p>================================</p>
<?php
$data=['い','ろ','は','に','ほ','へ','と','い','ろ'];
echo implode($data);
//いろはにほへといろ
?>
<p>================================</p>
<?php
$data=['高江','青木','片渕'];

echo array_push($data,'山田','土井').'</br>';//末尾に追加
//5
print_r($data).'</br>';
//Array ( [0] => 高江 [1] => 青木 [2] => 片渕 [3] => 山田 [4] => 土井 )
echo '<br>';


echo array_pop($data).'</br>';//末尾から削除
//土井
print_r($data).'</br>';
//Array ( [0] => 高江 [1] => 青木 [2] => 片渕 [3] => 山田 ) 


echo array_shift($data).'</br>';//先頭から削除
//土井
print_r($data).'</br>';
//Array ( [0] => 青木 [1] => 片渕 [2] => 山田 )


echo array_unshift($data,'掛谷','横塚','上垣',).'</br>';//先頭に追加
//6
print_r($data);
//Array ( [0] => 掛谷 [1] => 横塚 [2] => 上垣 [3] => 青木 [4] => 片渕 [5] => 山田 )
?>
<?php
// class Person{
//   public string $firstName;
//   public string $lastName;

//   //追加のメソッド群を格納する配列
//   private array $methods=[];
//   //指定のメソッドを登録
//   public function __set(string $name,Closure $method):void
//   {
//     $this->methods[$name] = $method->bindTo($this, self::class);
//   }
//  //動的に登録されたメソッドを実行
//  public function __call(string $name,array $args):mixed
//  {
//   //methodsプロパティに未登録のメソッドはエラー
//   if(!array_key_exists($name,$this->methods)){
//     throw new Exception("$name method is not existd.");
//   }
//   return $this->methods[$name](...$args);
//  } 
//   // public function show():void{
//   //    echo "<p>僕の名前は{$this->firstName}　{$this->lastName}です。<p>" ;
//   // }
// }
// $p1 = new Person();
// $p1->lastName='YAMADA';
// $p1->firstName='TARO';

// //$p1->show();

// $p1->bye=function():void{
//   echo "{$this->lastname}{$this->firstname}さん、さようなら！";
// };

// $p1->bye();
// $p2 = new Person();
// $p2->lastName='SUZUKI';
// $p2->firstName='HANAKO';

// echo "<p>僕の名前は{$p1->firstName}　{$p1->lastName}です。<p>" ;
// echo "<p>私の名前は{$p2->firstName}　{$p2->lastName}です。<p>"

?>
<?php
class Person{
  public string $firstName;
  public string $lastName;
//追加のメソッド群を格納する配列
  private array $methods=[];
  //指定のメソッドを登録
  public function __set(string $name,Closure $method):void
  {
    $this->methods[$name] = $method->bindTo($this, self::class);
  }
 //動的に登録されたメソッドを実行
 public function __call(string $name,array $args):mixed{
  //methodsプロパティに未登録のメソッドはエラー
  if(!array_key_exists($name,$this->methods)){
    throw new Exception("$name method is not existd.");
  }
  return $this->methods[$name](...$args);
 } 
}
$p= new Person();
$p->lastName='YAMADA';
$p->firstName='TARO';

//$p1->show();

$p->bye=function():void{
  echo "{$this->lastname}{$this->firstname}さん、さようなら！";
};

$p->bye();

?>
</body>
</html>
