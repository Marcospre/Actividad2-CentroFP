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
<body>
<?php  $dni = $_GET['dni'];  ?>
<div class="wrap">
 <h2>Modificar Alumno</h2>
	<form>
		<table>
		
				<tr>
					<td><label for="">DNI</label></td>
					<td><input type="text" name="dni" readonly="readonly" value="<?php echo $_GET['dni'] ?>"></td>
				</tr>
			
			<tr>
            	<td><label for="fnombre">Nombre</label></td>
            	<td><input type="text" id="fnombre" name="nombre"></td>
            </tr>
            <tr>
            	<td><label for="femail">Email</label></td>
            	<td><input type="text" id="femail" name="email"></td>
            </tr>
            <tr>
            	<td><label for="fcmatricula">Codigo Matricula</label></td>
            	<td><input type="text" id="fcmatricula" name="cmatricula"></td>
            </tr>
           </table>
            
            <input type="submit" value="Modificar" name="Modificar">
            <input type="button" class="button_active" value="Volver"  onclick="location.href='select_alumnos.php';" />
            
		
	</form>
<?php
if(isset($_GET['dni'])){
    //$dni= $_GET['dni'];
    
   

    if (isset($_GET['nombre']) && isset($_GET['email'])&& isset($_GET['cmatricula'])) {
        $nombre= $_GET['nombre'];
        $email = $_GET['email'];
        $cmatricula = $_GET['cmatricula'];
        
        if($nombre != null && $email != null && $cmatricula != null){
           
            $mysqli = new mysqli("localhost", "root", "", "centro_fp");
            if ($mysqli->connect_errno) {
                echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            
            /* Sentencia preparada, etapa 1: preparación */
            if (!($sentencia = $mysqli->prepare("UPDATE alumno SET nombre=?, email=?,codMatricula=? WHERE dni='".$dni."';"))) {
                echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
            }
            
            /* Sentencia preparada, etapa 2: vinculación y ejecución */
            if (!$sentencia->bind_param("sss", $nombre, $email, $cmatricula)) {
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