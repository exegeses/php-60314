<?php

    /* Rutinas de autenticación */
    function login()
    {
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        $link = conectar();
        $sql = "SELECT idUsuario, nombre, apellido, 
                        email, clave, idRol
                  FROM usuarios 
                  WHERE email = '".$email."'";
        try {
            $resultado = mysqli_query( $link, $sql );
            $cantidad = mysqli_num_rows($resultado);
        }catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
        /*
         *  ## si cantidad == 0  -> no existe usuario
         *  ## si cantidad == 1  -> usuario ok (existe)
         * */
        if( $cantidad == 0 ){
            //redirección a formLogin.php
            header('location: formLogin.php?error=1');
            return false;
        }
        /*
         * ## Rutina de autenticación
         *    sesiones
         * */
        header('location: admin.php');

    }

    function logout()
    {

    }

    function autenticar()
    {

    }