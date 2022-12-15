<?php

    const SERVER    = 'localhost';
    const USUARIO   = 'root';//'id20006670_marcos';
    const CLAVE     = 'root';//'_kzr_r]}m{{Sc8zA';
    const BASE      = 'catalogo60314';//'id20006670_catalogo';

    function conectar() : mysqli | false
    {
        $link = mysqli_connect(
                    SERVER,
                    USUARIO,
                    CLAVE,
                    BASE
                );
        return $link;
    }