<?php
session_start();

function isAdmin() {
    $return = false;

    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
        $return = true;
    }
    return $return;
}

if (!isset($_SESSION['user_id'])
    && ($_SERVER['REQUEST_URI'] != '/recepti/login.php')
    && ($_SERVER['REQUEST_URI'] != '/recepti/user_add.php')
    && ($_SERVER['REQUEST_URI'] != '/recepti/login_check.php')) {
    header("Location: login.php");
}
/**
 * @param $msg besedilo sporočila
 * @param $type vrsta sporočila (success, error, warning)
 * @return void
 */
function msg($msg, $type) {
    $_SESSION['msg'] = $msg;
    $_SESSION['type'] = $type;

}