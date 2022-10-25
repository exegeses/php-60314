<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <main class="container">
<?php
    for( $n = 1; $n < 15; $n++ ){
        echo $n, '<br>';
    }
?>
<hr>
<?php
    $categorias = [
        'audio', 'electrónica', 'tv',
        'gaming', 'hogar', 'indumentaria',
        'jardinería', 'juguetería'
    ];

    $cantidad = count($categorias);
    for( $n = 0; $n < $cantidad; $n++ ){
        echo '<span class="badge bg-dark mx-1">', $categorias[$n], '</span>';
    }

?>




    </main>
</body>
</html>
