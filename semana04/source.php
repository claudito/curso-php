<?php 

include'modelo/Conexion.php';

$conexion = new Conexion();
$conexion = $conexion->get_conexion();

/*

Opciones

1 = Consulta de toda la tabla
2 = Agregar Datos
3 = Actualizar Datos
4 = Eliminar Datos
5 = Consulta un dato o fila

*/

$opcion = $_REQUEST['op'];


switch ($opcion) {
	case 1:

    try {

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



		break;
	case 2:
	
    try {
     
    $nombres             = $_REQUEST['nombres'];
    $apellidos           = $_REQUEST['apellidos'];
    $fecha_nacimiento    = $_REQUEST['fecha_nacimiento'];


    $query     = "INSERT INTO alumno
                 (
                 nombres,
                 apellidos,
                 fecha_nacimiento
                 )
                 VALUES
                 (
                 :nombres,
                 :apellidos,
                 :fecha_nacimiento
                 )";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombres',$nombres);
    $statement->bindParam(':apellidos',$apellidos);
    $statement->bindParam(':fecha_nacimiento',$fecha_nacimiento);
    $statement->execute();

    echo  json_encode(array(

    'title'=>'Buen Trabajo',
    'text' =>'Registro Agregado',
    'type' =>'success'

    ));



    } catch (Exception $e) {


    echo  json_encode(array(

    'title'=>'Error',
    'text' =>$e->getMessage(),
    'type' =>'error'

    ));

    	
    }

		break;
	case 3:
		# code...
		break;
	case 4:
		# code...
		break;

	case 5:
		# code...
		break;
	
	default:
	echo "opción no disponible";
		break;
}





 ?>