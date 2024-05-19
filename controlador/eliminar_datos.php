<?php
if (!empty($_GET["id"])) {
    include "modelo/conexion.php";
    $id = $_GET["id"];
    $sql = $conexion->query("DELETE FROM usuarios WHERE cedula = '$id'");

    if ($sql) {
        echo '<div class="alert alert-success">Usuario eliminado</div>';
    } else {
        
        echo '<div class="alert alert-danger">Error al eliminar: ' . $conexion->error . '</div>';
    }
}
?>
