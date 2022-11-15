<?php
    /*
    ['name'] - nombre del archivo
    ['type'] - tipo de archivo
    ['tmp_name'] - nombre y ruta temporal   c:\XAMPP\tmp
    ['error'] - código numérico de error
    ['size'] - tamaño de archivo (bytes)
    */
    $prdImagen = $_FILES['prdImagen'];
    echo '<pre>';
    print_r($prdImagen);
    echo '</pre>';

    if( $_FILES['prdImagen']['error'] == 0 ){
        //renombramos : 1668768464.ext
            //unix timestamp  tiempo milisegundos 01/01/1970
            $time = time();
            $ext = pathinfo(
                            $_FILES['prdImagen']['name'],
                            PATHINFO_EXTENSION
                    );
            $prdImagen = $time.'.'.$ext;
            echo $prdImagen;
        //subir archivo
        move_uploaded_file(
                    $_FILES['prdImagen']['tmp_name'],
                    'productos/'.$prdImagen
        );
    }
    else{
        echo 'noDisponible.png';
    }
