<!DOCTYPE html>
    <head> 
        <title>Killer Trips</title>
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
            <li class="active"><a href="#">Home</a></li>
          </ul>
          <?php
            session_start();
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
      <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

      <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
          <div class="col-md-offset-2 col-md-8">
            <h1>Welcome to Killer Trips!</h1>
            <div class="jumbotron" style="background-image: url(../images/toronto-skyline.jpg"></div>
            <h2>View the most recent city entries below:</h2>
            <div class="row">
              <?php
                include_once("../php/Cities.php");
                $cities = Cities::getNumCities();
                $arrlength = count($cities);

                for($x = 0; $x < $arrlength; $x++) {
                  $city = $cities[$x];
                  ?>
                  <div class="col-6 col-lg-4 city">
                    <h3><?php echo $city['city']?></h3>
                    <img src=<?php echo "../images/".$city['image']?> alt="" />
                    <p class="description"><?php echo $city['description']?></p>
                    <p style="color:green;float:left;"><?php echo $city['votescore']?> <span class="glyphicon glyphicon-thumbs-up"></span></p>
                    <p style="float:left;"><a class="btn btn-secondary" href="http://localhost:8080/killer-trips/src/views/city.php?cityid=<?php echo $city['cityid']?>" role="button">See more &raquo;</a></p>
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