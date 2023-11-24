<?php
include('cabecera.php')
//Crear conexión
?>

<form action="usuarios.php" method="GET">
    <label for="nombre" >Nombre:</label>
    <input id="nombre" type="text" name="nombre"></br>
    <label for="contraseña" >Contraseña:</label>
    <input id="contraseña" type="text" name="contraseña"></br>
    <input type="submit">
</form>

<?php
if(isset($_REQUEST['nombre']) && isset($_REQUEST['contraseña']) ){
    include('conectarbbdd.php');

    $usuario = $_REQUEST['nombre'];
    $contraseña = $_REQUEST['contraseña'];
    $sql = "SELECT * FROM Usuarios WHERE Usuario = '$usuario' AND Contraseña = '$contraseña'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if ($usuario=="admin"){
            $row = $result->fetch_assoc();
            $_SESSION['nombreCliente'] = $row['Usuario'];
            $_SESSION['idCliente'] = $row['Id'];
            header("Location:admin.php");
        }
        else{
            $row = $result->fetch_assoc();
            $_SESSION['idCliente'] = $row['Id'];
            $_SESSION['nombreCliente'] = $row['Usuario'];
            header("Location:pagina.php");
        }
    } else {
        
        echo "Error: Usuario no encontrado.";
    }
}

include('piepagina.php')
?>