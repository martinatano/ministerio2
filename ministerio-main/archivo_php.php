 <?php
        $grado = $_POST['grado'];
        $apellidos = $_POST['Ape'];
        $nombres = $_POST['nom'];
        $dni = $_POST['dni'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $fechaNac = $_POST['fechaNac'];
        $dom = $_POST['dom'];
        // Aquí puedes procesar los datos como desees
        echo "Datos recibidos: " .$grado." ".$apellidos." ".$nombres." ".$dni." ".$edad." ".$sexo." ".$fechaNac." ".$dom;
?>