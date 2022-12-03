<?php
require_once("parent.php");

class user extends parentClass {
    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }
}

?>