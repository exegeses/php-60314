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