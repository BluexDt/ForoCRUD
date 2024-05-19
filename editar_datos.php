<?php
// Incluir el archivo de conexión
include "modelo/conexion.php";

// Obtener la cédula del usuario a editar
$id = $_GET["cedula"];
$sql = $conexion->query("SELECT * FROM usuarios WHERE cedula = '$id'");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center text-secondary">Editar Usuario</h3>
        <input type="hidden" name="cedula_vigente" value="<?= $_GET["cedula"] ?>">
        <?php
        include "controlador/editar_datos.php";
        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-1">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
            </div>
            <div class="mb-1">
                <label for="cedula_editable" class="form-label">Número de Cédula</label>
                <input type="text" class="form-control" name="cedula_editable" value="<?= $datos->cedula ?>" maxlength="10">
            </div>
            <div class="mb-1">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" value="<?= $datos->correo ?>">
            </div>
            <div class="mb-1">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="<?= $datos->telefono ?>">
            </div>
            <div class="mb-1">
                <label for="rol" class="form-label">Rol de trabajo</label>
                <select class="form-select" name="rol">
                    <option value="">Selecciona un rol</option>
                    <option value="Administrador" <?= $datos->rol == 'Administrador' ? 'selected' : '' ?>>Administrador</option>
                    <option value="Docente" <?= $datos->rol == 'Docente' ? 'selected' : '' ?>>Docente</option>
                    <option value="Estudiante" <?= $datos->rol == 'Estudiante' ? 'selected' : '' ?>>Estudiante</option>
                </select>
            </div>
            <div class="mb-1">
                <label for="fecha_registro" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha_registro" value="<?= $datos->fecha_registro ?>">
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary" name="btnactualizar" value="ok">Actualizar</button>
    </form>
</body>

</html>
