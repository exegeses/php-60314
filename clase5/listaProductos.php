<?php
    require 'conexion.php';
    /*
     * 1.- nos conectamos a mysql
     * 2.- creamos consulta SQL
     * 3.- ejecutamos SQL
     * 4.- muestreo de datos
     */
    $link = conectar();
    $sql  = "SELECT prdNombre, prdPrecio
                FROM productos";
    $resultado = mysqli_query( $link, $sql );
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de productos</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <h1>Listado de productos</h1>
    <ul class="col-4 mx-auto">
<?php
    while ( $producto = mysqli_fetch_assoc($resultado) ){
?>
        <li><?= $producto['prdNombre'], ': ', $producto['prdPrecio']; ?></li>
<?php
    }
?>
    </ul>

</body>
</html>
