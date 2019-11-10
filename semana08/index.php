<?php 	

session_start();


if(isset($_SESSION['id']))
{

 include'templates/home.php';

}
else
{
 
 include'templates/login.php';

}


 ?>
