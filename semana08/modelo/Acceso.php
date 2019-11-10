<?php 

class Acceso extends Conexion{


function  login($user,$pass){

try {

$conexion = $this->get_conexion();

$query    =  "SELECT 
 
 id,
 nombres,
 apellidos,
 user,
 pass,
 estado

 FROM usuario WHERE user=:user AND pass=:pass";

 $statement = $conexion->prepare($query);
 $statement->bindParam(':user',$user);
 $statement->bindParam(':pass',$pass);
 $statement->execute();
 $result    = $statement->fetchAll(PDO::FETCH_ASSOC);

 if(count($result)>0)
 {
   
  return array(

   'title' => 'Bienvenido',
   'text'  => $result[0]['nombres'].' '.$result[0]['apellidos'],
   'type'  => 'success'

  );


 }
 else
 {

   return array(

   'title' => 'Error',
   'text'  => 'Usuario o Contraeña Incorrectos',
   'type'  => 'error'

  );


 }
 

	
} catch (Exception $e) {

  return array(

   'title' => 'Error',
   'text'  =>  $e->getMessage(),
   'type'  => 'error'

  );



}




}




}





 ?>