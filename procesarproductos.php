<?php
session_start();

if (!isset($_SESSION['idCliente']) || $_SESSION['nombreCliente'] !== 'admin') {
    header("Location: pagina.php");
    exit();
}

include('conectarbbdd.php');

// Verifica si se está añadiendo un producto
if (isset($_REQUEST['nombre_producto'], $_REQUEST['descripcion_producto'], $_REQUEST['precio_producto'])) {
    $nombre_producto = $_REQUEST['nombre_producto'];
    $descripcion_producto = $_REQUEST['descripcion_producto'];
    $precio_producto = $_REQUEST['precio_producto'];

    // Aquí deberías realizar la inserción en la base de datos
    $sql = "INSERT INTO Productos (nombre, descripcion, precio) VALUES ('$nombre_producto', '$descripcion_producto', '$precio_producto')";
    $conn->query($sql);
}

// Verifica si se está borrando un producto
if (isset($_REQUEST['id_producto'])) {
    $id_producto = $_REQUEST['id_producto'];

    // Aquí deberías realizar la eliminación en la base de datos
    $sql = "DELETE FROM Productos WHERE id = $id_producto";
    $conn->query($sql);
}

header("Location: admin.php");
exit();
?>


