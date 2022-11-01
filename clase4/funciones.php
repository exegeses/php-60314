<?php
    //declaración
    function resaltar( string $frase ) : string
    {
        return '<b>'. $frase. '</b><br>';
    }
    function calcularCuadrado( float|int $numero ): int
    {
        $resultado = $numero * $numero;
        return round($resultado);
    }

    //llamado a ejecución | invocamos la función
    echo resaltar('Hola mundo');
    echo resaltar('otro texto');
    echo resaltar('nueva frase');
?>
<hr>
<?= calcularCuadrado( 2 ); ?>
<hr>
<?php
    echo resaltar( calcularCuadrado(4) );
    //16<b></b><br>
?>
<hr>
<?php
    echo calcularCuadrado( 3.3 )
?>
