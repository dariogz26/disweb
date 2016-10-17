<?php 
session_start();
if (!$_SESSION['user'] ) {
    header('location: index.php');
} else {
    $grabado="<strong style='color:white'>BIENVENIDO ".$_SESSION['user']."</strong>";
    $us = $_SESSION['user'];
}
require 'conexion.php';

if (isset($_REQUEST['rep'])) {
    $rep = $_POST['rep'];
} else {
    $rep = "";
}

if (isset($_REQUEST['us'])) {
    $user = $_POST['us'];
} else {
    $user = "";
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
                <h1>Area para generar reportes</h1>
                <p class="lead">Por favor seleccione una opcion</p>
                <ul class="list-unstyled">
                    <form action="" method="post">
                    <li><select class='form-control' id='rep' name='rep'>
                        <option value="0" selected></option>
                        <option value="resp_us">Respuestas por Usuario</option>
                        <option value="tot_us">Usuarios totales</option>
                        </select>
                    </li>
                </ul>
                <?php
                if($rep=="resp_us"){
                    $query = "SELECT * FROM persona";
                    $result = mysql_query($query) or die('Consulta Fallida'. mysql_error());
                    echo "<br><select class='form-control' id='us' name='us'>"; //this.form.submit();
                    echo "<option value='0'>Elija un Usuario</option>";
                    while ($linea=mysql_fetch_array($result)){
                        echo "<option value=\"".$linea[0]."\">".$linea[1]." ".$linea[2]."</option>\n";
                    }
                    echo "</select><br>";    
                } echo '<button class="btn btn-default" type="submit">Generar &raquo;</button><br>';
                if ($rep=='tot_us'){
                    $query4 = "SELECT * FROM persona";
                    $result4 = mysql_query($query4) or die('Consulta Fallida'. mysql_error());
                    echo "<table class='table'>";  
                    echo "<tr>";  
                    echo "<th>Nombre y Apellido &nbsp;</th>";  
                    echo "<th>DNI &nbsp;</th>";  
                    echo "<th>Fecha Nacimiento &nbsp;</th>";
                    echo "<th>Usuario &nbsp;</th>";
                    echo "<th>Tel. Fijo &nbsp;</th>";
                    echo "<th>Celular &nbsp;</th>";
                    echo "</tr>";  
                    while ($op = mysql_fetch_row($result4)){   
                        echo "<tr>";  
                        echo "<td>$op[2], $op[1]</td>";  
                        echo "<td>$op[3]</td>";  
                        echo "<td>$op[4]</td>";
                        echo "<td>$op[5]</td>";
                        echo "<td>$op[7]</td>";
                        echo "<td>$op[8]</td>";
                        echo "</tr>";  
                    }  
                    echo "</table>";
                }
                ?>
                </form>
                <?php
                $query2 = "SELECT Pregunta, Respuesta FROM pregunta INNER JOIN respuesta ON pregunta.idPregunta=respuesta.idPregunta WHERE respuesta.idPersona='$user'";
                $result2=mysql_query($query2) or die ('Consulta fallida'. mysql_error());
                $query3 = "SELECT * FROM persona WHERE idpersona='$user'";
                $result3=mysql_query($query3) or die ('Consulta fallida'. mysql_error());
                $nom=mysql_fetch_array($result3);
                echo "<h3>".$nom[1]." ".$nom[2]."</h3>";
                while($tb=mysql_fetch_array($result2)){
                    echo "<table>";
                    echo "<tr>
                    <td><strong>$tb[0]</strong></td><br>
                    </tr>";
                    echo "<tr>
                    <td>$tb[1]</td><br>
                    </tr>";
                    echo "</table>";
                }
                ?>
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
