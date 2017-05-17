<?php
      session_start();
      
      if(isset($_POST['botonEliminarSessionAdministrador'])) {
        unset($_SESSION['sessionUsuarioAdministrador']);
        session_destroy();            
        header("location: ../index.php");
      }
      if (empty($_SESSION['sessionUsuarioAdministrador'])) {
        header('location: ../index.php');
      } else {
        $usuario = $_SESSION['sessionUsuarioAdministrador'];
        $rolUsuario = "administrador";
        //echo "usuarioSession: ".$usuario;
        //echo "contrasenaSession: ".$contrasena;        
      }        
      if (isset($_POST['botonPerfilAdministrador'])) { 
        header("location: ventanPerfilAdministrador.php");
      }
    ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>
      Biblioclic
    </title>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">     
    <link rel="stylesheet" type="text/css" href="../fontAwesome/css/font-awesome.css">         
  </head>

  <body class="no-skin" style="overflow-x:hidden">    
    <header>
      <div id="navbar" class="navbar navbar-light bg-faded">
        <div class="navbar-container ace-save-state">          
          <div class="navbar-header pull-left">
            <a href="index.php" class="navbar-brand">
              <img src="imagenes/logoBiblio2.png" width="260" height="65" alt="">
              <small style=" font-size:1.2em; color:black;  margin-left: 30px">
                Panel de Administrador
              </small>
            </a>
          </div>
          <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
              <li class="light-blue dropdown-modal">
                <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                  <img class="nav-user-photo" src="imagenes/administrador.jpg" alt="logotipo" style="width: 80px; height:80px" />
                  <span class="user-info">
                    <?php                   
                      echo "<small style='font-size:1em'>Bienvenido,</small> ".$usuario." ";                      
                    ?>
                  </span>               
                  <i class="ace-icon fa fa-caret-down">
                  </i><!-- icono v-->
                </a>
                <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                  <li>
                    <a>                   
                      <form action="" method="post">                                            
                          <input type="submit" value="Perfil" name="botonPerfilAdministrador" class="btn btn-link">
                      </form>
                    </a>
                  </li>                              
                  <li>
                    <a>            

                      <form action="" method="post">                                            
                        <input type="submit" value="Cerrar Sesión" name="botonEliminarSessionAdministrador" class="btn btn-link">
                      </form>
                    </a>
                  </li>               
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <nav class="navbar navbar-inverse" id="idColordeBarra"><!--Inicio del panel de opciones-->    
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">
            Toggle navigation
          </span>
          <span class="icon-bar">
          </span>
          <span class="icon-bar">
          </span>
          <span class="icon-bar">
          </span>
        </button>          
      </div>        
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-university" style="font-size:24px" id="idColorIconoBarra">
              </i>
              <span id="idColorLetraBarra">
                Bibliotecario
              </span>
              <span class="caret" id="idColorLetraBarra">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="ventanaRegistrarBibliotecario.php">
                  Registrar
                </a>
              </li>
              <li>
                <a href="ventanaEliminarBibliotecario.php">
                  Eliminar
                </a>
              </li>
              <li>
                <a href="ventanaModificarBibliotecario.php">
                  Modificar
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="ventanaListaBibliotecarios.php">
                  Ver Lista de Bibliotecarios
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-users" style="font-size:24px" id="idColorIconoBarra">
              </i>
              <span id="idColorLetraBarra">
                Usuarios
              </span>
              <span class="caret" id="idColorIconoBarra">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="ventanaRegistrarLector.php">
                  Registrar
                </a>
              </li>
              <li>
                <a href="ventanaEliminarLector.php">
                  Eliminar
                </a>
              </li>                  
              <li>
                <a href="ventanaModificarLector.php">
                  Modificar
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="ventanaListaLectores.php">
                  Ver Lista de Lectores
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-book " style="font-size:24px" id="idColorIconoBarra">
              </i>
              <span id="idColorLetraBarra">
                Libros
              </span>
              <span class="caret" id="idColorIconoBarra">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="ventanaRegistrarLibro.php">
                  Registrar
                </a>
              </li>
              <li>
                <a href="ventanaEliminarLibro.php">
                  Eliminar
                </a>
              </li>
              <li>
                <a href="ventanaModificarLibro.php">
                  Modificar
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="ventanaListaLibros.php">
                  Ver Lista de libros
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-film" style="font-size:24px" id="idColorIconoBarra">
              </i>
              <span id="idColorLetraBarra"> Cd´s
              </span>
              <span class="caret" id="idColorIconoBarra">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="ventanaRegistrarCd.php">
                  Registrar
                </a>
              </li>
              <li>
                <a href="ventanaEliminarCd.php">
                  Eliminar
                </a>
              </li>
              <li>
                <a href="ventanaModificarCd.php">
                  Modificar
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="ventanaListaCDS.php">
                  Ver Lista de CD´S
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-file-text-o" style="font-size:24px" id="idColorIconoBarra">
              </i>
              <span id="idColorLetraBarra">
                Revistas
              </span>
              <span class="caret" id="idColorIconoBarra">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="ventanaRegistrarRevista.php">
                  Registrar
                </a>
              </li>
              <li>
                <a href="ventanaEliminarRevista.php">
                  Eliminar
                </a>
              </li>
              <li>
                <a href="ventanaModificarRevista.php">
                  Modificar
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="ventanaListaRevistas.php">
                  Ver Lista de Revistas
                </a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-file-text-o" style="font-size:24px" id="idColorIconoBarra"></i>
                <span id="idColorLetraBarra"> Mensajes</span><span class="caret" id="idColorIconoBarra"></span></a>
              <ul class="dropdown-menu">
                <li><a href="ventanaRegistrarMensaje.php">Registrar</a></li>
                <li><a href="ventanaEliminarMensaje.php">Eliminar</a></li>                
                <li role="separator" class="divider"></li>
                <li><a href="ventanaListaMensaje.php">Bandeja de entrada</a></li>
              </ul>
            </li>              

        </ul><!--Fin de <ul class="nav navbar-nav"> -->             
      </div><!--Fin de <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> --> 
    </nav><!--Cierre del panel de opciones-->    
   
    <section id="idEspacioSection">
      <div class="row">
        <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div class="panel panel-info">
            <div class="panel-heading" id="idCambioColorPanel" >
              <center id="idLetraRegistrar">
                Registrar Mensaje
              </center>
            </div>
            <div class="panel-body">
              <?php
                echo "<input type='hidden' name='campoOcultoUsuario' id = 'idCampoOcultoUsuario' value='$usuario'>";
                echo "<input type='hidden' name='campoOcultoRolUsuario' id = 'idCampoOcultoRolUsuario' value='$rolUsuario'>";                
              ?>
              <form action="#" method="post" name="frm" class="form-horizontal" id="idFormularioRegistrarMensaje">
              
              </form>
            </div>
          </div>
        </div>
      </div>      
      <article>
      </article>
      <article>
      </article>      
    </section>      

    <aside>
    </aside>

    <div class="footer-fix">
    </div>

    <footer id="idFooter">
      <p>
        Privacidad Términos y Condiciones @2017 BIBLIOCLIC
      </p>
      <p>
        Desarrolladores: Lic. Heydi Ramirez & Lic. Jose Armando Rosario
      </p> 
      <p>
        Biblioclic al alcance de tus manos, consulta de libros, cd´s, revistas, etc...
      </p>   
      </p>
        Contáctanos:
        <a href="mailto:someone@example.com">
          biblioclic@biblioclic.com
        </a>
      </p>
    </footer>
    <!--Inicio de los Scripts-->  
    <script src="evento/jquery-3.1.1.min.js">
    </script><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->  
    <script src="evento/eventosVentanaRegistrarMensaje.js">
    </script>
    <script src="bootstrap/js/bootstrap.min.js">
    </script><!-- Include all compiled plugins (below), or include individual files as needed -->  
  </body><!--Termina el body-->
</html>