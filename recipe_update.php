<?php
include_once "session.php";
include_once "db.php";

$user_id = $_SESSION['user_id'];

$id = $_POST['id'];
$title = $_POST['title'];
$category_id = (int) $_POST['category_id'];
$description = $_POST['description'];
$duration = (int) $_POST['duration'];
$level = (int) $_POST['level'];
$number_of_people = (int) $_POST['number_of_people'];
$proceedings = $_POST['proceedings'];
$ingredients = $_POST['ingredients'];

$sql = "UPDATE recipes SET
                title=?, category_id=?, description=?, duration=?, level=?, number_of_people=?, proceedings=?, ingredients=?, user_id=?
                WHERE id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title,$category_id,$description,$duration,$level,$number_of_people,$proceedings,$ingredients,$user_id, $id]);

header("Location: recipes.php");