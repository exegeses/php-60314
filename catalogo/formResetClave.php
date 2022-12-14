<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    checkCodigo();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Reseteo de contraseña</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            <form action="resetClave.php" method="post" id="formulario">

            <div class='form-group'>
                <label for="clave">Contraseña nueva</label>
                <input type="password" name="clave"
                       class='form-control' id="clave">
                <div class="text-danger fs-6" id="msjClave">
                    Debe completar el campo Contraseña nueva
                </div>
            </div>
            <div class='form-group'>
                <label for="clave2">Repita Contraseña</label>
                <input type="password" name="clave2"
                       class='form-control' id="clave2">
                <div class="text-danger fs-6" id="msjClave2">
                    Debe completar el campo Repita contraseña con un valor igual a Contraseña nueva
                </div>
            </div>
            <input type="hidden" name="email"
                   value="<?= $_GET['email'] ?>">

            <button class='btn btn-dark my-3 px-4'>Modificar contraseña</button>
            </form>
        </div>

<?php
    if( isset($_GET['error']) ){
?>
        <div class="alert bg-light p-4 col-8 mx-auto shadow text-danger">
            Las contraseñas no coinciden, intente nuevamente.
        </div>
<?php
    }
?>

        <script>
            let form = document.querySelector('#formulario');
            let clave = document.querySelector('#clave');
            let clave2 = document.querySelector('#clave2');
            let msjClave = document.querySelector('#msjClave');
            msjClave.style.display = 'none';
            let msjClave2 = document.querySelector('#msjClave2');
            msjClave2.style.display = 'none';

            form.addEventListener('submit', validarFormulario );
            function validarFormulario( evento) {
                let flag = true;
                evento.preventDefault();
                msjClave.style.display = 'none';
                if( checkVacio( clave ) ){
                    msjClave.style.display = 'block';
                    flag = false;
                }
                msjClave2.style.display = 'none';
                if( checkVacio( clave2 ) ){
                    msjClave2.style.display = 'block';
                    flag = false;
                }
                if( checkRepite() ){
                    msjClave2.style.display = 'block';
                    flag = false;
                }
                if( flag ){
                    form.submit();
                }

            }
            function checkVacio(campo)
            {
                if( campo.value == '' || campo.value == null ){
                    return true;
                }
                return false;
            }
            function checkRepite()
            {
                if( clave.value != clave2.value ){
                    //console.log('no coinciden');
                    return true;
                }
                return false;
            }
        </script>



    </main>

<?php
    include 'layout/footer.php';
?>