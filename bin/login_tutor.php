
<?php
$user = $_GET['user'];
$pass = $_GET['pass'];

$existe = false;

$mysqli = new mysqli("localhost", "root", "", "centro_fp");

if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$resultado = $mysqli->query("SELECT * FROM tutores");
echo "encbntrado";
while($row = $resultado->fetch_assoc()){
    if($user==$row['Nombre'] && $pass==$row['contrasenia']){
        $existe = true;
        break;
    }
}

if($existe){
     echo "user y pass correctos";
    session_start();
    $_SESSION['user']=$user;
    header("Location: select_alumnos.php");
}else{
    echo "<p style='color:red'>user y contraseña incorrecta</p>";
    header("Location: login_tutor_form.php");
    
}

$mysqli->close();

?>