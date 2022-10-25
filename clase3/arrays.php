<?php

    $diaSemana = [
                    'Domingo', 'Lunes', 'Martes',
                    'Miércoles', 'Jueves', 'Viernes',
                    'Sábado'
                ];
    echo '<pre>';
    print_r($diaSemana);
    echo '</pre>';

?>
<hr>
<?php
    /*obtenemos número del día de la semana
        date('w')
        Domingo -> 0
        Lunes -> 1
        Martes -> 2
    */
    $nDiaSemana = date('w');
    echo $diaSemana[ $nDiaSemana ];
?>
<hr>
<?php
    $celulares = [
                    3 => 'Samsung', 'LG', 7 => 'Xiaomi',
                    'Motorola', 'Nokia', 'Apple',
                    'OnePlus'
                ];

    echo '<pre>';
    print_r($celulares);
    echo '</pre>';
?>
<hr>
<?php
    //array asociativo  las posiciones son strings
    $celulares2 = [
        'Samsung'=>'Galaxy S' , 'LG'=>'L40' ,
        'Xiaomi'=>'redmi',
        'Motorola'=>'G plus', 'Nokia'=>'1100',
        'Apple'=>'iPhone 14 Pro',
        'OnePlus'=>'10 Pro'
    ];
    echo '<pre>';
    print_r($celulares2);
    echo '</pre>';
    echo $celulares2['OnePlus'];
?>
<hr>
<?php
    // matriz   array de arrays
    $celulares3 = [
        'Samsung'=>[ 'Galaxy S', 'Galaxy Z', 'S 22 ultra' ] ,
        'LG'=>[ 'L40', 'K22' ] ,
        'Xiaomi'=>[ 'redmi', 'MI10' ],
        'Motorola'=>'G plus',
        'Nokia'=>'1100',
        'Apple'=>'iPhone 14 Pro',
        'OnePlus'=>'10 Pro'
    ];

    echo '<pre>';
    print_r($celulares3);
    echo '</pre>';