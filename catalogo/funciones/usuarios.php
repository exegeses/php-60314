<?php

    function listarUsuarios()
    {
        $link = conectar();
        $sql = "SELECT idUsuario, nombre, apellido, email, rol
                    FROM usuarios u
                    JOIN roles r 
                      ON u.idRol = r.idRol";
        try {
            $resultado = mysqli_query( $link, $sql );
            return $resultado;
        }
        catch ( Exception  $e ){
            echo $e->getMessage();
            return false;
        }
    }

    function agregarUsuario() : bool
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $clave = $_POST['clave']; // clave sin encriptar
        /* clave encriptada */
        $claveHash = password_hash( $clave, PASSWORD_DEFAULT );

        //$idRol = isset( $_POST['idRol']) ? $_POST['idRol'] : 3;
        $idRol = $_POST['idRol'] ?? 3;


        $link = conectar();

        $sql = "INSERT INTO usuarios 
                            VALUES 
                            (
                                DEFAULT,
                                '".$nombre."',
                                '".$apellido."',
                                '".$email."',
                                '".$claveHash."',
                                ".$idRol."
                            )";
        try {
            $resultado = mysqli_query( $link, $sql );
            return $resultado;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }

    function modificarUsuario() : bool
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $idUsuario = $_POST['idUsuario'];
        $sql = "UPDATE usuarios
                    SET nombre = '".$nombre."',
                        apellido = '".$apellido."',
                        email = '".$email."'
                    WHERE idUsuario = ".$idUsuario;
        $link = conectar();
        try {
            $resultado = mysqli_query($link, $sql);
            // actualizamos datos de sesión
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            $_SESSION['email'] = $email;
            return $resultado;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }

    function modificarClave() : bool
    {
        //capturamos clave sin encriptar
        $clave = $_POST['clave'];
        /** obtenemos la contraseña encriptada **/
        $link = conectar();
        $sql = "SELECT clave 
                    FROM usuarios
                    WHERE idUsuario = ".$_SESSION['idUsuario'];
        try {
            $resultado = mysqli_query($link, $sql);
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
        /** verificamos conincidencia **/
        $datos = mysqli_fetch_assoc($resultado);
        $claveHash = $datos['clave'];
        if( !password_verify( $clave, $claveHash ) ){
            //redirección a form con mensaje error
            header('location: formModificarClave.php?error=1');
            return false;
        }
        /*## en esta punto la contraseña actual es correcta ##*/
        //capturamos newClave y newClave2
        $newClave = $_POST['newClave'];
        $newClave2 = $_POST['newClave2'];
        //compraramos igualdad
        if( $newClave == $newClave2 ){
            //encriptamos clave
            $claveHash = password_hash($newClave, PASSWORD_DEFAULT);
            /*## modificación de clave ##*/
            $sql = "UPDATE usuarios
                        SET clave = '".$claveHash."'
                        WHERE idUsuario = ".$_SESSION['idUsuario'];
            try {
                $resultado = mysqli_query($link, $sql);
                return $resultado;
            }
            catch ( Exception $e ){
                echo $e->getMessage();
                return false;
            }
        }
        return false;
    }