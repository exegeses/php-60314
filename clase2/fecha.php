<?php
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    //mostrar 20/10/2022
    $diaMes = date('d');
    $numeroMes = date( 'm');
    $anio = date('Y');
    echo $diaMes, '/', $numeroMes, '/', $anio;
?>
<hr>
<?php
    $fechaYHora = date('d/m/Y H:i:s');
    echo $fechaYHora;
?>
<hr>
<?php
    //mostrar día de la semana
    $diaSemana = date('l');
    //echo $diaSemana;
    switch ( $diaSemana )
    {
        case 'Monday':
            $diaSemana = 'Lunes';
            break;
        case 'Tuesday':
            $diaSemana = 'Martes';
            break;
        case 'Wednesday':
            $diaSemana = 'Miércoles';
            break;
        case 'Thursday':
            $diaSemana = 'Jueves';
            break;
        case 'Friday':
            $diaSemana = 'Viernes';
            break;
        default:
            $diaSemana = 'Sábado';
            break;
    }
    echo $diaSemana;

