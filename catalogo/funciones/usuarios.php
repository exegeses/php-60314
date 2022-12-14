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

    function verUsuarioPorID() : array | false
    {
        $idUsuario = $_GET['idUsuario'];
        $link = conectar();
        $sql = "SELECT idUsuario, nombre, apellido, email, rol, u.idRol
                        FROM usuarios u
                        JOIN roles r 
                          ON u.idRol = r.idRol
                       WHERE idUsuario = ".$idUsuario;
        try {
            $resultado = mysqli_query( $link, $sql );
            $usuario = mysqli_fetch_assoc($resultado);
            return $usuario;
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
        $sqlRol = '';
        if( isset($_POST['idRol']) ){  // $_SESSION['idRol']==1
            $idRol = $_POST['idRol'];
            $sqlRol = ", idRol = '".$idRol."'";
        }

        $sql = "UPDATE usuarios
                    SET nombre = '".$nombre."',
                        apellido = '".$apellido."',
                        email = '".$email."'";
        $sql .= $sqlRol;
        $sql .= " WHERE idUsuario = ".$idUsuario;
        $link = conectar();
        try {
            $resultado = mysqli_query($link, $sql);
            /* actualizamos datos de sesi??n
             SOLAMENTE si NO es admin */
            if( $_SESSION['idRol'] != 1 ){
                $_SESSION['nombre'] = $nombre;
                $_SESSION['apellido'] = $apellido;
                $_SESSION['email'] = $email;
            }
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
        /** obtenemos la contrase??a encriptada **/
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
            //redirecci??n a form con mensaje error
            header('location: formModificarClave.php?error=1');
            return false;
        }
        /*## en esta punto la contrase??a actual es correcta ##*/
        //capturamos newClave y newClave2
        $newClave = $_POST['newClave'];
        $newClave2 = $_POST['newClave2'];
        //compraramos igualdad
        if( $newClave == $newClave2 ){
            //encriptamos clave
            $claveHash = password_hash($newClave, PASSWORD_DEFAULT);
            /*## modificaci??n de clave ##*/
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

    function generarCodigo( $largo = 16 ) : string
    {
        $chars = [
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
            "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
            1,2,3,4,5,6,7,8,9,0
        ];

        $largoArray = count( $chars ) - 1;
        $codigo = '';
        for( $i = 0; $i < $largo; $i++ ){
            $nRandom = rand( 0, $largoArray );
            $codigo .= $chars[ $nRandom ];
        }
        return $codigo;
    }

    function mailCodigo( string $email, string $codigo ) : void
    {
        $asunto = 'Pedido de reseteo de contrase??a';
        $destinatario = $email;
        $cuerpo = '<div style="background-color: #2c3648;
                    color: #e6e4e4; 
                    font-family: Arial;
                    width: 500px;
                    margin: auto;
                    padding:12px;
                    border-radius: 12px;">';
        $cuerpo .= 'Haga click aqu????i para ';
        //$url = 'http://php-60314.curso:8080/catalogo/formResetClave.php?cod='.$codigo.'&email='.$email;
        $url = 'https://php-60314.000webhostapp.com/formResetClave.php?cod='.$codigo.'&email='.$email;
        $cuerpo .= '<a style="color: #e6e4e4;
                              font-weight:600;" href="'.$url.'">activar contrase??a</a>';
        $cuerpo .= '</div>';

        //encabezados adicionales
        $headers = 'From: emapresa@mail.com' . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        //enviamos el email
        mail( $destinatario, $asunto, $cuerpo, $headers );
    }

    function mailResetClave() : void
    {
        $email = $_POST['email'];
        $link = conectar();
        $sql = "SELECT 1 FROM usuarios 
                    WHERE email = '".$email."'";
        try {
            $restultado = mysqli_query($link, $sql);
            $cantidad = mysqli_num_rows($restultado);
            if( $cantidad == 0 ){
                header('location: formReset.php?error=1');
            }

        }catch( Exception $e ) {
            echo $e->getMessage();
        }

        /* si coincide el email */
        $codigo = generarCodigo();
            /* almacenamos c??digo en tabla reset_clave */
        $sql = "INSERT INTO reset_clave
                            ( codigo )
                        VALUE ( '".$codigo."' )";
        try {
            $restultado = mysqli_query($link, $sql);
        }catch( Exception $e ) {
            echo $e->getMessage();
        }
            /* enviamos email de reseteo */
        mailCodigo( $email, $codigo);
    }

    function checkCodigo()
    {
        $codigo = $_GET['cod'];
        $link = conectar();
        $sql = "SELECT 1 FROM reset_clave
                    WHERE codigo = '".$codigo."'
                     AND activo = 1";
        try {
            $resultado = mysqli_query($link, $sql);
        }catch( Exception $e ) {
            echo $e->getMessage();
        }
        $cantidad = mysqli_num_rows($resultado);
        if( $cantidad == 0 ){
            //si no coincide o arctico NO est?? en 1
            header( 'location: errorCodigo.php' );
            return false;
        }
        $sql = "UPDATE reset_clave
                  SET activo = 0
                  WHERE codigo = '".$codigo."'";
        try {
            mysqli_query($link, $sql);
        }catch( Exception $e ) {
            echo $e->getMessage();
        }
        return true;
    }

    function modificarResetClave() : bool
    {
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
        $email = $_POST['email'];
        if ( $clave != $clave2 ){
            header( 'location: formResetClave.php?error=1&email='.$email );
            return false;
        }
        //encriptamos la clave
        $claveHash = password_hash($clave, PASSWORD_DEFAULT);
        $link = conectar();
        $sql = "UPDATE usuarios 
                    SET clave = '".$claveHash."'
                  WHERE email = '".$email."'";
        try {
            mysqli_query($link, $sql);
            return true;
        }catch( Exception $e ) {
            echo $e->getMessage();
            return false;
        }
    }

    function eliminarUsuario() : bool
    {
        $idUsuario = $_POST['idUsuario'];
        $link = conectar();
        $sql = "DELETE 
                    FROM usuarios
                    WHERE idUsuario = " . $idUsuario;
        try {
            $resultado = mysqli_query( $link, $sql );
            return $resultado;
        }
        catch ( Exception $e ) {
            echo $e->getMessage();
            return false;
        }
    }