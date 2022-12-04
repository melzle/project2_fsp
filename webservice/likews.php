<?php
session_start();
require_once("../src/meme.php");

header("Access-Control-Allow-Origin: *");

$arr = null;
if (isset($_POST['memeid'])) {
    // $username = $_SESSION['username'];
    $username = "bam";
    $memeid = $_POST['memeid'];
    $obj_meme = new meme();
    $aff_rows = $obj_meme->likeMeme($username, $memeid);
    if ($aff_rows > 0) {
        $arr = ["result" => "success"];
    } else {
        $arr = ["result" => "error"];
    }
    echo json_encode($arr);
} 
?>