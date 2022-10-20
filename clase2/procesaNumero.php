<?php

    $numero = $_GET['numero'];
    if ( $numero < 100 ){
        echo '<img src="imgs/ok.png">';
    }
    else{
        echo '<img src="imgs/error.png">';
    }
?>
<hr>
<?php
    if ( $numero < 100 ){
?>
        <img src="imgs/ok.png">
<?php
    }
    else{
?>
    <img src="imgs/error.png">
<?php
    }
?>
<hr>
<?php
    if ( $numero < 100 ){
        $img = 'ok';
    }
    else{
        $img = 'error';
    }
?>
    <img src="imgs/<?= $img ?>.png">
<hr>
<?php
    $img = 'error';
    if ( $numero < 100 ){
        $img = 'ok';
    }
?>
<img src="imgs/<?= $img ?>.png">
