<?php
 $url = "https://sigma-studios.s3-us-west-2.amazonaws.com/test/colombia.json";
 $departamentos = json_decode($departamentos = file_get_contents($url), true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Prueba Jordan</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--===============================================================================================-->
    <!--Este es el script de los select dependientes-->
    <script src="js/selects.js"></script>
    <!--===============================================================================================-->
</head>
<body>
	<div class="contact1">
		<div class="container" id="cabecera">
			<br>
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-8">
					<div class="thumbnail">
						<img src="images/sigma-logo.png" class="rounded mx-auto d-block"><br>
						<div class="caption">
							<span class="contact1-form-title">Prueba de desarrollo Sigma</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, soluta, eligendi
								doloribus sunt minus amet sit debitis repellat. Consectetur, culpa itaque odio similique
								suscipit</p>
                            <p class="respuesta"></p>

                        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/sigma-image.png" alt="IMG">
			</div>

			<form class="card contact1-form" id="formulario">
				<label for="departamento">Departamento*</label>
				<div class="wrap-input1 validate-input" data-validate = "Departamento Es Obligatorio">
					<select name="departamento" id="departamento" required class="form-control">
                        <option value="">---Seleccione---</option>
                        <?php
                        foreach ($departamentos as $k => $v) {
                            ?>
                            <option value="<?= $k ?>"><?= $k ?></option>
                            <?php
                            echo "<h1>$k</h1>";
                        }
                        ?>
					</select>
                </div>

				<label for="ciudad">Ciudad*</label>
				<div class="wrap-input1 validate-input" data-validate = "Ciudad Es Obligatorio">
					<select name="ciudad" id="municipio" class="form-control">
						<option value="">---Seleccione---</option>
					</select>
					<span class="shadow-input1"></span>
				</div>

				<label for="nombre">Nombre*</label>
				<div class="wrap-input1 validate-input" data-validate = "Nombre Es Obligatorio">
					<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Pepito de Jesús">
					<span class="shadow-input1"></span>
				</div>

				<label for="correo">Correo*</label>
				<div class="wrap-input1 validate-input" data-validate = "Correo Es Obligatorio">
					<input class="form-control " type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="correo" name="correo" placeholder="Pepitodejesus@gmail.com">
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
                    <button type="submit" id="btnEnviar" name="btnEnviar" class="contact1-form-btn">
						<span>
							ENVIAR
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

    <!-- Modal HTML -->
    <div id="Confirmacion" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <h4>Correcto!</h4>
                    <p>Tu información ha sido recibida satisfactoriamente.</p>
                    <button class="btn btn-success" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script type=text/javascript>
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

        $(document).ready(function () {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
            $("#btnEnviar").click(function () {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                if (validaForm()) {                               // Primero validará el formulario.
                    $.post("./ajax/insertar.php", $("#formulario").serialize(), function (res) {
                        if (res == 1) {
                            mostrar();
                        } else {
                            alert("Ocurrió un error!");
                        }
                    });
                }
            });
        });
    </script>

    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <!--===============================================================================================-->
</body>
</html>
