<?php
/**
 * main.php
 *
 * @since 2018/09/18
 */
session_start();

require './database.php';
$login_user = $_SESSION['login_user'];

if (empty($_SESSION['count'])) {
  $_SESSION['count'] = 1;
} else {
  $_SESSION['count']++;
}
?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php foreach ($login_user as $key => $val) : ?>
            <p><?php echo h($key); ?> : <?php echo h($val); ?></p>
        <?php endforeach; ?>
    </body>

    <p>
    こんにちは、あなたがこのページに来たのは <?php echo $_SESSION['count']; ?> 回目ですね。
    </p>

    <p>
    ログアウト、<a href=logout.php>ここをクリック</A>
    してください。
    </p>

</html>
