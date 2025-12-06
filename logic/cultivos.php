<?php
function cicloCultivo($dias) {

    if ($dias <= 30) {
        return "Corto";
    } elseif ($dias <= 60) {
        return "Medio";
    } else {
        return "Tardío";
    }
}
?>
