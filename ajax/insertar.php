<?phprequire ('../conexion/conexion.php');$dpto = utf8_decode($_POST['departamento']);$nombre = utf8_decode($_POST['nombre']);$ciudad = utf8_decode($_POST['ciudad']);$correo = $_POST['correo'];$query = "INSERT INTO admin_sigmatest.contacts (name, email, state, city )           VALUES ( '$nombre', '$correo', '$dpto', '$ciudad' ) ;";$guardar = mysqli_query($conexion, $query);if($guardar > 0){    echo 1;}else{    echo 0;} ?>