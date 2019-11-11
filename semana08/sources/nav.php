<?php 

include'../autoload.php';


$opcion = $_REQUEST['op'];



switch ($opcion) {
	case 1:
		 
    session_start();
	echo json_encode(array(

   'usuario'=>$_SESSION[KEY.'usuario']

	));

		break;

	case 2:
	
     //Cierre de Sessión
	 session_start();

	   $usuario = $_SESSION[KEY.'usuario'];

	   
	    unset($_SESSION[KEY.'id']);
	    unset($_SESSION[KEY.'usuario']);


	    echo json_encode(array(
        
        'title' => 'Adios',
        'text'  => $usuario,
        'type'  => 'success'


	    ));


		break;
	
	default:
		# code...
		break;
}



 ?>