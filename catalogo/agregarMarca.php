<?php
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $check = agregarMarca();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Alta de una marca</h1>

<?php
    if ( $check ){
?>
        <div class="alert bg-light p-4 col-8 mx-auto shadow text-success">
            Marca agregada correctamente.
            <a href="adminMarcas.php" class="btn btn-outline-secondary">
                Volver a panel de marcas
            </a>
        </div>
<?php
    }
    else{
?>
        <div class="alert bg-light p-4 col-8 mx-auto shadow text-danger">
            No se pudo agregar la marca.
            <a href="adminMarcas.php" class="btn btn-outline-secondary">
                Volver a panel de marcas
            </a>
        </div>
<?php
    }
?>

    </main>

<?php
    include 'layout/footer.php';
?>