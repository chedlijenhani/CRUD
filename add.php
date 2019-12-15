<?php
session_start ();
// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
include_once 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>

    <title>Tech Up Table</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
<link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>


<body class="gray-bg">
<div class="row border-bottom">
  <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">

  </div>
      <ul class="nav navbar-top-links navbar-right">
          <li style="padding: 20px">
              <span class="m-r-sm text-muted welcome-message">Welcome to Tech Up .</span>
          </li>

          <li>
            <a href="config.php"><i class="fa fa-cog"></i></a>
          </li>
          <li>
              <a href="logout.php">
                  <i class="fa fa-sign-out"></i>Logout
              </a>
          </li>
      </ul>

  </nav>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Table</h2>
    </div>
    <div class="col-sm-8">
        <div class="title-action">

        </div>
    </div>
</div>
       <div class="ibox-content">
         <form name="form" action="add.php" method="post" onsubmit="required()">

     <div class="form-group">  <label>nom :</label>  <Input type="text" class="form-control" name="nom" required></div>
     <div class="form-group">  <label>prenom :</label>  <Input type="text" class="form-control" name="prenom"  required></div>
     <div class="form-group">  <label>email :</label>  <Input type="text" class="form-control" name="email"  required></div>
     <div class="form-group">  <label>telephone :</label>  <Input type="text" class="form-control" name="telphone"  required></div>
     <div class="form-group">  <label>absence :</label>  <Input type="text" class="form-control" name="absence"  required></div>
     <div class="form-group" >  <label>date :</label> <Input type="text" class="form-control" name="date"   required></div>


     </div>
     <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="add" value="add">
        </form>
</div>

<?php
  if(isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['email'])&& isset($_POST['telphone'])&& isset($_POST['absence'])&& isset($_POST['date'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telphone = $_POST['telphone'];
    $absence = $_POST['absence'];
    $date = $_POST['date'];
$sql="INSERT INTO `person` (`id`, `nom`, `prenom`, `email`, `telphone`, `absence`, `date`) VALUES (NULL, '$nom' , '$prenom' , '$email' , '$telphone' , '$absence' , '$date');";
if(mysqli_query($idcnx,$sql)){
  header('location:home.php');
}else{
  echo '5f';
}

@mysqli_close($idcnx);

  }
?>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/plugins/toastr/toastr.min.js"></script>
<!-- FooTable -->
<script src="js/plugins/footable/footable.all.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- Page-Level Scripts -->


</body>

</html>
<?php
}else{
  echo '<a href="logout.php">Déconnection</a>';
}
?>
