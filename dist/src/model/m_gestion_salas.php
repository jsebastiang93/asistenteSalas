<?php

setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/Bogota');

//$dbm = conectar_mysql();
//$error_personal = null;
//$fecha_hoy = date("Y-m-d");
//$fecha_hora_hoy = date("Y-m-d H:i:s"); //fecha_creacion
//$formulario = variable_exterior("formulario");

//$resultados = array();
//$resultados_final = array();
//$consulta = "";

$dbm = conectar_mysql();
if (isset($_POST['formulario'])) {
    $formulario = $_POST['formulario'];
    # code...
} else {
    $formulario = "";
}

//Crear sala
if ($formulario == "crear_sala" && $formulario != "") {


    $nombre_sede = $_POST['id_sede'];
    $sala = $_POST['sala'];
    $observacion = $_POST['observacion'];
    $bloque = $_POST['bloque'];
    $numero_estudiantes = $_POST['num_estudiantes'];
    $aire = $_POST['aire'];
    $video = $_POST['video'];


    if (isset($_POST['aire'])) {
        $aire = 'si';
        # code...
    } else {
        $aire = 'no';
    }

    if (isset($_POST['video'])) {
        $video = 'si';
        # code...
    } else {
        $video = 'no';
    }

    $sql = "SELECT COUNT(*) as cont FROM salas WHERE nombre = '$sala' AND id_sede = '$nombre_sede'";
    $query = $dbm->prepare($sql);
    $query->execute();
    $cont = array_asociativo($query)[0]['cont'];
    if ($cont == 0) {

        $sql = "INSERT INTO salas (
        nombre, 
        estado, 
        id_sede, 
        bloque, 
        capacidad_estudiantes, 
        aire_acondicionado, 
        video_beam, 
        observacion,
        usuario_creacion,
        fecha_creacion

    ) VALUES (
        '$sala',
         '1', 
         '$nombre_sede',
         '$bloque',
         '$numero_estudiantes',
         '$aire',
         '$video',
         '$observacion',
         '" . $_SESSION['id_usuario'] . "',
         NOW()

         )";

        $query = $dbm->prepare($sql);
        if ($query->execute()) {
            // EJECUTÓ BIEN
?>
            <script>
                alert("La sala se insertó correctamente ");
            </script>

        <?php
        } else {
            // ERROR DOS
        ?>
            <script>
                alert("Error! La Sala no se Creo correctamente");
            </script>

        <?php
        }
    } else {
        ?>
        <script>
            alert("Error! La Sala ya existe con ese nombre");
        </script>

        <?php
    }
}


if ($formulario == "consultar_salas") {
    # code...
    $comodin = "";

    $nombre = $_POST['nombre'];
    $comodin_nombre = "";
    if ($nombre != "") {
        $comodin_nombre = " AND salas.nombre = '$nombre'";
        $comodin .= $comodin_nombre;
    }
    $sql = "SELECT salas.*,sedes.nombre AS nombre_sede FROM `salas`,`sedes` WHERE salas.id_sede=sedes.id $comodin";
    $query = $dbm->prepare($sql);
    $query->execute();
    $salas2 = array_asociativo($query);
} else if ($formulario != "consultar_salas") {
    $sql = "SELECT salas.*,sedes.nombre AS nombre_sede FROM `salas`,`sedes` WHERE salas.id_sede=sedes.id";
    $query = $dbm->prepare($sql);
    $query->execute();
    $salas2 = array_asociativo($query);
}

//Consultar Salas

//if ($formulario == "crear_sala" && $formulario != "") {


//}

//Actualizar Sala
if ($formulario == "actualizar_sala" && $formulario != "") {

    $nombre_sede = $_POST['id_sede'];
    $sala = $_POST['sala'];
    $estado = $_POST['estado'];
    $observacion = $_POST['observacion'];
    $bloque = $_POST['bloque'];
    $numero_estudiantes = $_POST['num_estudiantes'];
    $aire = $_POST['aire'];
    $video = $_POST['video'];
    $id = $_POST['id'];

    if (isset($_POST['aire'])) {
        $aire = 'si';
        # code...
    } else {
        $aire = 'no';
    }

    if (isset($_POST['video'])) {
        $video = 'si';
        # code...
    } else {
        $video = 'no';
    }

    if (isset($_POST['estado'])) {
        $estado = 'Acivo';
        # code...
    } else {
        $estado = 'Inactivo';
    }

    $sql = "SELECT COUNT(*) as cont FROM salas WHERE nombre = '$sala' AND id_sede = '$nombre_sede'";
    $query = $dbm->prepare($sql);
    $query->execute();
    $cont = array_asociativo($query)[0]['cont'];
    if ($cont == 0) {


        $sql = "UPDATE salas SET 
    nombre = '$sala', 
    estado = '$estado',
    bloque = '$bloque',
    capacidad_estudiantes = '$numero_estudiantes',
    aire_acondicionado = '$aire',
    video_beam = '$video',
    observacion = '$observacion'
    WHERE id ='$id' ";

        $query = $dbm->prepare($sql);

        if ($query->execute()) {
        ?>
            <script>
                alert("La Sala se Actualizo Correctamente");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Error! La sala no fue actualizada correctamente");
            </script>

        <?php
        }
    } else {
        ?>
        <script>
            alert("Error! La Sala ya existe con ese nombre");
        </script>

<?php
    }
}

//Consultar sedes
$sql = "SELECT * FROM sedes WHERE estado = 1";
$query = $dbm->prepare($sql);
$query->execute();
$sedes = array_asociativo($query);



?>