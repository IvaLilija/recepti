<?php

include_once "db.php";


$title = $_POST['title'];
$post_number = $_POST['post_number'];
$id = $_POST['id'];

$sql =  "UPDATE cities SET title=?, post_number=? WHERE id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $post_number, $id]);

//preusmeritev
header("Location: cities.php");
?>