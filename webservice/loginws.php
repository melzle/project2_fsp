<?php
require_once("../src/user.php");

header("Access-Control-Allow-Origin: *");

$username = $_POST['username'];
$password = $_POST['password'];

$obj_user = new user();
$arr = null;
$data = array();
$res = $obj_user->login($username, $password);
if ($res->num_rows > 0) {
    $arr = ["result" => "success", "data" => $username];
} else {
    $arr = ["result" => "error", "message" => "user not found or wrong password"];
}

echo json_encode($arr);
?>