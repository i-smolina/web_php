<?php
require_once getenv("DOCUMENT_ROOT") . "/models/db.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include getenv("DOCUMENT_ROOT") . "/views/account.html";
?>