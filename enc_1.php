<?php 
session_start();
if (!$_SESSION['user'] ) {
    header('location: index.php');
} else {
    $grabado="<strong style='color:white'>BIENVENIDO ".$_SESSION['user']."</strong>";
    $us = $_SESSION['user'];
}
require 'conexion.php';

$qfnac = "SELECT Fecha_Nac FROM persona WHERE Usuario='$us'";
$result = mysql_query($qfnac) or die('Consulta Fallida'. mysql_error());
if($fus=mysql_fetch_array($result)){
    $fecha = $fus[0];
}
date_default_timezone_set('America/Argentina/Buenos_Aires');?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Encuesta</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery.datepicker.css">

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-2.2.0.js"></script>
<script type="text/javascript" src="js/jquery.datepicker.js"></script>
<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
    
    
    <style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > /*a > img*/ {
        width: 70%;
        margin: auto;
    }
    </style>  
  
    <style>
    .item{
        
        display:block;
    }

    .carousel-caption{
        color:#000;
        position:static;
    }
      
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 800px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
     /*Set black background color, white text and some padding*/ 
    footer {
      /*background-color: #f1f1f1;
      color: white;*/
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }
    </style>
    <?php include 'header.php';
    include 'head_common.php';?>
</head>
<body>
<div class="container-fluid">
    <div class="row content">
    <div class="col-sm-12 col-lg-12 navbar navbar-dark bg-inverse ">
        <br>
      <h3 style="text-align:center">Encuesta</h3>
      <ul class="nav nav-tabs nav-justified"><!--nav nav-pills nav-stacked-->
        <li data-target="#myCarousel" data-slide-to="0" role="presentation" class="active"><a class="" href="#section1">Datos personales</a></li>
        <?php
        $query = "SELECT * FROM tema";
        $result=mysql_query($query) or die('Consulta Fallida'. mysql_error());
        while ($linea=mysql_fetch_array($result)){  
            echo '<li data-target="#myCarousel" data-slide-to=\''.$linea[0].'\' role="presentation"><a href="">'.$linea[2].'</a></li>';//href="#section2" <-- no importa
        }
        ?>
        <!--<li data-target="#myCarousel" data-slide-to="2"><a href="#section3">Formacion recibida en la Asociacion</a></li>
        <li data-target="#myCarousel" data-slide-to="3"><a href="#section3">Hablemos de su futuro</a></li>-->
      </ul><br>
      <!--<div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>-->
    </div>
    <div class="col-sm-2 col-lg-2"></div>
    <div class="col-sm-8 col-lg-8">      
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
    <!-- Wrapper for slides -->
      <br>
      <form action="recibe.php" method="post">
    <div class="carousel-inner" role="listbox">
      <div class="item active">
          <ul class="list-group">
              <li class="list-group-item">Edad:
                  <div class="input-group">
                      <input type="text" id="edad" name="edad">
                  </div></li>
              <br><li class="list-group-item">Fecha de Nacimiento:
              <div class="input-group">
                  <input type="text" name="date" id="date" data-select="datepicker" data-toggle="datepicker" value="<?php echo $fecha;?>" disabled>
              </div>
              </li>
              <br><li class="list-group-item">Domicilio:
              <div class="input-group">
                  <input type="text" id="dom" name="dom">
              </div></li>
              <br><li class="list-group-item">Discapacidad:
              <div class="input-group">
                  <input type="text" id="dis" name="dis">
              </div></li>
              <br><li class="list-group-item">Sexo:
              <ul>
                  <li>Femenino:<input type="radio" id="sex" name="sex" value="femenino"></li>
                  <li>Masculino:<input type="radio" id="sex" name="sex" value="masculino"></li>
              </ul></li><br>
              <li class="list-group-item">Nivel de estudios:
              <ul>
                  <li>Sin estudios:<input type="radio" id="nest" name="nest" value="sin_estudio"></li>
                  <li>Primario:</li>
                  <ul>
                      <li>Completo<input type="radio" id="nest" name="nest" value="primario_completo"></li>
                      <li>Incompleto<input type="radio" id="nest" name="nest" value="primario_incompleto"></li>
                  </ul>
                  <li>Secundario:</li>
                  <ul>
                      <li>Completo<input type="radio" id="nest" name="nest" value="secundario_completo"></li>
                      <li>Incompleto<input type="radio" id="nest" name="nest" value="secundario_incompleto"></li>
                  </ul>
              </ul></li>
          </ul>
      </div>

      <div class="item">
        <ul class="list-group">  
          <?php
          $query = "SELECT * FROM pregunta WHERE idTema = 1";
          $result=mysql_query($query) or die('Consulta Fallida'. mysql_error());
          while ($linea=mysql_fetch_array($result)){
              echo "<li class='list-group-item'>".$linea[2];
              $query_op = "SELECT * FROM opcion WHERE idPregunta='$linea[0]'";
              $result2 = mysql_query($query_op) or die('Consulta 2 Fallida'. mysql_error());
              $count = mysql_num_rows($result2);
              //$op = mysql_fetch_array($result2);
              echo "<ul>";
              for ($i=0; $i<$count; $i++ ){
                  while($op=mysql_fetch_array($result2)){
                      echo "<li>".$op[2]."<input type='radio' id=\"".$op[1]."\"name=\"".$op[1]."\" value=\"".$op[2]."\"></li>";
                  }
              }
              echo "</ul></li>";
          }
          ?>
          </ul>
          <!--<li>¿Antes de realizar el curso, había trabajado alguna vez?:</li>
            
                <li>Si<input type="radio" id="prg21" name="prg21"></li>
                <li>No<input type="radio" id="prg21" name="prg21"></li>
            </ul>
          <li>¿Trabaja en algo relacionado con el curso?:</li>
            <ul>
                <li>Si<input type="radio" id="prg22" name="prg22"></li>
                <li>No<input type="radio" id="prg22" name="prg22"></li>
            </ul>
          <li>¿Está intentando hacerlo?:</li>
            <ul>
                <li>Si<input type="radio" id="prg23" name="prg23"></li>
                <li>No<input type="radio" id="prg23" name="prg23"></li>
            </ul>
          <li>¿Hay algún problema de edad o por ser hombre o mujer para conseguir trabajo?:</li>
            <ul>
                <li>Si<input type="radio" id="prg24" name="prg24"></li>
                <li>No<input type="radio" id="prg24" name="prg24"></li>
            </ul>
        </ul>-->
      </div>
    
      <div class="item">
          <ul class="list-group">
            <?php
            $query = "SELECT * FROM pregunta WHERE idTema = 2";
            $result=mysql_query($query) or die('Consulta Fallida'. mysql_error());
            while ($linea=mysql_fetch_array($result)){
                echo "<li class='list-group-item'>".$linea[2];
                $query_op = "SELECT * FROM opcion WHERE idPregunta='$linea[0]'";
                $result2 = mysql_query($query_op) or die('Consulta 2 Fallida'. mysql_error());
                $count = mysql_num_rows($result2);
                echo "<ul>";
                for ($i=0; $i<$count; $i++ ){
                    while($op=mysql_fetch_array($result2)){
                        if ($linea[3] == 'check'){
                            echo "<li>".$op[2]."<input type='checkbox' id=\"".$op[1]."\"name=\"".$op[0]."\" value=\"".$op[2]."\"></li>";
                        } else if ($linea[3] == 'radio') {
                            echo "<li>".$op[2]."<input type='radio' id=\"".$op[1]."\"name=\"".$op[1]."\" value=\"".$op[2]."\"></li>";
                        } else if ($linea[3] == 'tabla') {
                            echo "<table>";  
                            echo "<tr>";  
                            echo "<th></th>";  
                            echo "<th>Malo &nbsp;</th>";  
                            echo "<th>Regular &nbsp;</th>";
                            echo "<th>Bueno &nbsp;</th>";
                            echo "<th>Muy Bueno &nbsp;</th>";
                            echo "<th>Excelente &nbsp;</th>";
                            echo "</tr>";  
                            while ($op = mysql_fetch_row($result2)){   
                                echo "<tr>";  
                                echo "<td>$op[2]</td>";  
                                echo "<td><input type='radio' id=\"".$op[1]."\"name=\"".$op[0]."\" value='malo'></td>";  
                                echo "<td><input type='radio' id=\"".$op[1]."\" name=\"".$op[0]."\" value='regular'></td>";
                                echo "<td><input type='radio' id=\"".$op[1]."\" name=\"".$op[0]."\" value='bueno'></td>";
                                echo "<td><input type='radio' id=\"".$op[1]."\" name=\"".$op[0]."\" value='muy_bueno'></td>";
                                echo "<td><input type='radio' id=\"".$op[1]."\" name=\"".$op[0]."\" value='excelente'></td>";
                                echo "</tr>";  
                            }  
                            echo "</table>";
                        }
                    }
                }
                echo "</ul></li>";
            }
            ?>
            <!--<li>¿Recibió información antes del curso?:</li>
            <ul>
                <li>Si<input type="radio" id="prg31" name="prg31"></li>
                <li>No<input type="radio" id="prg31" name="prg31"></li>
            </ul>
          <li>¿Cómo se siente con el curso realizado?:</li>
            <ul>
                <li>Poco conforme<input type="radio" id="prg32" name="prg32"></li>
                <li>Conforme<input type="radio" id="prg32" name="prg32"></li>
                <li>Muy conforme<input type="radio" id="prg32" name="prg32"></li>
            </ul>
          <li>¿Y respecto a lo que esperaba del curso?:</li>
            <ul>
                <li>Poco satisfecho<input type="radio" id="prg33" name="prg33"></li>
                <li>Satisfecho<input type="radio" id="prg33" name="prg33"></li>
                <li>Muy satisfecho<input type="radio" id="prg33" name="prg33"></li>
            </ul>
          <li>Señale los motivos por lo que está satisfecho con la formación recibida:</li>
            <ul>
                <li>El equipamiento con el que cuenta la asociación permite una buena formación<input type="checkbox" id="op11" name="op11"></li>
                <li>La formación de aptitudes de autoformación y disciplina<input type="checkbox" id="op21" name="op21"></li>
                <li>La formación y adquisición de habilidades básicas mejoraron el desempeño laboral<input type="checkbox" id="op31" name="op31"></li>
                <li>El instructor/a tienen experiencia y está actualizada/o<input type="checkbox" id="op41" name="op41"></li>
                <li>Las competencias profesionales que adquirió durante el curso fueron positivas para su desempeño laboral<input type="checkbox" id="op51" name="op51"></li>
                <li>Las prácticas fueron suficientes<input type="checkbox" id="op61" name="op61"></li>
                <li>El instructor/a sabía hacerse entender<input type="checkbox" id="op71" name="op71"></li>
            </ul>
        <li>Señale los motivos por lo que no está satisfecho:</li>
            <ul>
                <li>Falta mayor relación entre las necesidades reales y los contenidos del curso<input type="checkbox" id="op12" name="op12"></li>
                <li>Escasa actualización y profundización de los contenidos<input type="checkbox" id="op22" name="op22"></li>
                <li>No se tuvo en cuenta los saberes previos de los participantes<input type="checkbox" id="op32" name="op32"></li>
                <li>Poca experiencia y actualización de los instructores<input type="checkbox" id="op42" name="op42"></li>
                <li>Las competencias profesionales que adquirió durante el curso no influyeron o influyeron negativamente en su desempaño laboral<input type="checkbox" id="op52" name="op52"></li>
                <li>Las prácticas fueron escasas<input type="checkbox" id="op62" name="op62"></li>
                <li>No entendí al instructor/a<input type="checkbox" id="op72" name="op72"></li>
            </ul>
        <li>¿Cómo clasificaría cada uno de estos aspectos del curso?:</li>
            <table>
              <tr>
                  <td>---- &nbsp;<br></td>
                  <td>Malo &nbsp;<br></td>
                  <td>Regular &nbsp;<br></td>
                  <td>Bueno &nbsp;<br></td>
                  <td>Muy bueno &nbsp;<br></td>
                  <td>Excelente &nbsp;</td>
              </tr>
              <tr>
                  <td>Instructores &nbsp;<br></td>
                  <td><input type="radio" id="gr1" name="gr1"> &nbsp;<br></td>
                  <td><input type="radio" id="gr1" name="gr1"> &nbsp;<br></td>
                  <td><input type="radio" id="gr1" name="gr1"> &nbsp;<br></td>
                  <td><input type="radio" id="gr1" name="gr1"> &nbsp;<br></td>
                  <td><input type="radio" id="gr1" name="gr1"> &nbsp;<br></td>
              </tr>
                <tr>
                  <td>Contenidos &nbsp;<br></td>
                  <td><input type="radio" id="gr2" name="gr2"> &nbsp;<br></td>
                  <td><input type="radio" id="gr2" name="gr2"> &nbsp;<br></td>
                  <td><input type="radio" id="gr2" name="gr2"> &nbsp;<br></td>
                  <td><input type="radio" id="gr2" name="gr2"> &nbsp;<br></td>
                  <td><input type="radio" id="gr2" name="gr2"> &nbsp;<br></td>
              </tr>
                <tr>
                  <td>Material didactico &nbsp;<br></td>
                  <td><input type="radio" id="gr3" name="gr3"> &nbsp;<br></td>
                  <td><input type="radio" id="gr3" name="gr3"> &nbsp;<br></td>
                  <td><input type="radio" id="gr3" name="gr3"> &nbsp;<br></td>
                  <td><input type="radio" id="gr3" name="gr3"> &nbsp;<br></td>
                  <td><input type="radio" id="gr3" name="gr3"> &nbsp;<br></td>
              </tr>
                <tr>
                  <td>Actividades prácticas &nbsp;<br></td>
                  <td><input type="radio" id="gr4" name="gr4"> &nbsp;<br></td>
                  <td><input type="radio" id="gr4" name="gr4"> &nbsp;<br></td>
                  <td><input type="radio" id="gr4" name="gr4"> &nbsp;<br></td>
                  <td><input type="radio" id="gr4" name="gr4"> &nbsp;<br></td>
                  <td><input type="radio" id="gr4" name="gr4"> &nbsp;<br></td>
              </tr>
                <tr>
                  <td>Equipamientos &nbsp;<br></td>
                  <td><input type="radio" id="gr5" name="gr5"> &nbsp;<br></td>
                  <td><input type="radio" id="gr5" name="gr5"> &nbsp;<br></td>
                  <td><input type="radio" id="gr5" name="gr5"> &nbsp;<br></td>
                  <td><input type="radio" id="gr5" name="gr5"> &nbsp;<br></td>
                  <td><input type="radio" id="gr5" name="gr5"> &nbsp;<br></td>
              </tr>
            </table>
            <li>¿Cómo se sintió en la relación con el grupo de compañeros/as?:</li>
            <ul>
                <li>Bien<input type="radio" id="prg36" name="prg36"></li>
                <li>Regular<input type="radio" id="prg36" name="prg36"></li>
                <li>Incomodo/a<input type="radio" id="prg36" name="prg36"></li>
            </ul>
            <li>¿El vínculo con el instructor/a le ayudó a comunicarse y a abrirse a otras personas?:</li>
            <ul>
                <li>Sí, fue favorecido<input type="radio" id="prg37" name="prg37"></li>
                <li>No<input type="radio" id="prg37" name="prg37"></li>
            </ul>
            <li>¿Se sintió valorado/a?:</li>
            <ul>
                <li>Sí<input type="radio" id="prg38" name="prg38"></li>
                <li>No<input type="radio" id="prg38" name="prg38"></li>
            </ul>
            <li>¿Se sintió acompañado/a?:</li>
            <ul>
                <li>Sí<input type="radio" id="prg39" name="prg39"></li>
                <li>No<input type="radio" id="prg39" name="prg39"></li>
            </ul>
            <li>¿Se sintió más seguro/a?:</li>
            <ul>
                <li>Sí<input type="radio" id="prg310" name="prg310"></li>
                <li>No<input type="radio" id="prg310" name="prg310"></li>
            </ul>-->
        </ul>
      </div>

      <div class="item">
        <ul class="list-group">  
          <?php
          $query = "SELECT * FROM pregunta WHERE idTema = 3";
          $result=mysql_query($query) or die('Consulta Fallida'. mysql_error());
          while ($linea=mysql_fetch_array($result)){
              echo "<li class='list-group-item'>".$linea[2];
              $query_op = "SELECT * FROM opcion WHERE idPregunta='$linea[0]'";
              $result2 = mysql_query($query_op) or die('Consulta 2 Fallida'. mysql_error());
              $count = mysql_num_rows($result2);
              //$op = mysql_fetch_array($result2);
              echo "<ul>";
              for ($i=0; $i<$count; $i++ ){
                  while($op=mysql_fetch_array($result2)){
                      if ($linea[3] == 'radio'){
                          echo "<li>".$op[2]."<input type='radio' id=\"".$op[1]."\"name=\"".$op[1]."\" value=\"".$op[2]."\"></li>";
                      } else if ($linea[3] == 'textbox'){
                          echo "<textarea id=\"".$op[1]."\" name=\"".$op[0]."\" style='resize:none' rows='2' cols='49'></textarea>";
                      }
                  }
              } 
              echo "</ul></li>";
          }
          ?>
            <!--<li>¿Tiene ganas de seguir aprendiendo?:</li>
            <ul>
                <li>Si<input type="radio" id="prg41" name="prg41"></li>
                <li>No<input type="radio" id="prg41" name="prg41"></li>
            </ul>
            <li>¿Qué curso le gustaría hacer?:</li>
            <textarea style="resize:none" rows="2" cols="49"></textarea>-->
        </ul>
        <button class="btn btn-success">enviar</button>
      </div>
    </div>
    </form>
    <!-- Left and right controls -->
    <!--<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>-->
  </div>
        
	
	<!--<script src="js/jquery.min.js"></script>	
	<script src="js/bootstrap.min.js"></script>-->
    </div>
    <div class="col-sm-2 col-lg-2"></div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
