
<?php
include('cabecera.php');
//Crear conexión

echo "<a href='usuarios.php'>Iniciar sesión </a>";

include('conectarbbdd.php');

//Consulta
 $sql= "select * from productos";

//Recogemos resultado
 $result = $conn-> query($sql);
 echo "<div id='productos'>";
 $row_count = $result->num_rows;
             echo "<strong>$row_count Productos disponibles</strong>";
 
             echo "<table>";
             echo "<thead>";
             echo "<tr>";
             echo "<th>Imagen</th>";
             echo "<th>ID</th>";
             echo "<th>Nombre</th>";
             echo "<th>Descripción</th>";
             echo "<th>Precio</th>";
             echo "<th>Comprar</th>";
             echo "</tr>";
             echo "</thead>";
             echo "<tbody>";
 
             while($row = $result->fetch_assoc()) {
                 $id = $row['id'];
                 $imagen = "productos/${id}.jpg" ;
                 echo "<tr>";
                 echo "<td><img src='" . $imagen . "' alt='' style='width:300px;height:300px;'></td>";
                 echo "<td>".$row['id']."</td>"; 
                 echo "<td>".$row['nombre']."</td>"; 
                 echo "<td>".$row['descripcion']."</td>"; 
                 echo "<td>".$row['precio']."</td>";
                 echo "<td><a href='añadircarrito.php?ped=";
                 echo $row['id'];
                 echo "'>Comprar</a></td>";
                 echo "</tr>";
                 }
         echo "</tbody>";
         echo "</table>";
 
         echo "</div>";
        echo "<a href='vaciar.php'>Vaciar</a>";

        include('piepagina.php');
?>


    