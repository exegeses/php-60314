<?php

    session_start();
    unset($_SESSION['numero']);
    // eliminar todas las variables de sesión
    session_unset();
    // eliminar sesión
    session_destroy();