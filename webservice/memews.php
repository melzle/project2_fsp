<?php
require_once("../src/meme.php");

header("Access-Control-Allow-Origin: *");

// $limit = 12;
// $offset = $_POST['offset'];

$obj_meme = new meme();
// echo $obj_meme->getMemes($limit, $offset);
echo $obj_meme->meme();
?>