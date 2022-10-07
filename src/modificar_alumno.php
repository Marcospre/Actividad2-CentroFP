
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
<body>
<div class="wrap">
 <h2>Modificar Alumno</h2>
	<form>
	<label for="fnombre">Nombre</label>
	<input type="text" id="fnombre" name="nombre">
	<br>
	<label for="femail">Email</label>
	<input type="text" id="femail" name="email">
	<br>
	<label for="fcmatricula">Codigo Matricula</label>
	<input type="text" id="fcmatricula" name="cmatricula">
	<br>
	<input type="submit" value="Modificar" name="Modificar">
	<input type="button" class="button_active" value="Volver"  onclick="location.href='select_alumnos.php';" />
	
	</form>
<?php
if(isset($_GET['dni'])){
    $dni= $_GET['dni'];
    
    $mysqli = new mysqli("localhost", "root", "", "centro_fp");

    if (isset($_GET['nombre']) && isset($_GET['email'])&& isset($_GET['cmatricula'])) {
        $nombre= $_GET['nombre'];
        $email = $_GET['email'];
        $cmatricula = $_GET['cmatricula'];
        
        if($nombre != null && $email != null && $cmatricula != null){
           
        
            if ($mysqli->connect_errno) {
                echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            
            /* Sentencia preparada, etapa 1: preparación */
            if (!($sentencia = $mysqli->prepare("UPDATE alumno SET nombre=?, email=?,codMatricula=? WHERE dni=".$_GET['dni'].";"))) {
                echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
            }
            
            /* Sentencia preparada, etapa 2: vinculación y ejecución */
            if (!$sentencia->bind_param("ssss", $nombre, $email, $cmatricula,$dni)) {
                echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
            }
            
            if (!$sentencia->execute()) {
                echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
            }
            
            /* se recomienda el cierre explícito */
            $sentencia->close();
            echo "<br>Alumno modificado";
        }else{
            echo "<br>Inserte todos los valores";
        }
    }else{
        if(isset($_GET['Modificar']))
            echo("<br>Error en parametros<br>");
            
    }
}

?>
</div>
</body>
</html>