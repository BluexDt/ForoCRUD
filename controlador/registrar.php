<?php

if (!empty($_POST["btnregistrar"])) {
    // Verificar que todos los campos estén completos
    if (
        !empty($_POST["nombre"]) && !empty($_POST["cedula"]) && !empty($_POST["correo"]) &&
        !empty($_POST["telefono"]) && !empty($_POST["rol"]) && !empty($_POST["fecha_registro"])
    ) {
        $nombre = $_POST["nombre"];
        $cedula = $_POST["cedula"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $rol = $_POST["rol"];
        $fecha_de_registro = $_POST["fecha_registro"];

        // Verificar si la cédula ya existe
        $checkSql = "SELECT * FROM usuarios WHERE cedula = '$cedula'";
        $checkResult = $conexion->query($checkSql);

        if ($checkResult->num_rows > 0) {
            echo '<div class="alert alert-danger">Error: La cédula ya está registrada</div>';
        } else {
            // Preparar la consulta SQL
            $sql = "INSERT INTO usuarios (nombre, cedula, correo, telefono, rol, fecha_registro) 
                    VALUES ('$nombre', '$cedula', '$correo', '$telefono', '$rol', '$fecha_de_registro')";

            // Ejecutar la consulta
            if ($conexion->query($sql) === TRUE) {
                echo '<div class="alert alert-success">Nuevo registro creado exitosamente</div>';
            } else {
                echo '<div class="alert alert-danger">Error al crear nuevo registro: ' . $conexion->error . '</div>';
            }
            // Ocultar la notificación después de 3 segundos
            echo '<script>
             setTimeout(function() {
                 var alertDiv = document.querySelector(\'.alert\');
                 alertDiv.classList.add(\'hidden\');
             }, 3000);
           </script>';
        }
    } else {
        echo '<div class="alert alert-warning">Por favor complete todos los requerimientos</div>';
    }
}
?>