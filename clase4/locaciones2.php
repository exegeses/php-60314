<?php
$locaciones =
    [
        'angkor'=>'Cambodia',
        'azul'=>'Turquía',
        'basil'=>'Rusia',
        'burj'=>'Dubai',
        'colosseo'=>'Italia',
        'easter'=>'Chile',
        'eiffel'=>'Francia',
        'gizah'=>'Egipto',
        'ha-long'=>'Vietnam',
        'liberty'=>'USA',
        'machu'=>'Peru',
        'opera'=>'Australia',
        'palace'=>'Tailandia',
        'petra'=>'Jordania',
        'sagrada'=>'España',
        'santorini'=>'Grecia',
        'taj'=>'India',
        'wall'=>'China'
    ];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de locaciones</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<h1>Listado de locaciones</h1>
    <section id="contenedor">
    <?php
        //foreach ( $contenedor as $aux )
        //foreach ( $contenedor as $key => $value )
        foreach ( $locaciones as $img => $locacion ){
    ?>
            <article>
                <img src="imgs/<?= $img ?>.jpg">
                <h2><?= $locacion ?></h2>
            </article>
    <?php
        }
    ?>
    </section>
</body>
</html>