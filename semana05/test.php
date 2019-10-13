<?php 

//include'modelo/Conexion.php';
//include'modelo/Empleado.php';

include'autoload.php';

$empleado =  new Empleado();

$json = file_get_contents('data.json');

//var_dump($json);

//echo $json;

$array   = json_decode($json,TRUE);

//var_dump($array);


$data    = $array['data'];

//var_dump($data);


$permitidos  =  array('Singapore','Tokyo','Edinburgh');

foreach ($data as $key => $value) {
	
 // echo $value['name'].' - '.$value['position']."<br>";



$id          = $value['id'];
$name        = $value['name'];
$position    = $value['position'];
$salary      = $value['salary'];
//$salary     = substr($salary,1);
//$salary     = str_replace(',', '', $salary);
$salary       = str_replace(array('$',','), '', $salary);
//echo preg_match('[0-9]', $salary);
$start_date  = $value['start_date'];
//$start_date  = str_replace('/', '-', $start_date);
$start_date  = date_format(date_create($start_date),'Y-m-d');
$office      = $value['office'];
$extn        =  $value['extn'];


//echo $start_date."<br>";




if(in_array($office, $permitidos))
{


//Agregaar Empleados:
$empleado->agregar($id,$name,$position,$salary,$start_date,$office,$extn);


}






}




 ?>