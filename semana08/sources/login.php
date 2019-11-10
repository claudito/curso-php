<?php 

include'../autoload.php';

$user  =  trim($_REQUEST['user']);
$pass  =  trim($_REQUEST['pass']);


$acceso = new Acceso();

$msj   =  $acceso->login( $user, md5($pass) );

echo json_encode($msj);

 ?>