<?php

    $x = 5;

    try{
        $resultado = $x / 'manzana';
    }
    catch ( Error $e ){
        //redirección
        $separador = '----------'."\n";
        $hora = 'Hora: '.date('d/m/Y H:i:s')."\n";
        $mensaje = 'Mensaje: '. $e->getMessage()."\n";
        $archivo = 'Archivo: '. $e->getFile()."\n";
        $linea = 'Nro de línea: '.$e->getLine()."\n";

        $incidencia = $separador.$hora.$mensaje.$archivo.$linea;

        //textfile
        $fh = fopen( 'errores.log', 'a+' );
        fwrite( $fh, $incidencia );
        fclose( $fh );
    }

