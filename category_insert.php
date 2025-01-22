<?php
include_once "db.php";

$title = $_POST['title'];
$description = $_POST['description'];

if (!empty($title)) {
    $sql = "INSERT INTO categories(title, description) VALUES(?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title,$description]);

    //preusmeritev
    header("Location: categories.php");
    die();
}

header("Location: category_add.php");


?>