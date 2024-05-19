<?php 
if (!empty($_POST["btnactualizar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["cedula_vigente"]) && !empty($_POST["correo"]) && 
        !empty($_POST["telefono"]) && !empty($_POST["rol"]) && !empty($_POST["fecha_registro"])) {
        
        // Obtención de datos del formulario
        $nombre = $_POST["nombre"];
        $nueva_cedula = $_POST["cedula_editable"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $rol = $_POST["rol"];
        $fecha_registro = $_POST["fecha_registro"];
        $cedula_anterior = $_POST["cedula_vigente"];

        // Verificar si la nueva cédula está disponible (excepto para el usuario actual)
        $sql_check = "SELECT COUNT(*) as count FROM usuarios WHERE cedula = '$nueva_cedula' AND cedula != '$cedula_anterior'";
        $result_check = $conexion->query($sql_check);
        $row_check = $result_check->fetch_assoc();

        if ($row_check['count'] == 0) {
            // La nueva cédula está disponible, proceder con la actualización
            $sql_update = "UPDATE usuarios SET 
                            nombre = '$nombre', 
                            cedula = '$nueva_cedula', 
                            correo = '$correo', 
                            telefono = '$telefono', 
                            rol = '$rol', 
                            fecha_registro = '$fecha_registro' 
                            WHERE cedula = '$cedula_anterior'";

            if ($conexion->query($sql_update) === TRUE) {
                header("Location: index.php");
                exit(); // Importante para asegurar que la redirección se efectúe correctamente
            } else {
                echo "<div class='alert alert-danger'>Error al actualizar datos: " . $conexion->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>La nueva cédula ya está en uso por otro usuario.</div>";
        }

    } else {
        echo "<div class='alert alert-warning'>Campos vacíos</div>";
    }
}
?>
