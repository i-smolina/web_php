<?php
require_once getenv("DOCUMENT_ROOT") . "/models/db.php";
require_once getenv("DOCUMENT_ROOT") . "/mysql/error_handler.php";
require_once getenv("DOCUMENT_ROOT") . "/mysql/config.php";

session_start();

echo empty($GLOBALS["data"]);
if (empty($GLOBALS["data"])) {
    $data = getRows("SELECT id_t, caption FROM type_decor");
    $size = count($data);
    for ($i = 0; $i < count($data); $i++) {
        $count = getRows("SELECT count(id_d) FROM decor WHERE id_t = " . $data[$i][0]);
        $data[$i][$size] = $count[0][0];
    }
    echo "empty data <br>";
}

if (empty($subdata)) {
    $subdata = getRows("SELECT id_m, matter FROM material");
    $size = count($subdata);
    for ($i = 0; $i < count($subdata); $i++) {
        $count = getRows("SELECT count(id_d) FROM decor WHERE id_m = " . $subdata[$i][0]);
        $subdata[$i][$size] = $count[0][0];
    }
    echo "empty subdata";
}
$condition="";
if (!empty($_REQUEST['type'])) {
    $condition = $condition . " WHERE id_t = " . $_REQUEST['type'];
    if (!empty($_REQUEST['matter']))
        $condition = $condition . " && id_m = " . $_REQUEST['matter'];
}
$products = getRows("SELECT * FROM decor".$condition);

include getenv("DOCUMENT_ROOT") . "/views/account.html";
?>