<?php 
session_start();
if (!$_SESSION['user'] ) {
    header('location: index.php');
} else {
    $grabado="<strong style='color:white'>BIENVENIDO ".$_SESSION['user']."</strong>";
    $us = $_SESSION['user'];
}
require 'conexion.php';
?>
<html lang="es">
<head>
<title>Encuesta</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-2.2.0.js"></script>
<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php include 'header.php';
include 'head_common.php';?>    
</head>
<body>
    
    <div class="container">

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center">
                <h1>Area para Cargar preguntas</h1>
                <p class="lead">Por favor ingrese una pregunta:</p>
                <form action="opciones.php" method="post">
                    <input type="text" class="form-control" name="prg">
                    <br>
                <p class="lead">Por favor seleccione al tema que quiere agregar la pregunta:</p>
                <?php
                $query = "SELECT * FROM tema";
                $result = mysql_query($query) or die('Consulta Fallida'. mysql_error());
                echo "<br><select class='form-control' id='tema' name='tema'>"; //this.form.submit();
                echo "<option value='0'>Elija un Tema</option>";
                while ($linea=mysql_fetch_array($result)){
                    echo "<option value=\"".$linea[0]."\">".$linea[2]."</option>\n";
                }
                echo "</select><br>";        
                ?>
                <p class="lead">Por favor seleccione el tipo de pregunta:</p>
                <select class='form-control' id='t_prg' name='t_prg'>
                    <option value="0">Elija un tipo</option>
                    <option value="radio">Respuesta unitaria</option>
                    <option value="check">Respuesta multiple</option>
                </select>
                <br>
                <button class="btn btn-default" type="submit">Generar &raquo;</button><br>
                </form>
            </div>
                <div class="col-lg-2"></div>
        </div>
        <!-- /.row -->

    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>