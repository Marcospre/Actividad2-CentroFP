<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: logout_tutor.php");
}
?>

<!DOCTYPE html>
<html>
<head>
   
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        
        .wrap{
            display:flex ;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<?php 
include "Tutor.php";
$tutores = array();
$mysqli = new mysqli("localhost", "root", "", "centro_fp");
$resultado = $mysqli->query("SELECT * FROM tutores");

while($row = $resultado->fetch_assoc()){
    $tutores[] = new Tutor($row['dni'], $row['Nombre'],$row['contrasenia']);
   
}


?>
<body>
<div class="wrap">
<h2>Datos Alumno</h2>
<form>
<table>
	<tr>
    	<td><label for="fnombre">Nombre</label></td>
    	<td><input type="text" id="fnombre" name="nombre"></td>
    </tr>
    <tr>
    	<td><label for="fdni">DNI</label></td>
    	<td><input type="text" id="fdni" name="dni"></td>
    </tr>
    <tr>
    	<td><label for="femail">Email</label></td>
    	<td><input type="text" id="femail" name="email"></td>
    </tr>
    <tr>
    	<td><label for="fcmatricula">Codigo Matricula</label></td>
    	<td><input type="text" id="fcmatricula" name="cmatricula"></td>
    </tr>
    <tr>
    	<td><label for="ftutor">Tutor</label></td>
    	<td><select name="ftutor" id="ftutor">
    	
    		<?php
    		for($i = 0;$i < count($tutores);$i++){
    		    $nombre=tutores[i]->getNombre();
    		    echo '<option value="'.$nombre.'">'.$nombre.'</option>';
    		    //echo '<option>Hola</option>'; 
    		}
    		?>
      </select></td>
    </tr>
    <tr>
    	<td><input type="submit" value="Guardar" name="Guardar"></td>
    	<td><input type="button" class="button_active" value="Volver"  onclick="location.href='select_alumnos.php';" /></td>
	</tr>
</table>	
</form>
</div>


<?php
for($i = 0;$i < count($tutores);$i++){
    $tutor=tutores[i];
    //echo '<option value="'.$nombre.'">'.$nombre.'</option>';
    echo $tutor->geNombre();
}
    if (isset($_GET['nombre']) && isset($_GET['dni'])&& isset($_GET['email'])&& isset($_GET['cmatricula'])) {
        $nombre= $_GET['nombre'];
        $dni = $_GET['dni'];
        $email = $_GET['email'];
        $cmatricula = $_GET['cmatricula'];
        
        if($nombre != null && $dni != null && $email != null && $cmatricula != null){
            $mysqli = new mysqli("localhost", "root", "", "centro_fp");
            
            if ($mysqli->connect_errno) {
                echo "Fall?? la conexi??n a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            
            /* Sentencia preparada, etapa 1: preparaci??n */
            if (!($sentencia = $mysqli->prepare("INSERT INTO `alumno` (`dni`, `nombre`, `email`, `codMatricula`) VALUES (?, ?, ?, ?);"))) {
                echo "Fall?? la preparaci??n: (" . $mysqli->errno . ") " . $mysqli->error;
            }
            
            /* Sentencia preparada, etapa 2: vinculaci??n y ejecuci??n */
            if (!$sentencia->bind_param("ssss", $dni, $nombre, $email, $cmatricula)) {
                echo "Fall?? la vinculaci??n de par??metros: (" . $sentencia->errno . ") " . $sentencia->error;
            }
            
            if (!$sentencia->execute()) {
                echo "Fall?? la ejecuci??n: (" . $sentencia->errno . ") " . $sentencia->error;
            }
            
            /* se recomienda el cierre expl??cito */
            $sentencia->close();
            
            /* Sentencia no preparada */
            //$resultado = $mysqli->query("SELECT * FROM Alumno");
            //var_dump($resultado->fetch_all());
        }else{
            echo "<br>Inserte todos los valores";
        }
    }else{
        if(isset($_GET['Guardar']))
            echo("<br>Error en parametros<br>");
        
    }


?>
</body>
</html>


