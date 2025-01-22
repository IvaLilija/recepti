<?php
session_start();

if (!isset($_SESSION['user_id'])
    && ($_SERVER['REQUEST_URI'] != '/recepti/login.php')
    && ($_SERVER['REQUEST_URI'] != '/recepti/user_add.php')
    && ($_SERVER['REQUEST_URI'] != '/recepti/login_check.php')) {
    header("Location: login.php");
}