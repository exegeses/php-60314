<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
        mailResetClave();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Reseteo de contraseña</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            Se ha enviado un email para activar reseteo de clave.
        </div>

    </main>

<?php
    include 'layout/footer.php';
?>