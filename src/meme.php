<?php
require_once("parent.php");

class meme extends parentClass {
    public function __construct()
    {
        parent::__construct();
    }

    public function getMemes($limit=null, $offset=null) {
        $sql = "SELECT * FROM memes";
        if (!is_null($offset)){
            $sql .= " LIMIT ?,?";
        }
        $stmt = $this->mysqli->prepare($sql);
        if (!is_null($offset)) {
            $stmt->bind_param("ii", $limit, $offset);
        }
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function meme()
    {
        $memes = "";
        $res = $this->getMemes();
        while($row = $res->fetch_assoc()) {
            $id = $row['idmemes'];
            $url = $row['imageurl'];
            $memes .= "<div class='meme-card'><img src='$url' class='img'><div>Like<span></span></div></div>";
        }
        return $memes;
    }
    
    public function getTotalData()
    {
        return $this->getMemes()->num_rows;
    }

    public function checkLike($username, $memeid) {
        $sql = "SELECT * FROM likes WHERE users_username=? AND memes_idmemes=?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("si", $username, $memeid);
        $stmt->execute();
        $res = $stmt->get_result();

        $btnLike = "";
        if ($res->num_rows == 0) {
            $btnLike = "";
        } else {
            $btnLike = "";
        }
        return $btnLike;
    }

    public function countLikes($memeid)
    {
        $sql = "SELECT COUNT(*) FROM likes WHERE memes_idmemes=?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $memeid);
        $stmt->execute();
        $res = $stmt->get_result();
        $count = 0;
        while ($row = $res->fetch_assoc()) {
            $count = $row[0];
        }
        return $count;
    }
}

?>