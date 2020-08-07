function validaForm(){
    // Campos de texto
    if($("#nombre").val() == ""){
        alert("El campo Nombre no puede estar vacío.");
        $("#nombre").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#departamento").val() == ""){
        alert("El campo departamento no puede estar vacío.");
        $("#apellidos").focus();
        return false;
    }
    if($("#ciudad").val() == ""){
        alert("El campo ciudad no puede estar vacío.");
        $("#direccion").focus();
        return false;
    }
    if($("#email").val() == ""){
        alert("El campo email no puede estar vacío.");
        $("#direccion").focus();
        return false;
    }

    return true; // Si todo está correcto
}

function mostrar() {
    $("#Confirmacion").modal('show');
}

$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#btnEnviar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        if(validaForm()){                               // Primero validará el formulario.
            $.post("../ajax/insertar.php",$("#formulario").serialize(),function(res){
                if(res == 1){
                     mostrar();
                } else {
                    $("#fracaso").delay(500).fadeIn("slow");    // Si no, lo mismo, pero haremos aparecer el div "fracaso"
                }
            });
        }
    });
});