<?php
require_once getenv("DOCUMENT_ROOT") . "/models/db.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

if (!empty($_REQUEST['doAdd'])) {
	$last_name = $_REQUEST['last_name'];
	$first_name = $_REQUEST['first_name'];
	$middle_name = $_REQUEST['middle_name'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$sex = 'F';
	$birth = $_REQUEST['dob_year'] . '-' . $_REQUEST['dob_month'] . '-' . $_REQUEST['dob_day'];
	$restore = $_REQUEST['restore'];
	$answer_restore = $_REQUEST['answer_restore'];
	insertUser($last_name, $first_name, $middle_name, $email, $password, $sex, $birth, $restore, $answer_restore);
}

include getenv("DOCUMENT_ROOT") . "/views/register.html";
?>