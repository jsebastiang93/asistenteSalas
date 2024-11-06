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
$sedes = [];
// PRUEBA
//Crear sede 
if ($formulario == "crear_sede" && $formulario != "") {

    $nombre_sede = $_POST['nombre_sede'];
    $direccion_sede = $_POST['direccion_sede'];

    $sql = "SELECT COUNT(*) as cont FROM sedes WHERE nombre  ='" . $_POST['nombre_sede'] . "'";
    $query = $dbm->prepare($sql);
    $query->execute();
    $sedes = array_asociativo($query)[0]['cont'];
    if ($sedes == 0) {
        $sql = "INSERT INTO sedes (nombre, estado, direccion, usuario_creacion, fecha_creacion) VALUES ('$nombre_sede', '1', '$direccion_sede', '" . $_SESSION['id_usuario'] . "', NOW())";
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
    } else {
        ?>
        <script>
            alert("Error! La sede con ese nombre ya existe");
        </script>

        <?php
    }
}

if ($formulario == "consultar_sede" && $formulario != "") {
    $comodin = "";

    $nombre = $_POST['nombre'];
    $comodin_nombre = "";
    if ($nombre != "") {
        $comodin_nombre = " AND nombre = '$nombre'";
        $comodin .= $comodin_nombre;
    }

    $direccion = $_POST['direccion'];
    $comodin_direccion = "";
    if ($direccion != "") {
        $comodin_direccion = " AND direccion = '$direccion'";
        $comodin .= $comodin_direccion;
    }

    $estado = $_POST['estado'];
    $comodin_estado = "";
    if ($estado != "") {
        $comodin_estado = " AND estado = '$estado'";
        $comodin .= $comodin_estado;
    }

    $sql = "SELECT * FROM sedes WHERE 1 = 1 $comodin";
    $query = $dbm->prepare($sql);
    $query->execute();
    $sedes = array_asociativo($query);
} else if($formulario != "consultar_sede") {
    $sql = "SELECT * FROM sedes";
    $query = $dbm->prepare($sql);
    $query->execute();
    $sedes = array_asociativo($query);
}

//Actualizar Sede 
if ($formulario == "actualizar_sede" && $formulario != "") {
    $nombre_sede = $_POST['nombre_sede'];
    $direccion_sede = $_POST['direccion_sede'];
    $estado = $_POST['estado'];
    $id = $_POST['id'];


    $sql = "SELECT COUNT(*) as cont FROM sedes WHERE nombre  ='" . $_POST['nombre_sede'] . "'";
    $query = $dbm->prepare($sql);
    $query->execute();
    $cont_sedes = array_asociativo($query)[0]['cont'];
    if ($cont_sedes == 0) {
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
    } else {
        ?>
        <script>
            alert("Error! La sede con ese nombre ya existe");
        </script>

<?php
    }
}




?>