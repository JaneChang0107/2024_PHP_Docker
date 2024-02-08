<?php setcookie('email', $_POST['email'], time() + (60*60*24*90)); 
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
cookie is saved
</body>
</html>
