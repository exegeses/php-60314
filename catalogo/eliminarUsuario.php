<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $check = eliminarUsuario();
    $mensaje = 'No se pudo eliminar el usuario.';
    $css = 'danger';
    if ( $check ) {
        $mensaje = 'Usuario eliminado correctamente.';
        $css = 'success';
    }
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Baja de un usuario</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow text-<?= $css ?>">
            <?= $mensaje ?>
            <a href="adminUsuarios.php" class="btn btn-outline-secondary">
                Volver a panel de usuarios
            </a>
        </div>
        
    </main>

<?php
    include 'layout/footer.php';
?>