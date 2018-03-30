<?php
    session_start();
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
            <li><a href="homepage.php">Home</a></li>
          </ul>
          <?php
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
              ?>
            <ul class="nav navbar-nav">
              <li><a href="create.php">Create</a></li>
            </ul>
          <?php
            }
          ?>
          <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                ?>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><?php echo $_SESSION['username'];?></a></li>
                  <li><a href="http://localhost:8080/killer-trips/src/php/Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
                <?php
              } else{
                ?>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="http://localhost:8080/killer-trips/src/views/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                  <li><a href="http://localhost:8080/killer-trips/src/views/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
                <?php
              }
            ?>
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

            <div id="attractionCarousel" class="carousel slide" data-interval="false">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="../images/toronto.jpg">
                  <div class="carousel-caption">
                    <h3>Toronto</h3>
                    <p>Blah blah blah</p>
                  </div>
                </div>
                <div class="item">
                  <img src="../images/vancouver.jpg">
                  <div class="carousel-caption">
                    <h3>Vancouver</h3>
                    <p>Blah blah blah</p>
                  </div>
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#attractionCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#attractionCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

            <h2>Things That May Kill You:</h2>

            <h2>Comments:</h2>
            
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
              $userid = $_SESSION["userid"];
              $cityid = $city["cityid"];
              ?>
              <form role="form" method="post" action="../php/AddComment.php?cityid=<?php echo $cityid?>&userid=<?php echo $userid?>">
                <div class="form-group">
                  <label for="comment">Comment:</label>
                  <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <?php
            }
            ?>

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