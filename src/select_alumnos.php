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
<div class="wrap">
<h1>Alumnos</h1>


<?php
$mysqli = new mysqli("localhost", "root", "", "centro_fp");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

/* Sentencia no preparada */
$resultado = $mysqli->query("SELECT * FROM Alumno");

// mostrar resultado
echo "<table border='1'><tr><th>DNI</th><th>Nombre</th><th>Email</th><th>Codigo Matricula</th></th>";
while ($row = $resultado->fetch_assoc()) {
   // echo("DNI:".$row['dni'] . " - " ."Nombre". $row['nombre']." - "."".$row);
  
   echo  '<tr><td>'.$row['dni'].'</td><td>'.$row['nombre'].'</td><td>'.$row['email'].'</td><td>'.$row['codMatricula'].'</td>'
                .'<td><a href="ver_alumno.php?dni='.$row['dni'].'"><img src="/Actividad2-CentroFP/ver.png"></a></td>'
                .'<td><a href="modificar_alumno.php?dni='.$row['dni'].'"><img src="/Actividad2-CentroFP/boton-editar.png"></a></td>'
                .'<td><a href="eliminar_alumno.php?dni='.$row['dni'].'"><img src="/Actividad2-CentroFP/basura.png"></a></td></tr>';
    
    //printf("%s - %s\n", $row["id"], $row["nombre"]);
   // echo "<br>";
    
}

echo "</table>";
echo "<a href='añadir_alumno.php'><button>Añadir Alumno</button></a>";
/* se recomienda el cierre explícito */
$mysqli->close();

?>
</div>
</body>
</html>