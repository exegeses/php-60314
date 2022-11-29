<?php
    require 'config/config.php';
    require 'funciones/autenticar.php';
        logout();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Salir de sistema</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            Gracias por usar nuestros servicios
        </div>

    </main>

<?php
    include 'layout/footer.php';
?>