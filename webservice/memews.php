<?php
session_start();
require_once("../src/meme.php");

header("Access-Control-Allow-Origin: *");

// print_r($_POST);

$limit = 12;
if (isset($_POST['offset'])) {
    $offset = $_POST['offset'];
    if (!is_numeric($offset)) $offset = 0;
} else {
    $offset = 0;
}

$username = $_SESSION['username'];

$obj_meme = new meme();
// echo $obj_meme->getMemes($limit, $offset);

echo $obj_meme->meme($username, $limit, $offset);
?>