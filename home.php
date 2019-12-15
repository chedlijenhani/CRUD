<?php
session_start ();
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
              <span class="m-r-sm text-muted welcome-message">Welcome to Tech Up Club.</span>
          </li>

          <li>
            <a href="para.php"><i class="fa fa-cog"></i></a>
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
          <form action="add.php" method="post">
          <input type="submit" class="btn btn-primary" name="Add" value="Add">
        </form>
        </div>
    </div>
</div>
       <div class="ibox-content">

                            <Input type="text" class="form-control form-control-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>
                                <!--<th>id</th> -->
                                    <th> nom</th>
                                    <th>prenom</th>
                                    <th >date</th>
                                    <th >email</th>
                                    <th >telephone</th>
                                    <th >absence</th>
                                    <th colspan="2">operation</th>
                                </tr>
                                </thead>
                                <tbody>
<?php
$sql="SELECT * FROM person ";
$m=mysqli_query($idcnx,$sql);
while($tab=mysqli_fetch_row($m)){
echo '<tr>';
//echo '<td>'.$tab[0].'</td>';
echo '<td>'.$tab[1].'</td>';
echo '<td>'.$tab[2].'</td>';
echo '<td>'.$tab[6].'</td>';
echo '<td>'.$tab[3].'</td>';
echo '<td>'.$tab[4].'</td>';
echo '<td>'.$tab[5].'</td>';
echo '<td></td>';
echo '</tr>';
}
 ?>
</tbody>
<tfoot>
                                <tr>
                                    <td colspan="8">
                                        <ul class="pagination float-right"></ul>
                                    </td>
                                </tr>
</tfoot>
</table>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- FooTable -->
<script src="js/plugins/footable/footable.all.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function() {

        $('.footable').footable();
        $('.footable2').footable();

    });

</script>

</body>

</html>
<?php
@mysqli_close($idcnx);
}else{
  echo '<a href="logout.php">Déconnection</a>';
}
?>
