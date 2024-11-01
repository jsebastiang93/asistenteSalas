<?php

setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/Bogota');

// $error_personal = null;
// $fecha_hoy = date("Y-m-d");
$fecha_hora_hoy = date("Y-m-d H:i:s"); //fecha_creacion
// $formulario = variable_exterior("formulario");

// $resultados = array();
// $resultados_final = array();

// $consulta = "";

$dbm = conectar_mysql();
if (isset($_POST['formulario'])) {
    $formulario = $_POST['formulario'];
    # code...
} else {
    $formulario = "";
}

$sql = "SELECT * FROM salas WHERE estado = 1";
$query3 = $dbm->prepare($sql);
$query3->execute();
$salas = array_asociativo($query3);


$sql = "SELECT * FROM sedes WHERE estado = 1";
$query3 = $dbm->prepare($sql);
$query3->execute();
$sedes = array_asociativo($query3);



if ($formulario == "crear_inconsistencia" && $formulario != "") {
    // Importación de valores para insert
    $id_sala_c = $_POST['id_sala_c'];
    $id_sede_c = $_POST['id_sede_c'];
    $comentarios_inconsistencia = $_POST['comentarios_inconsistencia'];

    $sql = "INSERT INTO reservas_inconsistencias
                        (estado, comentarios_inconsistencia, fecha_creacion, id_usuario_creacion, id_sala, id_sede) 
                    VALUES 
                        ('1','$comentarios_inconsistencia','$fecha_hora_hoy','" . $_SESSION['id_usuario'] . "', '" . $id_sala_c . "', '$id_sede_c')
                    ";
    $query = $dbm->prepare($sql);
    if ($query->execute()) {
?>
        <script>
            alert("Su reporte ha sido enviado exitosamente. Gracias por ayudar a mejorar nuestras instalaciones");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error! La inconsistencia no fue generada correctamente");
        </script>

    <?php
    }
    // Crear usuario

}

// Actualizar usuario
if ($formulario == "gestionar" && $formulario != "") {
    $id = $_POST['id'];
    $comentarios_resolucion = $_POST['comentarios_resolucion'];

    $sql = "UPDATE reservas_inconsistencias SET estado = '0', comentarios_resolucion = '$comentarios_resolucion', id_usuario_resolucion = '" . $_SESSION['id_usuario'] . "', fecha_resolucion = '$fecha_hora_hoy' WHERE id ='$id' ";
    $query = $dbm->prepare($sql);
    if ($query->execute()) {
    ?>
        <script>
            alert("El reporte ha sido marcado como resuelto exitosamente");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error! La inconsistencia no fue actualizada correctamente");
        </script>

<?php
    }
}

// Consultar usuarios tabla
$sql = "SELECT * FROM reservas WHERE id_usuario = '" . $_SESSION['id_usuario'] . "'";
$query = $dbm->prepare($sql);
$query->execute();
$reservas = array_asociativo($query);

$reservas_inconsistencias = [];
// Filtrar usuario
if ($formulario == "filtrar" && $formulario != "") {
    $comodin = "";

    if ($_SESSION['id_rol'] == 2) {
        $comodin_id_usuario = " AND A.id_usuario_creacion = '" . $_SESSION['id_usuario'] . "'";
        $comodin .= $comodin_id_usuario;
    }

    $estado = $_POST['estado'];
    $comodin_estado = "";
    if ($estado != "") {
        $comodin_estado = " AND A.estado = '$estado'";
        $comodin .= $comodin_estado;
    }

    $id_sala = $_POST['id_sala'];
    $comodin_id_sala = "";
    if ($id_sala != "") {
        $comodin_id_sala = " AND A.id_sala = '$id_sala'";
        $comodin .= $comodin_id_sala;
    }

    $sql = "SELECT A.*, B.nombre as nombre_sala FROM reservas_inconsistencias A, salas B, usuarios C WHERE A.id_sala = B.id AND A.id_usuario_creacion = C.id $comodin";
    $query = $dbm->prepare($sql);
    $query->execute();
    $reservas_inconsistencias = array_asociativo($query);
}
?>