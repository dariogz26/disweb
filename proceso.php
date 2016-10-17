<?php 
session_start();
if (!$_SESSION['user'] ) {
    header('location: index.php');
} else {
    $grabado="<strong style='color:white'>BIENVENIDO ".$_SESSION['user']."</strong>";
    $us = $_SESSION['user'];
}
require 'conexion.php';

$q = mysql_query("SELECT idPregunta FROM pregunta ORDER BY idPregunta DESC LIMIT 1;");
$r = mysql_fetch_array($q);
$id = $r[0];

if (isset($_REQUEST['cmp1'])) {
    $cmp1 = $_POST['cmp1'];
    if(!$cmp1==""){
        $ins = mysql_query("INSERT INTO opcion (idPregunta, Opcion)
        VALUES ('$id', '$cmp1');");
    }
} else {
    $cmp1 = "";
}

if (isset($_REQUEST['cmp2'])) {
    $cmp2 = $_POST['cmp2'];
    if(!$cmp2==""){
        $ins = mysql_query("INSERT INTO opcion (idPregunta, Opcion)
        VALUES ('$id', '$cmp2');");
    }
} else {
    $cmp2 = "";
}

if (isset($_REQUEST['cmp3'])) {
    $cmp3 = $_POST['cmp3'];
    if(!$cmp3==""){
        $ins = mysql_query("INSERT INTO opcion (idPregunta, Opcion)
        VALUES ('$id', '$cmp3');");
    }
} else {
    $cmp3 = "";
}

if (isset($_REQUEST['cmp4'])) {
    $cmp4 = $_POST['cmp4'];
    if(!$cmp4==""){
        $ins = mysql_query("INSERT INTO opcion (idPregunta, Opcion)
        VALUES ('$id', '$cmp4');");
    }
} else {
    $cmp4 = "";
}

if (isset($_REQUEST['cmp5'])) {
    $cmp5 = $_POST['cmp5'];
    if(!$cmp5==""){
        $ins = mysql_query("INSERT INTO opcion (idPregunta, Opcion)
        VALUES ('$id', '$cmp5');");
    }
} else {
    $cmp5 = "";
}

if (isset($_REQUEST['cmp6'])) {
    $cmp6 = $_POST['cmp6'];
    if(!$cmp6==""){
        $ins = mysql_query("INSERT INTO opcion (idPregunta, Opcion)
        VALUES ('$id', '$cmp6');");
    }
} else {
    $cmp6 = "";
}

if (isset($_REQUEST['cmp7'])) {
    $cmp7 = $_POST['cmp7'];
    if(!$cmp7==""){
        $ins = mysql_query("INSERT INTO opcion (idPregunta, Opcion)
        VALUES ('$id', '$cmp7');");
    }
} else {
    $cmp7 = "";
}

if (isset($_REQUEST['cmp8'])) {
    $cmp8= $_POST['cmp8'];
    if(!$cmp8==""){
        $ins = mysql_query("INSERT INTO opcion (idPregunta, Opcion)
        VALUES ('$id', '$cmp8');");
    }
} else {
    $cmp8= "";
}

if (isset($_REQUEST['cmp9'])) {
    $cmp9 = $_POST['cmp9'];
    if(!$cmp9==""){
        $ins = mysql_query("INSERT INTO opcion (idPregunta, Opcion)
        VALUES ('$id', '$cmp9');");
    }
} else {
    $cmp9 = "";
}

if (isset($_REQUEST['cmp10'])) {
    $cmp10 = $_POST['cmp10'];
    if(!$cmp10==""){
        $ins = mysql_query("INSERT INTO opcion (idPregunta, Opcion)
        VALUES ('$id', '$cmp10');");
    }
} else {
    $cmp10 = "";
}
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
                <br>
                <h3>Su pregunta ha sido cargada</h3><br>
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