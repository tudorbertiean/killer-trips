<?php
    session_start();
    include("../php/Cities.php");
    include("../php/Comments.php");
    include("../php/Votes.php");
    $keyword = $_GET["keyword"];
    $cities = Cities::getCitiesByKeyword($keyword)[0];
    $num_cities = Cities::getCitiesByKeyword($keyword)[1];
?>
<!DOCTYPE html>
    <head> 
        <title>List of Cities</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
        <link rel="stylesheet" href="../css/list_cities.css">
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
                <li><a href="/src/php/Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              </ul>
              <?php
            } else{
              ?>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="authentication.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="authentication.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
      <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

      <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
          <div class="col-md-offset-2 col-md-8">
            <h1><?php echo $num_cities ?> Citie(s) Found With Keyword '<?php echo $keyword ?>':</h1>
            <?php
                $arrlength = count($cities);

                for($x = 0; $x < $arrlength; $x++) {
                  // Loop through each city and display
                  $city = $cities[$x];
                  $votescore = Votes::getVotesForCity($city["cityid"]); 
                  $comments = Comments::getNumComments($city["cityid"]);
                  ?>
                  <div class="row">
                    <div class="col-7 col-lg-7 city">
                        <h3><?php echo $city['city']?></h3>
                        <img src=<?php echo "../images/".$city['image']?> alt="" />
                        <p class="description"><?php echo $city['description']?></p>
                        <p class="votescore" style="color: <?PHP echo ($votescore >= 0)? 'green': 'red'; ?>"><?php echo $votescore?></p>
                        <span class="voteicon" style="color: <?PHP echo ($votescore >= 0)? 'green': 'red'; ?>"><i class="glyphicon <?PHP echo ($votescore >= 0)? 'glyphicon-thumbs-up': 'glyphicon-thumbs-down'; ?>"></i></span>
                        <p class="votescore" ><?php echo $comments?></p>
                        <span class="voteicon"><i class="glyphicon glyphicon-envelope"></i></span>                    
                        <p style="float:left;"><a class="btn btn-secondary" href="city.php?cityid=<?php echo $city['cityid']?>" role="button">See more &raquo;</a></p>
                    </div>
                  </div>
                  <hr>
                  <?php
                }                  
              ?>
            </div><!--/row-->
          </div><!--/span-->
        </div><!--/row-->
      </div><!--/.container-->
    </body>
</html>