<?php
$locaciones =
        [
            'angkor', 'azul', 'basil', 'burj',
            'colosseo', 'easter', 'eiffel',
            'gizah', 'ha-long', 'liberty',
            'machu', 'opera', 'palace', 'petra',
            'sagrada', 'santorini', 'taj',
            'wall'
        ];
$locaciones2 =
        [
            'Angkor Wat, Angkor',
            'Mezquita azul, Estambul',
            'Catedral de San Basilio, Moscu',
            'Burj Khalifa, Dubai',
            'El Coliseo, Roma', 'Isla de Pascua, Chile',
            'Tour Eiffel, París',
            'Gran Pirámide de Guiza, Guiza',
            'Hạ Long Bay, Quang Ninh, Vietnam',
            'Estatua de la Libertad, New York',
            'Machu Picchu, Perú',
            'Opera House, Sydney', 'Grand Palace, Bangkok', 'petra',
            'La Sagrada Familia, Barcelona',
            'Santorini, Archipiélago de las Cícladas ',
            'Taj Mahal, Agra',
            'La Gran Muralla, Jinshanling'
        ];
$cantidad = count($locaciones);
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
        for ( $i=0; $i<$cantidad; $i++){
    ?>
        <article>
            <img src="imgs/<?= $locaciones[$i] ?>.jpg">
            <h2><?= $locaciones2[$i] ?></h2>
        </article>
    <?php
        }
    ?>
    </section>
</body>
</html>