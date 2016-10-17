<?php
include 'conexion.php';
session_start();
if (!$_SESSION['user'] ) {
    header('location: index.php');
} else {
    $grabado="<strong style='color:white'>BIENVENIDO ".$_SESSION['user']."</strong>";
    $us = $_SESSION['user'];
}

echo $us;

$q = "SELECT idpersona FROM persona WHERE Usuario='$us'";
$r = mysql_query($q) or die('Consulta Fallida'. mysql_error());
while($l=mysql_fetch_array($r)){
    $idu = $l[0];
}

if (isset($_REQUEST['edad'])) {
    $edad = $_POST['edad'];
} else {
    $edad = "";
}

if (isset($_REQUEST['date'])) {
    $fechanac = $_POST['date'];
} else {
    $fechanac = "";
}

if (isset($_REQUEST['dom'])) {
    $domicilio = $_POST['dom'];
} else {
    $domicilio = "";
}

if (isset($_REQUEST['dis'])) {
    $discapacidad = $_POST['dis'];
} else {
    $discapacidad = "";
}

if (isset($_REQUEST['sex'])) {
    $sexo = $_POST['sex'];
} else {
    $sexo = "";
}

if (isset($_REQUEST['nest'])) {
    $nivelest = $_POST['nest'];
} else {
    $nivelest = "";
}

/*echo $edad;
echo $fechanac;
echo $domicilio;
echo $discapacidad;
echo $sexo;
echo $nivelest;*/

$ins_datos = mysql_query ("INSERT INTO datos (idPersona, idEncuesta, Datos)
VALUES ('$idu', 1, '$edad') , ('$idu', 1, '$fechanac') , ('$idu', 1, '$domicilio') , 
('$idu', 1, '$discapacidad') , ('$idu', 1, '$sexo') , ('$idu', 1, '$nivelest');");


$query = "SELECT * FROM pregunta WHERE idTema = 1";
$result=mysql_query($query) or die('Consulta Fallida'. mysql_error());
while ($linea=mysql_fetch_array($result)){
    $query_op = "SELECT * FROM opcion WHERE idPregunta='$linea[0]'";
    $result2 = mysql_query($query_op) or die('Consulta 2 Fallida'. mysql_error());
    $count = mysql_num_rows($result2);
     //$op = mysql_fetch_array($result2);
    for ($i=0; $i<$count; $i++ ){
        while($op=mysql_fetch_array($result2)){
            $prg = $op[1];
            if (isset($_POST[$op[1]])) {
                $var = $_POST[$op[1]]; 
            }    
        }
    }
    //echo $var;
    //echo "<br>";
    $insetar = mysql_query ("INSERT INTO respuesta (idPregunta, Respuesta, idPersona)
                VALUES ('$prg', '$var', '$idu');");
}

$query2 = "SELECT * FROM pregunta WHERE idTema = 2";
$result=mysql_query($query2) or die('Consulta Fallida'. mysql_error());
while ($linea=mysql_fetch_array($result)){
    $query_op = "SELECT * FROM opcion WHERE idPregunta='$linea[0]'";
    $result2 = mysql_query($query_op) or die('Consulta 2 Fallida'. mysql_error());
    //$count = mysql_num_rows($result2);
     //$op = mysql_fetch_array($result2);
    //for ($i=0; $i<$count; $i++ ){
        
            if ($linea[3] == 'check'){
                while($op=mysql_fetch_array($result2)){    
                    $prg1 = $linea[0];
                    if (isset($_POST[$op[0]])) {
                        $var1 = $_POST[$op[0]];
                        //echo $var1;
                        //echo "<br>";
                        $insetar = mysql_query ("INSERT INTO respuesta (idPregunta, Respuesta, idPersona)
                        VALUES ('$prg1', '$var1', '$idu');");
                    }
                }
            } else if ($linea[3] == 'radio'){
                for($i=0; $i<1; $i++){
                    while($op=mysql_fetch_array($result2)){
                        $prg2=$linea[0];
                        if (isset($_POST[$op[1]])) {
                            $var2 = $_POST[$op[1]];
                            
                        }   
                    }//echo $var2;
                    //echo "<br>";
                    $insetar = mysql_query ("INSERT INTO respuesta (idPregunta, Respuesta, idPersona)
                    VALUES ('$prg2', '$var2', '$idu');");
                }
            } else if ($linea[3] == 'tabla'){
                while($op=mysql_fetch_array($result2)){
                    $prg3 = $linea[0];
                    if (isset($_POST[$op[0]])) {
                        $var3 = $_POST[$op[0]];
                        //echo $var3;
                        //echo "<br>";
                        $insetar = mysql_query ("INSERT INTO respuesta (idPregunta, Respuesta, idPersona)
                        VALUES ('$prg3', '$var3', '$idu');");
                    } 
                }
            } else if ($linea[3] == 'textbox'){
                while($op=mysql_fetch_array($result2)){
                    $prg4 = $linea[0];
                    if (isset($_POST[$op[0]])) {
                        $var4 = $_POST[$op[0]];
                        //echo $var4;
                        //echo "<br>";
                        $insetar = mysql_query ("INSERT INTO respuesta (idPregunta, Respuesta, idPersona)
                        VALUES ('$prg4', '$var4', '$idu');");
                    } 
                }
            }
    //}
}

$query3 = "SELECT * FROM pregunta WHERE idTema = 3";
$result=mysql_query($query3) or die('Consulta Fallida'. mysql_error());
while ($linea=mysql_fetch_array($result)){
    $query_op = "SELECT * FROM opcion WHERE idPregunta='$linea[0]'";
    $result2 = mysql_query($query_op) or die('Consulta 2 Fallida'. mysql_error());
    //$count = mysql_num_rows($result2);
     //$op = mysql_fetch_array($result2);
    //for ($i=0; $i<$count; $i++ ){
        
            if ($linea[3] == 'check'){
                while($op=mysql_fetch_array($result2)){    
                    $prg5 = $linea[0];
                    if (isset($_POST[$op[0]])) {
                        $var5 = $_POST[$op[0]];
                        //echo $var5;
                        //echo "<br>";
                        $insetar = mysql_query ("INSERT INTO respuesta (idPregunta, Respuesta, idPersona)
                        VALUES ('$prg5', '$var5', '$idu');");
                    }
                }
            } else if ($linea[3] == 'radio'){
                for($i=0; $i<1; $i++){
                    $prg6 = $linea[0];
                    while($op=mysql_fetch_array($result2)){
                        if (isset($_POST[$op[1]])) {
                            $var6 = $_POST[$op[1]];
                            
                        }   
                    }//echo $var6;
                    //echo "<br>";
                    $insetar = mysql_query ("INSERT INTO respuesta (idPregunta, Respuesta, idPersona)
                    VALUES ('$prg6', '$var6', '$idu');");
                }
            } else if ($linea[3] == 'tabla'){
                while($op=mysql_fetch_array($result2)){
                    $prg7 = $linea[0];
                    if (isset($_POST[$op[0]])) {
                        $var3 = $_POST[$op[0]];
                        //echo $var7;
                        //echo "<br>";
                        $insetar = mysql_query ("INSERT INTO respuesta (idPregunta, Respuesta, idPersona)
                        VALUES ('$prg7', '$var7', '$idu');");
                    } 
                }
            } else if ($linea[3] == 'textbox'){
                while($op=mysql_fetch_array($result2)){
                    $prg8 = $linea[0];
                    if (isset($_POST[$op[0]])) {
                        $var8 = $_POST[$op[0]];
                        //echo $var8;
                        //echo "<br>";
                        $insetar = mysql_query ("INSERT INTO respuesta (idPregunta, Respuesta, idPersona)
                        VALUES ('$prg8', '$var8', '$idu');");
                    } 
                }
            }
    //}
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
                <h3>Gracias por responder a nuestro cuestionario</h3><br>
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