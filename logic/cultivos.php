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
function ordenarPorDiasAsc($cultivos){
    usort($cultivos, function($a, $b) {
        if ($a['dias_cosecha'] < $b['dias_cosecha']) return -1;
        if ($a['dias_cosecha'] > $b['dias_cosecha']) return 1;
        return 0;
    });

    return $cultivos;
    }
    function ordenarPorDiasDesc($cultivos){
        usort($cultivos, function($a, $b) {
            if ($a['dias_cosecha'] > $b['dias_cosecha']) return -1;
            if ($a['dias_cosecha'] < $b['dias_cosecha']) return 1;
            return 0;
        });
    
        return $cultivos;
        }


?>