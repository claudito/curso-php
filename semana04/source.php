<?php 

try {
	
//ó Ñ ü
//CONFIGURACIÓN


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
//$json  = array("data"=>$result); 


$json = array(

'sEcho'               => 1,
'iTotalRecords'       =>count($result),
'iTotalDisplayRecords'=>count($result),
'aaData'              =>$result


);



echo json_encode($json);

} catch (Exception $e) {

 echo "Error: ".$e->getMessage();

	
}





 ?>