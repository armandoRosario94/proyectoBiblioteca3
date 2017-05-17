$(document).ready(
    function() {
        var idCampoOcultoUsuario = document.getElementById('idCampoOcultoUsuario');
        var idCampoOcultoRolUsuario = document.getElementById('idCampoOcultoRolUsuario');

        mostrarInformacionAdministradorEnviarMensaje(idCampoOcultoRolUsuario.value,idCampoOcultoUsuario.value);       
        
        $("#idFormularioRegistrarMensaje").submit(
            function(e) {
                e.preventDefault();

                var idCampoTipoUsuarioEmisor = document.getElementById('idCampoTipoUsuarioEmisor');
                var idCampoUsuario = document.getElementById('idCampoUsuario');
                var idCampoCorreoEmisor = document.getElementById('idCampoCorreoEmisor');
                var idComboTipoUsuarioReceptor = document.getElementById('idComboTipoUsuarioReceptor');
                var idCampoCorreoReceptor = document.getElementById('idCampoCorreoReceptor');
                var idAreaMensaje = document.getElementById('idAreaMensaje');

                //alert("valores modificados: "+idCampoUsuarioFormularioModal.value+", "+idCampoNombreFormularioModal.value+", "+idCampoApellidoFormularioModal.value+", "+idCampoContrasena1FormularioModal.value+", "+idCampoContrasena2FormularioModal.value+ ", "+radioGeneroSeleccionado + ", "+idCampoCorreoFormularioModal.value);
                
                if (validarCamposFormularioRegistrarMensaje(idCampoTipoUsuarioEmisor.value, idCampoUsuario.value,idCampoCorreoEmisor.value, idCampoCorreoReceptor.value, idAreaMensaje.value) == false) {
                    return;
                }
                
                var datosJson = {
                    accion: "registrarMensaje",
                    idCampoTipoUsuarioEmisor: idCampoTipoUsuarioEmisor.value,
                    idCampoUsuario: idCampoUsuario.value,
                    idCampoCorreoEmisor: idCampoCorreoEmisor.value,
                    idComboTipoUsuarioReceptor: idComboTipoUsuarioReceptor.value,
                    idCampoCorreoReceptor: idCampoCorreoReceptor,
                    idAreaMensaje: idAreaMensaje.value,                    
                };
                registrarInformacion(datosJson);                
            }
        );

    }//fin de la función donde se ponen todos los eventos de los elementos html
); //final del document


function validarCamposFormularioRegistrarMensaje(campoTipoUsuarioEmisor, campoUsuario, campoCorreoEmisor, campoCorreoReceptor,areaMensaje) {                
    if (campoTipoUsuarioEmisor == "") {
      alert("El campo campoTipoUsuarioEmisor está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    if (campoUsuario== "") {
      alert("El campo Usuario está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    } 
    if (campoCorreoEmisor== "") {
      alert("El campo campoCorreoEmisor está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    if (campoCorreoReceptor == "") {
      alert("El campo campoCorreoReceptor está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    if (areaMensaje == "") {
      alert("El area mensaje está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    
    return true;
}

function registrarInformacion(datosJson) {
    $.ajax(
        {
            method: "POST",
            url: "controlador/controladorVentanaRegistrarMensaje.php",
            data: datosJson
        }
    ).done(
        function( msg ) {
            console.log("resultado: "+msg);
            if (msg == "true") {
                alert("La información se guardó correctamente.");                
                $("#botonReset").click();
            } else {
                alert("La información no se pudo guardar.");
            }
        }
    );
}

function mostrarInformacionAdministradorEnviarMensaje(idCampoOcultoRolUsuario,idCampoOcultoUsuario) {
    $("#idFormularioRegistrarMensaje").load(
        "controlador/controladorVentanaRegistrarMensaje.php", {
            accion: "mostrarInformacionAdministradorEnviarMensaje",
            campoOcultoRolUsuario:idCampoOcultoRolUsuario,
            campoOcultoUsuario: idCampoOcultoUsuario

        }
    );                    
}
