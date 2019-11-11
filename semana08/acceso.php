<?php 

 include'config/database.php';
 session_start();
 

 if(!isset($_SESSION[KEY.'id']))
 {
  
  //echo "no tiene permisos de visualización";

  header('Location: '.URL.'');
  

 }
 die();
  




 ?>