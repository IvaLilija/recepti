<?php
include_once 'db.php';
include_once 'session.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

if (!empty($email) && !empty($pass)) {
    //vse ok
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    //preveri, če uporabnik obstaja in je pravilno geslo
    if ($user && password_verify($pass, $user['pass'])) {
        //vse je ok
        msg('Uspešna prijava', 'success');
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['admin'] = $user['admin'];
        header("Location: index.php");
    }
    else {
        //nepravilen email ali geslo
        header("Location: login.php");
    }
}
else {
    header("Location: login.php");
}

