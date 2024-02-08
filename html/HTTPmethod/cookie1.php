<?php require_once'./Encode.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" action="cookie2.php">
    Email<br />
    <input id="email" type="text" name="email" size="40" value="<?=e($_COOKIE['email']??'')?>" />
    <input type="submit" value="send" />
  </form>
</body>
</html>
