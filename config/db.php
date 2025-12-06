<?php

function conexion_bd() {
    require_once __DIR__ . '/vendor/autoload.php'; 
    $env=parse_ini_file(__DIR__. '/../.env');
    $host=$env['SERVIDOR'];
    $user=$env['USER'];
    $bd=$env['DB_BASE'];
    $bd_pass=$env[''];
    // $servidor =getenv("SERVIDOR");
    // $user = getenv("USER");
    // $password =getenv("DB_PASS");
    // $bd =getenv("DB_BASE");
    $conn = new mysqli($servidor, $user, $password, $bd);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}
?>
