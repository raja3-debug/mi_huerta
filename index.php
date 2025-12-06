<?php
require_once "config/db.php";  
require_once "logic/cultivos.php"; 

$conn = conexion_bd();      

$res = $conn->query("SELECT id, nombre, tipo, dias_cosecha FROM cultivo");
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Index</title>
 <style>
 table { border-collapse: collapse; width: 50%; }
 td, th { border: 1px solid #ccc; padding: 6px; }
 th {background: #eee; }
 </style>
</head>
<body>
 <h2>Lista de cultivos</h2>
 <?php if ($res && $res->num_rows > 0): ?>
 <table>
 <tr>
 <th>ID</th>
 <th>Nombre</th>
 <th>TIPO</th>
 <th>DIAS COSECHA</th>
 <th>CICLO CULTIVO</th>
 </tr>
 <?php while ($r = $res->fetch_assoc()): ?>
 <tr>
 <td><?= htmlspecialchars($r['id'], ENT_QUOTES, 'UTF-8') ?></td>
 <td><?= htmlspecialchars($r['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
 <td><?= htmlspecialchars($r['tipo'], ENT_QUOTES, 'UTF-8') ?></td>
 <td><?= htmlspecialchars($r['dias_cosecha'], ENT_QUOTES, 'UTF-8') ?></td>
 <?php 
 $ciclo = cicloCultivo($r['dias_cosecha']);
 ?>
 <td><?= htmlspecialchars($ciclo, ENT_QUOTES, 'UTF-8') ?></td>
 </tr>
 <?php endwhile; ?>
 </table>
 <?php else: ?>
 <p>No hay registros.</p>
 <?php endif; ?>
</body>
</html>
<?php $conn->close(); ?>