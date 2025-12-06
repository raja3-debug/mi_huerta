<?php

function conexion_bd() {
    require_once __DIR__ . '/vendor/autoload.php'; 

    $env = parse_ini_file(__DIR__ . '/../.env');
    $servidor = $env['SERVIDOR'];
    $user = $env['USER'];
    $bd = $env['DB_BASE'];
    $bd_pass = $env['DB_PASS'];

    $conn = new mysqli($servidor, $user, $bd_pass, $bd);

    if ($conn->connect_error) {
        // Registrar el error en un archivo log
        error_log("Error de conexión: " . $conn->connect_error, 3, __DIR__ . "/errores.log");
        return false;
    }

    return $conn;
}
?>

