<?php 
session_start();
if (!$_SESSION['user'] ) {
    header('location: index.php');
} else {
    $grabado="<strong style='color:white'>BIENVENIDO ".$_SESSION['user']."</strong>";
    $us = $_SESSION['user'];
}
require 'conexion.php';

if (isset($_REQUEST['prg'])) {
    $prg = $_POST['prg'];
} else {
    $prg = "";
}

if (isset($_REQUEST['tema'])) {
    $tema = $_POST['tema'];
} else {
    $tema = "";
}

if (isset($_REQUEST['t_prg'])) {
    $tprg = $_POST['t_prg'];
} else {
    $tprg = "";
}

$ins = mysql_query("INSERT INTO pregunta (idTema, Pregunta, Tipo)
VALUES ('$tema', '$prg', '$tprg');");

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
                <p class="lead">Por favor ingrese la cantidad de opciones necesarias a su pregunta:</p><br>
                <h3><?php echo $prg;?></h3><br>
                <form action="proceso.php" method="post">
                    <input type="text" class="form-control" name="cmp1">
                    <br>
                    <input type="text" class="form-control" name="cmp2">
                    <br>
                    <input type="text" class="form-control" name="cmp3">
                    <br>
                    <input type="text" class="form-control" name="cmp4">
                    <br>
                    <input type="text" class="form-control" name="cmp5">
                    <br>
                    <input type="text" class="form-control" name="cmp6">
                    <br>
                    <input type="text" class="form-control" name="cmp7">
                    <br>
                    <input type="text" class="form-control" name="cmp8">
                    <br>
                    <input type="text" class="form-control" name="cmp9">
                    <br>
                    <input type="text" class="form-control" name="cmp10">
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