<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <header>
    <h1>Cortes y filos</h1>
    </header>
    <?php
            session_start();
            if(isset($_SESSION['nombreCliente'])){
                echo "<p> Bienvenido ".$_SESSION['nombreCliente']."</p>";
                echo "<p> Tenga un buen día </p>";
            }
        ?>