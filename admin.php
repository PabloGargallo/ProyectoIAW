<?php
include('cabecera.php');

// Verifica si el usuario está autenticado como administrador
if (!isset($_SESSION['idCliente']) || $_SESSION['idCliente'] !== '1') {
    header("Location: pagina.php");
    
}

include('conectarbbdd.php');
?>

<!-- Contenido de la página de administración -->
<h2>Bienvenido, <?php echo $_SESSION['nombreCliente']; ?> </h2>

<!-- Formulario para añadir un producto -->
<form action="procesar_producto.php" method="get">
    <label for="nombre_producto">Nombre del Producto:</label>
    <input type="text" name="nombre_producto" required>
    <label for="descripcion_producto">Descripción:</label>
    <textarea name="descripcion_producto" required></textarea>
    <label for="precio_producto">Precio:</label>
    <input type="text" name="precio_producto" required>
    <input type="submit" value="Añadir Producto">
</form>

<!-- Formulario para borrar un producto -->
<form action="procesar_producto.php" method="get">
    <label for="id_producto">ID del Producto a Borrar:</label>
    <input type="text" name="id_producto" required>
    <input type="submit" value="Borrar Producto">
</form>


<?php include('piepagina.php');  ?>


