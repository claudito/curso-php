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

$fechaini = $_REQUEST['fechaini'];
$fechafin = $_REQUEST['fechafin'];


    //CONSULTA
$query = "SELECT 

codigo,
nombres,
apellidos,
DATE_FORMAT(fecha_nacimiento,'%d/%m/%Y')fecha_nacimiento 

FROM alumno WHERE  fecha_nacimiento BETWEEN :fechaini AND :fechafin";

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
	
    try {
   
    $codigo              = $_REQUEST['codigo'];
	$nombres             = $_REQUEST['nombres'];
	$apellidos           = $_REQUEST['apellidos'];
	$fecha_nacimiento    = $_REQUEST['fecha_nacimiento'];


	$query     =  "UPDATE alumno  SET
    nombres          =:nombres,
    apellidos        =:apellidos,
    fecha_nacimiento = :fecha_nacimiento
    
    WHERE codigo=:codigo";
	$statement = $conexion->prepare($query);
    $statement->bindParam(':nombres',$nombres);
    $statement->bindParam(':apellidos',$apellidos);
    $statement->bindParam(':fecha_nacimiento',$fecha_nacimiento);
    $statement->bindParam(':codigo',$codigo);
    $statement->execute();


     echo  json_encode(array(

    'title'=>'Buen Trabajo',
    'text' =>'Registro Actualizado',
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
	case 4:
	
    try {


    $codigo    = $_REQUEST['codigo'];

    $query     = "DELETE FROM alumno WHERE codigo=:codigo";
	$statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$codigo);
    $statement->execute();

     echo  json_encode(array(

    'title'=>'Buen Trabajo',
    'text' =>'Registro Eliminado',
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

	case 5:
	
    try {


    $codigo = $_REQUEST['codigo'];

	$query = "SELECT 

	codigo,
	nombres,
	apellidos,
	fecha_nacimiento FROM alumno WHERE codigo=:codigo";

	$statement = $conexion->prepare($query);
	$statement->bindParam(':codigo',$codigo);
	$statement->execute();
	$result = $statement->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);


    } catch (Exception $e) {
    	

    echo "Error: ".$e->getMessage();


    }



		break;


    case  6:
   
   $year = date('Y');

   $fechaini = "1990-01-01";
   $fechafin = $year."-12-31";

   echo json_encode(

   array(
    
   'fechaini'=>$fechaini,
   'fechafin'=>$fechafin


   )

   );





    break;

	
	default:
	echo "opción no disponible";
		break;
}





 ?>