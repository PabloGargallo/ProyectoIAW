<?php
include('cabecera.php');

if (!isset($_SESSION['idCliente'])) {
   header("Location: pagina.php");
    
}
include('conectarbbdd.php');

$idCliente = $_SESSION['idCliente'];
$nombreCliente = $_SESSION['nombreCliente'];

$precioTotal = 0;
$productosComprados = [];

// Por si ya hay algún pedido guardado
if (isset($_SESSION['pedidos'])) {
    $productosComprados = $_SESSION['pedidos'];
}
if (isset($_SESSION['totalAbsoluto'])) {
    $precioTotal = $_SESSION['totalAbsoluto'];
    // Extraemos de productos comprados solo los ID de los productos
$arrayIDs = array();
foreach($productosComprados as $clave){
    $arrayIDs[] = $clave["id"];
}
}

// Inserta la compra en la base de datos
$fechaCompra = date("Y-m-d H:i:s");
$sqlInsertCompra = "INSERT INTO Compras (id_cliente, productos, fecha, precio_total) 
                    VALUES ($idCliente, '" . implode(', ', $arrayIDs) . "', '$fechaCompra', $precioTotal)";
$conn->query($sqlInsertCompra);

$sqlLimpiarPedidos = "DELETE FROM Compras WHERE id_cliente = $idCliente";
$conn->query($sqlLimpiarPedidos);


?>



<h2>Finalizar Compra</h2>
<p>Usuario: <?php echo $nombreCliente; ?></p>
<p>Productos Comprados: <?php echo implode(', ', $arrayIDs); ?></p>
<p>Fecha de Compra: <?php echo $fechaCompra; ?></p>
<p>Precio Total: $<?php echo $precioTotal; ?></p>


