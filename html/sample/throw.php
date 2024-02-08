<?php
class MyUtil {
  public static function getContents(string $url):string{
    if(!preg_match('|http(s)?://([\w-]+\.)+[\w-]+(/[\w ./?%&=-]*)?|',$url)){
        throw new InvalidArgumentException('Unvalid URL');
      }
      $data = @file_get_contents($url);
        if(!$data){
        throw new RuntimeException('Can not find URL');
        }  
    return $data;
  }
}

try{
  echo MyUtil::getContents('https://www.google.com');
}catch(RuntimeException|InvalidArgumentException $e){
  echo "error message : {$e->getmessage()}";
}
?>
