<?php require_once './Encode.php'?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
</head>
<body>
  <table>
  <?php
    foreach($_SERVER as $key => $value){
      if(str_starts_with($key,'HTTP_')){
  ?>
    <tr valign="top">
      <th><?=e($key)?></th>
      <th><?=e($value)?></th>
    </tr>
  <?php
      }
    }
  ?>
  </table>
</body>
</html>
