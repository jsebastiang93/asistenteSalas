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

$id = variable_exterior("id");
$dbm = conectar_mysql();
if (isset($_POST['formulario'])) {
    $formulario = $_POST['formulario'];
    # code...
} else {
    $formulario = "";
}


$sql = "SELECT * FROM usuarios WHERE id = $id";
$query = $dbm->prepare($sql);
$query->execute();
$usuarios = array_asociativo($query)[0];



if ($formulario != "" && $formulario == "editar_contraseña") {

    $password_limpia = variable_exterior("contraseña_actual");
    $contraseña_nueva = variable_exterior("contraseña_nueva");
    $contraseña_nueva_repetir = variable_exterior("contraseña_nueva_repetir");
    $id_persona = variable_exterior("id_editar_contraseña");

    $password = md5($password_limpia); // encriptar contraseña

    $contraseña_nueva = md5($contraseña_nueva); // encriptar contraseña
    $contraseña_nueva_repetir = md5($contraseña_nueva_repetir); // encriptar contraseña

    $sql = "SELECT * FROM usuarios WHERE id = '" . $id_persona . "'";
    $select_contraseña_actual = $dbm->prepare($sql);
    $select_contraseña_actual->execute();
    $contraseña_actual = $select_contraseña_actual->fetch();

    if ($contraseña_actual["contrasena"] == $password) {
        if ($contraseña_nueva == $contraseña_nueva_repetir) { //Validacion contrasña coinciden
            $contraseña_sin_encriptar = $contraseña_nueva; // guardamos la contraseña nueva sin encriptar en una variable 
            // $contraseña_nueva = md5($contraseña_nueva);

            // traer las contraseñas del personal para validar que no se repita

            // actualizar el campo password y contraseña de la tabla personal
            $sql = "UPDATE usuarios SET contrasena = '" . $contraseña_nueva . "' WHERE id = '" . $id_persona . "'";
            $query_actualizacion = $dbm->prepare($sql);
            if ($query_actualizacion->execute()) { // condicion de si actualiza la contraseña en la base de datos
?>
                <script type="text/javascript">
                    alert('Contraseña actualizada!.');
                </script>
            <?php

            } else {
            ?>
                <script type="text/javascript">
                    alert('Contraseña no actualizada!');
                </script>
            <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("Las contraseñas no coinciden, intenlo nuevalmente!")
            </script>
        <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("La contraseña digitada no coincide con la actual!")
        </script>
<?php
    }
}
