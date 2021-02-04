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
<?php 
  include("dbconnect.php");
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
      $id=$_GET[ 'edit_id'];
      $stmt_eidt=$dbh->prepare('SELECT * FROM recipe WHERE id=:uid');
      $stmt_eidt->execute(array(':uid'=>$id));
      $edit_row=$stmt_eidt->fetch(PDO::FETCH_ASSOC);
      extract($edit_row);
    }else 

    {
      header("Location: myrecipe.php");
    }

    if(isset($_POST['btn-save']))

      {

        $recipename=$_POST['recipename'];
        $description = $_POST['description'];

        $images=$_FILES['profile']['name'];
        $tmp_dir=$_FILES['profile']['tmp_name'];
        $imageSize=$_FILES['profile']['size'];

        $upload_dir='uploads/';
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picProfile=rand(1000, 1000000).".".$imgExt;
        unlink($upload_dir.$edit_row['picProfile']);
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        $stmt=$dbh->prepare('UPDATE recipe SET recipename=:urecipename, description=:udescription, picProfile=:uprofile WHERE id=:uid');
        $stmt->bindParam(':urecipename', $recipename);
        $stmt->bindParam(':udescription', $description);
        $stmt->bindParam(':uprofile', $picProfile);
        $stmt->bindParam(':uid', $id);
        if($stmt->execute())
        {
          ?>
          <script type="text/javascript">
            alert('Successfully Update');
            window.location.href="myrecipe.php";
          </script>
          <?php 
        }else 

        ?>
        <script type="text/javascript">
          alert('Error while update data and iamge');
          window.location.href="myrecipe.php";
        </script>
        <?php 

      }

  
?>
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
  <center>
<div class="modal-body">
  
          <form method="post" enctype="multipart/form-data">
          <table class="table1">
            <tr>
              <td><label style="color:#3a87ad; font-size:30px;">Recipe Name</label></td>
              <td width="30"></td>
              <td><input type="text" name="recipename"  class="form-control" value="<?php echo $recipename; ?>" /></td>
            </tr>
            <tr>
              <td><label style="color:#3a87ad; font-size:30px;">Description</label></td>
              <td width="30"></td>
              <td><input type="text" rows="4" cols="50" name="description" class="form-control" value="<?php echo $description; ?>"></td>
            </tr>
            <tr>
              <td><label style="color:#3a87ad; font-size:30px;'">Recipe Picture</label></td>
              <td width="30"></td>
                              <td> <img src="uploads/<?php echo $picProfile; ?>" class="img-rounded">
                                <input type="file" name="profile" class="form-control" required="" accept="*/image">
                            </div>
            </tr>
            
          </table>
          
  
    </div>
   <center>
    <a href="myrecipe.php" class="btn">Back</a>
<button type="submit" name="btn-save">Update </button>
    </center>
    </div>
  

          </form>
    </div>  
</center> 
  
<



   <hr>

  <!-- Footer -->
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
