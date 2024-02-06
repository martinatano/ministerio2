 <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $datos = $_POST["datos"];
        // Aquí puedes procesar los datos como desees
        echo "Datos recibidos: " . $datos;
    } else {
        // Manejo del caso en que no se reciba una solicitud POST
        echo "No se recibieron datos POST";
    }
?>