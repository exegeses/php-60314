<?php
    require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Reseteo de contraseña</h1>


        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            Su código ha caducado, intente nuevamente
            <a href="formReset.php" class="btn btn-outline-secondary">Reestablecer clave</a>
        </div>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            <form action="resetClave.php" method="post">

            <div class='form-group'>
                <label for="clave">Contraseña nueva</label>
                <input type="password" name="clave"
                       class='form-control' id="clave" required>
            </div>
            <div class='form-group'>
                <label for="clave2">Repita Contraseña</label>
                <input type="password" name="clave2"
                       class='form-control' id="clave2" required>
            </div>
            <input type="hidden" name="email"
                   value="<?= $_GET['email'] ?>">

            <button class='btn btn-dark my-3 px-4'>Agregar usuario</button>
            </form>
        </div>

    </main>

<?php
    include 'layout/footer.php';
?>