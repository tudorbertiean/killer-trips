<!DOCTYPE html>
    <head> 
        <title>Add a new entry</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
        <link rel="stylesheet" href="../css/create.css">
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
          <ul class="nav navbar-nav">
            <li class="active"><a href="create.php">Create</a></li>
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
            } else {
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
      <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

      <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
          <div class="col-md-offset-2 col-md-8">
            <h1>Create a New Killer Trip</h1>
            <div class="jumbotron" style="background-image: url(../images/toronto-skyline.jpg"></div>
            <form enctype="multipart/form-data" role="form" method="post" action="../php/AddCity.php">
                <div class="form-group">
                    <label>Upload Image</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btn-city">
                                Browse… 
                                <input type="file" name="cityImg" id="cityImg">
                            </span>
                        </span>
                        <input type="text" class="form-control" placeholder="Add an image" readonly>
                    </div>
                    <p>Be mindful of the image aspect and choose a image in landscape mode for best view.</p>
                </div> <!--/form-group-->
                <div class="form-group">
                    <label for="cityName">City</label>
                    <input type="text" class="form-control" name="cityName" id="cityName" placeholder="Enter City">
                </div> <!--/form-group-->
                <div class="form-group">
                    <label for="countryName">Country</label>
                    <input type="text" class="form-control" name="countryName" id="countryName" placeholder="Enter Country">
                </div> <!--/form-group-->
                <div class="form-group">
                    <label for="cityDescription">Description</label>
                    <textarea class="form-control" name="cityDescription" id="cityDescription" placeholder="Enter Description" rows="5"></textarea>
                </div> <!--/form-group-->
                <div class="form-group">
                    <label for="attractions">Attractions</label>
                    <div class="attraction-fields">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Attraction Title" name="attractionNames[]" id="attractionNames[]"/>
                            <input type="text" class="form-control" placeholder="Attraction Description" rows="3" name="attractionDesc[]" id="attractionDesc[]"/>
                            <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-default btn-file btn-attraction">
                                      Browse… 
                                      <input type="file" name="attractionImg[]" id="attractionImg[]">
                                  </span>
                              </span>
                              <input type="text" class="form-control attraction-file" placeholder="Add an image" readonly>
                            </div>
                            <span class="btn btn-success input-group-addon add-attraction glyphicon glyphicon-plus"></span>
                        </div>
                      
                        <span class="attraction-help">Enter more attractions by pressing +</span>
                    </div>
                </div> <!--/form-group-->
                <div class="form-group">
                    <label for="killers">Killer Info</label>
                    <div class="killer-fields">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Killer Title" name="killerNames[]" id="killerNames[]"/>
                            <input type="text" class="form-control" placeholder="Killer Description" rows="3" name="killerDesc[]" id="killerDesc[]"/>
                            <span class="btn btn-success input-group-addon add-killer glyphicon glyphicon-plus"></span>
                        </div>
                        <span class="killer-help">Enter more killer info by pressing +</span>
                    </div>
                </div> <!--/form-group-->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form> <!--/form-->
          </div><!--/span-->
        </div><!--/row-->
        <hr>
      </div><!--/.container-->
      <script src="../js/image_upload.js"></script>
      <script src="../js/multiple_fields.js"></script>
    </body>
</html>