<?php
session_start();

// if (!isset($_SESSION['username'])) {
//     header("location: https://scheday.site/login.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meme</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="nav">
        <div>
            <button id="btnLogout">Logout</button>
        </div>
    </div>
    <div class="container">
        <div id="memes"></div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $.post("https://scheday.site/webservice/memews.php", {
        }).done(function(data) {
            $("#memes").html(data);
        });
    });

    $("body").on("click", ".btn-like", function(e) {
        let memeid = $(this).attr("m-id");
        $.post("https://scheday.site/webservice/likews.php", {
            memeid: memeid
        }).done(function(data) {
            var res = JSON.parse(data);
            if (res.result == "success") {
                alert("Successfully liked a meme");
                location.href=location.href;
            } else {
                alert("Error liking meme");
            }
        });
    });
</script>
</html>