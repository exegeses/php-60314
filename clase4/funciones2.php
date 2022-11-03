<?php
    //función para dividir dos número
    function dividir( float $dividendo, float $divisor ) : float | string
    {
        if ( is_numeric( $dividendo ) && is_numeric( $divisor ) ){
            if( $divisor != 0 ){
                $resultado = $dividendo / $divisor;
                return $resultado;
            }
            return 'El divisor no puede ser 0';
        }
        return 'ambos deben ser números';
    }



    dividir('manzana', 5);