<?php 


class Empleado extends Conexion{


public function agregar($id,$name,$position,$salary,$start_date,$office,$extn){

 
 try {
 	
 
 $conexion = $this->get_conexion();
 $query    = "INSERT INTO empleado
			(
			id, 
			name, 
			position, 
			salary, 
			start_date,
			office, 
			extn
		     )
		     VALUES
		     (

		    :id, 
			:name, 
			:position, 
			:salary, 
			:start_date,
			:office, 
			:extn

		     )";
		    $statement =  $conexion->prepare($query);
		    $statement->bindParam(':id',$id);
			$statement->bindParam(':name', $name);
			$statement->bindParam(':position',$position); 
			$statement->bindParam(':salary',$salary); 
			$statement->bindParam(':start_date',$start_date);
			$statement->bindParam(':office', $office);
			$statement->bindParam(':extn',$extn);
		    $statement->execute();

		    echo "ok";


 } catch (Exception $e) {


 echo "Error: ".$e->getMessage();

 	
 }



}








}






 ?>