<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Login</title>

 <!-- Bootstrap 4 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>


<!-- Sweet Alert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>


<div class="container-fluid">
	
<div class="row">
	
<div class="col-md-4"></div>

<div class="col-md-4">
	
<form id="login" autocomplete="off">

<div class="card">
	
<div class="card-header text-center">
	
Inicio de Sesión

</div>

<div class="card-body">
	
<!-- Input Usuario -->
<div class="input-group mb-3">

  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i> </span>
  </div>

  <input type="text" name="user" class="form-control" placeholder="Usuario" required autofocus>

</div>


<!-- Input Password -->
<div class="input-group mb-3">

  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i> </span>
  </div>

  <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>

</div>


<button class="btn btn-primary btn-block">Ingresar</button>

</div>



</div>

</form>


</div>



</div>


</div>

<script>
	
$(document).on('submit','#login',function(e){

 parametros = $(this).serialize();

 
 $.ajax({

 url:'sources/login.php',
 type:'POST',
 data:parametros,
 dataType:'JSON',
 beforeSend:function(){

 swal({

 title : 'Cargando',
 text  : 'Espere un momento',
 imageUrl:'img/loader2.gif',
 showConfirmButton:false


 });


 },
 success:function(data){

  swal({

   title : data.title,
   text  : data.text,
   type  : data.type,
   timer : 3000,
   showConfirmButton:false


  });

 
    setInterval(function(){

  location.reload();

  },3000);





 }




 });




e.preventDefault();
});




</script>
</body>
</html>