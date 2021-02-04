<?php 
  session_start();
  include("dbconnect.php");
  error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home Cake Cookbook</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="home.php">Home Cake Cookbook</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myrecipe.php">My Cake Recipe</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/03.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Home Cake Cookbook</h1>
            <span class="subheading">To share the recipe</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <thead>
                              
                                <tr>
                                    <th style="text-align:center;">Recipe Name</th>
                                    <th style="text-align:center;">Description</th>
                                    <th style="text-align:center;">Image</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								require_once('dbconnect.php');
								$result = $dbh->prepare("SELECT * FROM recipe ORDER BY id ASC");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['id'];
							?>
								<tr>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['recipename']; ?></td>
								<td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $row ['description']; ?></td>
								 <td style="text-align:center; word-break:break-all; width:300px;"><img src="uploads/<?php echo $row['picProfile']?>" width="300" height="300" ></td>
                   

                  </td>
									
										
								<?php } ?>
                            </tbody>
                        </table>
						
	

  <hr>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
          </ul>
          <p class="copyright text-muted">Copyright &copy; Home Cake Cookbook 2020 by Lim Wen Wen 261612</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
