<?php
include_once "session.php";
include_once 'db.php';
$id = $_GET['id'];
//mora preveriti ob vrednosti
$sql = "DELETE FROM recipes WHERE id = ? and user_id =?";
$stmt = $pdo->prepare($sql);
//dodaš še $_SESSION in s tem je zaščiteno
$stmt->execute([$id, $_SESSION['user_id']]);
//preusmeritev nazaj
header("Location: recipes.php");

