<?php 


class Conexion{


function get_conexion(){

try {
	
$conexion = new PDO(

' mysql:host='.SERVER.';dbname='.BD.' ',
' '.USER.' ',//usuario
' '.PASS.' ',//contraseña
array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8')

);

$conexion->setAttribute(

PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION

);

return $conexion;




} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();


}






} 









}








 ?>