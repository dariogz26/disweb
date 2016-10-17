<?php
session_start();
if(isset($_POST['reg'])){
    require 'conexion.php';
    $nom = $_POST['nombre'];
    $ape = $_POST['apellido'];
    $dni = $_POST['dni'];
    $fnac = $_POST['date'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $tel = $_POST['tel'];
    $cel = $_POST['cel'];
    $query = mysql_query("SELECT * FROM usuario WHERE Usuario='$user' AND Contraseña='$pass'");
    if (mysql_num_rows($query)>0){
        echo '<script language="javascript">alert("Email registrado. Si tiene problemas contacte con el administrador");</script>';
    } else {
        $val_persona = "INSERT INTO persona (Nombre, Apellido, DNI, Fecha_Nac, Usuario, Contraseña, Tel_fijo, Celular)
                        VALUES('$nom', '$ape', '$dni', STR_TO_DATE('$fnac', '%d-%m-%Y') , '$user', '$pass', '$tel', '$cel')";
        $ins_p = mysql_query($val_persona);
        if(!$ins_p){
            die('Error: '. mysql_error());
        }
        $qid = "SELECT idpersona FROM persona WHERE Usuario='$user'";
        $result = mysql_query($qid) or die('Consulta Fallida'. mysql_error());
        if($id=mysql_fetch_array($result)){
            $idpersona = $id[0];
            $val_user = "INSERT INTO usuario (idPersona, Usuario, Contraseña)
                        VALUES('$idpersona', '$user', '$pass')";
            $ins_u = mysql_query($val_user);
            if(!$ins_u){
                die('Error: '. mysql_error());
            }
        }
    }
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="sign.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="css/jquery.datepicker.css">
<script type="text/javascript" src="js/jquery.datepicker.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
.modal-open{overflow:hidden}.modal{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1050;display:none;overflow:hidden;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out;-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%)}.modal.in .modal-dialog{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);-o-transform:translate(0,0);transform:translate(0,0)}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;outline:0;-webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);box-shadow:0 3px 9px rgba(0,0,0,.5)}.modal-backdrop{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1040;background-color:#000}.modal-backdrop.fade{filter:alpha(opacity=0);opacity:0}.modal-backdrop.in{filter:alpha(opacity=50);opacity:.5}.modal-header{padding:15px;border-bottom:1px solid #e5e5e5}.modal-header .close{margin-top:-2px}.modal-title{margin:0;line-height:1.42857143}.modal-body{position:relative;padding:15px}.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}.modal-footer .btn+.btn{margin-bottom:0;margin-left:5px}.modal-footer .btn-group .btn+.btn{margin-left:-1px}.modal-footer .btn-block+.btn-block{margin-left:0}.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}.modal-sm{width:300px}}@media (min-width:992px){.modal-lg{width:900px}}
</style>
<div class="container">
  <!--<h2>Modal Example</h2>-->
  <!-- Trigger the modal with a button -->
  <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="form-signin-heading">Datos de registro:</h2>
        </div>
        <div class="modal-body">
            <form class="form-signin" method="post">
                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required autofocus>
                <label >Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required autofocus>
                <label >DNI</label>
                <input type="text" id="dni" name="dni" class="form-control" placeholder="Nro de DNI" required autofocus>
                <label>Fecha de Nacimiento</label>
                <input type="date" name="date" id="date" class="form-control" data-select="datepicker" data-toggle="datepicker" placeholder="Ingresa la fecha entre - o /">
                <label for="inputEmail">Email</label>
                <input type="email" id="user" name="username" class="form-control" placeholder="Email" required autofocus>
                <label for="inputPassword">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                <label>Telefono Fijo</label>
                <input type="tel" id="tel" name="tel" class="form-control" placeholder="Nro de Telefono" required autofocus>
                <label>Celular</label>
                <input type="tel" id="cel" name="cel" class="form-control" placeholder="Nro de Celular" required autofocus><br>                
                <button class="btn btn-lg btn-success btn-block" type="submit" name="reg">Registrarme</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>