<?php

    function listarProductos() : mysqli_result | false
    {
        $link = conectar();
        $sql = "SELECT idProducto, 
                        prdNombre, prdPrecio, 
                        prdDescripcion, 
                        prdImagen, 
                        mkNombre, catNombre
                    FROM productos
                      JOIN marcas 
                        ON productos.idMarca = marcas.idMarca
                      JOIN categorias 
                        ON productos.idCategoria = categorias.idCategoria";
        try {
            $resultado = mysqli_query( $link, $sql );
            return $resultado;
        }
        catch ( Exception $e )
        {
            echo $e->getMessage();
            return false;
        }
    }

    function verProductoPorID( $idProducto ) : array | false
    {
        $sql = "SELECT 
                        prdImagen, 
                        productos.idMarca, mkNombre,
                        productos.idCategoria, catNombre,  
                        idProducto, 
                        prdPrecio, prdNombre, prdDescripcion 
                    FROM productos
                    INNER JOIN marcas 
                        ON marcas.idMarca = productos.idMarca
                    INNER JOIN categorias 
                        ON categorias.idCategoria = productos.idCategoria
                WHERE idProducto = ".$idProducto;
        $link = conectar();
        try{
            $resultado = mysqli_query( $link, $sql);
            $producto = mysqli_fetch_assoc( $resultado );
            return $producto;
        }
        catch( Exception $e )
        {
            echo $e->getMessage();
            return false;
        }
    }
    
    function subirImagen() : string
    {
        //si no enviaron archivo agregarProducto()
        $prdImagen = 'noDisponible.png';

        //si no enviaron archivo moficarProducto()
        if( isset( $_POST['imgActual'] ) ){
            $prdImagen = $_POST['imgActual'];
        }

        //si enviaron archivo
        if( $_FILES['prdImagen']['error'] == 0 ){
            //renombramos : 1668768464.ext
            //unix timestamp  tiempo milisegundos 01/01/1970
            $time = time();
            $ext = pathinfo(
                $_FILES['prdImagen']['name'],
                PATHINFO_EXTENSION
            );
            $prdImagen = $time.'.'.$ext;
            //subir archivo
            move_uploaded_file(
                $_FILES['prdImagen']['tmp_name'],
                'productos/'.$prdImagen
            );
        }
        return $prdImagen;
    }

    function agregarProducto() : bool
    {
        //capturamos datos enviados por el form
        $prdNombre = $_POST['prdNombre'];
        $prdPrecio = $_POST['prdPrecio'];
        $idMarca = $_POST['idMarca'];
        $idCategoria = $_POST['idCategoria'];
        $prdDescripcion = $_POST['prdDescripcion'];
        //subirImagen():string
        $prdImagen = subirImagen();
        //insertar datos en tabla productos
        try {
            $sql = "INSERT INTO productos
                (prdNombre, idMarca, idCategoria, prdImagen, prdPrecio, prdDescripcion, prdActivo)
                VALUES
                ('".$prdNombre."',
                ".$idMarca.",
                ".$idCategoria.",
                '".$prdImagen."',
                ".$prdPrecio.",
                '".$prdDescripcion."',
                true)";
            $link = conectar();
            $resultado = mysqli_query( $link, $sql );
            return $resultado;
        }
        catch ( Exception $e )
        {
            echo $e->getMessage();
            return false;
        }
    }

    function modificarProducto() : bool
    {
        $idProducto = $_POST['idProducto'];
        $prdNombre = $_POST['prdNombre'];
        $prdPrecio = $_POST['prdPrecio'];
        $idMarca = $_POST['idMarca'];
        $idCategoria = $_POST['idCategoria'];
        $prdDescripcion = $_POST['prdDescripcion'];
        $prdImagen = subirImagen();

        try{
            $link = conectar();
            $sql = "UPDATE productos
                        SET prdNombre = '".$prdNombre."',
                            prdPrecio = ".$prdPrecio.",
                            idCategoria = ".$idCategoria.",
                            idMarca = ".$idMarca.",
                            prdImagen = '".$prdImagen."',
                            prdDescripcion = '".$prdDescripcion."'
                        WHERE idProducto = ".$idProducto;
            $resultado = mysqli_query( $link, $sql );
            return  $resultado;
        }
        catch ( Exception $e )
        {
            echo $e->getMessage();
            return false;
        }

    }