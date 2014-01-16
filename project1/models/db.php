<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);

function insertUser($last_name, $first_name, $middle_name, $email, $password, $sex, $birth, $restore, $answer_restore) {
	$user = "irina";
	$pass = "";
	$db = "project1";

	$mysqli = mysqli_connect("localhost", $user, $pass, $db);
	if ($mysqli) {
		mysqli_set_charset($mysqli, "utf8");
		$query = "INSERT INTO user (lastname, name, middlename, email, password, sex, birth, restore, answer_restore) VALUES ('" .
		 $last_name . "', '" . $first_name . "', '" . $middle_name . "', '" . $email . "', '" . $password . "', '" .
		  $sex . "', '" . $birth . "', '" . $restore . "', '" . $answer_restore . "')";
		$r = mysqli_query($mysqli, $query);
		if ($r){
			echo "OK";
		}
		else {
			echo mysqli_error($mysqli);
		}
	}
}

function findUser($login, $password) {
    $user = "irina";
    $pass = "";
    $db = "project1";
    
    $mysqli = mysqli_connect("localhost", $user, $pass, $db);
    if ($mysqli) {
        mysqli_set_charset($mysqli, "utf8");
        $query = "SELECT * FROM user WHERE email = '".$login."' AND password = '".$password."'";
        $res = mysqli_query($mysqli, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            return $row['name'];
        }
        else return 0;
    }
}
?>