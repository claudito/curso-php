<?php 

$user  =  trim($_REQUEST['user']);
$pass  =  trim($_REQUEST['pass']);


echo  json_encode(array(

'title' => 'Bienvenido',
'text'  => $user,
'type'  => 'success'


));




 ?>