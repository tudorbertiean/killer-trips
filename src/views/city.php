<?php
    session_start();
    include("../php/Cities.php");
    include("../php/Attractions.php");
    include("../php/KillInfo.php");
    include("../php/Comments.php");
    include("../php/Votes.php");
    $city = Cities::getCityById($_GET["cityid"]);
    $hasvoted = Votes::hasUserVoted($_GET["cityid"], $_SESSION['userid']);                     
    $votescore = Votes::getVotesForCity($_GET["cityid"]);                     
    $attractions = Attractions::getAttractionsForCity($_GET["cityid"]);                     
    $killinfo = KillInfo::getKillInfoForCity($_GET["cityid"]);                     
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
            <a href="homepage.php" class="navbar-left"><img style="width: 50px; height:50px; margin-right: 10px;" src="../images/logo.jpg"></a>
            <a class="navbar-brand" href="homepage.php">Killer Trips</a>
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
          <form class="navbar-form navbar-left" method="get" action="list_cities.php">
            <div class="input-group">
              <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search">
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
            
            <p class="votescore" style="color: <?PHP echo ($votescore >= 0)? 'green': 'red'; ?>"><?php echo $votescore?></p>
            <span class="voteicon" style="color: <?PHP echo ($votescore >= 0)? 'green': 'red'; ?>"><i class="glyphicon <?PHP echo ($votescore >= 0)? 'glyphicon-thumbs-up': 'glyphicon-thumbs-down'; ?>"></i></span>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                ?>
              <div class="votebuttons">
                <button class="btn btn-default up-button <?PHP echo ($hasvoted == 1)? "disabled hasvoted":(($hasvoted==-1)?"disabled":""); ?>" type="submit">
                    <i class="glyphicon glyphicon-thumbs-up"></i>
                </button>
                <button class="btn btn-default down-button <?PHP echo ($hasvoted == 1)? "disabled":(($hasvoted==-1)?"disabled hasvoted":""); ?>" type="submit">
                    <i class="glyphicon glyphicon-thumbs-down"></i>
                </button>
              </div>
              <?php
            }
            ?>
            <br>
            <br>

            <div class="jumbotron" style="background-image: url(../images/<?php echo $city["image"]?>);"></div>
            <h2>Description:</h2>
            <p><?php echo $city["description"]?></p>
            
            <br>
            <br>

            <h2>Attractions:</h2>
            
            <div id="attractionCarousel" class="carousel slide" data-interval="false">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <?php
                    $arrlength = count($attractions);

                    for($x = 0; $x < $arrlength; $x++) {
                      ?>
                      <li data-target="#myCarousel" data-slide-to="<?php $x ?>" class="<?PHP echo ($x == 0)? 'active': ''; ?>"></li>
                      <?php
                    } 
                ?>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
              <?php
                    $arrlength = count($attractions);

                    for($x = 0; $x < $arrlength; $x++) {
                      $attraction = $attractions[$x];
                      ?>
                      <div class="item <?PHP echo ($x == 0)? 'active': ''; ?>">
                        <img src="../images/attractions/<?php echo $attraction['image'] ?>">
                        <div class="carousel-caption">
                          <h3><?php echo $attraction["name"]?></h3>
                          <p><?php echo $attraction['description'] ?></p>
                        </div>
                      </div>
                    <?php
                    } 
                ?>
                
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
            
            <br>
            <br>
            <br>

            <h2>Things That May Kill You:</h2>
            <div class="row">
              <?php
                $arrlength = count($killinfo);

                for($x = 0; $x < $arrlength; $x++) {
                  $info = $killinfo[$x];
                  ?>
                  <div class="col-6 col-lg-4 city">
                    <strong><span class="badge progress-bar-danger"><?php echo $info['killname']?></span></strong>
                    <p class="kill-description"><?php echo $info['killtext']?></p>
                  </div>
                  <?php
                }                  
              ?>
            </div><!--/row-->      
            
            <br>
            <br>
            
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
                  <button style="margin-top:5px;" type="submit" class="btn btn-primary">Post</button>
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
      <!-- Call rate function in php -->
      <script type="text/javascript">
        $('.up-button').click(function() {
          if ($(this).hasClass('disabled')) {
          }else{
            window.location.href = "http://localhost:8080/killer-trips/src/php/AddRating.php?userid=<?php echo $userid ?>&cityid=<?php echo $cityid ?>&score=1";
          }
        });
        $('.down-button').click(function() {
          if ($(this).hasClass('disabled')) {
          }else{
            window.location.href = "http://localhost:8080/killer-trips/src/php/AddRating.php?userid=<?php echo $userid ?>&cityid=<?php echo $cityid ?>&score=-1";
          }
         });
      </script>
    </body>
</html>