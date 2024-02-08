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

// データベースへの接続を確立する

$dsn = 'mysql:dbname=test;host=192.168.96.3';
$user = 'test';
$password = 'test';
$db = new PDO($dsn,$user,$password);

// 新しいレコードを作成する
if (isset($_POST['create'])) {
  $sql = 'INSERT INTO contacts (name, email) VALUES (:name, :email)';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->execute() ;
}

// Create a form that will allow the user to enter the search criteria
echo '<form action="index.php" method="post">
  <input type="text" name="search" placeholder="Search">
  <input type="submit" value="Search">
</form>';

// Use the search criteria to query the database
if (isset($_POST['search'])) {
  $sql = 'SELECT * FROM contacts WHERE name LIKE "%' . $_POST['search'] . '%"';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $results = $stmt->fetchAll();
  if (!$results) {
  echo '<p>No results found.</p>';
  }
}

// レコードを更新する
if (isset($_POST['update'])) {
  $sql = 'UPDATE contacts SET name = :name, email = :email WHERE id = :id';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':id', $_GET['id']);
  $stmt->execute();
}

// レコードを削除する
if (isset($_POST['delete'])) {
  $sql = 'DELETE FROM contacts WHERE id = :id';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
  $stmt->execute();
}
?>

<form action="index.php" method="post">
  <input type="text" name="name" placeholder="Name">
  <input type="email" name="email" placeholder="Email">
  <input type="submit"name="create" value="Create">
</form>

<?php if (isset($results)): ?>
<?php foreach ($results as $results): ?>
  <form action="index.php?id=<?php echo $results['id']; ?>" method="post">
  <?php echo $results['id']; ?>
  <input type="text" name="name" value="<?php echo $results['name']; ?>" placeholder="Name">
  <input type="email" name="email" value="<?php echo $results['email']; ?>" placeholder="Email">
  <input type="submit" name="update" value="Update">
  <input type="submit" name="delete" value="Delete">
  <br/>
</form>
<?php endforeach; ?>
<?php endif; ?>
</body>

</body>
