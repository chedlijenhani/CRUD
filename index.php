<?php
include_once 'connect.php';
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>T.up | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
    
            <div>

                <h1 class="logo-name">T.up</h1>
            <form class="m-t" action="index.php" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" required="required" placeholder="Username" autofocus required></input>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" required="required" placeholder="Password" required>
                </div>
                <input type="submit" class="btn btn-primary block full-width m-b" title="Log In" name="login" value="Login">

            </form>
            <p class="m-t"> <small>Tech Up  &copy; 2019</small> </p>
        </div>
    

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
<script src="js/plugins/toastr/toastr.min.js"></script>
</body>

</html>

  <?php

  $sql="SELECT login,mdp FROM admin";
  $m=mysqli_query($idcnx,$sql);
  while($tab=mysqli_fetch_row($m)){

    $user=$tab[0];
    $mdp=$tab[1];


      if(isset($_POST['username']) && isset($_POST['password']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(($username ==$user && $password ==$mdp))
            {

      $_SESSION['login'] = $username;
      $_SESSION['pwd'] = $password;
      					header('location:home.php');

      				}
      			else
      				{
      					echo 'Invalid Username and Password Combination';
                echo "<script>
                            toastr.success('Invalid Username and Password Combination', 'T.up');
      </script>";
      				}
  }
}
@mysqli_close($idcnx);
  ?>

</div>

</body>
</html>
