<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Encuesta UNaF</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><?php 
                if($_SESSION['user'] == 'system'){
                    echo'<a href="index_sys.php">Inicio</a>';
                } else {
                    echo '<a href="index.php">Inicio</a>';
                }
                ?>
                </li>
            <li><a href="#about">Acerca</a></li>
            <li><a href="#contact">Contacto</a></li>
            <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>-->
          </ul>
          <form class="navbar-form navbar-right" method="post">
            <?php 
                if($_SESSION['user']){
                    echo $grabado;
                    echo'&nbsp;<a href="logout.php">salir</a>';
                } else {
                    echo '<div class="form-group">
                    <input type="text" placeholder="Email" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                    <input type="password" placeholder="Contraseña" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Ingresar</button>
                    <a href="" data-toggle="modal" data-target="#myModal">Registrarse</a>';
                }
            ?>
        </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>