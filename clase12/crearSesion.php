<?php

    //directiva de sesión
    /*
    si la sesión no existe: la crea
    si existe: acceso para uso
     */
    session_start();

    //registramos variables de sesión
    $_SESSION['nombre'] = 'marcos';
    $_SESSION['numero'] = 666;
    $_SESSION['lista'] = ['uno', 'dos', 'tres'];