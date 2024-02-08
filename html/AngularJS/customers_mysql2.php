<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$dsn = 'mysql:dbname=test;host=172.19.0.2';
$user = 'test';
$password = 'test';
$db = new PDO($dsn, $user, $password);

$result = $db->query("SELECT UserName, City, Country FROM Northwind");

$rows = $result->fetchAll(PDO::FETCH_ASSOC);
 // Fetch all rows as associative arrays
$json = json_encode($rows, JSON_UNESCAPED_UNICODE);
echo $json;
?>
