<?php
include_once 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM recipes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
//preusmeritev nazaj
header("Location: recipes.php");