<?php 
session_start();
$_SESSION['email'] = $_POST['email'];
// $cparam = session_get_params();
// foreach($cparam as $key => $value)
// {
//   echo $key." has the value". $value. "<br />";
// }
echo "<pre>";
print_r($_SESSION);
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
session is saved
</body>
</html>
