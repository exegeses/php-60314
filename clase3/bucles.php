<?php

    $n = 1;
    while ( $n < 15 ) {
        //bloque de código a iterar
        echo $n, '<br>';
        $n++;
    }
?>
<hr>
<?php
    $celulares = [
        'Samsung', 'LG', 'Xiaomi',
        'Motorola', 'Nokia', 'Apple',
        'OnePlus'
    ];

    $n = 0;
    $cantidad = sizeof($celulares);
    echo '<ul>';
    while ( $n < $cantidad ) {
        echo '<li>', $celulares[ $n ], '</li>';
        $n++;
    }
    echo '</ul>';
