<?php
  require "../modelo/BaseDatos.php";
  $accionElegida = $_POST['accion'];  
  

  if (strcmp($accionElegida, "mostrarInformacionAdministradorEnviarMensaje") == 0) {
    $campoOcultoRolUsuario = $_POST['campoOcultoRolUsuario'];
    $campoOcultoUsuario = $_POST['campoOcultoUsuario'];    
    mostrarInformacionAdministradorEnviarMensaje($campoOcultoRolUsuario,$campoOcultoUsuario);    
  } elseif (strcmp($accionElegida, "registrarMensaje") == 0) {  
    $idCampoTipoUsuarioEmisor= $_POST['idCampoTipoUsuarioEmisor'];
    $idCampoUsuario= $_POST['idCampoUsuario'];
    $idCampoCorreoEmisor= $_POST['idCampoCorreoEmisor'];
    $idComboTipoUsuarioReceptor= $_POST['idComboTipoUsuarioReceptor'];
    $idCampoCorreoReceptor= $_POST['idCampoCorreoReceptor'];
    $idAreaMensaje= $_POST['idAreaMensaje'];    

    $sentencia = "INSERT INTO mensaje VALUES('$idCampoTipoUsuarioEmisor', '$idCampoUsuario', '$idCampoCorreoEmisor', '$idComboTipoUsuarioReceptor', '$idCampoCorreoReceptor', '$idAreaMensaje')";
    $bd = new BaseDatos();
    $bd->realizarConexion();
    if ($bd->realizarAccion($sentencia)) {
      echo "true";
    } else {
      echo "false";
    }
    $bd->cerrarConexion();    
  }

  
  function mostrarInformacionAdministradorEnviarMensaje($campoOcultoRolUsuario,$campoOcultoUsuario) {  
    $query = "select correo FROM administrador WHERE idUsuario = '$campoOcultoUsuario'";
    $bd = new BaseDatos();
    $bd->realizarConexion();
    $resultado = $bd->realizarConsulta($query);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_array(MYSQLI_BOTH);
        $resultadoCorreo = $fila[0];        
    } else {
      //HAY UN ERRR
    }

    $filaTabla = "    
       <div class='form-group'>
          <label for='' style='text-align:left' class='col-sm-4 control-label'>
            TipoUsuarioEmisor:
          </label>
          <div class='col-sm-8'>
            <div class='input-group'>                      
              <input type='text' class='form-control' name='campoTipoUsuarioEmisor' id ='idCampoTipoUsuarioEmisor' required value = '$campoOcultoRolUsuario' readonly = 'true'>
              <span class='input-group-addon'>
                <i class='fa fa-user-plus' aria-hidden='true'>
                </i>
              </span>
            </div>
          </div>                  
        </div>

        <div class='form-group'>
          <label for='' style='text-align:left' class='col-sm-4 control-label'>
            usuario:
          </label>
          <div class='col-sm-8'>
            <div class='input-group'>                      
              <input type='text' class='form-control' name='campoUsuario' id ='idCampoUsuario' required value = '$campoOcultoUsuario' readonly = 'true'>
              <span class='input-group-addon'>
                <i class='fa fa-user-plus' aria-hidden='true'>
                </i>
              </span>
            </div>
          </div>                  
        </div>

        <div class='form-group'>
          <label for='' style='text-align:left' class='col-sm-4 control-label'>
            CorreoEmisor:
          </label>
          <div class = 'col-sm-8'>
            <div class = 'input-group'>
              <input type='text' class='form-control' name='correoEmisor' id = 'idCampoCorreoEmisor' required value = '$resultadoCorreo' readonly = 'true'>
              <span class='input-group-addon'>
                <i class='fa fa-user-plus' aria-hidden='true'>
                </i> 
              </span>
            </div>                    
          </div>
        </div>

         <div class='form-group'>
          <label for='' style='text-align:left' class='col-sm-4 control-label'>
            TipoUsuarioReceptor:
          </label>
          <div class='col-sm-8'>
            <select  name = 'comboTipoUsuarioReceptor' id = 'idComboTipoUsuarioReceptor' class='form-control'>
              <option value='administrador'>administrador</option>
              <option value='bibliotecario'>bibliotecario</option>
            </select>
          </div>                  
        </div>  

          <div class='form-group'>
          <label for='' style='text-align:left' class='col-sm-4 control-label'>
            CorreoReceptor:
          </label>
          <div class='col-sm-8'>
            <div class='input-group'>
              <input type='text' class='form-control' name='campoCorreoReceptor' id = 'idCampoCorreoReceptor' required>
              <span class='input-group-addon'>
                <i class='fa fa-user-plus' aria-hidden='true'>
                </i> 
              </span>
            </div>                    
          </div>
        </div>  

        <div class='form-group'>
          <label for='' style='text-align:left' class='col-sm-4 control-label'>
            Mensaje:
          </label>
          <div class='col-sm-8'>
            <div class='input-group'>              
              <textarea name='areaMensaje' id = 'idAreaMensaje' rows='4' class='col-xs-12 col-sm-12 col-md-12' minlength = '10' maxlength= '300' style='resize:none' required></textarea>
              <span class='input-group-addon'>
                <i class='fa fa-user-plus' aria-hidden='true'>
                </i> 
              </span>
            </div>                    
          </div>
        </div> 

        <div class='form-group'>
          <div class='col-sm-offset-4 col-xs-12 col-sm-8'>
            <button type='submit' class='btn btn-success'> 
              <span class='glyphicon glyphicon-ok'>
              </span>
              Enviar
            </button>
            <button type='reset' class='btn btn-primary' id='botonReset'>
              <span class='glyphicon glyphicon-remove'>
              </span>
              Limpiar
            </button>                    
          </div>
        </div>
    ";

    echo utf8_encode($filaTabla);    
  }


    
 ?>
