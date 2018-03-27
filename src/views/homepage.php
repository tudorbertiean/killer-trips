<!DOCTYPE html>
    <head> 
        <title>Killer Trips</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        <link rel="stylesheet" href="../css/homepage.css">
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
            <h1>Welcome to Killer Trips!</h1>
            <div class="jumbotron"></div>
            <h2>View the most recent city entries below:</h2>
            <div class="row">
              <?php
                $conn = mysqli_connect("localhost", "root", "", "killertrips");
                if ($conn->connect_error) {
                  echo "Problem connecting to database, check your internet connection!";
                }

                $query = "SELECT * from cities";
                $result = $conn->query($query);

                while ($row = $result->fetch_assoc()) {
                  ?>
                  <div class="col-6 col-lg-4 city">
                    <h3><?php echo $row['city']?></h3>
                    <img src=<?php echo "../images/".$row['image']?> alt="" />
                    <p class="description"><?php echo $row['description']?></p>
                    <p style="color:green;float:left;"><?php echo $row['votescore']?> <span class="glyphicon glyphicon-thumbs-up"></span></p>
                    <p style="float:left;"><a class="btn btn-secondary" href="#" role="button">See more &raquo;</a></p>
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