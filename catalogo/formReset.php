<?php
    require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container">
        <h1>Reestablecer contraseña</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            <form action="mailReset.php" method="post">

                <label for="email">Usuario (email)</label>
                <input type="email" name="email"
                       class='form-control' id="email" required>
                <br>
                <button class="btn btn-dark my-2 px-4">
                    Enviar
                </button>
            </form>
        </div>

<?php
        $mensaje = 'Email incorrecto, intente nuevamente.';
        if( isset($_GET['error']) ){
?>        
        <div class="alert text-danger bg-light p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
        </div>
<?php
        }
?>

    </main>

<?php  include 'layout/footer.php';  ?>