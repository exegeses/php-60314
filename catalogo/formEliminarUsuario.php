<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $usuario = verUsuarioPorID( );
	include 'layout/header.php';
	include 'layout/nav.php';
?>

    <main class="container">
        <h1>Baja de un usuario</h1>

        <div class="alert bg-light p-4 col-6 mx-auto shadow text-danger">
            Se eliminará al usuario: 
            <span class="lead">
                <?= $usuario['nombre'] ?> <?= $usuario['apellido'] ?>
                <br>
                con rol <?= $usuario['rol'] ?>
            </span>            
            <form action="eliminarUsuario.php" method="post">
                <input type="hidden" name="idUsuario"
                       value="<?= $usuario['idUsuario'] ?>">                
                <button class="btn btn-danger my-3 px-4">Confirmar baja</button>
                <a href="adminUsuarios.php" class="btn btn-outline-secondary">
                    Volver a panel de usuarios
                </a>
            </form>
        </div>   

    </main>

<?php  include 'layout/footer.php';  ?>