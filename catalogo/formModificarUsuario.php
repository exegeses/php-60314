<?php
    require 'config/config.php';
    require 'funciones/autenticar.php';
    autenticar();
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    if ( $_SESSION['idRol'] == 1 ){
        $usuario = verUsuarioPorID();
        require 'funciones/roles.php';
        $roles = listarRoles();
    }
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container">
        <h1>Modificacíon de un usuario</h1>


        <div class='alert p-4 col-8 mx-auto shadow'>
            <form action="modificarUsuario.php" method="post">

                <div class='form-group mb-2'>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre"
                           value="<?= ( $_SESSION['idRol'] == 1 )?$usuario['nombre']:$_SESSION['nombre']; ?>"
                           class='form-control' id="nombre" required>
                </div>
                <div class='form-group mb-2'>
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido"
                           value="<?= ( $_SESSION['idRol'] == 1 )?$usuario['apellido']:$_SESSION['apellido']; ?>"
                           class='form-control' id="apellido" required>
                </div>
                <div class='form-group'>
                    <label for="email">Email</label>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="email" name="email"
                               value="<?= ( $_SESSION['idRol'] == 1 )?$usuario['email']:$_SESSION['email']; ?>"
                               class="form-control" id="email" required>
                    </div>
                </div>
<?php
    if ( $_SESSION['idRol'] == 1 ){
?>                
                <div class="form-group mb-4">
                    <label for="idRol">Rol</label>
                    <select class="form-select" name="idRol" id="idRol" required>
                        <option value="">Seleccione un rol</option>
            <?php
                while( $rol = mysqli_fetch_assoc( $roles ) ){
            ?>
                        <option <?= ( $usuario['idRol']==$rol['idRol'] )?'selected':''; ?> value="<?= $rol['idRol'] ?>"><?= $rol['rol'] ?></option>
            <?php
                }            
            ?>
                    </select>
                </div>
<?php
    }
?>

                <input type="hidden" name="idUsuario" value="<?= ( $_SESSION['idRol'] == 1 )?$usuario['idUsuario']:$_SESSION['idUsuario']; ?>">

                <button class='btn btn-dark my-3 px-4'>Modificación usuario</button>
                <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
                    Volver a panel de usuarios
                </a>
            </form>

        </div>

    </main>

<?php  include 'layout/footer.php';  ?>