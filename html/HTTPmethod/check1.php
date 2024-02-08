<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" action="check2.php">
    あなたがよく使う言語は<br />
    <input id="php" type="checkbox" name="lang[]" value="PHP"/>
    <label for="php"/>PHP
    <input id="java" type="checkbox" name="lang[]" value="JAVA"/>
    <label for="java"/>JAVA
    <input id="csharp" type="checkbox" name="lang[]" value="C#"/>
    <label for="csharp"/>C#
    <input type="submit" value="send" />
  </form>
</body>
</html>
