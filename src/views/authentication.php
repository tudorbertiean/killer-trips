<!DOCTYPE html>
    <head> 
        <title>Login/Register</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
        <link rel="stylesheet" href="../css/authentication.css">
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
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="../php/Login.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="strUsername" id="strUsername" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="strPassword" id="strPassword" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="../php/Register.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="strUsername" id="strUsername" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="strEmail" id="strEmail" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="strPassword" id="strPassword" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <script src="../js/authentication.js"></script>
    </body>
</html>