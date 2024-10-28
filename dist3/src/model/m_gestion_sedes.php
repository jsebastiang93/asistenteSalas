<?php

setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/Bogota');

// $dbm = conectar_mysql();
// $error_personal = null;
// $fecha_hoy = date("Y-m-d");
// $fecha_hora_hoy = date("Y-m-d H:i:s"); //fecha_creacion
// $formulario = variable_exterior("formulario");

$dbm = conectar_mysql();
if (isset($_POST['formulario'])) {
    $formulario = $_POST['formulario'];
    # code...
} else {
    $formulario = "";
}
// PRUEBA
//Crear sede 
if ($formulario == "crear_sede" && $formulario != "") {

    $nombre_sede = $_POST['nombre_sede'];
    $direccion_sede = $_POST['direccion_sede'];

    $sql = "INSERT INTO sedes (nombre, estado, direccion) VALUES ('$nombre_sede', '1', '$direccion_sede')";
    $query = $dbm->prepare($sql);
    if ($query->execute()) {
        // EJECUTÓ BIEN
?>
        <script>
            alert("La sede se insertó correctamente");
        </script>

    <?php
    } else {
        // ERROR DOS
    ?>
        <script>
            alert("Error! La sede no se insertó correctamente");
        </script>

    <?php
    }
}
//Actualizar Sede 
if ($formulario == "actualizar_sede" && $formulario != "") {
    $nombre_sede = $_POST['nombre_sede'];
    $direccion_sede = $_POST['direccion_sede'];
    $estado = $_POST['estado'];
    $id = $_POST['id'];

    $sql = "UPDATE sedes SET nombre = '$nombre_sede', direccion = '$direccion_sede', estado = '$estado' WHERE id ='$id' ";
    $query = $dbm->prepare($sql);
    if ($query->execute()) { 
    ?>
        <script>
            alert("Sede actualizada correctamente");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error! La sede no fue actualizada correctamente");
        </script>

<?php
    }
}
$sql = "SELECT * FROM sedes";
$query = $dbm->prepare($sql);
$query->execute();
$sedes = array_asociativo($query);




?>