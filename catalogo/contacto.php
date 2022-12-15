<?php
    require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container">
        <h1>Formulario de contacto</h1>


        <div class="alert bg-light p-4 col-8 mx-auto shadow">
<?php
    //capturamos datos enviados por el form
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $consulta = $_POST['consulta'];
    //datos de envío de email
    $destinatario = "marcos@dropjar.com";
    $asunto = "Enmail enviado desde mi sitio";
    $cuerpo = '<div style="background-color: #2c3648;
                    color: #e6e4e4; 
                    font-family: Arial;
                    width: 500px;
                    margin: auto;
                    padding:12px;
                    border-radius: 12px;">';
    $cuerpo .= '<img src="https://php-60314.000webhostapp.com/imagenes/m-iso.jpg" style="width: 64px; vertical-align: middle">Power Ranger Negro<br>';
    $cuerpo .= "Nombre: ".$nombre."<br>";
    $cuerpo .= "Email: ".$email."<br>";
    $cuerpo .= "Consulta: ".$consulta."</div>";
    //encabezados adicionales
    $headers = 'From: leomessi@seleccion.com.ar' . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    //enviamos el email
    mail( $destinatario, $asunto, $cuerpo, $headers );
?>
            Gracias <?= $nombre ?> por contactarnos
        </div>



    </main>

<?php  include 'layout/footer.php';  ?>