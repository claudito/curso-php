<?php 

include'../vendor/autoload.php';

$url = "http://localhost:8000/api/public/api/empleados_all";

$client = new \GuzzleHttp\Client();
$response = $client->request('GET',$url);

//echo $response->getStatusCode(); # 200
//echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
$data =  $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'

$data = json_decode($data,TRUE);


$data = $data['data'];


foreach ($data as $key => $value) {
	
echo $value['id'].' - '.$value['name']."<br>";


}



 ?>