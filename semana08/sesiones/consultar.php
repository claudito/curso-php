<?php 


session_start();

//echo $_SESSION['id'];
//echo $_SESSION['id'];
//die();


if( isset($_SESSION['id']) )
{
	//TRUE

 echo $_SESSION['id'];

}
else
{

 //FALSE
  echo "No hay datos disponibles";


}




 ?>