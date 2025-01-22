<?php
include_once 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM categories WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
//preusmeritev nazaj
header("Location: categories.php");