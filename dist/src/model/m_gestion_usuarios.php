<?php

setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/Bogota');

// $dbm = conectar_mysql();
// $error_personal = null;
// $fecha_hoy = date("Y-m-d");
// $fecha_hora_hoy = date("Y-m-d H:i:s"); //fecha_creacion
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

$sql = "SELECT * FROM roles WHERE estado = 1";
$query = $dbm->prepare($sql);
$query->execute();
$roles = array_asociativo($query);


if ($formulario == "crear_usuario" && $formulario != "") {
    // Importación de valores para insert
    $tipo_identificacion = $_POST['tipo_identificacion'];
    $numero_identificacion = $_POST['numero_identificacion'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $usuario = strstr($email, "@", true);
    $contrasena = md5($_POST['password']);

    $sql = "SELECT COUNT(*) AS cont FROM usuarios WHERE email = '$email'";
    $query = $dbm->prepare($sql);
    $query->execute();
    $cont = array_asociativo($query)[0]['cont'];

    if ($cont == 0) {
        $sql = "INSERT INTO usuarios (usuario, contrasena, tipo_identificacion, identificacion, nombres, apellidos, celular, email, id_rol, estado, fecha_creacion) VALUES ('$usuario', '$contrasena','$tipo_identificacion', '$numero_identificacion', '$nombres', '$apellidos', '$celular', '$email', '$rol', '1', NOW())";
        $query = $dbm->prepare($sql);
        if ($query->execute()) {
?>
            <script>
                alert("El usuario se insertó correctamente");
            </script>

        <?php
        } else {
        ?>
            <script>
                alert("Error! El usuario no se insertó correctamente");
            </script>

        <?php
        }
    } else {
        ?>
        <script>
            alert("Error! El usuario ya existe");
        </script>
    <?php
    }
}

// Actualizar usuario
if ($formulario == "actualizar_usuario" && $formulario != "") {
    $tipo_identificacion = $_POST['tipo_identificacion'];
    $numero_identificacion = $_POST['numero_identificacion'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];
    $usuario = strstr($email, "@", true);
    $contrasena = md5($_POST['password']);
    $id = $_POST['id'];

    $sql = "UPDATE usuarios SET tipo_identificacion = '$tipo_identificacion', identificacion = '$numero_identificacion', nombres = '$nombres', apellidos = '$apellidos', celular = '$celular', email = '$email', nombres = '$nombres', id_rol = '$rol', estado = '$estado', nombres = '$nombres', usuario = '$usuario', contrasena = '$contrasena' WHERE id ='$id' ";
    $query = $dbm->prepare($sql);

    if ($query->execute()) {
    ?>
        <script>
            alert("Usuario actualizado correctamente");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error! El usuario no fue actualizado correctamente");
        </script>

<?php
    }
}

// Consultar usuarios tabla
$sql = "SELECT * FROM usuarios";
$query = $dbm->prepare($sql);
$query->execute();
$usuarios = array_asociativo($query);


// Filtrar usuario
if ($formulario == "filtrar_usuario" && $formulario != "") {
    $comodin = "";

    $identificacion = $_POST['numero_identificacion'];
    $comodin_identificacion = "";
    if ($identificacion != "") {
        $comodin_identificacion = " AND identificacion = '$identificacion'";
        $comodin .= $comodin_identificacion;
    }

    $usuario = $_POST['usuario'];
    $comodin_usuario = "";
    if ($usuario != "") {
        $comodin_usuario = " AND usuario = '$usuario'";
        $comodin .= $comodin_usuario;
    }

    $nombres = $_POST['nombres'];
    $comodin_nombres = "";
    if ($nombres != "") {
        $comodin_nombres = " AND nombres like '%$nombres%'";
        $comodin .= $comodin_nombres;
    }

    $sql = "SELECT * FROM usuarios WHERE 1 = 1 $comodin";
    $query = $dbm->prepare($sql);
    $query->execute();
    $usuarios = array_asociativo($query);
}
?>