<html>
<body>
<h2>Datos Alumno</h2>

<div class="wrap" style="display:flex ">
<form>
	<label for="fnombre">Nombre</label>
	<input type="text" id="fnombre" name="nombre">
	<br>
	<label for="fdni">DNI</label>
	<input type="text" id="fdni" name="dni">
	<br>
	<label for="femail">Email</label>
	<input type="text" id="femail" name="email">
	<br>
	<label for="fcmatricula">Codigo Matricula</label>
	<input type="text" id="fcmatricula" name="cmatricula">
	<br>
	<input type="submit" value="Guardar" name="Guardar">
	<input type="button" class="button_active" value="Volver"  onclick="location.href='select_alumnos.php';" />
	
</form>
</div>


<?php

    if (isset($_GET['nombre']) && isset($_GET['dni'])&& isset($_GET['email'])&& isset($_GET['cmatricula'])) {
        $nombre= $_GET['nombre'];
        $dni = $_GET['dni'];
        $email = $_GET['email'];
        $cmatricula = $_GET['cmatricula'];
        
        if($nombre != null && $dni != null && $email != null && $cmatricula != null){
            $mysqli = new mysqli("localhost", "root", "", "centro_fp");
            
            if ($mysqli->connect_errno) {
                echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            
            /* Sentencia preparada, etapa 1: preparación */
            if (!($sentencia = $mysqli->prepare("INSERT INTO `alumno` (`dni`, `nombre`, `email`, `codMatricula`) VALUES (?, ?, ?, ?);"))) {
                echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
            }
            
            /* Sentencia preparada, etapa 2: vinculación y ejecución */
            if (!$sentencia->bind_param("ssss", $dni, $nombre, $email, $cmatricula)) {
                echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
            }
            
            if (!$sentencia->execute()) {
                echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
            }
            
            /* se recomienda el cierre explícito */
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


