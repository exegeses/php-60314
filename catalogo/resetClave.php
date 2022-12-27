<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $check   = modificarResetClave();
    $mensaje = 'No se pudo modificar la clave.';
    $css     = 'danger';
    if( $check ){
        $mensaje = 'Clave modificada correctamente.';
        $css     = 'success';
    }
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de contraseña</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow text-<?= $css ?>">
            <?= $mensaje ?>
        </div>

    </main>

<?php
    include 'layout/footer.php';
?>