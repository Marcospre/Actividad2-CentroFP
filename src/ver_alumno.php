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
 <h2>Alumno</h2>
        
<?php
if(isset($_GET['dni'])){
    
    $dni = $_GET['dni'];
    
    $mysqli = new mysqli("localhost", "root", "", "centro_fp");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    //$sentencia = $mysqli->prepare("SELECT * FROM Alumno WHERE dni=?");
   // $sentencia->bind_param("s", $dni);
    
   // $sentencia->execute();
   
    $resultado = $mysqli->query("SELECT * FROM alumno WHERE dni='".$dni."';");
   
    echo "<table>";
    while($row = $resultado->fetch_assoc()){
    
       echo "<tr><th>Nombre</th><td>".$row['nombre']."</td></tr><tr><th>DNI</th><td>".$row['dni']."</td></tr><tr><th>Email</th><td>".$row['email']."</td></tr><tr><th>Codigo Matricula</th><td>".$row['codMatricula']."</td></tr>";
    }
    echo "</table>";
    echo"<a href='select_alumnos.php'><button>Volver</button></a>";
    $mysqli->close();
    
    
}
    
?>
</div>
</body>
</html>



