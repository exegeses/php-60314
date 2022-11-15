<?php

    function listarCategorias() : mysqli_result | false
    {
        $link = conectar();
        $sql = "SELECT idCategoria, catNombre
                    FROM categorias";
        try {
            $resultado = mysqli_query($link, $sql);
            return  $resultado;
        }catch ( Exception $e ){
            $e->getMessage();
            return false;
        }
    }