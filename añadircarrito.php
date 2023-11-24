<?php
include('cabecera.php');
// Como todo ha ido bien, voy a mostrar el detalle de todo el carrito
include('conectarbbdd.php');
if (isset($_REQUEST['ped'])) {
    $idpedido = $_REQUEST['ped'];
    $pedidosGuardados = array();

    $totalAbsoluto = 0;

    // Por si ya hay algún pedido guardado
    if (isset($_SESSION['pedidos'])) {
        $pedidosGuardados = $_SESSION['pedidos'];
    }

    // Verificar si el producto ya está en el carrito
    $productoEnCarrito = false;

    foreach ($pedidosGuardados as &$pedido) {
        if ($pedido['id'] == $idpedido) {
            // Si ya está en el carrito, incrementar la cantidad y actualizar el precio total
            $pedido['cantidad']++;
            $pedido['precioTotal'] = $pedido['cantidad'] * $pedido['precioUnitario'];
            $productoEnCarrito = true;
        }
    }

    // Si no está en el carrito, agregarlo con cantidad 1 y precio total igual al precio unitario
    if (!$productoEnCarrito) {
        // Obtener el precio unitario del producto
        $sqlPrecio = "SELECT precio FROM productos WHERE id=$idpedido";
        $resultPrecio = $conn->query($sqlPrecio);
        $rowPrecio = $resultPrecio->fetch_assoc();
        $precioUnitario = $rowPrecio['precio'];

        $producto = array(
            'id' => $idpedido,
            'cantidad' => 1,
            'precioUnitario' => $precioUnitario,
            'precioTotal' => $precioUnitario
        );
        $pedidosGuardados[] = $producto;
    }

    // Actualizar el array en SESSION para que se guarde
    $_SESSION['pedidos'] = $pedidosGuardados;

    

    echo "<div id='productos'>";
    echo "<strong>Carrito de Compras</strong>";

    foreach ($pedidosGuardados as $pedido) {
        $id_producto = $pedido['id'];
        $cantidad = $pedido['cantidad'];
        $precioTotal = $pedido['precioTotal'];
        $sql = "SELECT nombre, precio FROM productos WHERE id=$id_producto";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<article>";
            echo "<ul>";
            echo "<li>Nombre: " . ($row['nombre']) . "</li>";
            echo "<li>Precio Unitario: $" .($row['precio']) . "</li>";
            echo "<li>Cantidad: " . $cantidad . "</li>";
            echo "<li>Precio Total: $" . $precioTotal . "</li>";
            echo "</ul>";
            echo "</article>";

            $totalAbsoluto += $precioTotal;
        }
    }

    $_SESSION['totalAbsoluto'] = $totalAbsoluto;

    echo "<p><a href='pagina.php'>Salir del carrito </a></p>";
    echo "<p><a href='compra.php'>Finalizar compra </a></p>";

} else {
    echo "No viene el ID";
}

include('piepagina.php');
?>
