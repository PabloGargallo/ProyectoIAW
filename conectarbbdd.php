
<?php
// Crear conexión
$conn = mysqli_connect("localhost","root","","proyecto" );

// Verificar conexión
if (!$conn) {
    echo "Error:Conexión no exitosa";
}
echo "Conexión exitosa";
?>

