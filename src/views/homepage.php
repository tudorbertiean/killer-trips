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
              <div class="col-6 col-lg-4">
                <h2>City 1</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p style="color:green">167 <span class="glyphicon glyphicon-thumbs-up"></span></p>
                <p><a class="btn btn-secondary" href="#" role="button">See more &raquo;</a></p>
              </div><!--/span-->
              <div class="col-6 col-lg-4">
                <h2>City 2</h2> 
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p style="color:red">-120 <span class="glyphicon glyphicon-thumbs-down"></span></p>
                <p><a class="btn btn-secondary" href="#" role="button">See more &raquo;</a></p>
              </div><!--/span-->
              <div class="col-6 col-lg-4">
                <h2>City 3</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p style="color:green">27 <span class="glyphicon glyphicon-thumbs-up"></span></p>
                <p><a class="btn btn-secondary" href="#" role="button">See more &raquo;</a></p>
              </div><!--/span-->
              <div class="col-6 col-lg-4">
                <h2>City 4</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p style="color:green">0 <span class="glyphicon glyphicon-thumbs-up"></span></p>
                <p><a class="btn btn-secondary" href="#" role="button">See more &raquo;</a></p>
              </div><!--/span-->
              <div class="col-6 col-lg-4">
                <h2>City 5</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p style="color:red">-100 <span class="glyphicon glyphicon-thumbs-down"></span></p>
                <p><a class="btn btn-secondary" href="#" role="button">See more &raquo;</a></p>
              </div><!--/span-->
              <div class="col-6 col-lg-4">
                <h2>City 6</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p style="color:green">5 <span class="glyphicon glyphicon-thumbs-up"></span></p>
                <p><a class="btn btn-secondary" href="#" role="button">See more &raquo;</a></p>
              </div><!--/span-->
            </div><!--/row-->
          </div><!--/span-->
        </div><!--/row-->
        <hr>
      </div><!--/.container-->
    </body>
</html>