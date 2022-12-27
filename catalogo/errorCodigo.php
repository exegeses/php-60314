<?php
    require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de contraseña</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            Su código ha caducado, intente nuevamente
            <a href="formReset.php" class="btn btn-outline-secondary">Reestablecer clave</a>
        </div>

    </main>

<?php
    include 'layout/footer.php';
?>