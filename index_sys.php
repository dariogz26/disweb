<?php  
session_start();
if (!$_SESSION['user'] ) {
    header('location: index.php');
} else {
    $grabado="<strong style='color:white'>BIENVENIDO ".$_SESSION['user']."</strong>";
    $lb = "<strong>".$_SESSION['user']." INGRESO COMO ADMINISTRADOR</strong>";
}
require 'conexion.php';
session_start();
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $query = "SELECT * FROM usuario WHERE Usuario='$user' AND Contraseña='$pass'";
    $result = mysql_query($query) or die('Consulta Fallida'. mysql_error());
    if(mysql_num_rows($result)==1){
        $us = mysql_fetch_array($result);
        if ($us[2] == 'system'){
            $_SESSION['user'] = $_POST['username'];
            echo '<script type="text/javascript">
            window.location.assign("index_sys.php");
            </script>';    
        } else {
            $_SESSION['user'] = $_POST['username'];
            echo '<script type="text/javascript">
            window.location.assign("index.php");
            </script>';
        }    
    } else {
        echo '<script language="javascript">alert("Incorrecto");</script>';
    }
}

if ($_SESSION['user'])
{
	$grabado="<strong style='color:white'>BIENVENIDO ".$_SESSION['user']."</strong>"; //Si existe un nickname generamos el mensaje
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="bootstrap-3.3.6/docs/_includes/favicon.ico">

        <title>Encuesta UNaf</title>

        <?php include 'head_common.php'; 
        include 'header.php';?>
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        
        <script type="text/javascript">
            function cargarHTML() {
                document.getElementById("contenido").innerHTML = "Paragraph changed!";
            }
        </script>
    </head>

  <body>

    
      
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div id="contenido">
    <div class="jumbotron">
      <div class="container">
        <h1 style="text-align:center;">Bienvenido al Sistema de Encuesta:</h1>
        <h3 style="text-align:center;"><?php echo $lb;?></h3>
        <p>Estamos realizando una breve encuesta con las egresadas/os de nuestra asociación. Queremos charlar con usted acerca del curso que realizó con nosotros, saber su opinión acerca del mismo, de lo que aprendió y de inserción laboral.</p>
        <p><a class="btn btn-primary btn-lg" href="enc_1.php" role="button">Iniciar encuesta &raquo;</a></p>
      </div>
    </div>
      
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <h2>Agregar pregunta</h2>
          <p>Seccion para agregar nuevas preguntas al sistema de encuestas. </p>
          <p><a class="btn btn-default" href="pregunta.php" role="button">Agregar &raquo;</a></p>
        </div>
        <div class="col-md-6">
          <h2>Generar reportes</h2>
          <p>Creara un reporte de a cuerdo al criterio que especifique. </p>
          <p><a class="btn btn-default" href="reporte.php" role="button">Generar &raquo;</a></p>
       </div>
        <!--<div class="col-md-4">
          <h2>Crear nuevo usuario de sistema</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>-->
      </div>
      <hr>

    </div> <!-- /container -->
    </div>
      <div class="container">
        <footer>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>
      </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>