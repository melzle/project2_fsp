<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: https://scheday.site/login.php");
}
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
    <link type="image/png" sizes="96x96" rel="icon" href="https://scheday.site/imgs/icons8-trollface-96.png">
</head>
<body>
    <div class="nav">
        <div>
            <form action=""></form>
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

    $("body").on("click", ".btn-like", function() {
        let memeid = $(this).attr("m-id");
        $.post("https://scheday.site/webservice/likews.php", {
            memeid: memeid
        }).done(function(data) {
            var res = JSON.parse(data);
            if (res.result == "success") {
                // alert("Successfully liked a meme");
                // window.location = "https://scheday.site/index.php";
                let offset = $(".active").attr("off");
                $.post("https://scheday.site/webservice/memews.php", {
                    offset: offset
                }).done(function(data) {
                    $("#memes").html(data);
                });
            } else {
                alert("Error. You've liked this meme already.");
            }
        });
    });

    $("body").on("click", "#btnLogout", function(){
        $.post("https://scheday.site/webservice/logoutws.php", {}).done(function(data){
            window.location = "https://scheday.site/login.php";
        });
    });

    $("body").on("click", ".paging", function() {
        let offset = $(this).attr("off");
        $.post("https://scheday.site/webservice/memews.php", {
            offset: offset
        }).done(function(data) {
            $("#memes").html(data);
        });
    });
</script>
</html>