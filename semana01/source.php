<?php 

try {
	
//ó Ñ ü
//CONFIGURACIÓN
$conexion = new PDO(

'mysql:host=localhost;dbname=db_curso_php',
'root',//usuario
'',//contraseña
array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8')

);

$conexion->setAttribute(

PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION

);

//CONSULTA
$query = "SELECT 

codigo,
nombres,
apellidos,
fecha_nacimiento FROM alumno";

//Sentencia Preparada
$statement = $conexion->prepare($query);
//Ejecutar
$statement->execute();

//Array
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

//var_dump($result);

//JSON
$json  = array("data"=>$result); 

echo json_encode($json);

} catch (Exception $e) {

 echo "Error: ".$e->getMessage();

	
}





 ?>