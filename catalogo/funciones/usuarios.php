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