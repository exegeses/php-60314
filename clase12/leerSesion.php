<?php

    session_start();
    $nombre = $_SESSION['nombre'];
    $lista = $_SESSION['lista'];

    echo $nombre;
    echo '<br>';
    echo '<pre>';
    print_r($lista);
    echo '</pre>';