<?php
require_once "config/db.php"; // Conexión segura usando credenciales en .env

if (isset($_POST["confirmar"])) {
    // Evita entradas vacías y filtra caracteres peligrosos
    $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
    $tipo = trim(filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING));
    $dias_cosecha = filter_input(INPUT_POST, 'dias_cosecha', FILTER_VALIDATE_INT);

    if (empty($nombre) || empty($tipo) || $dias_cosecha === false || $dias_cosecha === null) {
        // Mensaje genérico al usuario sin exponer la BD
        header("Location: nuevo.php?error=" . urlencode("Complete todos los campos correctamente"));
        exit;
    }

    $conn = conexion_bd();

    // Preparar la sentencia SQL (Prepared Statement)
    // Evita inyección SQL al no concatenar variables directamente
    $stmt = mysqli_prepare($conn, "INSERT INTO cultivo (nombre, tipo, dias_cosecha) VALUES (?, ?, ?)");
    if (!$stmt) {
        // Registro del error crítico en logs del servidor
        error_log("Error al preparar la sentencia: " . mysqli_error($conn));
        header("Location: nuevo.php?error=" . urlencode("Error en la base de datos"));
        exit;
    }

    // Bind de parámetros: tipo seguro ("s" = string, "i" = integer)
    mysqli_stmt_bind_param($stmt, "ssi", $nombre, $tipo, $dias_cosecha);

    if (mysqli_stmt_execute($stmt)) {
        // Éxito: mensaje genérico al usuario
        header("Location: nuevo.php?success=" . urlencode("Cultivo creado correctamente"));
        exit;
    } else {
        // Error crítico: se registra y se muestra mensaje genérico
        error_log("Error al ejecutar la sentencia: " . mysqli_stmt_error($stmt));
        header("Location: nuevo.php?error=" . urlencode("No se pudo crear el cultivo"));
        exit;
    }

 
    mysqli_stmt_close($stmt);
    $conn->close();
}
?>
