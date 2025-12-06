<?php

function conexion_bd() {
    require_once __DIR__ . '/vendor/autoload.php'; 
    $env=parse_ini_file(__DIR__. '/../.env');
    $servidor=$env['SERVIDOR'];
    $user=$env['USER'];
    $bd=$env['DB_BASE'];
    $bd_pass=$env['DB_PASS'];
    
    $conn = new mysqli($servidor, $user, $password, $bd);
    if ($conn->connect_error) {
    header("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}
?>
