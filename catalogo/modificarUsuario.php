<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $check   = modificarUsuario();
    $mensaje = 'No se pudo modificar el usuario.';
    $css     = 'danger';
    if( $check ){
        $mensaje = 'Usuario modificado correctamente.';
        $css     = 'success';
    }
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de usuario</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow text-<?= $css ?>">
            <?= $mensaje ?>
        </div>

    </main>

<?php
    include 'layout/footer.php';
?>