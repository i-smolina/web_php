<?php
require_once getenv("DOCUMENT_ROOT") . "/models/db.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if (!empty($_REQUEST['action']) && ($_REQUEST['action']) == 'logout') {
    $_SESSION = array();
    unset($_COOKIE[session_name()]);
    session_destroy();
}
$is_fail = FALSE;
if (!empty($_REQUEST['doLogin'])) {
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    $res = findUser($login, $password);
    if ($res) {
        $_SESSION['user'] = $res;
        $dir = dirname($_SERVER['SCRIPT_NAME']);
        header("Location: $dir/account.php");
        exit();
    }
    else {
        $is_fail = TRUE;       
    }
}

include getenv("DOCUMENT_ROOT") . "/views/login.html";
?>