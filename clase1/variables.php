<?php
    $numero = 56;
    $marca = 'Manaos';
    const NOMBRE = 'Marcos';
    /*echo $numero;
    echo ' ';
    echo $marca;*/
    //en php se concatena con el .
    #echo $numero .' '. $marca;
    echo $numero, ' ', $marca;
?>
<br>
    Ejemplo de concatenación: sql dinámico
<br>
<?php
    /* traer nombre y precio de tabla productos
        dónde el precio sea menor a 56
    */
    $sql = "SELECT nombre, precio 
                FROM productos
                WHERE precio < ".$numero;
?>
<br>
<?php
    //NOMBRE = 'manzana'; no se puede sobre escribir
    echo NOMBRE;
