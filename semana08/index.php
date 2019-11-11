<?php 	

include'autoload.php';
session_start();


#af1c271ed2eb5af503d9470aee8f4612id

if(isset($_SESSION[KEY.'id']))
{

 include'templates/home.php';

}
else
{
 
 include'templates/login.php';

}


 ?>
