<?php

    #######################
    ### CRUD de marcas

    function listarMarcas() : mysqli_result | false
    {
        $link = conectar();
        $sql = "SELECT idMarca, mkNombre
                    FROM marcas";
        try{
            $resultado = mysqli_query( $link, $sql );
            return $resultado;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }

    function verMarcaPorID( $idMarca ) : array | false
    {
        $link = conectar();
        $sql = "SELECT idMarca, mkNombre
                    FROM marcas
                    WHERE idMarca = ".$idMarca;
        try {
            $resultado = mysqli_query( $link, $sql );
            $marca = mysqli_fetch_assoc( $resultado );
            return $marca;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }

    function agregarMarca() : bool
    {
        $mkNombre = $_POST['mkNombre'];
        $link = conectar();
        $sql = "INSERT INTO marcas 
                        ( mkNombre )
                    VALUE
                        ( '".$mkNombre."' )";
        try{
            $resultado = mysqli_query( $link, $sql );
            return $resultado; //true
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }

    function modificarMarca(  ) : bool
    {
        $idMarca  = $_POST['idMarca'];
        $mkNombre = $_POST['mkNombre'];
        $link = conectar();
        $sql = "UPDATE marcas 
                    SET mkNombre = '".$mkNombre."'
                  WHERE idMarca  = ".$idMarca;
        try{
            $resultado = mysqli_query( $link, $sql );
            return $resultado; //true
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }

    function productoPorMarca(  ) : int
    {
        $idMarca = $_GET['idMarca'];
        $link = conectar();
        $sql = "SELECT 1 
                    FROM productos 
                    WHERE idMarca = ".$idMarca;
        /*$sql2 = "SELECT COUNT(idProducto) as n
	                FROM productos
                    WHERE idMarca = ".$idMarca;*/
        try {
            $resultado = mysqli_query( $link, $sql );
            $cantidad = mysqli_num_rows( $resultado );
            // $resultado = mysqli_query( $link, $sql2 );
            // $cantidad = mysqli_fetch_assoc( $resultado );
        }
        catch ( Exception $e ){
            echo $e->getMessage();
        }
        return $cantidad;
    }

    function eliminarMarca() : bool
    {
        $idMarca = $_POST['idMarca'];
        $link = conectar();
        $sql = "DELETE FROM marcas 
                    WHERE idMarca = ".$idMarca;
        try {
            $resultado = mysqli_query( $link, $sql );
            return $resultado;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }