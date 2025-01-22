<?php
include_once 'db.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
$city_id = $_POST['city_id'];

//preverjam vnešene podatke
if (!empty($first_name) && !empty($last_name) && !empty($email) &&
    !empty($pass) && !empty($city_id) && ($pass == $pass2)) {
    //vse ok
    $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (first_name, last_name, email, pass, city_id)
VALUES (?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$first_name, $last_name, $email, $pass_hash, $city_id]);

    header("Location: login.php");
}
else {
    //preusmeritev
    header("Location: user_add.php");
}
