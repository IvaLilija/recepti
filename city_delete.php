<?php

include_once 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM cities WHERE id = ?";
$stmt = $pdo->prepare($sql);

$stmt->execute([$id]);
// preusmeritev nazaj
header('Location: cities.php');