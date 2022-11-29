<?php

    /* Rutinas de autenticación */
    function login()
    {
        $email = $_POST['email'];
        $clave = $_POST['clave'];//sin encriptar
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
        $datosUsuario = mysqli_fetch_assoc($resultado);
        if( password_verify( $clave, $datosUsuario['clave'] ) ){
        /*
        * ## Rutina de autenticación
        *    sesiones
        * */
            $_SESSION['login'] = 1;
            $_SESSION['idUsuario'] = $datosUsuario['idUsuario'];
            $_SESSION['nombre'] = $datosUsuario['nombre'];
            $_SESSION['apellido'] = $datosUsuario['apellido'];
            $_SESSION['email'] = $datosUsuario['email'];
            $_SESSION['idRol'] = $datosUsuario['idRol'];
            //redirección a admin
            header('location: admin.php');
            return true;
        }
        /* si llega hasta acá, puso mal clave */
        //redirección a formLogin.php
        header('location: formLogin.php?error=1');
        return false;
    }

    function logout()
    {

    }

    function autenticar() : void
    {
        if( !isset( $_SESSION['login'] ) ){
            //redirección a formLogin.php
            header('location: formLogin.php?error=2');
        }
    }