<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro BIM 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <script>
        function eliminar() {
            return confirm("Estas seguro de que deseas eliminar este usuario");
        }
        // Función para ocultar la notificación después de un cierto tiempo
        setTimeout(function () {
            var alertDiv = document.querySelector('.alert');
            alertDiv.classList.add('hidden');
        }, 3000); // Cambia el valor (en milisegundos) según lo que desees
    </script>
    <h1 class="text-center p-3">Práctica CRUD Usando Php y Mysql</h1>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_datos.php";
    ?>
    <div class="container-fluid mt-5">
        <div class="row">

            <!-- Formulario de registro -->

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form class="p-3" method="POST">
                            <h3 class="text-center text-secondary">Registro de Usuarios</h3>
                            <?php include "controlador/registrar.php"; ?>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="cedula" class="form-label">Número de Cédula</label>
                                <input type="text" class="form-control" name="cedula" id="cedula" maxlength="10">
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" name="correo" id="correo">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono">
                            </div>
                            <div class="mb-3">
                                <label for="rol" class="form-label">Rol de trabajo</label>
                                <select class="form-select" name="rol" id="rol">
                                    <option value="">Selecciona un rol</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Docente">Docente</option>
                                    <option value="Estudiante">Estudiante</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_de_registro" class="form-label">Fecha</label>
                                <input type="date" class="form-control" name="fecha_registro" id="fecha_registro">
                            </div>
                            <button type="submit" class="btn btn-primary" name="btnregistrar"
                                value="Ok">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabla que muestra el registro -->

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="bg-info">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cédula</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Fecha de Registro</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM usuarios";
                                $result = $conexion->query($sql);

                                if ($result === false) {
                                    echo "Error en la consulta: " . $conexion->error;
                                } else {
                                    while ($datos = $result->fetch_object()) { ?>
                                        <tr>
                                            <td><?= $datos->nombre ?></td>
                                            <td><?= $datos->cedula ?></td>
                                            <td><?= $datos->correo ?></td>
                                            <td><?= $datos->telefono ?></td>
                                            <td><?= $datos->rol ?></td>
                                            <td><?= $datos->fecha_registro ?></td>
                                            <td>
                                                <a href="editar_datos.php?cedula=<?= $datos->cedula ?>"
                                                    class="btn btn-success btn-sm">Editar</a>
                                                <a onclick="return eliminar()" href="index.php?id=<?= $datos->cedula ?>"
                                                    class="btn btn-danger btn-sm">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>