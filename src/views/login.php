<!DOCTYPE html>
    <head> 
        <title>Login</title>
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body >
        <div id="header">
            <div id="left">
                <img src="../images/logo.jpg" alt="logo" class="image">
            </div>
            <div id="login">
                <label class="loginLabel">User Login</label>
                <form method="post">
                    <p>
                        <label for ="strUsername" class = "inputLabel">Username: </label>
                        <input type="text" name="strUsername" id="strUsername"></input></p>
                    <p>
                        <label for ="strPassword" class = "inputLabel">Password: </label>
                        <input type="password" name="strPassword" id="strPassword"></input></p>
                    <p> <input type ="submit" value = "Submit" name="submit"> </p>
                    <label class="loginLabel">Register:
                        <href>
                            <a href="register.php">New users click here to register</a>
                        </href>
                    </label>
                </form>
            </div>
            <div id="middle">
                <h1 id="title">Killer Trips</h1>
            </div>

        </div>

        <hr id="headerEnd" color="red" size="10">

        <label class = "inputLabel">Cities to come .....</label>
    </body>
    <?php
        include("../php/Authenticate.php");

        if(isset($_POST["strUsername"]) && isset($_POST["strPassword"])){
            if(Authenticate::login($_POST["strUsername"],$_POST["strPassword"])){
                header("location: http://localhost:8080/killer-trips/src/views/homepage.php");
            }
            else{
                $_SESSION['loggedin'] = false;
                header("location: register.php");
            }
        }
    ?>
</html>