<html>
<head><title>PHP TEST</title></head>
<body>

<?php

$dsn = 'mysql:dbname=test;host=172.20.0.1';
$user = 'test';
$password = 'test';

try{
    $dbh = new PDO($dsn, $user, $password);

    print('<br>');

    if ($dbh == null){
        print('接続に失敗しました。<br>');
    }else{
        print('接続に成功しました。<br>');
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>

</body>
</html>
