<?php
$SBD="localhost";
$NU="root";
$mdp="";
$bd="techup";
$idcnx=mysqli_connect($SBD,$NU,$mdp) or die ("impossible de cnct");
mysqli_select_db($idcnx,$bd) or die ("hello word");

?>
