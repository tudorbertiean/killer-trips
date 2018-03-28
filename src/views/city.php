<?php
    include("../php/Cities.php");
    include("../php/Comments.php");
    $city = Cities::getCityById($_GET["cityid"]); 
    $comments = Comments::getCommentsForCity($_GET["cityid"]);                     
?>
<!DOCTYPE html>
    <head> 
        <title><?php echo $city["city"]?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
        <link rel="stylesheet" href="../css/cities.css">
    </head>
    <body>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Killer Trips</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="http://localhost:8080/killer-trips/">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://localhost:8080/killer-trips/src/views/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="http://localhost:8080/killer-trips/src/views/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
          <form class="navbar-form navbar-left" action="/action_page.php">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </nav>
      <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
          <div class="col-md-offset-2 col-md-8">
            <h1><?php echo $city["city"]?></h1>
            <h4><?php echo $city["country"]?></h4>
            
            <p><?php echo $city["votescore"]?></p>
            <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-thumbs-up"></i>
            </button>
            <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-thumbs-down"></i>
            </button>

            <br>

            <div class="jumbotron" style="background-image: url(../images/<?php echo $city["image"]?>);"></div>
            <h2>Description:</h2>
            <p><?php echo $city["description"]?></p>
            
            <h2>Attractions:</h2>

            <h2>Things That May Kill You:</h2>

            <h2>Yummy Stuff:</h2>

            <h2>Comments:</h2>

            <?php
                $arrlength = count($comments);

                for($x = 0; $x < $arrlength; $x++) {
                    $comment = $comments[$x];
                    include_once("../php/User.php");
                    $user = User::getUserById($comment["userid"]);
                    ?>
                    <div class="row">
                        <div class="panel panel-white panel-shadow">
                            <p><b><?php echo $user["username"]?></b></p>
                            <p><i><?php echo $comment["date"]?></i></p>
                            <p><?php echo $comment["comment"]?></p>
                        </div>
                    </div>
                    <?php
                  } 
            ?>                       
            </div><!--/row-->
          </div><!--/span-->
        </div><!--/row-->
        <hr>
      </div><!--/.container-->
    </body>
</html>