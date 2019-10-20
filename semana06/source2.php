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


$fechaini = $_REQUEST['fechaini'];
$fechafin = $_REQUEST['fechafin'];


//CONSULTA
$query = "SELECT 

id,
name,
position,
salary,
start_date,
office,
extn,
DATE_FORMAT(start_date,'%Y-%m')periodo

 FROM empleado WHERE start_date BETWEEN :fechaini AND :fechafin";

//Sentencia Preparada
$statement = $conexion->prepare($query);
$statement->bindParam(':fechaini',$fechaini);
$statement->bindParam(':fechafin',$fechafin);
//Ejecutar
$statement->execute();

//Array
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

//var_dump($result);

//JSON
$json  = array("data"=>$result); 

//var_dump($json);

echo json_encode($json);

} catch (Exception $e) {

 echo "Error: ".$e->getMessage();

	
}





 ?>