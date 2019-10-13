<?php 


//array Simple



$gaseosas = array('Coca Cola','Pepsi','Fanta','Inka Cola');


//echo $gaseosas[3];

/*
foreach ($gaseosas as $key => $value) {
	
 
 echo $key.' : '.$value."<br>";


}*/

//array asociativo


$gaseosas =  array(

array(

'nombre'       =>'Coca Cola',
'presentacion' =>'1 Litro'

),
array(

'nombre'       => 'Pepsi',
'presentacion' => '2 Litros'


),
array(

'nombre'    => 'Fanta',
'presentacion' => '3 Litros'

)


);


//var_dump($gaseosas);

//echo $gaseosas[0]['nombre'];



foreach ($gaseosas as $key => $value) {
	

    echo $key.': '.$value['nombre']."<br>";

}




 ?>