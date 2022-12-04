<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body class="flex-center vh-100">
    <div class="card">
        <h1>Log In</h1>
        <div class="inputs">
            <input type="text" name="" id="txtUsername" placeholder="Username" autofocus>
            <input type="password" name="" id="txtPass" placeholder="Password">
            <button id="btnLogin">Login</button>
        </div> 
    </div>
</body>
<script>
    $("body").on("click", "#btnLogin", function() {
        let username = $("#txtUsername").val();
        let password = $("#txtPass").val();

        if (username != "" && password != "") {
            $.post("https://scheday.site/webservice/loginws.php", {
                username: username,
                password: password
            }).done(function(data) {
                let response = JSON.parse(data);
                if (response.result == "success") {
                    window.location = "index.php";
                } else {
                    alert("Wrong Username or Password");
                }
            });
        } else {
            alert("Username and/or Password can't be empty.")
        }
        
    });
</script>
</html>