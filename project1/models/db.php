<?php
header('Content-Type: text/html; charset=utf-8');

function insertUser($last_name, $first_name, $middle_name, $email, $password, $sex, $birth, $restore, $answer_restore) {
    $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if ($mysqli) {
        mysqli_set_charset($mysqli, "utf8");
        $query = "INSERT INTO user (lastname, name, middlename, email, password, sex, birth, restore, answer_restore) VALUES ('" . $last_name . "', '" . $first_name . "', '" . $middle_name . "', '" . $email . "', '" . $password . "', '" . $sex . "', '" . $birth . "', '" . $restore . "', '" . $answer_restore . "')";
        $r = mysqli_query($mysqli, $query);
        if ($r) {
            echo "OK";
        } else {
            echo mysqli_error($mysqli);
        }
        mysqli_close($mysqli);
    }
}

function findUser($login, $password) {
    $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if ($mysqli) {
        mysqli_set_charset($mysqli, "utf8");
        $query = "SELECT * FROM user WHERE email = '" . $login . "' AND password = '" . $password . "'";
        $res = mysqli_query($mysqli, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            return $row['name'];
        } else
            return 0;
    }
}

function getRows($query) {
    $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if ($mysqli) {
        mysqli_set_charset($mysqli, "utf8");
        $res = mysqli_query($mysqli, $query);
        $data=array();
        while ($row = mysqli_fetch_row($res)) {
            $data[] = $row;
        }
        mysqli_close($mysqli);
        return $data;
    }
}

?>